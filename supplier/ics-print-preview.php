<?php
session_start();
include('session.php');
include('../dbcon.php');
require('../fpdf/fpdf.php');

$ics_query = $conn->query("select * from tbl_ics where id = ". $_GET['preview']);
$ics_fetch = $ics_query->fetch_assoc();
//get fund cluster name
$fundcluster = explode(",",$ics_fetch['fundcluster_code']); //array and have 3 values left

$fcluster_query = $conn->query("select * from tbl_fund where fund_id = ". $fundcluster[0]);
$fetch_cluster  = $fcluster_query->fetch_assoc();
$fundcluster_name = $fetch_cluster['fund_description'];




$pdf = new FPDF('P','mm','A4');
$p_width = $pdf->GetPageWidth();
$p_height = $pdf->GetPageHeight();
$pdf->AddPage();
$pdf->Image('../images/header_logo.png',65,3,80);
$pdf->SetFont('Arial','B',13);
$pdf->Cell("","20",'Inventory Custodian Slip','','','C');
$pdf->Ln(10);
$pdf->SetFont('Times','B',10);
$pdf->Cell("60",'20','Entity name: Bulacan State University','','1','L');
$pdf->Cell($pdf->GetStringWidth('Fund Cluster: '),'5','Fund Cluster: ','','0','L');
$pdf->Cell($pdf->GetStringWidth($fundcluster_name),'5',$fundcluster_name,'','0','L');  //fundcluster
$pdf->SetX($pdf->GetX() + 100);
$pdf->Cell($pdf->GetStringWidth("ICS NO.: "),'5','ICS NO.: ','','','');
$pdf->Cell($pdf->GetStringWidth(str_replace(',','-',$ics_fetch['ics_num'])),'5',str_replace(',','-',$ics_fetch['ics_num']),'','1');   //ICS No
$pdf->Ln(7);
$pdf->SetFont('Courier','B',9);
$pdf->Cell('20','20','Quantity','1','','C');
$pdf->Cell('20','20','Unit','1','','C');
$pdf->Cell("40",'7','Amount','1','1','C');
$pdf->SetX($pdf->GetX() + 40);
$pdf->SetFont('Courier','B',8);
$pdf->Cell("20",'13','Unit Cost','1','','C');
$pdf->Cell("20",'13','Total Cost','1','','C');
$pdf->SetY($pdf->GetY() - 7);
$pdf->SetX($pdf->GetX() +80 );
$pdf->SetFont('Courier','B',8);
$pdf->Cell("40",'20','Description','1','','C');
$pdf->Cell("33",'20','Inventory Item No.','1','','C');
$pdf->Cell("33",'20','','1','0','C');
$pdf->Text($pdf->GetX() -24 ,$pdf->GetY()+7,'Estimated');
$pdf->Text($pdf->GetX() -25 ,$pdf->GetY()+14,'Useful Life');

$pdf->Ln(20);
//data to be render
$pdf->SetFont('Courier','',8);
$pdf->Cell("20",'10',$ics_fetch['quantity'],'1','0','C');  //quantity
$pdf->Cell("20",'10',$ics_fetch['unit'],'1','0','C');  //unit

$pdf->SetFont('Courier','',7);
$pdf->Cell("20",'10',$ics_fetch['unit_cost'],'1','0','C');  // unit cost
$pdf->Cell("20",'10',$ics_fetch['total'],'1','0','C');  // total cost
//get item description
$rf = $conn->query("select * from tbl_rfq_item_details where id = ". $ics_fetch['item_desc']);
$rf_fetch = $rf->fetch_assoc();

$pdf->Cell("40",'10',$rf_fetch['item_and_specification'],'1','0','C');  // Description
$pdf->Cell("33",'10','...','1','0','C');  // Inventory Item No.
$pdf->Cell("33",'10','...','1','1','C');  // Estimated Useful Life



$pdf->Ln(10);

$pdf->Cell($p_width / 2,'50','','1','');
$pdf->Cell(($p_width / 2) - 25,'50','','1','1');
$pdf->SetFont('Courier','B',10);
$pdf->Text($pdf->GetX()+ 10,$pdf->GetY() - 40,'Received from: ');
$pdf->Text($pdf->GetX()+ 120,$pdf->GetY() - 40,'Received by: ');
$pdf->Text($pdf->GetX()+22,$pdf->GetY() - 25,'Signature Over Printed Name');
$pdf->Line($pdf->GetX()+17,$pdf->GetY() - 28,$pdf->GetX()+85,$pdf->GetY()-28);

$pdf->Text($pdf->GetX()+120,$pdf->GetY() - 25,'Signature Over Printed Name');
$pdf->Line($pdf->GetX()+115,$pdf->GetY() - 28,$pdf->GetX()+180,$pdf->GetY()-28);


$pdf->Text($pdf->GetX()+127,$pdf->GetY() - 12,'Position / Office');
$pdf->Line($pdf->GetX()+115,$pdf->GetY() - 15,$pdf->GetX()+180,$pdf->GetY()-15);


$pdf->Text($pdf->GetX()+31,$pdf->GetY() - 12,'Position / Office');
$pdf->Line($pdf->GetX()+25,$pdf->GetY() - 15,$pdf->GetX()+85,$pdf->GetY()-15);

$pdf->Text($pdf->GetX()+50,$pdf->GetY() - 2,'Date');
$pdf->Line($pdf->GetX()+25,$pdf->GetY() - 5,$pdf->GetX()+85,$pdf->GetY()-5);

$pdf->Text($pdf->GetX()+140,$pdf->GetY() - 2,'Date');
$pdf->Line($pdf->GetX()+110,$pdf->GetY() - 5,$pdf->GetX()+180,$pdf->GetY()-5);



$pdf->Output();
?>


