<?php
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

mysqli_query($conn,"insert into tbl_ppmp (user_id,Year,EndUserUnit,SourceOfFund,Status,Priority, purpose,date_requested,ItemCatDesc,itemdetailDesc,UnitOfMeasurement,PriceCatalogue,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,`Dec`,TotalQty,TotalAmount,Remarks)
         	          values('$session_id','$year','$EndUserUnit','$SOF','Pending','$priority','$purpose',NOW(),'$itemCatDesc','$itemDetailDesc','$UnitOfMeasurement','$PriceCatalogue','$Jan','$Feb','$Mar','$Apr','$May','$Jun','$Jul','$Aug','$Sep','$Oct','$Nov','$Dec','$TQtyMonth','$TotalAmount','$rem')");

//mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $uname')");
?>