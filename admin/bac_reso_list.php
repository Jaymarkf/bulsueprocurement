<?php
session_start();
include('session.php');
include('../dbcon.php');
require('../fpdf/fpdf.php');
$time_filter = $_GET['c_id'];

$qc = "select * from tbl_company";
/** @var TYPE_NAME $conn */
$rc = $conn->query($qc);
$ac = array();
$aname = array();
while($dc = $rc->fetch_array()){

    $ac[] = $dc['id']; //data of company id's
    $aname[] = $dc['name'];
}
//loop company list
$data = array();
foreach ($ac as $index => $item) {
    $qr = "select a.*,b.*,c.* from tbl_rfq a 
            inner join tbl_rfq_item_details b on a.id = b.id 
            inner join tbl_generate_bac_report c on a.id_company = c.company_id
            where
            b.approved_by = 'approved' and a.id_company= '$item' and c.date_generated = '$time_filter'";

    $qrc  = $conn->query($qr);
    while($qres = $qrc->fetch_array()){
//        $data[$qres['company_name']]['item_no']  = $qres['item_no'];
        $data[$qres['company_name']]['company_name'] = $qres['company_name'] ;
        $data[$qres['company_name']]['total_amount'] = $data[$qres['company_name']]['total_amount'] + $qres['unit_price'] ;
        $data[$qres['company_name']]['items'][] = $qres['item_and_specification']."[".$qres['quantity_and_unit']."]"."|" . $qres['unit_price'];

    }
}
//
//echo '<pre>';
//print_r($data);
//echo '</pre>';
$textHeightY = 4;
$margin_left = 10;
$header_height = 13;
$Y = 59;
$column_3 = 96.01;
$column_4 = $margin_left + 121;
$body_row_height  = 7;
$pdf = new FPDF('L','mm','A4');
$p_width = $pdf->GetPageWidth();
$p_height = $pdf->GetPageHeight();
$pdf->AddPage();
$pdf->Image('../images/logo.png',($p_width / 2) - 9,3,15,15,'PNG');
$pdf->Ln(9);
$pdf->SetFont('Arial','',10);
$pdf->Cell(-10);
$pdf->Cell($p_width,$textHeightY,'Republic of the Philippines','','2','C','','');
$pdf->Cell($p_width,$textHeightY,'Bulacan State University','','2','C','','');
$pdf->SetFont('Arial','B',10);
$pdf->Cell($p_width,$textHeightY,'Bids and Awards Committee for goods and services','','2','C','','');
$pdf->SetFont('Arial','',10);
$pdf->Cell($p_width,$textHeightY,'City of Malolos, Bulacan','','2','C','','');
$pdf->SetFont('Arial','B',10);
$pdf->Cell($p_width,$textHeightY,'ABSTRACT OF CANVASS AND BAC RESOLUTION','','2','C','','');
$pdf->Cell($p_width,$textHeightY,'RESOLUTION RECOMMENDING TO AWARD OF THE PROCUREMENT OF MEDICAL & DENTAL SUPPLY ','','2','C','','');
$pdf->Cell($p_width,$textHeightY,'FOR COVID-19 PREVENTIVE MEASURE THROUGH SMALL VALUE PROCUREMENT-BY LOT','','2','C','','');
$pdf->Ln(4);
$pdf->SetFont('Arial','',10);
$pdf->Cell($p_width-50,$textHeightY,'Date: '.date("d M Y"),'','2','R','','');
$pdf->Ln(4);
$pdf->SetX($margin_left);
$pdf->SetFont('Arial','',9);
$pdf->MultiCell('',$header_height,'',1,'C');
$pdf->SetXY($margin_left,$Y);
$pdf->SetXY($margin_left+16,$Y+2.5);
$pdf->MultiCell(70,$header_height / 3.5,'NAME AND DESCRIPTION OF ARTICLES BEING REQUISITIONED','0','C');
$pdf->SetXY($column_3,$Y+3);
$pdf->MultiCell(35,$header_height / 3.5,'Approved Unit Price per item','','C');
$pdf->SetXY($column_4,$Y);
$pdf->Cell(35,$header_height,'Quantity and Unit','1','0','C');
$pdf->Cell(35,$header_height,'Unit Price','1','0','C');
$pdf->Cell(40,$header_height,'Extended Amount','1','0','C');
$pdf->Cell(40,$header_height,'Supplier/Company Name','LTB','1','C');
$pdf->Line($column_3,$Y,$column_3,$Y+$header_height);
$pdf->SetFont('Courier','','8');
foreach ($data as $index => $datum) {

    foreach ($datum['items'] as $index => $item) {
        $pdf->Cell('86',$body_row_height,strstr($item,"[",true),'1','0','C');
        $pdf->Cell('35',$body_row_height,'','1','0','C');
        $start = '[';
        $end = ']';
        $pattern = sprintf(
            '/%s(.+?)%s/ims',
            preg_quote($start, '/'), preg_quote($end, '/')
        );
        if (preg_match($pattern, $item, $matches)) {
            list(, $match) = $matches;
        }
        $pdf->Cell('35',$body_row_height,$match,'1','0','C');
        $pdf->Cell('35',$body_row_height,"Php: ".substr($item,strpos($item,"|") + 1),'1','1','C');

    }

}
$pdf->SetXY(201,72);
foreach ($data as $index => $datum) {
        $pdf->SetXY(201,$pdf->GetY());
        $pdf->MultiCell('40',$body_row_height * count($datum['items']),"Php: ".$datum['total_amount'],'1','C');

}
$pdf->SetXY(241,72);
foreach ($data as $index => $datum) {
    $pdf->SetXY(241,$pdf->GetY());
    $pdf->MultiCell('46',$body_row_height * count($datum['items']),$datum['company_name'],'1','C');

}
$pdf->Output();