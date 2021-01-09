<?php
if(!isset($_SESSION)){
    session_start();
}
include('../dbcon.php');
include('session.php');
date_default_timezone_set('Asia/Manila');

$itemDetailDesc = $_POST['ciDesc'];
$PriceCatalogue = $_POST['ciPrice'];
$UnitOfMeasurement = $_POST['ciUOM'];
$itemCatDesc = $_POST['ciCategory'];
$year = $_POST['ciYear'];
$SOF = $_POST['ciSOF'];
$purpose = $_POST['ciPurpose'];
//a number given for each month
$Jan = $_POST['ciJanQty'];
$Feb = $_POST['ciFebQty'];
$Mar = $_POST['ciMarQty'];
$Apr = $_POST['ciAprQty'];
$May = $_POST['ciMayQty'];
$Jun = $_POST['ciJunQty'];
$Jul = $_POST['ciJulQty'];
$Aug = $_POST['ciAugQty'];
$Sep = $_POST['ciSepQty'];
$Oct = $_POST['ciOctQty'];
$Nov = $_POST['ciNovQty'];
$Dec = $_POST['ciDecQty'];
$budget = $_POST['ebudget'];

$TQtyMonth = ($Jan+$Feb+$Mar+$Apr+$May+$Jun+$Jul+$Aug+$Sep+$Oct+$Nov+$Dec);
$TotalAmount = ($PriceCatalogue * $TQtyMonth);

$priority = $_POST['ciPriority'];
$rem = $_POST['ciRemarks'];

$query= mysqli_query($conn,"select * from users where user_id = '$session_id'");
$row = mysqli_fetch_array($query);
$EndUserUnit = $row['branch'];
$fname = $row['firstname'];
$lname = $row['lname'];
$user_username = $fname.' '.$lname;
$uname = $fname.'.'.$lname;
$item_id = $_GET['prodid'];
mysqli_query($conn,"insert into tbl_ppmp (`user_id`,`Year`,`EndUserUnit`,`SourceOfFund`,`Status`,`Priority`,`BO_PPMP_Status`,`PU_PPMP_Status`,`purpose`,`date_requested`,`item_id`,`ItemCatDesc`,`itemdetailDesc`,`UnitOfMeasurement`,`PriceCatalogue`,`Jan`,`Feb`,`Mar`,`Apr`,`May`,`Jun`,`Jul`,`Aug`,`Sep`,`Oct`,`Nov`,`Dec`,`EstimatedBudget`,`TotalQty`,`TotalAmount`,`Remarks`,`pr_approved`)
         	          values($session_id, '$year', '$EndUserUnit', '$SOF', 'Pending', '$priority','','','$purpose', NOW(),'$item_id', '$itemCatDesc', '$itemDetailDesc', '$UnitOfMeasurement', '$PriceCatalogue', $Jan, $Feb, $Mar, $Apr, $May, $Jun, $Jul, $Aug, $Sep, $Oct, $Nov, $Dec,$budget, $TQtyMonth, $TotalAmount, '$rem','pending')");

//mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $uname')");
echo mysqli_error($conn);
?>