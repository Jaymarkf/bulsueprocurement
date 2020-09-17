<?php
//for getting data in company by id
include('../dbcon.php');
if(isset($_POST['idd']) || isset($_POST['id'])){
    $qry = "select * from tbl_company where id = ".$_POST['id'];

    $res = $conn->query($qry);
    $rs = $res->fetch_array();

    $data['name'] = $rs['name'];
    $data['address'] = $rs['address'];
    $data['tin'] = $rs['tin'];
    $data['contact'] = $rs['contact'];
    $data['email'] = $rs['email'];
    echo json_encode($data);

}