<?php
session_start();
include('../dbcon.php');

//save the dispose item
if(isset($_POST['d_name'])){
    $item_id = $_POST['item_id'];
    $emp_name = $_POST['d_name'];
    $date_acquired = $_POST['d_acquired'];
    $particulars_articles = $_POST['description'];
    $qty = $_POST['quantity'];
    $unit_cost = $_POST['amount'] / $qty;
    $total_cost = $_POST['amount'];
    //get the employee info
    $sql_emp = $conn->query("select * from tbl_supplier_employee where
                                concat(first_name,' ',middle_name,' ',last_name) = '$emp_name'");
    $result_emp = $sql_emp->fetch_assoc();
    //get the college info
    $sql_coll = $conn->query("select * from tbl_branch where branchID = ".$result_emp['college']);
    $result_college = $sql_coll->fetch_assoc();

    $office_college_campus = $result_college['branch'];
    $name_of_employee = $result_emp['id'];



$conn->query("insert into disposal_request (`date_acquired`,
                                                  `particulars_articles`,
                                                  `qty`,
                                                  `unit_cost`,
                                                  `total_cost`,
                                                  `date_returned`,
                                                  `office_college_campus`,
                                                  `name_of_employee`                                             
                                                 )
                                           values('$date_acquired',
                                                  '$particulars_articles',
                                                  '$qty',
                                                  '$unit_cost',
                                                  '$total_cost',
                                                  NOW(),
                                                  '$office_college_campus',
                                                  '$name_of_employee')");
$conn->query("update item_owner set disposed_quantity = '$qty',quantity = quantity - '$qty' where id = ".$item_id);
echo mysqli_error($conn);
}