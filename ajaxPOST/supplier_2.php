<?php
session_start();
include('../dbcon.php');



if(isset($_POST['update_id']) && strlen($_POST['update_id']) != 0){
        $cqry = "select * from equipment_code where code = '" . $_POST['e_code'] . "'  or description  = '".$_POST['e_desc']."'";
        $ex = $conn->query($cqry);
        if ($ex->num_rows > 0) {
            $res['flag'] = 'false';
        } else {
            $res['flag'] = 'true';
             $qry = $conn->query("update equipment_code set code ='".$_POST['e_code']."',description='".$_POST['e_desc']."' where id = " .$_POST['update_id'].";");
        }
            echo json_encode($res);

}elseif(isset($_POST['e_code']) &&strlen($_POST['e_code']) !=0){

    $cqry = "select * from equipment_code where code = '" . $_POST['e_code'] . "'  or description  = '".$_POST['e_desc']."'";
        $ex = $conn->query($cqry);
        if ($ex->num_rows > 0) {
             $res['flag'] = 'false';
        } else {
            $res['flag'] = 'true';
            $qry = $conn->query("insert into equipment_code (`code`,`description`) values('" . $_POST['e_code'] . "','".$_POST['e_desc']."')");
        }

        echo json_encode($res);
}


if(isset($_POST['delete_id'])){
    $conn->query("delete from equipment_code where id = ".$_POST['delete_id']);
}

if(isset($_POST['tempx'])){
    $c = $conn->query("select * from tbl_rfq_item_details where id = ".$_POST['tempx']);
    $cf = $c->fetch_assoc();
    $vs['val'] = $cf['item_and_specification'];
    echo json_encode($vs);
}