   <div class="row-fluid">     
		<!-- block -->
		<div class="block">
			<div class="navbar navbar-inner block-header">
				<div class="muted pull-left"><i class="icon-pencil icon-large"></i> Edit Item Category </div>
			</div>
			<?php
			$query = mysql_query("select * from tbl_item_category where itemcategoryID = '$get_id'")or die(mysql_error());
			$row = mysql_fetch_array($query);
			?>
			<div class="block-content collapse in">
				<div class="span12">
				<form method="post">
						
						<div class="control-group">
						  <div class="controls">
							<label>Description</label>
							<input name="icDesc" value="<?php echo $row['ItemCatDesc']; ?>" class="input focused span12" id="focusedInput" placeholder = "Description" type="text" required>
						  </div>
						</div>
						
					
							<div class="control-group">
						  <div class="controls">
								<button name="update" id="update" data-placement="right" title="Click to update" class="btn btn-success"><i class="icon-save icon-large"></i> Update</button>
									<script type="text/javascript">
										$(document).ready(function(){
											$('#update').tooltip('show');
											$('#update').tooltip('hide');
										});
									</script>
								<a href="item-category.php" name="cancel" id="cancel" data-placement="right" title="Click to cancel update" class="btn btn-failed"><i class="icon-arrow-left icon-large"></i> Cancel</a>
									<script type="text/javascript">
										$(document).ready(function(){
											$('#cancel').tooltip('show');
											$('#cancel').tooltip('hide');
										});
									</script>
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
$icDesc = $_POST['icDesc'];

mysql_query("update tbl_item_category set itemCatDesc ='$icDesc' where itemcategoryID = '$get_id' ")or die(mysql_error());
?>

<script>
$.ajax({
		success: function(html){
			$.jGrowl("Selected item Category is successfully updated", { header: 'SUCCESS' });
			var delay = 2000;
			setTimeout(function(){ window.location = 'item-category.php'  }, delay);
		}
	});
</script>
<?php

}
?>