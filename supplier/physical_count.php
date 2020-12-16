<?php
session_start();
include('session.php');
include('../dbcon.php');
require('../fpdf/fpdf.php');

$pdf = new FPDF('L','mm','A4');
$p_width = $pdf->GetPageWidth();
$p_height = $pdf->GetPageHeight();
$X = $pdf->GetX();
$Y = $pdf->GetY();
$pdf->AddPage();
$pdf->Image('../images/logo.png',100,4,15);
$pdf->SetFont('Arial','B',9);
$pdf->SetY($pdf->GetY()-10);
$pdf->Cell("","20",'Republic of the Philippines','','1','C');
$pdf->SetFont('Arial','B',14);
$pdf->SetY($pdf->GetY()-15);
$pdf->Cell("","20",'Bulacan State University','','1','C');
$pdf->SetY($pdf->GetY());
$pdf->SetFont('Helvetica','B',9);
$pdf->Cell("","5","REPORT ON THE PHYSICAL COUNT OF PROPERTY, PLANT AND EQUIPMENT","","1","C");
$pdf->SetXY($pdf->GetX()+100,$pdf->GetY()+3);
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(80,"5","(Type of Property, Plant and Equipment)","T","1","C");
$pdf->SetXY($pdf->GetX()+100,$pdf->GetY());
$pdf->Cell(80,"5","As At __________________","","1","C");
$pdf->Cell("","5","Fund Cluster: ","","1");
$pdf->Cell($pdf->GetStringWidth("For which: "),"10","For which: ","","");
$pdf->SetXY($pdf->GetX()+2,$pdf->GetY()+6);
$pdf->Cell(110,"7","Name of Accountable Officer","T","L");
$pdf->Cell(40,"7","Office Designation","T","L");
$pdf->SetFont('Helvetica','B',9);
$pdf->SetXY($pdf->GetX()-30,$pdf->GetY()-7);
$pdf->Cell("20","7","BulSU","","C");
$pdf->SetFont('Helvetica','',9);
$pdf->SetX($pdf->GetX()+15);
$pdf->Cell("20","7","is accountable, having assumed such accountability on ___________.","","1");
$pdf->SetY($pdf->GetY()+10);
$pdf->Cell("20","10","ARTICLE","1","","C");
$pdf->Cell("70","10","DESCRIPTION","1","","C");
$pdf->MultiCell("20","5","DATE ACQUIRED","1","C");
$pdf->SetXY($pdf->GetX()+110,$pdf->GetY()-10);
$pdf->MultiCell("20","5","PROPERTY NUMBER","1","C");
$pdf->SetXY($pdf->GetX()+130,$pdf->GetY()-10);
$pdf->MultiCell("20","5","UNIT OF MEASURE","1","C");
$pdf->SetXY($pdf->GetX()+150,$pdf->GetY()-10);
$pdf->MultiCell("20","5","UNIT VALUE","1","C");
$pdf->SetFont('Helvetica','',7);
$pdf->SetXY($pdf->GetX()+170,$pdf->GetY()-10);
$pdf->MultiCell("20",10/3,"QUANTITY per PRIORITY CARD","1","C");
$pdf->SetXY($pdf->GetX()+190,$pdf->GetY()-10);
$pdf->MultiCell("20",10/3,"QUANTITY per PHYSICAL COUNT","1","C");
$pdf->SetFont('Helvetica','',9);
$pdf->SetXY($pdf->GetX()+210,$pdf->GetY()-10);
$pdf->SetFont('Helvetica','',8);
$pdf->MultiCell("30","3","SHORTAGE / OVERAGE","1","C");
$pdf->SetXY($pdf->GetX()+240,$pdf->GetY()-6);
$pdf->SetFont('Helvetica','',9);
$pdf->Cell("40","10","REMARKS","1","1","C");
$pdf->SetFont('Helvetica','',7);
$pdf->SetXY($pdf->GetX()+210,$pdf->GetY()-4);
$pdf->Cell("15","4","Quantity","1","","C");
$pdf->Cell("15","4","Value","1","1","C");

