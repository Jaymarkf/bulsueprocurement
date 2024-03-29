<?php
session_start();
include('session.php');
include('../dbcon.php');
require('../fpdf/fpdf.php');
$pdf = new FPDF('P','mm','A4');
$p_width = $pdf->GetPageWidth();
$p_height = $pdf->GetPageHeight();
$col = $p_width / 6.3;
$colheight = 15;
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);
$pdf->Cell('',15,'PURCHASE REQUEST','','1','C');
$pdf->SetFont('Arial','',10);
$pdf->Cell($pdf->GetStringWidth("Entity Name:  BULACAN STATE UNIVERSITY")+35,10,'Entity Name:  BULACAN STATE UNIVERSITY','','0','L');
$pdf->Cell(50,10,'FUND CLUSTER: _____________________','','1');
$pdf->Cell($pdf->GetStringWidth("Office/Section")+25,10,'Office/Section: __________','','0');
$pdf->Cell($pdf->GetStringWidth("PR No.: ") +29,10,'PR No.: '.$_GET['item'],'','0');
$pdf->Cell($pdf->GetStringWidth("Responsibility Center Code: ") +25,10,'Responsibility Center Code:___________','','0');
$pdf->Cell($pdf->GetStringWidth("".date('d M Y')."") +10,10,'Date: '.date('d M Y'),'','0');
$pdf->Ln(15);
$pdf->SetX(5);
$pdf->SetFont('Arial','B',9);
$pdf->Cell($col, $colheight,'Stock / Property No.','1','0','C');
$pdf->Cell($col, $colheight,'Unit','1','0','C');
$pdf->Cell($col, $colheight,'Item Description','1','0','C');
$pdf->Cell($col, $colheight,'Quantity','1','0','C');
$pdf->Cell($col, $colheight,'Unit Cost','1','0','C');
$pdf->Cell($col, $colheight,'Total Cost','1','1','C');

$qry = "select a.Unit,a.ItemDescription,SUM(a.Quantity) as Quantity,
        SUM(a.UnitCost) as UnitCost,SUM(a.TotalCost) as TotalCost 
        from tbl_pr b
        inner join tbl_pr_items a on a.PRno = b.PRno
        WHERE b.Year = YEAR(NOW()) + 1 and a.pr_num_merge = '".$_GET['item']."'
        GROUP BY a.Unit,a.ItemDescription";


$r = $conn->query($qry);
$pdf->SetFont('Arial','',8);
while($data = $r->fetch_array()){
    $pdf->SetX(5);
    $pdf->Cell($col,$colheight - 4,'..','1','0','C');
    $pdf->Cell($col,$colheight - 4,$data['Unit'],'1','0','C');
    $pdf->Cell($col,$colheight - 4,$data['ItemDescription'],'1','0','C');
    $pdf->Cell($col,$colheight - 4,$data['Quantity'],'1','0','C');
    $pdf->Cell($col,$colheight - 4,$data['UnitCost'],'1','0','C');
    $pdf->Cell($col,$colheight - 4,$data['TotalCost'],'1','1','C');
}
//Footer
//Footer
$pdf->Ln(5);
$pdf->Cell('','','Purpose:   ________________________________________________________________________________________________________________');
$pdf->Ln(10);
$pdf->Cell(($p_width / 2)  - 10,'30','','1','0','');
$pdf->Cell(($p_width / 2)  - 10,'30','','1','0','');
$pdf->SetXY(53,$pdf->GetY()+5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell('10','8','Requested By:','0','1','C');
$pdf->SetX(20);
$pdf->Cell('15','5','Signature: ','0','0','R');
$pdf->SetFont('Arial','',8);
$pdf->Cell('65','5','________________________________________','','1','R');
$pdf->SetX(20);
$pdf->SetFont('Arial','B',8);
$pdf->Cell('15','5','Printed Name: ','0','0','R');
$pdf->SetFont('Arial','',8);
$pdf->Cell('65','5','________________________________________','','1','R');
$pdf->SetX(20);
$pdf->SetFont('Arial','B',8);
$pdf->Cell('15','5','Disignation: ','0','0','R');
$pdf->SetFont('Arial','I',8);
$pdf->Cell('50','5','AO V, Procurement Officer','','1','R');
$pdf->SetXY(147,$pdf->GetY() - 21);
$pdf->SetFont('Arial','B',8);
$pdf->Cell('','11','Approved','','1');
$pdf->Cell(165,'5','CECILIA N. GASCON, Ph. D.','','1','R');
$pdf->SetFont('Arial','I',8);
$pdf->Cell(158,'5','University President','0','1','R');


$pdf->Output();