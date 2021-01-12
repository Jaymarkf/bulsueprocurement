<?php
session_start();
include('session.php');
include('../dbcon.php');
require('../fpdf/fpdf.php');
if(isset($_GET['id'])) {
    $ids = $_GET['id'];
    $fd = $conn->query("select * from par_summary_report where id = " . $ids);
    $dataf = $fd->fetch_assoc();
    $id = $dataf['end_user'];
    $title = 'PROPERTY ACKNOWLEDGEMENT RECEIPT';
    $condition = 'par_no';
}elseif(isset($_GET['id_ics'])){
    $ids = $_GET['id_ics'];
    $fd = $conn->query("select * from par_summary_report where id = " . $ids);
    $dataf = $fd->fetch_assoc();
    $id = $dataf['end_user'];
    $title = 'INVENTORY CUSTODIAN RECEIPT';
    $condition = 'ics_no';
}

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
$pdf->Cell("","20",$title,'','','C');
$pdf->Ln(25);
$pdf->SetFont('Arial','',10);
$pdf->Cell("10",10,"Qty","1","","C");
$pdf->Cell("20",10,"Unit","1","","C");
$pdf->Cell("80",10,"Description","1","","C");
$pdf->Cell("25",10,"Date Acquired","1","","C");
$pdf->Cell("25",10,"Unit Value","1","","C");
$pdf->Cell("35",10,"Remarks","1","1","C");
$sql = $conn->query("select * from summary_report where ".$condition." <> '' and issued_to = '$id'");

while($data = $sql->fetch_assoc()) {
    //get the user
    $width = $pdf->GetStringWidth($data['item_description']);
    //flag 78 
    if($width > 78){
        $height = 20;
    }else{
        $height = 10;
    }
    $ss = $conn->query("select * from tbl_supplier_employee where id = ".$data['issued_by']);
    $fs = $ss->fetch_assoc();
    $name = $fs['first_name']. ' '. $fs['middle_name']. ' '. $fs['last_name'];
    $pdf->MultiCell("10", $height, $data['quantity'], "1", "L");
    $pdf->SetXY($pdf->GetX()+10,$pdf->GetY()-$height);
    $pdf->MultiCell("20", $height, $data['unit'], "1", "L");
    $pdf->SetXY($pdf->GetX()+30,$pdf->GetY()-$height);
    $pdf->MultiCell("80", 10, $data['item_description'], "1", "L");
    $pdf->SetXY($pdf->GetX()+110,$pdf->GetY()-$height);
    $pdf->MultiCell("25", $height, $data['date_acquired'], "1", "L");
    $pdf->SetXY($pdf->GetX()+135,$pdf->GetY()-$height);
    $pdf->MultiCell("25", $height, $data['unit_cost'], "1", "L");
    $pdf->SetXY($pdf->GetX()+160,$pdf->GetY()-$height);
    $pdf->MultiCell("35", $height, $name, "1", "L");
}
$pdf->Ln(10);
$pdf->Cell($pdf->GetPageWidth()/2,"10","Acknowledge by:",'','','L');
$pdf->Cell($pdf->GetPageWidth()/3,"10","Inspected by:",'','1','R');

$sql_owner = $conn->query("select * from tbl_supplier_employee where id = ".$id);
$fo = $sql_owner->fetch_assoc();
$namez = $fo['first_name']. ' '. $fo['middle_name']. ' '. $fo['last_name'];
$pdf->Cell('40','10',strtoupper($namez),'','1','L');
$pdf->SetY($pdf->GetY()-5);
$coll = $conn->query("select * from tbl_branch where branchID = ".$fo['college']);
$coll_d = $coll->fetch_assoc();
$pdf->Cell('40','10','Faculty: '.$coll_d['branch'],'','1','L');
$pdf->Cell('40','10','Date:____________','','1','L');
$pdf->SetXY($pdf->GetX() +130,$pdf->GetY() - 25);
$pdf->Cell("40",10,'INVENTORY COMMITTEE TEAM','','1');
$pdf->SetXY($pdf->GetX() +130,$pdf->GetY());
$pdf->Cell("40",10,'Date:____________','','1');




$pdf->Output();