$sql = $conn->query("select * from item_owner where transaction_type = 'PAR'");
$sql_ptr  = $conn->query("select * from tbl_par");
while($data = $sql->fetch_assoc()) {
    $data_ptr = $sql_ptr->fetch_assoc();
    //get article
    $sql_art = $conn->query("select * from tbl_item_details where itemdetailDesc = '".$data['item_id']."'");
    $art_data = $sql_art->fetch_assoc();

//data loop
    $article = $art_data['article'];
    $description = $data['item_id'];
    $date_acquired = $data['date_acquired'];
    $property_number = $data_ptr['property_number'];
    $unit_of_measure = $art_data['UnitOfMeasurement'];
    $unit_value = $data['unit_price'];
    $quantity_per_priority_card = "";
    $quantity_per_physical_count = "";
    $quantity = '';
    $value = '';
    $remarks = '';

    $pdf->Cell("20", "7", $article, "1", "", "C");
    $pdf->Cell("70", "7", $description, "1", "", "C");
    $pdf->Cell("20", "7", $date_acquired, "1", "", "C");
    $pdf->Cell("20", "7", $property_number, "1", "", "C");
    $pdf->Cell("20", "7", $unit_of_measure, "1", "", "C");
    $pdf->Cell("20", "7", $unit_value, "1", "", "C");
    $pdf->Cell("20", "7", $quantity_per_priority_card, "1", "", "C");
    $pdf->Cell("20", "7", $quantity_per_physical_count, "1", "", "C");
    $pdf->Cell("15", "7", $quantity, "1", "", "C");
    $pdf->Cell("15", "7", $value, "1", "", "C");
    $pdf->Cell("40", "7", $remarks, "1", "1", "C");
//end of data loop
}


$pdf->Cell(280,"50","","1","1");
$pdf->SetFont('Helvetica','',8);
$pdf->SetXY($pdf->GetX()+2,$pdf->GetY()-45);
$pdf->Cell(280/3,"4","Certified Correct by:","","","L");
$pdf->Cell(280/3,"4","Approved by:","","","L");
$pdf->Cell(280/3 - 2,"4","Verified by:","","1","L");
$pdf->SetXY($pdf->GetX()+(280/3)*0.32,$pdf->GetY()+4);
$pdf->Cell(65,"7","Signature over Printed Name of","T","","C");
$pdf->SetX($pdf->GetX()+(280/3)*0.23);
$pdf->Cell(68,"7","Signature over Printed Name of Head of","T","","C");
$pdf->SetX($pdf->GetX()+(280/3)*0.23);
$pdf->Cell(68,"7","Signature over Printed Name of COA","T","1","C");
$pdf->SetXY($pdf->GetX()+(280/3)*0.30,$pdf->GetY()-3);
$pdf->Cell(68,"7","Inventory Committee Chair","","","C");
$pdf->SetX($pdf->GetX()+(280/3)*0.22);
$pdf->Cell(68,"7","Agency/ Entity or Authorized Representative","","","C");
$pdf->SetX($pdf->GetX()+(280/3)*0.23);
$pdf->Cell(68,"7","Representative","","1","C");
$pdf->SetFont('Helvetica','',9);
$pdf->SetX($pdf->GetX());
$pdf->Cell(29,"7","Members","","0","C");
$pdf->Cell(20,"7","_____________________________________","","1","L");
$pdf->SetXY($pdf->GetX()+29,$pdf->GetY()-2);
$pdf->Cell(20,"7","_____________________________________","","1","L");
$pdf->SetXY($pdf->GetX()+29,$pdf->GetY()-2);
$pdf->Cell(20,"7","_____________________________________","","1","L");
$pdf->SetXY($pdf->GetX()+13.8,$pdf->GetY());
$pdf->Cell(20.5,"7","Date:         _____________________________________","","","L");




$pdf->Output();