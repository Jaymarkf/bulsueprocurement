<?php
include('../dbcon.php');
include('session.php');
$icDesc = strtoupper($_POST['icDesc']);
//$uname = $icDesc;

$session_id=$_SESSION['admin_id'];
$query= mysql_query("select * from users where user_id = '$session_id'")or die(mysql_error());
	$row = mysql_fetch_array($query);
	$user_username = $row['username'];

mysql_query("insert into tbl_item_category (itemCatDesc) values('$icDesc')")or die(mysql_error());
//mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $uname')")or die(mysql_error());
?>