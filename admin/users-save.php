<?php
include('../dbcon.php');
include('session.php');

//$fname = $_POST['fname'];
//$lname = $_POST['lname'];
//$username = $fname.'.'.$lname;

$username = $_POST['username'];

//if found reject the saving of users
	$query = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	$num_row = mysqli_num_rows($result);
	
if( $num_row > 0 ) {
	header("location: user-registration-failed.php");
	exit;	
} else {
	$status= $_POST['status'];
	$branch= $_POST['branch'];
	
	function generatePasswd($numAlphaUPPER=2,$numAlphaLOWER=2,$numnumeric=2,$numsymbol=2){
		$AlphaUPPER = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$AlphaLOWER = 'abcdefghijklmnopqrstuvwxyz';
		$numeric = '0123456789';
		$symbol = '!@#$%^&*()-+,';
		
		return str_shuffle(
			substr(str_shuffle($AlphaUPPER),0,$numAlphaUPPER) .
			substr(str_shuffle($AlphaLOWER),0,$numAlphaLOWER) .
			substr(str_shuffle($numeric),0,$numnumeric) .
			substr(str_shuffle($symbol),0,$numsymbol)
		);
	}
	
	$password = generatePasswd();
	
	mysqli_query($conn,"insert into users (Year,branch,username,password,status,registered_date,approved,Remarks) values(YEAR(NOW()),'$branch','$username','$password','$status',NOW(),'yes','Registered by Admin')");
//	mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $uname')");
}
?>