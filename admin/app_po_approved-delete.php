<?php
include('../dbcon.php');
include('session.php');

if (isset($_GET['id'])){
		$id=$_GET['id'];
		
		mysql_query("DELETE FROM tbl_po_items WHERE poID='$id'");
		
		$query = mysql_query("SELECT * FROM users WHERE user_id ='$session_id'")or die(mysql_error());
		$row = mysql_fetch_array($query);
		$uname = $row['username'];

//		mysql_query("insert into activity_log (username,date,action) values('$user_username',NOW(),'Deleted item id $uname in PPMP Cart lists')")or die (mysql_error());

		header("location: app_po_approved-add.php");
}else{
	header("location: app_po_approved-add.php");
}
?>