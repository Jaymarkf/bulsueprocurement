<?php
session_start();
include('session.php');
include('../dbcon.php');
require('../fpdf/fpdf.php');

$ics_query = $conn->query("select * from tbl_par where id = ". $_GET['preview']);
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
$pdf->SetFont('Arial','B',13);
$pdf->Cell("","20",'PROPERTY ACKNOWLEDGEMENT RECEIPT','','','C');
$pdf->Ln(10);
$pdf->SetFont('Times','B',10);
$pdf->Cell("60",'20','Entity name: Bulacan State University','','1','L');
$pdf->Cell($pdf->GetStringWidth('Fund Cluster: '),'5','Fund Cluster: ','','0','L');
$pdf->Cell($pdf->GetStringWidth($fundcluster_name),'5',$fundcluster_name,'','0','L');  //fundcluster
$pdf->SetX($pdf->GetX() + 100);
$pdf->Cell($pdf->GetStringWidth("ICS NO.: "),'5','PAR NO.: ','','','');
$pdf->Cell($pdf->GetStringWidth(str_replace(',','-',' '.$ics_fetch['ics_num'])),'5',str_replace(',','-',' '.$ics_fetch['ics_num']),'','1');   //ICS No
$pdf->Ln(7);
$pdf->SetFont('Courier','B',9);
$pdf->Cell('20','20','Quantity','1','','C');
$pdf->Cell('20','20','Unit','1','','C');
$pdf->Cell("40",'20','Description','1','0','C');
$pdf->SetFont('Courier','B',8);
$pdf->Cell("40",'20','Property Number','1','','C');
$pdf->Cell("33",'20','Date Acquired','1','','C');
$pdf->Cell("33",'20','Amount','1','0','C');
$pdf->Ln(20);
$pdf->SetFont('Courier','',8);
//data to be render
$item_query = $conn->query("select * from tbl_par_items where par_id = " . $ics_fetch['id']);
while($data = $item_query->fetch_assoc()){

    $pdf->Cell("20",'10',$data['quantity'],'1','0','C');  //quantity
    $pdf->Cell("20",'10',$data['unit'],'1','0','C');  //unit

    $pdf->SetFont('Courier','',7);
    $pdf->Cell("40",'10',$data['item_description'],'1','0','C');  // description
    $pdf->SetFont('Courier','',8);
    $pdf->Cell("40",'10','...','1','0','C');  // property number
    $pdf->Cell("33",'10',$ics_fetch['date_acquired'],'1','0','C');  // date acquired
    $pdf->Cell("33",'10',$data['total_cost'],'1','1','C');  // Amount
}




$pdf->Ln(10);

$pdf->Cell($p_width / 2,'50','','1','');
$pdf->Cell(($p_width / 2) - 25,'50','','1','1');
$pdf->SetFont('Courier','B',10);
$pdf->Text($pdf->GetX()+ 10,$pdf->GetY() - 40,'Received by: ');
$pdf->Text($pdf->GetX()+ 120,$pdf->GetY() - 40,'Received by: ');
$pdf->Text($pdf->GetX()+10,$pdf->GetY() - 25,'Signature Over Printed Name of End User');
$pdf->Line($pdf->GetX()+17,$pdf->GetY() - 28,$pdf->GetX()+85,$pdf->GetY()-28);
$pdf->SetFont('Courier','B',9);
$pdf->Text($pdf->GetX()+108,$pdf->GetY() - 25,'Signature Over Printed Name of Supply');
$pdf->Text($pdf->GetX()+120,$pdf->GetY() - 22.5,'and /or Property Custodian');
$pdf->Line($pdf->GetX()+115,$pdf->GetY() - 28,$pdf->GetX()+180,$pdf->GetY()-28);
$pdf->SetFont('Courier','B',10);

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


