<?php
if(!isset($_SESSION)){
    session_start();
}

include('../dbcon.php');
require('../fpdf/fpdf.php');


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
$pdf->Cell("","20",'Updated PPMP Request Logs of '.$_GET['id'] ,'','','C');
$pdf->Ln(25);
$pdf->SetFont('Arial','B',11);
$pdf->Cell("160","13","H I S T O R Y","1","0","C");
$pdf->SetFont('Arial','B',9);
$pdf->Cell("30","13","DATE CHANGES","1","1","C");
$pdf->SetFont('Arial','',9);
$d = $_GET['id'];
$_sql = $conn->query("select * from procurement_ppmp_history where branch = '$d'");


while($result = $_sql->fetch_assoc()){
    $description = $result['description'];
    $date_change = $result['date_change'];

    $w = $pdf->GetStringWidth($description);
    $h = 0;
    if($w > 160){
       $h = 5; 
    }else{
        $h = 10;
    }   

    
$pdf->MultiCell("160",$h,$description,"1","C");
$pdf->SetXY($pdf->GetX()+160,$pdf->GetY()-10); 
$pdf->Cell("30",10,$date_change,"1","1","C");

}



$pdf->Output();