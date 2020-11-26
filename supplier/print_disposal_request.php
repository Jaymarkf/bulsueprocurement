<?php
session_start();
include('session.php');
include('../dbcon.php');
require('../fpdf/fpdf.php');


$pdf = new FPDF('P','mm','A4');
$p_width = $pdf->GetPageWidth();
$p_height = $pdf->GetPageHeight();
$X = $pdf->GetX();
$Y = $pdf->GetY();
$pdf->AddPage();
$pdf->Image('../images/logo.png',60,4,15);
$pdf->SetFont('Arial','B',9);
$pdf->SetY($pdf->GetY()-10);
$pdf->Cell("","20",'Republic of the Philippines','','1','C');
$pdf->SetFont('Arial','B',14);
$pdf->SetY($pdf->GetY()-15);
$pdf->Cell("","20",'Bulacan State University','','1','C');
$pdf->SetY($pdf->GetY()-2);
$pdf->SetFont('Arial','B',12);
$pdf->Cell("","10","REQUEST OF RETURN OF EQUIPMENT/SEMI-EXPENDABLE PROPERTY","","1","C");
$pdf->SetFont('Courier','B',10);
$pdf->Cell("","10","Date: ".date("Y-m-d"),"","1","R");
$pdf->Cell(32,"10","date acquired","1","0","C");
$pdf->Cell(64 ,"10","Description","1","0","C");
$pdf->Cell(25 ,"10","Amount","1","0","C");
$pdf->Cell(37 ,"10","Condition of PPE","1","0","C");
$pdf->Cell(30 ,"10","Remarks","1","1","C");
$pdf->SetFont('Courier','',8);
$id = $_GET['id'];
/** @var connection_name $conn */
$sql = $conn->query("select * from disposal_request where id = ".$id);
$data = $sql->fetch_assoc();
$pdf->Cell(32,"10",$data['date_acquired'],"1","0","C");
$pdf->MultiCell(64 ,'5',$data['particulars_articles'] . " | ". " Qty: ". $data['qty'] . "      Unit cost: ". $data['unit_cost'],"1","L","");
$pdf->SetXY($pdf->GetX() + 96,$pdf->GetY() - 10);
$pdf->Cell(25 ,"10",$data['total_cost'],"1","0","C");
$pdf->Cell(37 ,"10","_____________","1","0","C");
$pdf->Cell(30 ,"10","_____________","1","1","C");
$pdf->Ln(40);
$pdf->SetX($X +40);
$pdf->Cell($pdf->GetStringWidth("Requested by"),"10","Requested by","","","L");
$pdf->SetX($pdf->GetX()+ 50);
$pdf->Cell($pdf->GetStringWidth("Checked & Verified as to the Record of Accountability"),"10","Checked & Verified as to the Record of Accountability","","1","R");
$pdf->SetXY($pdf->GetX(),$pdf->GetY() +5);
$pdf->Cell($pdf->GetStringWidth("Signature over Printed Name of Accountable Officer"),"10","Signature over Printed Name of Accountable Officer","T","","C");
$pdf->SetX($pdf->GetX() +15);
$pdf->Cell(90,"10","Signature over Printed Name","T","1","C");
$pdf->SetX($pdf->GetX() + 100);
$pdf->Cell($pdf->GetStringWidth("Noted by"),"10","Noted by","",'1','C');
$pdf->Ln(10);
$pdf->SetX($pdf->GetX() + 100);
$pdf->Cell(90,"10","Head Supply & Property Office","T","","C");

$pdf->Output();