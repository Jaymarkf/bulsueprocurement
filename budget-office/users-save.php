<?php
include('../dbcon.php');
include('session.php');
$status= $_POST['status'];
$branch= $_POST['branch'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$uname = $fname.'.'.$lname;

mysqli_query($conn,"insert into users (branch,username,password,firstname,lastname,email,status,registered_date,approved,Remarks) values('$branch','$uname','12345','$fname','$lname','$email','$status',NOW(),'yes','Registered by Admin')");
//mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $uname')");
?>