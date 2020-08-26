<?php
include('../dbcon.php');
include('session.php');
$PRno = $_POST['ciPRno'];

//search if the item exists before saving the purchase request
$qry = mysqli_query($conn,"SELECT * FROM tbl_pr_items WHERE PRno = '$PRno'");
while($row = mysqli_fetch_array($qry)) {
$PRexist = $row['PRno'];
}

if ($PRexist == $PRno){

	$Year = $_POST['ciYear'];
	$PRno = $_POST['ciPRno'];
	$PRDate = $_POST['ciPRDate'];
	$EntityName = $_POST['ciEntityName'];
	$OfficeSection = $_POST['ciOfficeSection'];
	$RequestBy = $_POST['ciRequestBy'];
	$FundCluster = $_POST['ciFundCluster'];
	$ResCenter = $_POST['ciResCenter'];
	$ApprovedBy = $_POST['ciApprovedBy'];
	$uname = $fname.'.'.$lname;
    $fc = $_POST['fc'];
	mysqli_query($conn,"INSERT INTO tbl_pr (user_id,Year,EntityName,FundCluster,OfficeSection,PRno,PR_Date,RequestedBy,ApprovedBy)
							  VALUES('$session_id','$Year','$EntityName','$fc','$OfficeSection','$PRno','$PRDate','$RequestBy','$ApprovedBy')");

//	mysqli_query($conn,"INSERT INTO activity_log (date,username,action) values(NOW(),'$user_username','Add User $uname')");
}
?>