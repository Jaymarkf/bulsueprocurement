<?php
include('../dbcon.php');
include('session.php');
if (isset($_POST['delete'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$query = mysqli_query($conn,"select * from tbl_quotation where quotation_id ='$id[$i]'");
	$row = mysqli_fetch_array($query);
	$uname = $row['username'];

//	mysqli_query($conn,"insert into activity_log (username,date,action) values('$user_username',NOW(),'Deleted  user $uname')")or die (mysql_error());
	mysqli_query($conn,"DELETE FROM tbl_quotation where quotation_id='$id[$i]'");
}
	header("location: quotation.php");
}else{
	header("location: quotation.php");
}
?>