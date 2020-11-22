<?php
session_start();
include('session.php');
include('../dbcon.php');
require('../fpdf/fpdf.php');
$id = $_GET['id'];
$sql = $conn->query("select * from summary_report where id = ".$id);
$data = $sql->fetch_assoc();

//get fundcluster name
$sql_fund1 = $conn->query("select * from tbl_fund where fund_id = ".$data['from_fundcluster']);
$fund_desc1 = $sql_fund1->fetch_assoc();
$sql_fund2 = $conn->query("select * from tbl_fund where fund_id = ".$data['fundcluster']);
$fund_desc2= $sql_fund2->fetch_assoc();
$pdf = new FPDF('P','mm','A4');
$p_width = $pdf->GetPageWidth();
$p_height = $pdf->GetPageHeight();
$pdf->AddPage();
$pdf->Image('../images/logo.png',60,4,15);
$pdf->SetFont('Arial','B',9);
$pdf->SetY($pdf->GetY()-10);
$pdf->Cell("","20",'Republic of the Philippines','','1','C');
$pdf->SetFont('Arial','B',14);
$pdf->SetY($pdf->GetY()-15);
$pdf->Cell("","20",'Bulacan State University','','1','C');
$pdf->SetY($pdf->GetY()-8);
$pdf->Cell("","20",'PROPERTY TRANSFER REPORT','','','C');
$pdf->Ln(15);
$pdf->SetFont('Arial','',10);
$pdf->Cell("","20","Entity name: BULACAN STATE UNIVERSITY","","1");
$pdf->Cell("","25" ,"","1","1");
$pdf->SetXY($pdf->GetX()+ 2,$pdf->GetY() - 22);
$pdf->Cell($pdf->GetStringWidth("From Accommodate Officer/Agency/Fundcluster: ".$fund_desc1['fund_description']),
    "10","From Accommodate Officer/Agency/Fundcluster: ".$fund_desc1['fund_description'],"","");
$pdf->SetX($pdf->GetX() + 45);
$pdf->Cell($pdf->GetStringWidth("PTR NO.: ".$data['ptr_no']),"10","PTR NO.: ".$data['ptr_no'],"","1");
$pdf->SetX($pdf->GetX() + 2);
$pdf->Cell($pdf->GetStringWidth("To Accommodate Officer/Agency/Fundcluster: ".$fund_desc2['fund_description']),"10","To Accommodate Officer/Agency/Fundcluster: ".$fund_desc2['fund_description'],"","0");
$pdf->SetX($pdf->GetX() +53);
$pdf->Cell($pdf->GetStringWidth("Date: ".$data['ptr_date']),"10","Date: ".str_replace("-","/",$data['ptr_date']),"","1");
$pdf->SetY($pdf->GetY() + 1.92);
$pdf->Cell("","23","","1","1");
$pdf->SetXY($pdf->GetX()+ 2 , $pdf->GetY() - 23);
$pdf->Cell("","9","Transaction Type","","1");
//donation,relocate, reassignment, others (specify) __________
$pdf->SetX($pdf->GetX() + 30);
$pdf->Cell(4, 4, "", 1, 0);
$pdf->Cell(4, 4, "  Donation",  0);
$pdf->SetX($pdf->GetX() + 30);
$pdf->Cell(4, 4, "", 1, 0);
$pdf->Cell(4, 4, "  Relocate",  0,"1");
$pdf->SetXY($pdf->GetX() + 30,$pdf->GetY() +3);
$pdf->Cell(4, 4, "", 1, 0);
$pdf->Cell(4, 4, "  Reassignment",  0,"");
$pdf->SetX($pdf->GetX() + 30);
$pdf->Cell(4, 4, "", 1, 0);
$pdf->Cell(4, 4, "  Others (specify): ___________________",  0,"1");
//Date Acquired // Property No. // Description // Amount below (Unit Value)  // Condition of PPE
$pdf->SetFont('Arial','B',10);
$pdf->SetY($pdf->GetY() + 3);
$pdf->Cell($pdf->GetPageWidth() / 5.528,10,"Date Acquired","1","","C");
$pdf->Cell($pdf->GetPageWidth() / 5.528,10,"Property No.","1","","C");
$pdf->Cell($pdf->GetPageWidth() / 5.528,10,"Description","1","","C");
$pdf->Cell($pdf->GetPageWidth() / 5.528,10,"Amount (Unit Value)","1","","C");
$pdf->Cell($pdf->GetPageWidth() / 5.528,10,"Condition of PPE","1","1","C");
$pdf->SetFont('Courier','',8);

