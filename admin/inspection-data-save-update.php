<?php
include('../dbcon.php');
include('session.php');


$item_request = $_POST['item_request'];

	$query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
		while($row = mysqli_fetch_array($query)) {
			$Year = $row['Year'];
	}
						
	//$item_request = $_POST['item_request'];
	$companyA = $_POST['companyA'];
	$companyB = $_POST['companyB'];
	$companyC = $_POST['companyC'];

	$fname = $row['firstname'];
	$lname = $row['lastname'];
	$uname = $fname.' '.$lname;

//mysqli_query($conn,"update users set branch= '$branch',username = '$uname',firstname ='$fname', lastname='$lname', email='$email', status='$status',approved='$approved' where user_id = '$get_id' ");
	mysqli_query($conn,"UPDATE tbl_bac_resolution SET Year = '$Year',companyA='$companyA',companyB='$companyB',companyC='$companyC',itemDescription='$item_request' WHERE Year = '$Year' AND itemDescription = '$item_request' ");
				
//	mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add new BACreso by $uname')");
	
	echo json_encode(array(
		'status' => 'success',
		'message'=> 'success message'
	));
?>