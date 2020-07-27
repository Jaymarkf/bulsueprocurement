<?php
include('../dbcon.php');
include('session.php');

$PRno = $_POST['ciPRno'];

//search if the item exists before saving the purchase request
$qry = mysql_query("SELECT * FROM tbl_pr_items WHERE PRno = '$PRno'")or die(mysql_error());
while($row = mysql_fetch_array($qry)) {
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

	mysql_query("INSERT INTO tbl_pr (Year,EntityName,FundCluster,OfficeSection,PRno,PR_Date,RequestedBy,ApprovedBy)
							  VALUES('$Year','$EntityName','$FundCluster','$OfficeSection','$PRno','$PRDate','$RequestBy','$ApprovedBy')")or die(mysql_error());

//	mysql_query("INSERT INTO activity_log (date,username,action) values(NOW(),'$user_username','Add User $uname')")or die(mysql_error());
}
?>