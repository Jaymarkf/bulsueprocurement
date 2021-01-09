<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php include('session.php'); ?>
<?php
	$itemID = $_GET['item'];
	
	if(!empty($itemID)){
		$sqlSelectItem = mysqli_query($conn,"SELECT * FROM tbl_quotation WHERE itemDescription = '$itemID'") ;
		$getItemInfo = mysqli_fetch_array($sqlSelectItem);
		
		$Company = $getItemInfo["Company"];
		$Address = $getItemInfo["Address"];
		$Contact_Person = $getItemInfo["Contact_Person"];
		$Contact_No = $getItemInfo["Contact_No"];
		$email = $getItemInfo["email"];
		$TIN = $getItemInfo["TIN"];
		$Brand_Model = $getItemInfo["Brand_Model"];
		$itemDesc = $getItemInfo["itemDescription"];
		$itemQuantity = $getItemInfo["Quantity"];		
		$itemUnit = $getItemInfo["unitOfMeasurement"];
		//$itemTotalCost = $getItemInfo["TotalCost"];
		$itemUnitPrice = $getItemInfo["unitPrice"];
		$itemExtPrice = $getItemInfo["extPrice"];
	} else{
		header('location:quotation.php'); 
	}
?>
<body>
	<?php include('navbar.php'); ?>
	<h4 class="span12"> Quotation Listings </h4>
	
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12" id="content">
				<div class="container-fluid">
					<div class="row-fluid">			
						<div class="span12" id="content">
							<div class="row-fluid">
								<div class="span6">
										<div class="control-group">
										  <div class="controls">
										  <label>Item Description</label>
										   <input class="span12" type="text" value="<?php echo $itemDesc; ?>" disabled>
										  </div>
										</div>
								</div>
								<div class="span2">		
										<div class="control-group">
										  <div class="controls">
										  <label>Quantity</label>
											<input class="span12" type="text" value="<?php echo $itemQuantity; ?>" disabled>
										  </div>
										</div>
								</div>
								<div class="span2">		
										<div class="control-group">
										  <div class="controls">
										  <label>Unit of Measurement</label>
											<input class="span12" type="text" value="<?php echo $itemUnit; ?>" disabled>
										  </div>
										</div>
								</div>
								<div class="span2">		
										<div class="control-group">
										  <div class="controls">
										  <label>ABC:</label>
											<input class="span12" type="text" value="<?php //echo $itemDesc; ?>" disabled>
										  </div>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12" id="content">
				<?php  include('quotation-view-print-table.php');  ?>		   			
			</div>
		</div>
	<?php include('footer.php'); ?>
	</div>
	<?php include('script.php'); ?>
</body>