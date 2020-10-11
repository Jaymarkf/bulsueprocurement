<?php
session_start();
include('../dbcon.php');

if(isset($_POST['x'])){

    $dd = "select * from tbl_iar_items iar
           inner join tbl_po po on iar.poID = po.id
           inner join tbl_generate_bac_report bac on po.bac_id = bac.id
           where iar.id = ".$_POST['x'];
            $ff = $conn->query($dd);
            $ex = $ff->fetch_assoc();
            //get item list
            $items = explode(",",$ex['item_details_id_array']);
            $xb = array();
            $item_descs = '<option style="display:none" selected hidden disabled>select Item Description...</option>';

    foreach ($items as $index => $item) {

        $fa = "select d.*,de.* from tbl_rfq_item_details d inner join tbl_item_details de on d.item_and_specification = de.itemdetailDesc where d.id = '$item'";
        $aa = $conn->query($fa);
        $dat = $aa->fetch_assoc();
        $item_descs = $item_descs . '<option style="display:none" selected hidden disabled>select Item Description...</option><option value="'.$item.'">'.$dat['item_and_specification'].'</option>';

    }
    $xb['item_desc'] = $item_descs;
    echo json_encode($xb);

}elseif(isset($_POST['ics_edit'])){

    $ics_num_year = $_POST['ics_num_year'];
    $ics_num_month = $_POST['ics_num_month'];
    $ics_num_series = $_POST['ics_num_series'];
    $iar_idd = $_POST['iar_id'];
    $date_acquired = $_POST['date_acquired'];
    $item_desc = $_POST['item_desc'];
    $quantity = $_POST['quantity'];
    $unit = $_POST['unit'];
    $unit_cost = $_POST['unit_cost'];
    $total_cost = $_POST['total_cost'];
    $received_from = $_POST['received_from'];
//    $sender_position = $_POST['sender_position'];
    $purchase_num_month = $_POST['purchase_num_month'];
    $purchase_num_series = $_POST['purchase_num_series'];
    $purchase_num_year = $_POST['purchase_num_year'];
    $received_by = $_POST['received_by'];
    $college = $_POST['college'];
    $received_position  = $_POST['received_position'];  //position column name in table
    $date_issued = $_POST['date_issued'];
    $delivered_by = $_POST['delivered_by'];
    $fundcluster_name = $_POST['fundcluster_name'];
    $fundcluster_year = $_POST['fundcluster_year'];
    $fundcluster_month = $_POST['fundcluster_month'];
    $fundcluster_series = $_POST['fundcluster_series'];


    $ics_num_merge = $ics_num_year. ','. $ics_num_month. ','.$ics_num_series;
    $purchase_num_merge = $purchase_num_month . ','. $purchase_num_series. ','. $purchase_num_year;
    $fundcluster_num_merge = $fundcluster_name. ','. $fundcluster_year. ','. $fundcluster_month. ','. $fundcluster_series;


    $qry = "update tbl_ics set ics_num='$ics_num_merge', iar_id='$iar_idd',date_acquired='$date_acquired',item_desc='$item_desc',quantity='$quantity',unit='$unit',unit_cost='$unit_cost',total='$total_cost',
                              received_from = '$received_from', purchase_order_num = '$purchase_num_merge', received_by = '$received_by',college = '$college', `position` = '$received_position', date_issued = '$date_issued',
                              delivered_by = '$delivered_by', fundcluster_code = '$fundcluster_num_merge' where id =".$_POST['ics_edit'];


    /** @var TYPE_NAME $conn */
    $conn->query($qry);

}
elseif(isset($_POST['b'])){

     $bb = "select * from tbl_rfq_item_details where id = ".$_POST['b'];
     $z = $conn->query($bb);
     $data = $z->fetch_assoc();

     $xx = "select * from tbl_item_details where itemdetailDesc = '".$data['item_and_specification']."'";
     $xe = $conn->query($xx);
     $data_fetch = $xe->fetch_assoc();


     $v['quantity'] = $data['quantity_and_unit'];
     $v['unit'] = $data_fetch['UnitOfMeasurement'];
     $v['unit_cost'] = $data['unit_price'];
     $v['total_cost'] = $data['total_price'];
     echo json_encode($v);

}elseif(isset($_POST['p_name'])){
//    echo 'aaa';
    //check if exist
    if(isset($_POST['update_id']) && strlen($_POST['update_id']) != 0){


            $cqry = "select * from tbl_supplier_position where name = '" . $_POST['p_name'] . "'";
            $ex = $conn->query($cqry);
            if ($ex->num_rows > 0) {
                $res['flag'] = 'false';
            } else {
                $res['flag'] = 'true';
                $qry = $conn->query("update tbl_supplier_position set name='".$_POST['p_name']."' where id = " .$_POST['update_id'].";");
            }
            echo json_encode($res);

    }else{

        $cqry = "select * from tbl_supplier_position where name = '" . $_POST['p_name'] . "'";
        $ex = $conn->query($cqry);
        if ($ex->num_rows > 0) {
            $res['flag'] = 'false';
        } else {
            $res['flag'] = 'true';
            $qry = $conn->query("insert into tbl_supplier_position (`name`) values('" . $_POST['p_name'] . "')");
        }

        echo json_encode($res);
    }

}elseif(isset($_POST['delete_id'])){
$conn->query("delete from tbl_supplier_position where id = ".$_POST['delete_id']);
}elseif(isset($_POST['e_fname'])) {

    $fname = $_POST['e_fname'];
    $mname = $_POST['e_middle_initial'];
    $lname = $_POST['e_lname'];
    $college = $_POST['e_college'];
    $position = $_POST['e_position'];
    $conn->query("insert into tbl_supplier_employee (`first_name`,`middle_name`,`last_name`,`college`,`position`) values('$fname','$mname','$lname','$college','$position')");
    echo mysqli_error($conn);

}elseif(isset($_POST['xx'])){
$id = $_POST['xx'];
    $val['e_id'] = $id;
//retrieve  employee
    $v = $conn->query("select * from tbl_supplier_employee where id = ". $id);
    $e = $v->fetch_assoc();
    $val['fname'] = $e['first_name'];
    $val['mname'] = $e['middle_name'];
    $val['lname'] = $e['last_name'];
    //get college description
    $college_id = $e['college'];  //college id
    $xc = $conn->query("select * from tbl_branch where branchID = ".$college_id);
    $cx = $xc->fetch_assoc();
//    $college_name = $cx['branch'];  //college description


    //get position description
        $position_id = $e['position']; //position id
//    $position_name = $qp['name']; //position description

    //get all college
    $get_allcollege = $conn->query("select * from tbl_branch");
    //return value to json
    $val['college']  = '';
    while($college_data = $get_allcollege->fetch_assoc()){

        if($college_data['branchID'] == $college_id){
            $check = 'selected';
        }else{
            $check = '';
        }

        $val['college'] = $val['college'] . '<option value="'.$college_data['branchID'].'" '.$check.'>'.$college_data['branch'].'</option>';
    }


    $get_position = $conn->query("select * from tbl_supplier_position");

    $val['positions'] = '';

    while($position_data = $get_position->fetch_assoc()){

        if($position_data['id'] == $position_id){
            $pcheck = 'selected';
        }else{
            $pcheck = '';
        }

        $val['positions'] = $val['positions'] . '<option value="'.$position_data['id'].'" '.$pcheck.'>'.$position_data['name'].'</option>' ;

    }



    echo json_encode($val);

}elseif(isset($_POST['e_id'])){
    $id = $_POST['e_id'];
    $fname = $_POST['edit_fname'];
    $mname = $_POST['edit_mname'];
    $lname = $_POST['edit_lname'];
    $college = $_POST['edit_college'];
    $position = $_POST['edit_position'];
    $conn->query("update tbl_supplier_employee set first_name = '$fname', middle_name = '$mname', last_name = '$lname', college='$college', position='$position' where id= '$id'");


}elseif(isset($_POST['delete_employee_id'])){
    $conn->query("delete from tbl_supplier_employee where id =".$_POST['delete_employee_id']);
}elseif(isset($_POST['sender_id'])){
    $qx = $conn->query("select * from tbl_supplier_employee where id = ". $_POST['sender_id']);
//    //get position
    $fetch_employee = $qx->fetch_assoc();
    $position_sender_id = $fetch_employee['position'];
    $pos_query = $conn->query("select * from tbl_supplier_position where id = ".$position_sender_id);
    $pos_fetch = $pos_query->fetch_assoc();
    $val['pos'] = $pos_fetch['name'];

    echo json_encode($val);
}
elseif(isset($_POST['ics_save'])){

    $ics_num_year = $_POST['ics_num_year'];
    $ics_num_month = $_POST['ics_num_month'];
    $ics_num_series = $_POST['ics_num_series'];
    $iar_idd = $_POST['iar_id'];
    $date_acquired = $_POST['date_acquired'];
    $item_desc = $_POST['item_desc'];
    $quantity = $_POST['quantity'];
    $unit = $_POST['unit'];
    $unit_cost = $_POST['unit_cost'];
    $total_cost = $_POST['total_cost'];
    $received_from = $_POST['received_from'];
//    $sender_position = $_POST['sender_position'];
    $purchase_num_month = $_POST['purchase_num_month'];
    $purchase_num_series = $_POST['purchase_num_series'];
    $purchase_num_year = $_POST['purchase_num_year'];
    $received_by = $_POST['received_by'];
    $college = $_POST['college'];
    $received_position  = $_POST['received_position'];  //position column name in table
    $date_issued = $_POST['date_issued'];
    $delivered_by = $_POST['delivered_by'];
    $fundcluster_name = $_POST['fundcluster_name'];
    $fundcluster_year = $_POST['fundcluster_year'];
    $fundcluster_month = $_POST['fundcluster_month'];
    $fundcluster_series = $_POST['fundcluster_series'];


    $ics_num_merge = $ics_num_year. ','. $ics_num_month. ','.$ics_num_series;
    $purchase_num_merge = $purchase_num_month . ','. $purchase_num_series. ','. $purchase_num_year;
    $fundcluster_num_merge = $fundcluster_name. ','. $fundcluster_year. ','. $fundcluster_month. ','. $fundcluster_series;


    $qry = "insert into tbl_ics(`ics_num`,
                            `iar_id`,
                            `date_acquired`,
                            `item_desc`,
                            `quantity`,
                            `unit`,
                            `unit_cost`,
                            `total`,
                            `received_from`,
                            `purchase_order_num`,
                            `received_by`,
                            `college`,
                            `position`,
                            `date_issued`,
                            `delivered_by`,
                            `fundcluster_code`) 
                            VALUES('$ics_num_merge',
                                   '$iar_idd',
                                   '$date_acquired',
                                   '$item_desc',
                                   '$quantity',
                                   '$unit',
                                   '$unit_cost',
                                   '$total_cost',
                                   '$received_from',
                                   '$purchase_num_merge',
                                   '$received_by',
                                   '$college',
                                   '$received_position',
                                   '$date_issued',
                                   '$delivered_by',
                                   '$fundcluster_num_merge')";

    /** @var TYPE_NAME $conn */
    $conn->query($qry);


}












