<?php
include('../dbcon.php');
$query = "select ItemDescription,SUM(Quantity) as Quantity from tbl_pr_items where pr_num_merge = '".$_POST['id']."' GROUP BY ItemDescription";
$res = $conn->query($query);
$data = $res->fetch_assoc();
$arr = array('itemdesc' =>$data['ItemDescription'],
              'quantity' =>$data['Quantity']);

echo json_encode($arr);
