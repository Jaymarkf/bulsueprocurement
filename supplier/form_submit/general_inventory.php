<?php
session_start();
include('../../dbcon.php');
//save PROPERTY ACKNOWLEDGEMENT RECEIPT
if(isset($_POST['end_users_par'])){
    //get college info
    $cc = $conn->query("select emp.*,coll.* from tbl_supplier_employee emp inner join tbl_branch coll on emp.college = coll.branchID where emp.id = ".$_POST['end_users_par']);
    $data_cc = $cc->fetch_assoc();
    $conn->query("insert into par_summary_report (`end_user`,`college`,`transaction_type`,`date_generated`) values(".$_POST['end_users_par'].", '".$data_cc['branch']."','PAR',NOW())");
}
//delete PROPERTY ACKNOWLEDGEMENT RECEIPT
if(isset($_POST['delete_par'])){
    $conn->query("delete from par_summary_report where id = ".$_POST['delete_par']);
}
//save Inventory Custodian Receipt
if(isset($_POST['end_users_ics'])){
    //get college info
    $cc = $conn->query("select emp.*,coll.* from tbl_supplier_employee emp inner join tbl_branch coll on emp.college = coll.branchID where emp.id = ".$_POST['end_users_ics']);
    $data_cc = $cc->fetch_assoc();
    $conn->query("insert into par_summary_report (`end_user`,`college`,`transaction_type`,`date_generated`) values(".$_POST['end_users_ics'].", '".$data_cc['branch']."','ICS',NOW())");
    echo mysqli_error($conn);
}
//delete Inventory Custodian Receipt
if(isset($_POST['delete_ics'])){
    $conn->query("delete from par_summary_report where id = ".$_POST['delete_ics']);
}
if(isset($_POST['id_edit'])){
    $data = $conn->query("select * from disposal_request where id = ".$_POST['id_edit']);
    $f = $data->fetch_assoc();
    $d['ac'] = $f['accumulated_depreciation'];
    $d['ca'] = $f['carrying_amount'];
    $d['remarks'] = $f['remarks'];
    $d['id'] = $f['id'];
    echo json_encode($d);
}
//save
if(isset($_POST['ac'])){
$id = $_POST['edit_id'];
$ac = $_POST['ac'];
$ca = $_POST['ca'];
$remarks = $_POST['remarks'];
$conn->query("update disposal_request set accumulated_depreciation = '$ac',carrying_amount = '$ca' , remarks = '$remarks' where id = '$id'");
}
//save furniture request
if(isset($_POST['furniture'])){
$conn->query("insert into furniture (`date_generated`,`equipment_code`) values(NOW(),'".$_POST['furniture']."')");
}
//delete furniture request
if(isset($_POST['id_delete_furniture'])){
    $conn->query('delete from furniture where id = '. $_POST['id_delete_furniture']);
}