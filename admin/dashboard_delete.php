<?php
include('../dbcon.php');
include('session.php');
if (isset($_POST['delete_student'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$query = mysqli_query($conn,"select * from tbl_ppmp where ppmpID ='$id[$i]'");
	$row = mysqli_fetch_array($query);
	$fname = $row['firstname'];
	$mname = $row['middlename'];
//	mysqli_query($conn,"insert into activity_log (username,date,action) values('$user_username',NOW(),'Deleted Student $fname $mname')")or die (mysql_error());
	mysqli_query($conn,"DELETE FROM tbl_ppmp where ppmpID ='$id[$i]'");
	/** mysqli_query($conn,"DELETE FROM payment_check where student_id ='$id[$i]'"); **/
}
header("location: ppmp.php");
}
?>