<?php
include('../dbcon.php');
include('session.php');

$item_request = $_POST['item_request'];

	$qry = mysql_query("SELECT * FROM users WHERE user_id = '$session_id'")or die(mysql_error());
		while($row = mysql_fetch_array($qry)) {
			$Year = $row['Year'];
			$fname = $row['firstname'];
			$lname = $row['lastname'];
			$uname = $fname.' '.$lname;
		}
			
    //if found reject the saving of users
	$query = "SELECT * FROM tbl_bac_resolution WHERE Year = '$Year' AND itemDescription = '$item_request'";
	$result = mysql_query($query)or die(mysql_error());
	$row = mysql_fetch_array($result);
	$num_row = mysql_num_rows($result);
	
if($num_row > 0 ) {
	header("location: bac-res-add-data.php");
	exit;
	//echo json_encode(array(
	//	'status' => 'error',
	//	'message'=> 'error message'
	//));
} else {
	$companyA = $_POST['companyA'];
	$companyB = $_POST['companyB'];
	$companyC = $_POST['companyC'];

	mysql_query("INSERT INTO tbl_bac_resolution (Year,Date_Created,companyA,companyB,companyC,itemDescription)
			   VALUES('$Year',NOW(),'$companyA','$companyB','$companyC','$item_request')")or die(mysql_error());
				
//	mysql_query("INSERT INTO activity_log (date,username,action) VALUES(NOW(),'$user_username','Add new BACreso by $uname')")or die(mysql_error());
	
	header("location: bac-res-main.php");
	exit;
	//echo json_encode(array(
	//	'status' => 'success',
	//	'message'=> 'success message'
	//));
}
?>