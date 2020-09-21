<?php
//for getting data in company by id
include('../dbcon.php');
if(isset($_POST['idd']) || isset($_POST['id'])){
    $id = '';
        if(isset($_POST['idd'])){
            $id = $_POST['idd'];
        }
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
    $qry = "select * from tbl_company where id = ".$id;

    $res = $conn->query($qry);
    $rs = $res->fetch_array();

    $data['name'] = $rs['name'];
    $data['address'] = $rs['address'];
    $data['tin'] = $rs['tin'];
    $data['contact'] = $rs['contact'];
    $data['email'] = $rs['email'];
    echo json_encode($data);

}

if(isset($_POST['e'])){
    $id = $_POST['e'];
    $qry = "select fund.*, items.* from tbl_fund fund
            inner join tbl_pr_items items on fund.fund_description = items.FundCluster where prID = ".$id;
    $res = $conn->query($qry);
    $data = $res->fetch_assoc();

    $r['fundcluster'] = $data['fund_id'];
    $r['quantity'] = $data['Quantity'];
    $r['prID'] = $data['prID'];
    echo json_encode($r);

}
if(isset($_POST['data'])){
    $po_number = $_POST['data'];
$qry = "select a.id as company_id,
b.pr_num_merge as pr_no,
a.name as company_name,a.address,a.email,
a.contact as tel_no,
a.tin,
b.Unit as unit,
b.ItemDescription as item_description,
d.quantity_and_unit as quantity,
MIN(d.unit_price) as unit_cost,
d.total_price as total_cost
from tbl_company a
inner join tbl_rfq c on a.id = c.id_company
inner join tbl_pr_items b on c.purchase_request_no = b.pr_num_merge
inner join tbl_rfq_item_details d on c.id = d.rfq_item_id
where b.Year = YEAR(NOW()) + 1 and d.approved_by = 'approved' and b.pr_num_merge = '$po_number'
GROUP BY b.pr_num_merge,a.name,a.address,a.email,a.contact,a.tin,b.Unit,b.ItemDescription,d.quantity_and_unit,d.total_price,a.id LIMIT 1";

$rexec = $conn->query($qry);
$x = $rexec->fetch_assoc();
$data['pr_no'] = $x['pr_no'];
$data['company_name'] = $x['company_name'];
$data['address'] = $x['address'];
$data['email'] = $x['email'];
$data['tel_no'] = $x['tel_no'];
$data['tin'] = $x['tin'];
$data['unit'] = $x['unit'];
$data['item_description'] = $x['item_description'];
$data['quantity'] = $x['quantity'];
$data['unit_cost'] = $x['unit_cost'];
$data['total_cost'] = $x['total_cost'];
$data['company_id'] = $x['company_id'];
echo json_encode($data);
}

if(isset($_POST['po_delete_id'])){
    $id = $_POST['po_delete_id'];
    $qry = "delete from tbl_po where id = ".$id;
    $conn->query($qry);

}