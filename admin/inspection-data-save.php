<?php
include('../dbcon.php');
include('session.php');

	$query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
		while($row = mysqli_fetch_array($query)) {
			$Year = $row['Year'];
	}
	
	$ciIARno = $_POST['ciIARno'];
			
	//if found reject saving of IAR
	$query = "SELECT * FROM tbl_iar WHERE Year = $Year AND iar_No = '$ciIARno'";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	$num_row = mysqli_num_rows($result);
	
if( $num_row > 0 ) {
	
	$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
	
	header("location: inspection-add.php");
	exit;
	//echo json_encode(array(
	//	'status' => 'error',
	//	'message'=> 'error message'
	//));
} else {
	$ciIARDate = $_POST['ciIARDate'];
	$ciPOno = $_POST['ciPOno'];
	$ciROD = $_POST['ciROD'];
	$ciRCC = $_POST['ciRCC'];
	
	//items save from PO tbl_iar JOIN tbl_iar_items USING (POno)
	$query1 = mysqli_query($conn,"SELECT * FROM tbl_po JOIN tbl_po_items USING (POno) WHERE POno = '$ciPOno'");

	while($row1 = mysqli_fetch_array($query1)) {
		$Year = $row1['Year'];
		$supplier = $row1['supplier'];
		$poDate = $row1['PO_Date'];
		$POno = $row1['POno'];
		$SPno = $row1['SPno'];
		$Unit = $row1['Unit'];
		$ItemDescription = $row1['ItemDescription'];
		$Quantity = $row1['Quantity'];
		
		mysqli_query($conn,"insert into tbl_iar_items (Year,POno,SPno,Unit,ItemDescription,Quantity)
		   values('$Year','$POno','$SPno','$Unit','$ItemDescription','$Quantity')");
	}
	
	//iar records
	mysqli_query($conn,"insert into tbl_iar (iar_No,iar_Date,Year,supplier,POno,po_Date,rod,rcc)
			   values('$ciIARno','$ciIARDate','$Year','$supplier','$ciPOno','$poDate','$ciROD','$ciRCC')");

	$fname = $row['firstname'];
	$lname = $row['lastname'];
	$uname = $fname.' '.$lname;
	
//	mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add new BACreso by $uname')");
	
	$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	
	header('location: inspection-main.php');
	exit;
	//echo json_encode(array(
	//	'status' => 'success',
	//	'message'=> 'success message'
	//));
}
?>