<?php
session_start();
include('../dbcon.php');
$id = $_POST['id'];

$qq = "select * from tbl_company where id =". $id;
$ex = $conn->query($qq);
$data = $ex->fetch_assoc();


$result = array('name'=>$data['name'],
                'address'=>$data['address'],
                'tin'=>$data['tin'],
                'contact'=>$data['contact'],
                'email'=>$data['email']
                 );

echo json_encode($result);