<?php
session_start();
include('../dbcon.php');
include('session.php');
foreach ($_POST['data'] as $index => $key) {
    $id = str_replace('user_','',$index);
    $qry = "update tbl_ppmp set pr_approved = 'approved' where ppmpID = $id";
    $conn->query($qry);

}