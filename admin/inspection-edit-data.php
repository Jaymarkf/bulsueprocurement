<?php
	$query = mysql_query("SELECT * FROM users WHERE user_id = '$session_id'")or die(mysql_error());
		while($row = mysql_fetch_array($query)) {
		$Year = $row['Year'];
	}
?>

<?php
/*for the dropdown and another dropdown*/
require_once("dbcontroller.php");
$db_handle = new DBController();
$query = "SELECT * FROM tbl_quotation WHERE Year = $Year AND extPrice <> 0 GROUP BY itemDescription" or die(mysql_error());
//$query = "SELECT * FROM tbl_pr WHERE PRno <> '0000'";
$results = $db_handle->runQuery($query);
?>

<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "bac_res_state.php",
	data:'country_id='+val,
	success: function(data){
		$("#state-listA").html(data);
		$("#state-listB").html(data);
		$("#state-listC").html(data);
	}
	});
}
</script>

<div class="row-fluid">
	<!-- block -->
	<div class="block">
		<div class="navbar navbar-inner block-header">
			<div class="muted pull-left"><i class="icon-plus-sign icon-large"></i> UPDATE BAC Resolution</div>
		</div>
		<div class="block-content collapse in">
			<div class="span12">
			<form method="post" id="add_bac_res_data">
				<div class="span3">
					<div class="control-group">
					  <div class="controls">
						<label>Name of Articles being Requisitioned</label>
						<!-- <select name="item_request" placeholder = "Name of articles being requestitioned" class="span12" required>
							<option><?php echo $item;?></option>
							<?php							
								//$query = mysql_query("SELECT * FROM tbl_quotation WHERE Year = $Year AND extPrice <> 0 GROUP BY itemDescription")or die(mysql_error());
								//while($row = mysql_fetch_array($query)){
								//$id = $row['bacresID'];
								//echo "<option>".$row['itemDescription']."</option>";
								//}
							?>
						</select> -->
						<select name="item_request" placeholder = "Name of articles being requestitioned" class="span12" onChange="getState(this.value);" required>
							<option><?php echo $item;?></option>
							<?php
							foreach($results as $country) {
							?>
							<option value="<?php echo $country["itemDescription"]; ?>"><?php echo $country["itemDescription"]; ?></option>
							<?php
							}
							?>
						</select>
					  </div>
					</div>
				</div>	
				
				<div class="span3">
					<div class="control-group">
					  <div class="controls">
						<label>Company A</label>
						<!-- <select name="companyA" placeholder = "Select Company A" class="span12" required>
							<option><?php echo $coA;?></option>
							<?php
								$query = mysql_query("SELECT * FROM tbl_quotation WHERE Year = $Year AND extPrice <> 0 GROUP BY Company")or die(mysql_error());
								while($row = mysql_fetch_array($query)){
									echo "<option>".$row['Company']."</option>";
								}
							?>
						</select> -->
						<select name="companyA" placeholder = "Item Description" id="state-listA" class="span12" required>
							<option><?php echo $coA;?></option>
						</select>
					  </div>
					</div>
				</div>
				
				<div class="span3">
					<div class="control-group">
					  <div class="controls">
						<label>Company B</label>
						<!-- <select name="companyB" placeholder = "Select Company B" class="span12" required>
							<option><?php echo $coB;?></option>
							<?php
								//$query = mysql_query("SELECT * FROM tbl_bac_resolution WHERE Year = $Year AND extPrice <> 0 GROUP BY Company")or die(mysql_error());
								$query = mysql_query("SELECT * FROM tbl_quotation WHERE Year = $Year AND extPrice <> 0 GROUP BY Company")or die(mysql_error());
								while($row = mysql_fetch_array($query)){
									echo "<option>".$row['Company']."</option>";
								}
							?>
						</select> -->
						<select name="companyB" placeholder = "Item Description" id="state-listB" class="span12" required>
							<option><?php echo $coB;?></option>
						</select>
					  </div>
					</div>
				</div>

				<div class="span3">
					<div class="control-group">
					  <div class="controls">
						<label>Company C</label>
						<!-- <select name="companyC" placeholder = "Select Company C" class="span12" required>
							<option><?php echo $coC;?></option>
							<?php
								$query = mysql_query("SELECT * FROM tbl_quotation WHERE Year = $Year AND extPrice <> 0 GROUP BY Company")or die(mysql_error());
								while($row = mysql_fetch_array($query)){
									echo "<option>".$row['Company']."</option>";
								}
							?>
						</select> -->
						<select name="companyC" placeholder = "Item Description" id="state-listC" class="span12" required>
							<option><?php echo $coC;?></option>
						</select>
					  </div>
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
	
							<a href="inspection-main.php" title="Click to Cancel" id="cancel" data-placement="top" name="cancel" class="btn btn-danger"><i class="icon-undo icon-large"></i> Cancel </a>
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
		$("#add_bac_res_data").submit(function(e){
			e.preventDefault();
			var _this = $(e.target);
			var formData = $(this).serialize();
			//$.ajax({
			//	type: "POST",
			//	url: "inspection-data-save.php",
			//	data: formData,
			//	success: function(html){
			//		$.jGrowl("New BACreso is successfully added", { header: 'SUCCESS' });
			//		var delay = 3000;
			//		setTimeout(function(){ window.location = 'inspection-main.php'  }, delay);
			//	}
			//	error: function(html) {
			//		$.jGrowl("BACReso already added", { header: 'SUCCESS' });
			//		var delay = 3000;
			//		setTimeout(function(){ window.location = 'inspection-data.php'  }, delay);
			//	}
			//});
			
			$.ajax({
				type: "POST",
				url: "inspection-data-save-update.php",
				dataType:"json",
				//data: dataString,
				data: formData,
				success: function (response) {
					if(response.status === "success") {
						$.jGrowl("New BACreso is successfully updated", { header: 'SUCCESS' });
							var delay = 3000;
							setTimeout(function(){ window.location = 'inspection-main.php'  }, delay);
					} else if(response.status === "error") {
						$.jGrowl("BACReso item failed to update", { header: 'FAILED' });
							var delay = 3000;
							setTimeout(function(){ window.location = 'inspection-main.php'  }, delay);
					}
				}
			})
			return false;
		});
	});
</script>	