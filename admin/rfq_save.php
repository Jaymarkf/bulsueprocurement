<?php
include('../dbcon.php');
include('session.php');
$gg = "select * from tbl_company where id = ". $_POST['post_company_name'];
$res = $conn->query($gg);
$data = $res->fetch_assoc();
$id_company = $data['id'];
$company = $data['name'];
$quotation_no = $_POST['post_quotation_no'];
$address = $_POST['post_address'];
$purchase_request_no = $_POST['post_purchase_request_no'];
$contact_no = $_POST['post_contact_no'];
$purpose = $_POST['post_purpose'];
$TIN = $_POST['post_TIN_no'];
$ABC = $_POST['post_ABC'];
$pgeps = $_POST['post_PHILGEPS_registration_no'];
$email = $_POST['post_email_address'];


$query = "insert into tbl_rfq (company_name,id_company,quotation_no,address,purchase_request_no,contact_no,purpose,TIN,ABC,philgeps,email,date_created)
          values('$company','$id_company','$quotation_no','$address','$purchase_request_no','$contact_no','$purpose','$TIN','$ABC','$pgeps','$email',NOW())";
if($conn->query($query) === TRUE){
    $getid = $conn->insert_id;

    foreach ($_POST['item_no_'] as $index => $item) {
        $item_number = $item;
        $item_and_spec = $_POST['item_and_spec_'][$index];
        $quantity_and_unit = $_POST['quantity_and_unit_'][$index];
        $brand = $_POST['brand_and_model_offered_'][$index];
        $unit_price = $_POST['unit_price_'][$index];
        $total_price = $_POST['total_price_'][$index];
        $item_id = $_POST['item_id'][$index];

        $qry = "insert into tbl_rfq_item_details (rfq_item_id,item_no,item_id,item_and_specification,quantity_and_unit,brand_and_model_offered,unit_price,total_price)
                values($getid,'$item_number',$item_id,'$item_and_spec','$quantity_and_unit','$brand','$unit_price','$total_price') ";
        $conn->query($qry);
    }
}
echo mysqli_error($conn);
