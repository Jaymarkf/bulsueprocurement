<?php
session_start();
include('session.php');
include('../dbcon.php');
require('../fpdf/fpdf.php');
$data = array();
$data = explode(",",$_GET['c_id']);
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
$pdf->Cell(16,$header_height,'Item No.','1','0','C');
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
$price  = 0;
foreach ($data as $index => $item) {
    $qry = "select a.company_name,b.* from tbl_rfq_item_details b
            inner join tbl_rfq a on b.rfq_item_id = a.id
            where b.id =".$item;
    $res = $conn->query($qry);
    $data = $res->fetch_assoc();
    $pdf->Cell(16,$body_row_height,$data['item_no'],'1','0','C');
    $pdf->Cell(70,$body_row_height,$data['item_and_specification'],'1','0','C');
    $pdf->Cell(35,$body_row_height,$data['approved_item_price'],'1','0','C');
    $pdf->Cell(35,$body_row_height,$data['quantity_and_unit'],'1','0','C');
    $pdf->Cell(35,$body_row_height,$data['unit_price'],'1','0','C');
    $pdf->Cell(40,$body_row_height,$data['total_price'],'1','0','C');
    $pdf->Cell(46,$body_row_height,$data['company_name'],'1','1','C');
    $price = $price + $data['approved_item_price'];

}

$pdf->Ln(10);
$pdf->SetFont('Courier','B','9');
$pdf->Cell(11,$body_row_height,'WHEREAS,');
$pdf->SetFont('Courier','','9');
$pdf->Cell('',$body_row_height,'  the items to be procured are included in the Annual Procurement Plan for the year 2020 of the Bulacan State University with an Approved','','1','C');
$pdf->Cell(52,$body_row_height - 5,'Budget for the Contract of ','','0');
$pdf->SetFont('Courier','B','9');
$pdf->Cell($pdf->GetStringWidth(numberTowords($price)),$body_row_height - 5,numberTowords($price).' PESOS (Php '.$price.'.00).');
$pdf->Ln(5);
$pdf->Cell($pdf->GetStringWidth('WHEREAS, Section 10 '),$body_row_height,'WHEREAS, Section 10');
$pdf->SetFont('Courier','','9');
$pdf->Cell($pdf->GetStringWidth('of'),$body_row_height,'of','','0');
$pdf->SetFont('Courier','B','9');
$pdf->Cell($pdf->GetStringWidth(' Republic Act No. 9184'),$body_row_height,' Republic Act No. 9184');
$pdf->SetFont('Courier','','9');
$pdf->Cell('',$body_row_height,' entitled "Government Procurement Reform Act" provides that all procurement shall be done through','','1');
$pdf->Cell('',$body_row_height -6,'competitive bidding, except as provided for in Article XVI (Alternative Methods of Procurement) of the act, namely: Limited Source Bidding, Direct','','1');
$pdf->Cell('',$body_row_height,'Contracting, Repeat Order, Shopping and Negotiated Procurement.');
$pdf->Ln(10);
$pdf->SetFont('Courier','B','9');
$pdf->Cell($pdf->GetStringWidth('WHEREAS, Section 53.9'),$body_row_height,'WHEREAS, Section 53.9','','0');
$pdf->SetFont('Courier','','9');
$pdf->Cell($pdf->GetStringWidth(' of the '),$body_row_height,' of the ','','0');
$pdf->SetFont('Courier','B','9');
$pdf->Cell($pdf->GetStringWidth('2016 Revised Implementing Rules and Regulations (IRR)'),$body_row_height,'2016 Revised Implementing Rules and Regulations (IRR)','','0');
$pdf->SetFont('Courier','','9');
$pdf->Cell('',$body_row_height,' of the said act provides that "where the procurement','','1');
$pdf->Cell('',$body_row_height-6,'does not fall under Shopping in Section 52 of the IRR and the amount involved does not exceed the thresholds prescribed in Annex "H" of the IRR:"','','1');
$pdf->SetX(90);
$pdf->SetFont('Courier','B','9');
$pdf->Cell('',$body_row_height+9,'THRESHOLDS FOR SMALL VALUE PROCUREMENT:','','1');
$pdf->SetFont('Courier','','9');
$pdf->SetX(100);
$pdf->Cell($pdf->GetStringWidth('2.'),$body_row_height-15,'2.');
$pdf->SetFont('Courier','B','9');
$pdf->Cell($pdf->GetStringWidth('Small Value Procurement'),$body_row_height-15,'Small Value Procurement','');
$pdf->SetFont('Courier','','9');
$pdf->Cell('',$body_row_height-15,' shall not exceed the following:','','1');
$pdf->SetX(120);
$pdf->Cell('',$body_row_height+9,' a.) For NGAs, GOCCs, GFIs, and SUCs, One Million Pesos (P 1, 000,000.00)');
text('B');
$pdf->Ln(5);
$pdf->Output();


function text($text_style){
    $pdf = new FPDF();
    $pdf->SetFont('Courier',$text_style,'9');
}
?>
