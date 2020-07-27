<?php
include('../dbcon.php');
include('session.php');
$icDesc = strtoupper($_POST['icDesc']);
//$uname = $icDesc;

$session_id=$_SESSION['admin_id'];
$query= mysqli_query($conn,"select * from users where user_id = '$session_id'");
	$row = mysqli_fetch_array($query);
	$user_username = $row['username'];

mysqli_query($conn,"insert into tbl_item_category (itemCatDesc) values('$icDesc')");
//mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $uname')");
?>