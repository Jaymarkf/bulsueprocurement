<?php
include('../dbcon.php');
include('session.php');

$POno = $_POST['ciPOno'];

//search if the item exists before saving the purchase request
$qry = mysql_query("SELECT * FROM tbl_po_items WHERE POno = '$POno'")or die(mysql_error());
while($row = mysql_fetch_array($qry)) {
$POexist = $row['POno'];
}

if ($POexist == $POno){

	$Year = $_POST['ciYear'];
	$POno = $_POST['ciPOno'];
	$PODate = $_POST['ciPODate'];
	$MOP = $_POST['ciMOP'];
	$EntityName = $_POST['ciEntityName'];
	$Supplier = $_POST['ciSupplier'];
	$Address = $_POST['ciAddress'];
	$Email = $_POST['ciEmail'];
	$ContactNo = $_POST['ciContactNo'];
	$TIN = $_POST['ciTIN'];

	$uname = $fname.'.'.$lname;

	mysql_query("INSERT INTO tbl_po (Year,EntityName,supplier,address,email,contact_no,TIN,POno,PO_Date,MOP)
							  VALUES('$Year','$EntityName','$Supplier','$Address','$Email','$ContactNo','$TIN','$POno','$PODate','$MOP')")or die(mysql_error());

//	mysql_query("INSERT INTO activity_log (date,username,action) values(NOW(),'$user_username','Add User $uname')")or die(mysql_error());
}
?>