<?php
include('../dbcon.php');
include('session.php');

	$query = mysql_query("SELECT * FROM users WHERE user_id = '$session_id'")or die(mysql_error());
		while($row = mysql_fetch_array($query)) {
			$Year = $row['Year'];
	}
	
	$ciIARno = $_POST['ciIARno'];
			
	//if found reject saving of IAR
	$query = "SELECT * FROM tbl_iar WHERE Year = $Year AND iar_No = '$ciIARno'";
	$result = mysql_query($query)or die(mysql_error());
	$row = mysql_fetch_array($result);
	$num_row = mysql_num_rows($result);
	
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
	$query1 = mysql_query("SELECT * FROM tbl_po JOIN tbl_po_items USING (POno) WHERE POno = '$ciPOno'")or die(mysql_error());

	while($row1 = mysql_fetch_array($query1)) {
		$Year = $row1['Year'];
		$supplier = $row1['supplier'];
		$poDate = $row1['PO_Date'];
		$POno = $row1['POno'];
		$SPno = $row1['SPno'];
		$Unit = $row1['Unit'];
		$ItemDescription = $row1['ItemDescription'];
		$Quantity = $row1['Quantity'];
		
		mysql_query("insert into tbl_iar_items (Year,POno,SPno,Unit,ItemDescription,Quantity)
		   values('$Year','$POno','$SPno','$Unit','$ItemDescription','$Quantity')")or die(mysql_error());
	}
	
	//iar records
	mysql_query("insert into tbl_iar (iar_No,iar_Date,Year,supplier,POno,po_Date,rod,rcc)
			   values('$ciIARno','$ciIARDate','$Year','$supplier','$ciPOno','$poDate','$ciROD','$ciRCC')")or die(mysql_error());

	$fname = $row['firstname'];
	$lname = $row['lastname'];
	$uname = $fname.' '.$lname;
	
//	mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Add new BACreso by $uname')")or die(mysql_error());
	
	$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	
	header('location: inspection-main.php');
	exit;
	//echo json_encode(array(
	//	'status' => 'success',
	//	'message'=> 'success message'
	//));
}
?>