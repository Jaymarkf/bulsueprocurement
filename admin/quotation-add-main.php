<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php
	$itemID = $_GET['item'];
	
	if(!empty($itemID)){
		$sqlSelectItem = mysqli_query($conn,"SELECT *, sum(Quantity) as Quantity FROM tbl_pr_items WHERE ItemDescription = '$itemID' GROUP BY 'ItemDescription'") ;
		$getItemInfo = mysqli_fetch_array($sqlSelectItem);
		
		$itemDesc = $getItemInfo["ItemDescription"];
		$itemUnit = $getItemInfo["Unit"];
		$itemQuantity = $getItemInfo["Quantity"];
		$itemUnitCost = $getItemInfo["UnitCost"];
		$itemTotalCost = $getItemInfo["TotalCost"];
	} else{
		header('location:quotation.php'); 
	}
?>
<body>
	<?php include('navbar.php'); ?>
	<h4 class="span12">Manage Quotation</h4>
	
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12" id="content">
				<?php  include('quotation-add.php');  ?>		   			
			</div>
		</div>
	<?php include('footer.php'); ?>
	</div>
	<?php include('script.php'); ?>
</body>