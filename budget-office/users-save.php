<?php
include('../dbcon.php');
include('session.php');
$status= $_POST['status'];
$branch= $_POST['branch'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$uname = $fname.'.'.$lname;

mysql_query("insert into users (branch,username,password,firstname,lastname,email,status,registered_date,approved,Remarks) values('$branch','$uname','12345','$fname','$lname','$email','$status',NOW(),'yes','Registered by Admin')")or die(mysql_error());
//mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $uname')")or die(mysql_error());
?>