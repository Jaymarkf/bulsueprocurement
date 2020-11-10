<?php
session_start();
include('../dbcon.php');

if(isset($_POST['ics_transfer_id'])){
    $issued_by = $_POST['issued_by_id'];
    $issued_to = $_POST['issue_to'];
    $reason_for_transfer = $_POST['reason_for_transfer'];
    $pt_from_fundcluster = $_POST['pt_from_fundcluster'];
    $pt_ptr_no =  $_POST['pt_ptr_no'];
    $pt_ics = $_POST['pt_ics_no'];
    $pt_item_description = $_POST['pt_item_description'];
    $pt_quantity = $_POST['pt_quantity'];
    $pt_unit_cost = $_POST['pt_unit_cost'];
    $pt_to_fundcluster = $_POST['pt_to_fundcluster'];
    $pt_ptr_date = $_POST['pt_ptr_date'];
    $pt_date_acquired = $_POST['pt_date_acquired'];
    $pt_college = $_POST['pt_college'];
    $pt_unit = $_POST['pt_unit'];
    $pt_total_cost = $_POST['pt_total_cost'];
    $ics_transfer_id = $_POST['ics_transfer_id']; //primary key of ics table


    //check if item is already transfered or not
//     if($_POST['is_transfer'] == 1){
//         $conn->query("update transfer_item set  issued_by = '$issued_by',
//                                                        issued_to = '$issued_to',
//                                                        reason_for_transfer = '$reason_for_transfer',
//                                                        from_fundcluster = '$pt_from_fundcluster', 
//                                                        to_fundcluster = '$pt_to_fundcluster',
//                                                        ptr_date = '$pt_ptr_date',
//                                                        ptr_no = '$pt_ptr_no' 
//                                                        where id = ".$ics_transfer_id);
// //        echo mysqli_error($conn);


//     }else if($_POST['is_transfer'] == 0){

        $conn->query("insert into transfer_item (`issued_by`,`ics_id`,
                                                    `issued_to`,
                                                    `reason_for_transfer`,
                                                    `from_fundcluster`,
                                                    `to_fundcluster`,
                                                    `ptr_no`,
                                                    `ptr_date`,
                                                    `ics_no`,
                                                    `date_acquired`,
                                                    `item_desc`,
                                                    `college`,
                                                    `quantity`,
                                                    `unit`,
                                                    `unit_cost`,
                                                    `total_cost`)
                                                    
                                                    VALUES('$issued_by',
                                                           '$ics_transfer_id',
                                                           '$issued_to',
                                                           '$reason_for_transfer',
                                                           '$pt_from_fundcluster',
                                                           '$pt_to_fundcluster',
                                                           '$pt_ptr_no',
                                                           '$pt_ptr_date',
                                                           '$pt_ics',
                                                           '$pt_date_acquired',
                                                           '$pt_item_description',
                                                           '$pt_college',
                                                           '$pt_quantity',
                                                           '$pt_unit',
                                                           '$pt_unit_cost',
                                                           '$pt_total_cost');
                                                    ");
        //update the tbl_ics  set the transfer id to receiver

        $sql_ics_update = $conn->query("update tbl_ics set transfer_item_id = 1,quantity = quantity - ".$pt_quantity." where id = ".$ics_transfer_id);
    // }
}
if(isset($_POST['id_view'])){ // ptr transfer table

$ss = $conn->query("select * from transfer_item where id =".$_POST['id_view']);
$ff = $ss->fetch_assoc();
$a['reason_for_transfer'] = $ff['reason_for_transfer'];
$a['from_fundcluster'] = $ff['from_fundcluster'];
$a['to_fundcluster'] = $ff['to_fundcluster'];
$a['ptr_no'] = $ff['ptr_no'];
$a['ptr_date'] = $ff['ptr_date'];
$a['ics_no'] = $ff['ics_no'];
$a['date_acquired'] = $ff['date_acquired'];
$a['item_desc'] = $ff['item_desc'];
$a['college'] = $ff['college'];
$a['quantity'] = $ff['quantity'];
$a['unit'] = $ff['unit'];
$a['unit_cost'] = $ff['unit_cost'];
$a['total_cost'] = $ff['total_cost'];
//get issued names
    $fs = $conn->query("select * from tbl_supplier_employee where id=".$ff['issued_by']);
    $af = $fs->fetch_assoc();
    $a['issued_by'] = $af['first_name']. ' '. $af['middle_name']. ' '. $af['last_name'];
    $fss = $conn->query("select * from tbl_supplier_employee where id=".$ff['issued_to']);
    $afs = $fss->fetch_assoc();
    $a['issued_to'] = $afs['first_name']. ' '. $afs['middle_name']. ' '. $afs['last_name'];


echo json_encode($a);
}