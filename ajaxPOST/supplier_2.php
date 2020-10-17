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

if(isset($_POST['id'])){
    $d = $conn->query("select * from users where user_id = ".$_POST['id']);
    $f = $d->fetch_assoc();
    $v['collegef'] = $f['branch'];
    $v['positionf'] = $f['position'];
    echo json_encode($v);

}
if(isset($_POST['ics_save'])){

    $ics_num_year = $_POST['ics_num_year'];
    $ics_num_month = $_POST['ics_num_month'];
    $ics_num_series = $_POST['ics_num_series'];
    $iar_idd = $_POST['iar_id'];
    $e_code = $_POST['code'];
    $date_acquired = $_POST['date_acquired'];
    $received_from = $_POST['received_from'];
    $purchase_num_month = $_POST['purchase_num_month'];
    $purchase_num_series = $_POST['purchase_num_series'];
    $purchase_num_year = $_POST['purchase_num_year'];
    $date_issued = $_POST['date_issued'];
    $delivered_by = $_POST['delivered_by'];
    $fundcluster_name = $_POST['fundcluster_name'];
    $fundcluster_year = $_POST['fundcluster_year'];
    $fundcluster_month = $_POST['fundcluster_month'];
    $fundcluster_series = $_POST['fundcluster_series'];

    $ics_num_merge = $ics_num_year. ','. $ics_num_month. ','.$ics_num_series;
    $purchase_num_merge = $purchase_num_month . ','. $purchase_num_series. ','. $purchase_num_year;
    $fundcluster_num_merge = $fundcluster_name. ','. $fundcluster_year. ','. $fundcluster_month. ','. $fundcluster_series;
    $received_by_ids = implode(",",$_POST['received_by_id_hidden']);


//    echo $received_by_ids;
//    echo '<pre>';
//    print_r($_POST);
//    echo '</pre>';



    $qry = "insert into tbl_par(`ics_num`,
                                `iar_id`,
                                `e_code`,
                                `date_acquired`,
                                `received_from`,
                                `purchase_order_num`,
                                `received_by_ids`,
                                `date_issued`,
                                `delivered_by`,
                                `fundcluster_code`)
                            VALUES('$ics_num_merge',
                                   '$iar_idd',
                                   '$e_code',
                                   '$date_acquired',
                                   '$received_from',
                                   '$purchase_num_merge',
                                   '$received_by_ids',
                                   '$date_issued',
                                   '$delivered_by',
                                   '$fundcluster_num_merge')";

    /** @var TYPE_NAME $conn */
    $conn->query($qry);
    $getid = $conn->insert_id;

    foreach ($_POST['item_id_rfq_details'] as $index => $v) {
        $conn->query("insert into tbl_par_items (`par_id`,`item_description`,`quantity`,`unit`,`unit_cost`,`total_cost`) values('$getid','".$_POST['item_desc'][$index]."','".$_POST['quantity'][$index]."','".$_POST['unit'][$index]."','".$_POST['unit_cost'][$index]."','".$_POST['total_cost'][$index]."')");
    }



}
if(isset($_POST['ics_edit'])){
    $ics_num_year = $_POST['ics_num_year'];
    $ics_num_month = $_POST['ics_num_month'];
    $ics_num_series = $_POST['ics_num_series'];
    $iar_idd = $_POST['iar_id'];
    $e_code = $_POST['code'];
    $date_acquired = $_POST['date_acquired'];
    $received_from = $_POST['received_from'];
    $purchase_num_month = $_POST['purchase_num_month'];
    $purchase_num_series = $_POST['purchase_num_series'];
    $purchase_num_year = $_POST['purchase_num_year'];
    $date_issued = $_POST['date_issued'];
    $delivered_by = $_POST['delivered_by'];
    $fundcluster_name = $_POST['fundcluster_name'];
    $fundcluster_year = $_POST['fundcluster_year'];
    $fundcluster_month = $_POST['fundcluster_month'];
    $fundcluster_series = $_POST['fundcluster_series'];

    $ics_num_merge = $ics_num_year. ','. $ics_num_month. ','.$ics_num_series;
    $purchase_num_merge = $purchase_num_month . ','. $purchase_num_series. ','. $purchase_num_year;
    $fundcluster_num_merge = $fundcluster_name. ','. $fundcluster_year. ','. $fundcluster_month. ','. $fundcluster_series;
    $received_by_ids = implode(",",$_POST['received_by_id_hidden']);


    $qry = "update tbl_par set ics_num = '$ics_num_merge',iar_id = '$iar_idd',e_code='$e_code',date_acquired = '$date_acquired', received_from = '$received_from', purchase_order_num = '$purchase_num_merge', received_by_ids = '$received_by_ids', date_issued = '$date_issued', delivered_by = '$delivered_by', fundcluster_code = '$fundcluster_num_merge' where id = ". $_POST['ics_edit'];

    /** @var TYPE_NAME $conn */
      $conn->query($qry);
    //delete par item where id = edit
    $conn->query("delete from tbl_par_items where par_id  = ". $_POST['ics_edit']);

    foreach ($_POST['item_id_rfq_details'] as $index => $v) {
        $conn->query("insert into tbl_par_items (`par_id`,`item_description`,`quantity`,`unit`,`unit_cost`,`total_cost`) values('".$_POST['ics_edit']."','".$_POST['item_desc'][$index]."','".$_POST['quantity'][$index]."','".$_POST['unit'][$index]."','".$_POST['unit_cost'][$index]."','".$_POST['total_cost'][$index]."')");

    }


}
if(isset($_POST['data_id_delete_par'])){
    $conn->query("delete from tbl_par where id = ".$_POST['data_id_delete_par']);
    $conn->query("delete from tbl_par_items where par_id = " . $_POST['data_id_delete_par']);
}