$pdf->Cell($pdf->GetPageWidth() / 5.528,7,$data['date_acquired'],"1","","C");
$pdf->Cell($pdf->GetPageWidth() / 5.528,7,$data['ptr_no'],"1","","C");
$pdf->Cell($pdf->GetPageWidth() / 5.528,7,$data['item_description'],"1","","C");
$pdf->Cell($pdf->GetPageWidth() / 5.528,7,$data['unit_cost'],"1","","C");
$pdf->Cell($pdf->GetPageWidth() / 5.528,7,"","1","1","C");
$pdf->Cell("",23,"","1","1");
$pdf->SetFont('Arial','',10);
$pdf->SetXY($pdf->GetX() + 2,$pdf->GetY() - 24);
$pdf->Cell("",10,"Reason for Transfer","","1");
$pdf->SetXY($pdf->GetX() + 5,$pdf->GetY() - 7);
$pdf->Cell(178,10,$data['reason_for_transfer'],"B","1","C");
$pdf->SetXY($pdf->GetX() + 5,$pdf->GetY() - 4);
$pdf->Cell(178,10,"","B","1");
$pdf->SetY($pdf->GetY() + 5);
$pdf->Cell(30,35,"","1","");
$pdf->Cell(44,35,"","1","");
$pdf->Cell(58,35,"","1","");
$pdf->Cell(58,35,"","1","1");
$pdf->SetXY($pdf->GetX() + 1,$pdf->GetY() - 27);
$pdf->SetFont('Arial','',9);
$pdf->Cell($pdf->GetStringWidth("Signature: "),4,"Signature: ","","1");
$pdf->SetXY($pdf->GetX() + 1,$pdf->GetY() + 2);
$pdf->Cell($pdf->GetStringWidth("Printed Name: "),4,"Printed Name: ","","1");
$pdf->SetXY($pdf->GetX() + 1,$pdf->GetY() + 2);
$pdf->Cell($pdf->GetStringWidth("Designation: "),4,"Designation: ","","1");
$pdf->SetXY($pdf->GetX() + 1,$pdf->GetY() + 2);
$pdf->Cell($pdf->GetStringWidth("Date: "),4,"Date: ","","1");
$pdf->SetXY($pdf->GetX() + 30,$pdf->GetY() - 30);

//$pdf->Cell(44,"","","0","1");
$pdf->SetFont('Arial','B',10);
$pdf->Cell(44,7,"Approved By","","1","C");

$pdf->SetFont('Arial','',9);

$pdf->SetXY($pdf->GetX() + 30,$pdf->GetY() + 6);

$pdf->Cell(44,7,"","B","1","C");
$pdf->SetXY($pdf->GetX() + 30,$pdf->GetY() - 2);
$pdf->Cell(44,7,"","B","","C");
$pdf->Cell(58,7,"","B","1","C");
$pdf->SetXY($pdf->GetX() + 74,$pdf->GetY() - 12);
$pdf->Cell(58,7,"","B","","C");
$pdf->Cell(58,7,"","B","1","C");
$pdf->SetXY($pdf->GetX() + 132,$pdf->GetY() - 2);
$pdf->Cell(58,7,"","B","1","C");
$pdf->SetXY($pdf->GetX() + 74,$pdf->GetY() - 25);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(58,7,"Released / Issued By","","","C");
$pdf->Cell(58,7,"Received By","","","C");

$pdf->Output();