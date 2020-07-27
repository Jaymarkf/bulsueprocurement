<?php
include('dbcon.php');
include('session.php');

if (isset($_POST['register'])) {
	$branch = $_POST['branch'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	
	$sql = mysqli_query($conn,"SELECT * FROM users WHERE branch='$branch'") ;
	$sql1 = mysqli_query($conn,"SELECT * FROM users WHERE firstname='$fname' AND lastname='$lname'") ;
	$sql2 = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'") ;
	
	if (mysqli_num_rows($sql) > 0) {
		header("location: registration-failed.php");
		exit();
	}elseif (mysqli_num_rows($sql1) > 0){
		header("location: registration-failed.php");
		exit();
	}elseif (mysqli_num_rows($sql2) > 0){
		header("location: registration-failed.php");
		exit();
	}else{
		$username = $fname.'.'.$lname;
		$fullname = $fname.' '.$lname;
		mysqli_query($conn,"insert into users (branch,username,password,firstname,lastname,email,status,registered_date,approved,Remarks) values('$branch','$username','12345','$fname','$lname','$email','normal',NOW(),'no','Registered by User')");
		mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$username','Newly registered user $fullname')");
		header("location: registration-success.php");
		exit();
	}
}
	
?>