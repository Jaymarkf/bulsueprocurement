<?php
include('../../dbcon.php');
if(isset($_POST['radio_id'])){
    $radio_id = $_POST['radio_id'];
    $quantity = $_POST['quantity'];
    $str_reason = $_POST['str_reason'];
    $issued_by = $_POST['issued_by'];
    $received_by = $_POST['received_by'];

    $conn->query("insert into tbl_pt_par_items (`par_items_id`,`quantity`,`issued_by`,`received_by`,`reason_for_transfer`) 
    values('$radio_id','$quantity','$issued_by','$received_by','$str_reason')");
    $insert_id = $conn->insert_id;
    $conn->query("update tbl_par_items set transfer_id = ".$insert_id. ",quantity = quantity - ".$quantity." where id = $radio_id");

}