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
			<div class="muted pull-left"><i class="icon-plus-sign icon-large"></i> Add Quotation</div>
		</div>
		<div class="block-content collapse in">
			<div class="span12">
			<form method="post" id="add_quotation">
				<div class="span6">
					<div class="control-group">
					  <div class="controls">
					  <label>Company Name</label>
					   <input class="input focused span12"  name="co_name" id="focusedInput" type="text" placeholder = "Company Name" required>
					  </div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
					  <label>Company Address</label>
						<input class="input focused span12"  name="co_address" id="focusedInput" type="text" placeholder = "Company Address" required>
					  </div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
					  <label>Contact Person</label>
						<input class="input focused span12"  name="contact_person" id="focusedInput" type="text" placeholder = "Contact Person" required>
					  </div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
					  <label>Contact Number</label>
						<input class="input focused span12"  name="contact_number" id="focusedInput" type="text" placeholder = "Contact Number" required>
					  </div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
					  <label>E-mail</label>
						<input class="input focused span12"  name="email" id="focusedInput" type="email" placeholder = "E-mail" required>
					  </div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
					  <label>TIN</label>
						<input class="input focused span12"  name="tin" id="focusedInput" type="text" placeholder = "TIN" required>
					  </div>
					</div>
				</div>
				
				<div class="span6">
					<!-- <div class="control-group">
					  <div class="controls">
					  <label>Reference Number</label>
						<select name="ref_num" placeholder = "Reference Number" class="span12" onChange="getState(this.value);" required>
							<option value="">Select P.R. no.</option>
							<?php
							foreach($results as $country) {
							?>
							<option value="<?php echo $country["PRno"]; ?>"><?php echo $country["PRno"]; ?></option>
							<?php
							}
							?>
						</select>
					  </div>
					</div> -->
					
					<!-- <div class="control-group">
					  <div class="controls">
					  <label>Item Description</label>
						<select name="item_Desc" placeholder = "Item Description" id="state-list" class="span12" required>
							<option value="<?php echo $country["itemDescription"]; ?>">Select Item</option>
						</select>
					  </div>
					</div> -->
					
					<div class="control-group">
						<?php
							date_default_timezone_set("Asia/Manila");						
							$now=date('Y-m-d');
						?>
						<div class="controls">
						<label>Date</label>
						<input type="date" value="<?php echo $now; ?>" name="Q_date" placeholder = "Date" id="state-list" class="span12" required>
						</div>
					</div>
					
					<div class="control-group">
						<div class="controls">
							<label>Item Description</label>
							<input class="span12"  name="item_Desc" id="focusedInput" type="text" value="<?php echo $itemDesc; ?>" placeholder = "Item Description" disabled>
							<input class="span12" type="hidden" name="item_Desc" value="<?php echo $itemDesc; ?>" placeholder = "Code">
						</div>
					</div>
					
					<div class="control-group">
						<div class="controls">
							<label>Quantity</label>
							<input class="span12"  name="Quantity" id="focusedInput" type="text" value="<?php echo $itemQuantity; ?>" placeholder = "Quantity" disabled>
							<input class="span12" type="hidden" name="Quantity" value="<?php echo $itemQuantity; ?>" placeholder = "Quantity">
						</div>
					</div>
					
					<div class="control-group">
						<div class="controls">
							<label>Unit of Measurement</label>
							<input class="span12"  name="unit_of_Measurement" id="focusedInput" type="text" value="<?php echo $itemUnit; ?>" placeholder = "Unit of Measurement" disabled>
							<input class="span12" type="hidden" name="unit_of_Measurement" value="<?php echo $itemUnit; ?>" placeholder = "Unit of Measurement">
						</div>
					</div>
										
					<div class="control-group">
					  <div class="controls">
					  <label>Unit Price</label>
						<input class="input focused span12"  name="unit_Price" id="focusedInput" type="text" placeholder = "Unit Price" required>
					  </div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
					  <label>Brand and Model</label>
						<input class="input focused span12"  name="brand_model" id="focusedInput" type="text" placeholder = "Brand and Model" required>
					  </div>
					</div>
				
				
					<div class="control-group">
						<div class="controls">
							<button  data-placement="top" title="Click to Save" id="save" name="save" class="btn btn-success"><i class="icon-save icon-large"></i> Save</button>
									<script type="text/javascript">
									$(document).ready(function(){
										$('#save').tooltip('show');
										$('#save').tooltip('hide');
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
<script>
	jQuery(document).ready(function($){
		$("#add_quotation").submit(function(e){
			e.preventDefault();
			var _this = $(e.target);
			var formData = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "quotation-save.php?item=$itemTotalCost",
				data: formData,
				success: function(html){
					$.jGrowl("New quotation is successfully added", { header: 'SUCCESS' });
					var delay = 3000;
					setTimeout(function(){ window.location = 'quotation.php'  }, delay);
				}
			});
		});
	});
</script>	