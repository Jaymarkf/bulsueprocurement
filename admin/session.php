<?php
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if (!isset($_SESSION['admin_id']) || (trim($_SESSION['admin_id']) == '')) {
		header('Location: ../index.php');		
	} else {
		$session_id=$_SESSION['admin_id'];
		$query= mysqli_query($conn,"select * from users where user_id = '$session_id'");
		$row = mysqli_fetch_array($query);
		$user_username = $row['username'];
	}
?>