<?php
include('../dbcon.php');
include('session.php');

$item_request = $_POST['item_request'];

	$qry = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
		while($row = mysqli_fetch_array($qry)) {
			$Year = $row['Year'];
			$fname = $row['firstname'];
			$lname = $row['lastname'];
			$uname = $fname.' '.$lname;
		}
			
    //if found reject the saving of users
	$query = "SELECT * FROM tbl_bac_resolution WHERE Year = '$Year' AND itemDescription = '$item_request'";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	$num_row = mysqli_num_rows($result);
	
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

	mysqli_query($conn,"INSERT INTO tbl_bac_resolution (Year,Date_Created,companyA,companyB,companyC,itemDescription)
			   VALUES('$Year',NOW(),'$companyA','$companyB','$companyC','$item_request')");
				
//	mysqli_query($conn,"INSERT INTO activity_log (date,username,action) VALUES(NOW(),'$user_username','Add new BACreso by $uname')");
	
	header("location: bac-res-main.php");
	exit;
	//echo json_encode(array(
	//	'status' => 'success',
	//	'message'=> 'success message'
	//));
}
?>