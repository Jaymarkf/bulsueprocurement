<?php

	//Check whether the session variable SESS_MEMBER_ID is present or not
	if (!isset($_SESSION['bo_admin_id']) || (trim($_SESSION['bo_admin_id']) == '')) {
		header('Location: ../index.php');		
	} else {
		$session_id=$_SESSION['bo_admin_id'];
		$query= mysqli_query($conn,"select * from users where user_id = '$session_id'");
		$row = mysqli_fetch_array($query);
		$user_username = $row['username'];
	}
?>