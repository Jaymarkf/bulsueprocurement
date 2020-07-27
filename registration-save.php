<?php
include('dbcon.php');
include('session.php');

if (isset($_POST['register'])) {
	$branch = $_POST['branch'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	
	$sql = mysql_query("SELECT * FROM users WHERE branch='$branch'") or die(mysql_error());
	$sql1 = mysql_query("SELECT * FROM users WHERE firstname='$fname' AND lastname='$lname'") or die(mysql_error());
	$sql2 = mysql_query("SELECT * FROM users WHERE email='$email'") or die(mysql_error());
	
	if (mysql_num_rows($sql) > 0) {
		header("location: registration-failed.php");
		exit();
	}elseif (mysql_num_rows($sql1) > 0){
		header("location: registration-failed.php");
		exit();
	}elseif (mysql_num_rows($sql2) > 0){
		header("location: registration-failed.php");
		exit();
	}else{
		$username = $fname.'.'.$lname;
		$fullname = $fname.' '.$lname;
		mysql_query("insert into users (branch,username,password,firstname,lastname,email,status,registered_date,approved,Remarks) values('$branch','$username','12345','$fname','$lname','$email','normal',NOW(),'no','Registered by User')")or die(mysql_error());
		mysql_query("insert into activity_log (date,username,action) values(NOW(),'$username','Newly registered user $fullname')")or die(mysql_error());
		header("location: registration-success.php");
		exit();
	}
}
	
?>