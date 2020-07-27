<?php
include('../dbcon.php');
include('session.php');


$query = mysql_query("SELECT * FROM users WHERE user_id = '$session_id'")or die(mysql_error());
	while($row = mysql_fetch_array($query)) {
	$Year = $row['Year'];
}

$Q_date = $_POST['Q_date'];						
$co_name = $_POST['co_name'];
$co_address = $_POST['co_address'];
$contact_person = $_POST['contact_person'];
$contact_number = $_POST['contact_number'];
$email = $_POST['email'];
$tin = $_POST['tin'];
$unit_brand_model = $_POST['brand_model'];
$item_Desc = $_POST['item_Desc'];
$unit_Quantity = $_POST['Quantity'];
$unit_of_Measurement = $_POST['unit_of_Measurement'];
$unit_Price = $_POST['unit_Price'];
$unit_ABC_Total_Price = $_POST['item'];
$unit_ExtPrice = $unit_Quantity * $unit_Price;


$uname = $fname.'.'.$lname;

mysql_query("INSERT INTO tbl_quotation (Q_date,Year,Company,Address,Contact_Person,Contact_No,email,TIN,Brand_Model,itemDescription,Quantity,unitOfMeasurement,unitPrice,ABC_Total_Price,ExtPrice)
			VALUES ('$Q_date','$Year','$co_name','$co_address','$contact_person','$contact_number','$email','$tin','$unit_brand_model','$item_Desc','$unit_Quantity','$unit_of_Measurement','$unit_Price','$unit_ABC_Total_Price','$unit_ExtPrice')")or die(mysql_error());
//mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $uname')")or die(mysql_error());
?>