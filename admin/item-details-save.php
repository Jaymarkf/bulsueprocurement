<?php
include('../dbcon.php');
include('session.php');
$idCat = $_POST['idCat'];
//$idCode = $_POST['idCode'];
$idDesc = $_POST['idDesc'];
$idPrice = $_POST['idPrice'];
$uname = $idCode.'.'.$idDesc;
$uom = $_POST['UoM'];
//mysqli_query($conn,"insert into tbl_item_details (itemcategoryID,itemdetailCode,itemdetailDesc,PriceCatalogue) values('$idCat','$idCode','$idDesc','$idPrice')");
mysqli_query($conn,"insert into tbl_item_details (itemcategoryID,itemdetailDesc,UnitOfMeasurement,PriceCatalogue) values('$idCat','$idDesc','$uom','$idPrice')");
//mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $uname')");
?>