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
$pdf->Cell($pdf->GetStringWidth("Office/Section")+25,10,'Office/Section: ','','0');
$pdf->Cell($pdf->GetStringWidth("PR No.: ") +15,10,'PR No.: ','','0');
$pdf->Cell($pdf->GetStringWidth("Responsibility Center Code: ") +25,10,'Responsibility Center Code: ','','0');
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
        WHERE b.Year = YEAR(NOW()) + 1
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
$pdf->Ln(10);
$pdf->Cell('',15,'Purpose: ___________________','','1');
$pdf->Ln(10);
$pdf->SetX(15);
$pdf->Cell(130,'','__________________________','','');
$pdf->Cell($pdf->GetStringWidth('__________________________'),'','__________________________','','1');
$pdf->SetX(26);
$pdf->Cell(133,'9','Requested By','','');
$pdf->Cell($pdf->GetStringWidth('Approved By'),'9','Approved By','','');
$pdf->Ln(10);
$pdf->Cell('','15','Signature:____________________','','1');
$pdf->Cell(130,'15','Printed Name:____________________','','0');
$pdf->SetFont('Arial','I',8);
$pdf->Cell($pdf->GetStringWidth('CECILIA N. GASCON, Ph. D.'),'5','CECILIA N. GASCON, Ph. D.','','1');
$pdf->SetX(141);
$pdf->SetFont('Arial','',8);
$pdf->Cell($pdf->GetStringWidth("         University President         "),'5','         University President         ','T','','C');
$pdf->Ln(15);
$pdf->Cell($pdf->GetStringWidth("Designition: ______________________"),'10','Designition: ______________________','');


$pdf->Output();