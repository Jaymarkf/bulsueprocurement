<?php
/*for the dropdown and another dropdown*/
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM tbl_pr WHERE PRno <> '0000'";
$results = $db_handle->runQuery($query);
?>

<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "quotation_get_state.php",
	data:'country_id='+val,
	success: function(data){
		$("#state-list").html(data);
	}
	});
}
</script>

<div class="row-fluid">
	<!-- block -->
	<div class="block">
		<div class="navbar navbar-inner block-header">
			<div class="muted pull-left"><i class="icon-edit icon-large"></i> Edit Quotation</div>
		</div>
		<div class="block-content collapse in">
			<div class="span12">
				<?php
					$query = mysql_query("select * from tbl_quotation where quotation_id = '$get_id'")or die(mysql_error());
					$row = mysql_fetch_array($query);
				?>
			<form method="post" id="update_quotation">
				<div class="span6">
					<div class="control-group">
					  <div class="controls">
					  <label>Company Name</label>
					   <input class="input focused span12"  name="co_name" id="focusedInput" type="text" placeholder = "Company Name" value="<?php echo $row['Company']; ?>" required>
					  </div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
					  <label>Company Address</label>
						<input class="input focused span12"  name="co_address" id="focusedInput" type="text" placeholder = "Company Address" value="<?php echo $row['Address']; ?>" required>
					  </div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
					  <label>Contact Person</label>
						<input class="input focused span12"  name="contact_person" id="focusedInput" type="text" placeholder = "Contact Person" value="<?php echo $row['Contact_Person']; ?>" required>
					  </div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
					  <label>Contact Number</label>
						<input class="input focused span12"  name="contact_number" id="focusedInput" type="text" placeholder = "Contact Number" value="<?php echo $row['Contact_No']; ?>" required>
					  </div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
					  <label>E-mail</label>
						<input class="input focused span12"  name="email" id="focusedInput" type="email" placeholder = "E-mail" value="<?php echo $row['email']; ?>" required>
					  </div>
					</div>
				</div>
				
				<div class="span6">
					<div class="control-group">
					  <div class="controls">
					  <label>Reference Number</label>
						<select name="ref_num" placeholder = "Reference Number" class="span12" onChange="getState(this.value);" required>
							<option value=""><?php echo $row['Ref_No']; ?></option>
							<?php
							foreach($results as $country) {
							?>
							<option value="<?php echo $country["PRno"]; ?>"><?php echo $country["PRno"]; ?></option>
							<?php
							}
							?>
						</select>
					  </div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
					  <label>Item Description</label>
						<select name="item_Desc" placeholder = "Item Description" id="state-list" class="span12" required>
							<option value=""><?php echo $row['itemDescription']; ?></option>
						</select>
					  </div>
					</div>
					
					<div class="control-group">
						<div class="controls">
						<label>Unit of Measurement</label>
							<input class="input focused span12"  name="unit_of_Measurement" id="focusedInput" type="text" placeholder = "Unit of Measurement" value="<?php echo $row['unitOfMeasurement']; ?>" required>
						</div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
					  <label>Unit Price</label>
						<input class="input focused span12"  name="unit_Price" id="focusedInput" type="text" placeholder = "Unit Price" value="<?php echo $row['unitPrice']; ?>" required>
					  </div>
					</div>
				
				
					<div class="control-group">
					  <div class="controls">
							<button id="update" data-placement="top" title="Click to Update" name="update" class="btn btn-success"><i class="icon-save icon-large"></i> Update</button>
								<script type="text/javascript">
									$(document).ready(function(){
										$('#update').tooltip('show');
										$('#update').tooltip('hide');
									});
								</script>
							
							<a href="quotation.php" title="Click to Cancel" id="cancel" data-placement="top" name="cancel" class="btn btn-danger"><i class="icon-undo icon-large"></i> Cancel </a>
									<script type="text/javascript">
									$(document).ready(function(){
										$('#cancel').tooltip('show');
										$('#cancel').tooltip('hide');
									});
									</script>
					  </div>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
	<!-- /block -->
</div>
<?php
if (isset($_POST['update'])){
	$branch= $_POST['branch'];
	$status= $_POST['status'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$approved = $_POST['approved'];
	$uname = $fname.'.'.$lname;

mysql_query("update tbl_quotation set branch= '$branch',username = '$uname',firstname ='$fname', lastname='$lname', email='$email', status='$status',approved='$approved' where user_id = '$get_id' ")or die(mysql_error());
?>

<script>
	$.ajax({
		success: function(html){
			$.jGrowl("Selected quotation is successfully updated", { header: 'SUCCESS' });
			var delay = 1500;
			setTimeout(function(){ window.location = 'quotation.php'  }, delay);
		}
	});
</script>
<?php
}
?>	