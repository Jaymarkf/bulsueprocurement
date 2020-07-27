<?php
	//mysql_select_db('bulsuepr_database',mysql_connect('localhost','root','r00tb33r')) or die(mysql_error());
	//mysql_select_db('bulsuepro',mysql_connect('127.0.0.1','root',''))or die(mysql_error());
	$host = "localhost";
	$username = "root";
	$password = "r00tb33r";
	$database = "bulsuepr_database";
	$conn = mysqli_connect($host,$username,$password,$database);
	error_reporting(1);
?>

