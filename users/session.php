<?php
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if (!isset($_SESSION['member_id']) || (trim($_SESSION['member_id']) == '')) {
		header('Location: ../index.php');
	}else {	
		$session_id=$_SESSION['member_id'];
		$query= mysqli_query($conn,"select * from users where user_id = '$session_id'");
		$row = mysqli_fetch_array($query);
		$user_username = $row['username'];
	}
?>