<?php
include('../dbcon.php');
include('session.php');
    $poid = $_POST['ciPO'];
    $iar_no = $_POST['ciIARno'];
    $iar_date = $_POST['ciIARDate'];
    $rod = $_POST['ciROD'];
    $rcc = $_POST['ciRCC'];

	 $qry  = "insert into tbl_iar_items (poID,iar_no,iar_date,requisition_office,responsibility_code_center) VALUES('$poid','$iar_no','$iar_date','$rod','$rcc')";
	 $conn->query($qry);
	 header('Location: inspection-main.php');
	 exit();

?>