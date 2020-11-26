<?php
session_start();
include('../../dbcon.php');
//submit the property transfer of par
if(isset($_POST['radio_id'])){
    $radio_id = $_POST['radio_id'];
    $quantity = $_POST['quantity'];
    $str_reason = $_POST['str_reason'];
    $issued_by = $_POST['issued_by'];
    $received_by = $_POST['received_by'];
    //new added
    $pt_par_ptr_no = $_POST['pt_par_ptr_no'];
    $pt_par_fundcluster = $_POST['pt_par_fundcluster'];
    $PT_PAR_NO = $_SESSION['PAR_NO'];
    $PT_PAR_EQUIPMENT_CODE = $_SESSION['EQUIPMENT_CODE'];
    $PT_PAR_COLLEGE = $_SESSION['COLLEGE'];


    $sql = $conn->query("select * from tbl_par_items where id = ".$radio_id);
    $data = $sql->fetch_assoc();

    //get par_id
    $par_id = $data['par_id'];
    //get fundcluster from its original
    $ss = $conn->query("select * from tbl_par where id = ".$par_id);
    $data_ = $ss->fetch_assoc();
    $fund_cluster = $data_['fundcluster_code'];
    //extract the first
    $fc = explode(",",$fund_cluster);
    //result
    $fundcluster_no = $fc[0];
    //save it into summary rerport


    //if transfer was already transfer but not equal to quantity in tbl_par then do some query
    if($data['transfer_id'] != 0 ){

        $n = $conn->query("select * from tbl_item_details where itemdetailDesc = '".$data['item_description']."'");
        $get_id = $n->fetch_assoc();
        $item_id = $get_id['itemdetailID'];

        $conn->query("insert into tbl_pt_par_items (`par_items_id`,`item_id`,`quantity`,`issued_by`,`received_by`,`reason_for_transfer`,`date_transfered`,`ptr_no`,`ptr_date`,`fundcluster`) 
        values('$radio_id','$item_id','$quantity','$issued_by','$received_by','$str_reason',NOW(),$pt_par_ptr_no,NOW(),$pt_par_fundcluster)");
        $conn->query("update tbl_par_items set quantity = quantity - ".$quantity." where id =".$radio_id);
        $conn->query("update tbl_par_items set total_cost =  quantity * unit_cost where id = ".$radio_id);

        $get_unit = $conn->query("select * from tbl_par_items where id = ".$radio_id);
        $get_unit_data = $get_unit->fetch_assoc();
        $unit = $get_unit_data['unit'];
        //get date_acquired
        $get_date_acquired_sql = $conn->query("select par.*,items.* from tbl_par par inner join tbl_par_items items on par.id = items.par_id where items.id  = ".$radio_id);
        $gg = $get_date_acquired_sql->fetch_assoc();
        $date_acquired = $gg['date_acquired'];

        $item_description = $get_unit_data['item_description'];
        $unit_cost = $get_unit_data['unit_cost'];
        $total_cost = $quantity * $get_unit_data['unit_cost'];
        $temp =  $get_unit_data['fundcluster_code'];
        $a = explode(",",$temp);
        $pt_par_from = $a[0];


        $conn->query("insert into summary_report (`par_no`,
                                                    `college`,
                                                    `quantity`,
                                                    `unit`,
                                                    `equipment_code`,
                                                    `from_fundcluster`,
                                                    `fundcluster`,
                                                    `ptr_no`,
                                                    `ptr_date`,
                                                    `date_acquired`,
                                                    `item_description`,
                                                    `unit_cost`,
                                                    `total_cost`,
                                                    `issued_by`,
                                                    `issued_to`,
                                                    `reason_for_transfer`
                                                    )
                                             values('$PT_PAR_NO',
                                                    '$PT_PAR_COLLEGE',
                                                    '$quantity',
                                                    '$unit',
                                                    '$PT_PAR_EQUIPMENT_CODE',
                                                    '$fundcluster_no',
                                                    '$pt_par_fundcluster',
                                                    '$pt_par_ptr_no',
                                                     NOW(),
                                                    '$date_acquired',
                                                    '$item_description',
                                                    '$unit_cost',
                                                    '$total_cost',
                                                    '$issued_by',
                                                    '$received_by',
                                                    '$str_reason'
                                                    )");

        $get_item_owner_desc = $conn->query("select * from item_owner where par_owner_id = '".$gg['received_by_ids']."' and item_id = '$item_description'");
        $get_ecode = $get_item_owner_desc->fetch_assoc();
        $equipment_c = $get_ecode['equipment_code_id'];
        $conn->query("insert into item_owner (`item_id`,`unit_price`,`transaction_type`,`par_owner_id`,`quantity`,`equipment_code_id`,`date_acquired`) 
                                             values(
                                                    '$item_description',
                                                    '$unit_cost',
                                                    'PAR',
                                                    '$received_by',
                                                    '$quantity',
                                                    '$equipment_c',
                                                    NOW())");
        $conn->query("update item_owner set quantity = quantity - ".$quantity." where par_owner_id = '".$gg['received_by_ids']."' and item_id = '$item_description'");
        $get_if = $conn->query("select * from item_owner  where par_owner_id = '".$gg['received_by_ids']."' and item_id = '$item_description'");
        $ggf = $get_if->fetch_assoc();

        if($ggf['quantity'] == 0 ){
            $conn->query("delete from item_owner  where par_owner_id = '".$gg['received_by_ids']."' and item_id = '$item_description'");
        }
        echo mysqli_error($conn);
    }else{
        //get item iar id 
        $n = $conn->query("select * from tbl_item_details where itemdetailDesc = '".$data['item_description']."'");
        $get_id = $n->fetch_assoc();
        $item_id = $get_id['itemdetailID'];

    $conn->query("insert into tbl_pt_par_items (`par_items_id`,`item_id`,`quantity`,`issued_by`,`received_by`,`reason_for_transfer`,`date_transfered`,`ptr_no`,`ptr_date`,`fundcluster`) 
                values('$radio_id','$item_id','$quantity','$issued_by','$received_by','$str_reason',NOW(),$pt_par_ptr_no,NOW(),$pt_par_fundcluster)");
                $insert_id = $conn->insert_id;
    $get_unit = $conn->query("select * from tbl_par_items where id = ".$radio_id);
    $get_unit_data = $get_unit->fetch_assoc();
    $unit = $get_unit_data['unit'];
    //get date_acquired
        $get_date_acquired_sql = $conn->query("select par.*,items.* from tbl_par par inner join tbl_par_items items on par.id = items.par_id where items.id  = ".$radio_id);
        $gg = $get_date_acquired_sql->fetch_assoc();
        $date_acquired = $gg['date_acquired'];

    $item_description = $get_unit_data['item_description'];
        $unit_cost = $get_unit_data['unit_cost'];
        $total_cost = $quantity * $get_unit_data['unit_cost'];

    $conn->query("update tbl_par_items set transfer_id = ".$insert_id. ",quantity = quantity - ".$quantity." where id = $radio_id");

    $conn->query("update tbl_par_items set total_cost =   quantity * unit_cost where id = ".$radio_id);

    $conn->query("insert into summary_report (`par_no`,
                                                    `college`,
                                                    `quantity`,
                                                    `unit`,
                                                    `equipment_code`,
                                                    `from_fundcluster`,
                                                    `fundcluster`,
                                                    `ptr_no`,
                                                    `ptr_date`,
                                                    `date_acquired`,
                                                    `item_description`,
                                                    `unit_cost`,
                                                    `total_cost`,
                                                    `issued_by`,
                                                    `issued_to`,
                                                    `reason_for_transfer`
                                                    )
                                             values('$PT_PAR_NO',
                                                    '$PT_PAR_COLLEGE',
                                                    '$quantity',
                                                    '$unit',
                                                    '$PT_PAR_EQUIPMENT_CODE',
                                                    '$fundcluster_no',
                                                    '$pt_par_fundcluster',
                                                    '$pt_par_ptr_no',
                                                     NOW(),
                                                    '$date_acquired',
                                                    '$item_description',
                                                    '$unit_cost',
                                                    '$total_cost',
                                                    '$issued_by',
                                                    '$received_by',
                                                    '$str_reason'
                                                    )");


        $get_item_owner_desc = $conn->query("select * from item_owner where par_owner_id = '".$gg['received_by_ids']."' and item_id = '$item_description'");
        $get_ecode = $get_item_owner_desc->fetch_assoc();
        $equipment_c = $get_ecode['equipment_code_id'];
        $conn->query("insert into item_owner (`item_id`,`unit_price`,`transaction_type`,`par_owner_id`,`quantity`,`equipment_code_id`,`date_acquired`) 
                                             values(
                                                    '$item_description',
                                                    '$unit_cost',
                                                    'PAR',
                                                    '$received_by',
                                                    '$quantity',
                                                    '$equipment_c',
                                                    NOW())");

        $conn->query("update item_owner set quantity = quantity - ".$quantity." where par_owner_id = '".$gg['received_by_ids']."' and item_id = '$item_description'");
        $get_if = $conn->query("select * from item_owner  where par_owner_id = '".$gg['received_by_ids']."' and item_id = '$item_description'");
        $ggf = $get_if->fetch_assoc();
        if($ggf['quantity'] == 0 ){
            $conn->query("delete from item_owner  where par_owner_id = '".$gg['received_by_ids']."' and item_id = '$item_description'");
        }

    }

}
//for rendering modal data
if(isset($_POST['id_modal'])){
    $c = $conn->query('select * from tbl_pt_par_items where id = '. $_POST['id_modal']);
    $data = $c->fetch_assoc();
    $i = $conn->query("select * from tbl_supplier_employee where id = ". $data['issued_by']);
    $ic = $i->fetch_assoc();

    $r = $conn->query("select * from tbl_supplier_employee where id= ". $data['received_by']);
    $rc = $r->fetch_assoc();
    $html = '';
    //select * employee
    $bb = $conn->query("select * from tbl_supplier_employee");
    while($rb = $bb->fetch_assoc()){
        if($rb['id'] != $data['received_by']){
            $html .= '<option value="'.$rb['id'].'">'.$rb['first_name']. ' '. $rb['middle_name']. ' '. $rb['last_name'].'</option>';
        }
    }    
    $zz = $conn->query("select * from tbl_item_details where itemdetailID = ".$data['item_id']);
    $_i = $zz->fetch_assoc();
    $res = array(
        'par_id'        => $data['par_items_id'],
        'quantity'      => $data['quantity'],
        'issued_by'     => $ic['first_name']. ' '. $ic['middle_name']. ' '. $ic['last_name'],
        'rhidden'       => $rc['id'],
        'received_by'   => $rc['first_name']. ' '. $rc['middle_name']. ' '. $rc['last_name'],
        'reason_for_transfer' => $data['reason_for_transfer'],
        'id'                  => $_POST['id_modal'],
        'item'                => $_i['itemdetailDesc'],
        'option'              => $html
    );


    echo json_encode($res);

}
//for retransfering item again
if(isset($_POST['idpar'])){
    $par_id = $_POST['mpar_id'];
    $item = $_POST['mitem'];
    $quantity = $_POST['mquantity'];
    $received_by = $_POST['mhreceived_by'];
    $reason_for_transfer = $_POST['mres'];
    $receiver_name = $_POST['mrec_name'];
    
    //get item id
    $xx = $conn->query("select * from tbl_pt_par_items where id = ".$_POST['idpar']);
    $ii = $xx->fetch_assoc();
    $item_gg = $ii['item_id'];
    //retransfer item and deduct the quantity of item and insert to new record
    $conn->query("insert into tbl_pt_par_items (`par_items_id`,`item_id`,`quantity`,`issued_by`,`received_by`,`reason_for_transfer`,`date_transfered`) 
    values('$par_id','$item_gg','$quantity','$received_by','$receiver_name','$reason_for_transfer',NOW())");
    $conn->query("update tbl_pt_par_items set quantity = quantity - ".$quantity." where id = ".$_POST['idpar']);

    echo mysqli_error($conn);
}