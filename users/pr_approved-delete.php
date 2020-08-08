<?php
include('../dbcon.php');
include('session.php');

if (isset($_GET['id'])){
		$id=$_GET['id'];
		
		mysqli_query($conn,"DELETE FROM tbl_pr_items WHERE prID='$id'");
		
		$query = mysqli_query($conn,"SELECT * FROM users WHERE user_id ='$session_id'");
		$row = mysqli_fetch_array($query);
		$uname = $row['username'];

	//	mysqli_query($conn,"insert into activity_log (username,date,action) values('$user_username',NOW(),'Deleted item id $uname in PPMP Cart lists')")or die (mysql_error());

		header("location: pr_add.php");
}else{
	header("location: pr_add.php");
}
?>