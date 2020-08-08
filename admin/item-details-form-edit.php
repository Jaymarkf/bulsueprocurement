   <div class="row-fluid">       
		<!-- block -->
		<div class="block">
			<div class="navbar navbar-inner block-header">
				<div class="muted pull-left"><i class="icon-pencil icon-large"></i> Edit Item Details </div>
			</div>
			
			<?php
				$query1 = mysqli_query($conn,"select * from tbl_item_details where itemdetailID = '$get_id'");
				while($row1 = mysqli_fetch_array($query1)) {
					$id = $row1['itemdetailID'];
					$itemcategoryID = $row1['itemcategoryID'];
				
				$query2 = mysqli_query($conn,"select * from tbl_item_category where itemcategoryID='$itemcategoryID'");
				while($row2= mysqli_fetch_array($query2)){
					$itemCatCode = $row2['itemcategoryID'];
					$itemCatDesc = $row2['ItemCatDesc'];
					
				}
			?>
			<div class="block-content collapse in">
				<div class="span12">
				<form method="post">
						<div class="control-group">
							<div class="controls">
							<label>Category</label>
								<select name="idCat" placeholder = "Category" class="span12" required>
									<option value="<?php echo $itemCatCode;?>"><?php echo $itemCatDesc;?></option>
									
									<?php
										//Create query
										$query = "select * from tbl_item_category ORDER BY ItemCatDesc ASC";
										$result=mysqli_query($conn,$query) or die ("Query Failed: ".mysql_error());
										while ($row=mysqli_fetch_array($result)) {
											$icitemcategoryID=$row['itemcategoryID'];
											$icCatDesc=$row['ItemCatDesc'];
											echo '<option value='. $icitemcategoryID .'>'. $icCatDesc .'</option>';
										}
									?>
								</select>
							</div>
						</div>
						<?php
							$query = mysqli_query($conn,"select * from tbl_item_details where itemdetailID = '$get_id'");
							$row = mysqli_fetch_array($query);
						?>
					<!--	<div class="control-group">
						  <div class="controls">
							<label>Code</label>
							<input name="idCode" value="<?php echo $row['itemdetailCode']; ?>" class="input focused span12" id="focusedInput" placeholder = "Code" type="text" required>
						  </div>
						</div> -->
						
						<div class="control-group">
						  <div class="controls">
							<label>Description</label>
							<input name="idDesc" value="<?php echo $row['itemdetailDesc']; ?>" class="input focused span12" id="focusedInput" placeholder = "Description" type="text" required>
						  </div>
						</div>
						
						<div class="control-group">
						  <div class="controls">
							<label>Price Catalogue</label>
							<input name="idPrice" value="<?php echo $row['PriceCatalogue']; ?>" class="input focused span12" id="focusedInput" placeholder = "Price" type="text" required>
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
								<a href="item-details.php" name="cancel" id="cancel" data-placement="right" title="Click to cancel update" class="btn btn-failed"><i class="icon-arrow-left icon-large"></i> Cancel</a>
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
			<?php } ?>  <!-- /end ng query ng database -->
		</div>
		<!-- /block -->
	</div><?php
if (isset($_POST['update'])){
$idCat = $_POST['idCat'];
//$idCode = $_POST['idCode'];
$idDesc = $_POST['idDesc'];
$idPrice = $_POST['idPrice'];
$uname = $idDesc;

//mysqli_query($conn,"update tbl_item_details set itemcategoryID = '$idCat',itemdetailCode = '$idCode',itemdetailDesc ='$idDesc',PriceCatalogue ='$idPrice' where itemdetailID = '$get_id' ");
mysqli_query($conn,"update tbl_item_details set itemcategoryID = '$idCat',itemdetailDesc ='$idDesc',PriceCatalogue ='$idPrice' where itemdetailID = '$get_id' ");
//mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Update item $uname')");
?>

<script>
	$.ajax({
		success: function(html){
			$.jGrowl("Selected item details is successfully updated", { header: 'SUCCESS' });
			var delay = 2000;
			setTimeout(function(){ window.location = 'item-details.php'  }, delay);
		}
	});
</script>
<?php

}
?>