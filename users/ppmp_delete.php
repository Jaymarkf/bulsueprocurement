<?php
include('../dbcon.php');
include('session.php');
if (isset($_GET['id'])){
    $id = $_GET['id'];
	mysqli_query($conn,"DELETE FROM tbl_ppmp WHERE ppmpID='$id'");
	$query = mysqli_query($conn,"SELECT * FROM users WHERE user_id ='$session_id'");
	$row = mysqli_fetch_assoc($query);
	$uname = $row['username'];
	header("Location: ppmp.php");
	exit();
	//mysqli_query($conn,"insert into activity_log (username,date,action) values('$user_username',NOW(),'Deleted item id $uname in PPMP Cart lists')")or die (mysql_error());
} else {
	header("Location: ppmp.php");
	exit();
}