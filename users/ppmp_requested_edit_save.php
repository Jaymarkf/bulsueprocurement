<?php
include('../dbcon.php');
include('session.php');

date_default_timezone_set('Asia/Manila');

if (isset($_POST['saveUPDATE'])){
	$itemDetailCode = $_POST['ciCode'];
	$itemDetailDesc = $_POST['ciDesc'];
	$PriceCatalogue = $_POST['ciPrice'];
	$UnitOfMeasurement = $_POST['ciUOM'];
	$itemCatDesc = $_POST['ciCategory'];
	$year = $_POST['ciYear'];
	$quantity = $_POST['ciQty'];
	$month = $_POST['ciMonth'];
	$purpose = $_POST['ciPurpose'];

	$TotalAmount = ($PriceCatalogue * $quantity);
	
	mysqli_query($conn,"UPDATE tbl_ppmp SET itemdetailCode='$itemDetailCode',itemdetailDesc='$itemDetailDesc',
	PriceCatalogue='$PriceCatalogue',UnitOfMeasurement='$UnitOfMeasurement',ItemCatDesc='$itemCatDesc',
	Year='$year',Quantity='$quantity',Month='$month',purpose='$purpose',TotalAmount='$TotalAmount'
	WHERE ppmpID = '$prodID'");

	$query= mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
	$row = mysqli_fetch_array($query);
	$fname = $row['firstname'];
	$lname = $row['lname'];
	$user_username = $fname.' '.$lname;
	$itemDetails = $itemDetailCode.' '.$itemDetailDesc.' '.$month.' '.$quantity.' '.$purpose;
	
//	mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Update item details $itemDetails')");
}
?>