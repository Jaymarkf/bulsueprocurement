<?php
include('../../dbcon.php');
if(isset($_POST['radio_id'])){
    $radio_id = $_POST['radio_id'];
    $quantity = $_POST['quantity'];
    $str_reason = $_POST['str_reason'];
    $issued_by = $_POST['issued_by'];
    $received_by = $_POST['received_by'];

    $sql = $conn->query("select * from tbl_par_items where id = ".$radio_id);
    $data = $sql->fetch_assoc();

    if($data['transfer_id'] != 0 ){
      
      
        $conn->query("update  tbl_pt_par_items set quantity = (quantity + ".$quantity."),reason_for_transfer = '$str_reason' where id = '".$data['transfer_id']."' ");
        $conn->query("update tbl_par_items set quantity = quantity - ".$quantity." where id =".$radio_id);
        $conn->query("update tbl_par_items set total_cost =  quantity * unit_cost where id = ".$radio_id);
        echo mysqli_error($conn);

    }else{


    $conn->query("insert into tbl_pt_par_items (`par_items_id`,`quantity`,`issued_by`,`received_by`,`reason_for_transfer`) 
    values('$radio_id','$quantity','$issued_by','$received_by','$str_reason')");
    $insert_id = $conn->insert_id;

    $conn->query("update tbl_par_items set transfer_id = ".$insert_id. ",quantity = quantity - ".$quantity." where id = $radio_id");
    $conn->query("update tbl_par_items set total_cost =   quantity * unit_cost where id = ".$radio_id);

    }

}
if(isset($_POST['id_modal'])){
    $c = $conn->query('select * from tbl_pt_par_items where id = '. $_POST['id_modal']);
    $data = $c->fetch_assoc();
    $res['par_id'] = $data['par_items_id'];
    $res['quantity'] = $data['quantity'];
    $i = $conn->query("select * from tbl_supplier_employee where id = ". $data['issued_by']);
    $ic = $i->fetch_assoc();
    $res['issued_by'] = $ic['first_name']. ' '. $ic['middle_name']. ' '. $ic['last_name'];

    $r = $conn->query("select * from tbl_supplier_employee where id= ". $data['received_by']);
    $rc = $r->fetch_assoc();
    $res['received_by'] = $rc['first_name']. ' '. $rc['middle_name']. ' '. $rc['last_name'];
    $res['reason_for_transfer'] = $data['reason_for_transfer'];
  
    
    echo json_encode($res);

}