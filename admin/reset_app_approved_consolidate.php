<?php
include('../dbcon.php');
include('session.php');

if (isset($_GET['id'])){
		$id=$_GET['id'];
		
		mysql_query("DELETE FROM tbl_ppmp_consolidated WHERE Year='$id'");
		
		$query = mysql_query("SELECT * FROM users WHERE user_id ='$session_id'")or die(mysql_error());
		$row = mysql_fetch_array($query);
		$uname = $row['username'];

//		mysql_query("insert into activity_log (username,date,action) values('$user_username',NOW(),'Reset the consolidated ppmp year $uname')")or die (mysql_error());

		header("location: app_approved.php?id=" .$id);
	}else{
		header("location: app_approved.php?id=" .$id);
}
?>