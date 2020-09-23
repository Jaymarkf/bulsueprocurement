<?php
include('../dbcon.php');
include('session.php');


////search if the item exists before saving the purchase request
//$qry = mysqli_query($conn,"SELECT * FROM tbl_po_items WHERE POno = '$POno'");
//while($row = mysqli_fetch_array($qry)) {
//$POexist = $row['POno'];
//}
//
//if ($POexist == $POno){
//
//	$Year = $_POST['ciYear'];
//	$POno = $_POST['ciPOno'];
//	$PODate = $_POST['ciPODate'];
//	$MOP = $_POST['ciMOP'];
//	$EntityName = $_POST['ciEntityName'];
//	$Supplier = $_POST['ciSupplier'];
//	$Address = $_POST['ciAddress'];
//	$Email = $_POST['ciEmail'];
//	$ContactNo = $_POST['ciContactNo'];
//	$TIN = $_POST['ciTIN'];
//
//	$uname = $fname.'.'.$lname;
//
//	mysqli_query($conn,"INSERT INTO tbl_po (Year,EntityName,supplier,address,email,contact_no,TIN,POno,PO_Date,MOP)
//							  VALUES('$Year','$EntityName','$Supplier','$Address','$Email','$ContactNo','$TIN','$POno','$PODate','$MOP')");
//
////	mysqli_query($conn,"INSERT INTO activity_log (date,username,action) values(NOW(),'$user_username','Add User $uname')");
//}

//$company_id  = $_POST['hcompany_id'];
//$po_number = $_POST['purchase_request_no'];
//$date_generate = $_POST['ciPODate'];
//$date_term = $_POST['year'];
//$mode_of_payment = $_POST['ciMOP'];
//$stock_property_no = $_POST['stock_property_no'];
//$unit = $_POST['unit'];
//$item_description = $_POST['item_description'];
//$quantity = $_POST['quantity'];
//$unit_cost = $_POST['unit_cost'];
//$total_cost = $_POST['total_cost'];
//
//
//$qry = "insert into tbl_po (po_number,
//                            date_generate,
//                            date_term,
//                            mode_of_payment,
//                            company_id,
//                            stock_property_no,
//                            unit,
//                            item_description,
//                            quantity,
//                            unit_cost,
//                            total_cost)
//                   VALUES(  '$po_number',
//                            '$date_generate',
//                            '$date_term',
//                            '$mode_of_payment',
//                            '$company_id',
//                            '$stock_property_no',
//                            '$unit',
//                            '$item_description',
//                            '$quantity',
//                            '$unit_cost',
//                            '$total_cost')";
//$exec = $conn->query($qry);
//echo mysqli_error($conn);

$bac_id = $_POST['purchase_request_no'];
$po_date_generate = $_POST['ciPODate'];
$mode_payment = $_POST['ciMOP'];
$year = $_POST['year'];

//get company to table bac genrate
$qry = "select * from tbl_generate_bac_report where id = ". $bac_id;
$exe = $conn->query($qry);
$data = $exe->fetch_assoc();
$item_list_arr = $data['item_details_id_array'];
$company_id = $data['company_id'];


//now save it to tbl_po
$a = "insert into tbl_po (`bac_id`,`date_generate`,`date_term`,`mode_of_payment`,`company_id`) values('$bac_id','$po_date_generate','$year','$mode_payment','$company_id')";
$conn->query($a);
?>

