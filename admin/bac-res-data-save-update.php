<?php
include('../dbcon.php');
include('session.php');


$item_request = $_POST['item_request'];

	$query = mysql_query("SELECT * FROM users WHERE user_id = '$session_id'")or die(mysql_error());
		while($row = mysql_fetch_array($query)) {
			$Year = $row['Year'];
	}
						
	//$item_request = $_POST['item_request'];
	$companyA = $_POST['companyA'];
	$companyB = $_POST['companyB'];
	$companyC = $_POST['companyC'];

	$fname = $row['firstname'];
	$lname = $row['lastname'];
	$uname = $fname.' '.$lname;

//mysql_query("update users set branch= '$branch',username = '$uname',firstname ='$fname', lastname='$lname', email='$email', status='$status',approved='$approved' where user_id = '$get_id' ")or die(mysql_error());
	mysql_query("UPDATE tbl_bac_resolution SET Year = '$Year',companyA='$companyA',companyB='$companyB',companyC='$companyC',itemDescription='$item_request' WHERE Year = '$Year' AND itemDescription = '$item_request' ")or die(mysql_error());
				
//	mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Add new BACreso by $uname')")or die(mysql_error());
	
	header("location: bac-res-main.php");
	exit;
//	echo json_encode(array(
//		'status' => 'success',
//		'message'=> 'success message'
//	));
?>