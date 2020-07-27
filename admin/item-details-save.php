<?php
include('../dbcon.php');
include('session.php');
$idCat = $_POST['idCat'];
//$idCode = $_POST['idCode'];
$idDesc = $_POST['idDesc'];
$idPrice = $_POST['idPrice'];
$uname = $idCode.'.'.$idDesc;

//mysql_query("insert into tbl_item_details (itemcategoryID,itemdetailCode,itemdetailDesc,PriceCatalogue) values('$idCat','$idCode','$idDesc','$idPrice')")or die(mysql_error());
mysql_query("insert into tbl_item_details (itemcategoryID,itemdetailDesc,PriceCatalogue) values('$idCat','$idDesc','$idPrice')")or die(mysql_error());
//mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $uname')")or die(mysql_error());
?>