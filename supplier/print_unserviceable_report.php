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
$pdf->SetY($pdf->GetY()-5);
$pdf->SetFont('Helvetica','B',9);
$pdf->Cell("","10","SUMMARY OF UNSERVICEABLE PROPERTY","","1","C");
$pdf->Cell(200,5,"INVENTORY","1","","C");
$pdf->Cell(78,5,"INSPECTION and DISPOSAL","1","1","C");
$pdf->SetFont('Helvetica','',7);

$pdf->MultiCell(12,5,"Date Acquired","1","C","");
$pdf->SetXY($pdf->GetX()+12,$pdf->GetY() -10);
$pdf->Cell(30,10,"Particulars / Articles","1","","C");
$pdf->MultiCell(12,5,"Property No.","1","C","");
$pdf->SetXY($pdf->GetX()+54,$pdf->GetY() -10);
$pdf->Cell(5,10,"Qty","1","","C");
$pdf->Cell(13,10,"Unit Cost","1","","C");
$pdf->Cell(13,10,"Total Cost","1","","C");
$pdf->MultiCell(14,5,"Date Returned","1","C","");
$pdf->SetXY($pdf->GetX()+99,$pdf->GetY() -10);
$pdf->MultiCell(12,3.339,"No of Years in Service","1","C","");
$pdf->SetXY($pdf->GetX()+111,$pdf->GetY() -10);
$pdf->MultiCell(12,3.339,"Office / College / Campus","1","C","");
$pdf->SetXY($pdf->GetX()+123,$pdf->GetY() -10);
$pdf->MultiCell(13,5,"Name of Employee","1","C","");
$pdf->SetXY($pdf->GetX()+136,$pdf->GetY() -10);
$pdf->MultiCell(17,5,"Accumulated Depreciation","1","C","");
$pdf->SetXY($pdf->GetX()+153,$pdf->GetY() -10);
$pdf->MultiCell(18,3.34,"Accumulated inpairment Losses","1","C","");
$pdf->SetXY($pdf->GetX()+171,$pdf->GetY() -10);
$pdf->MultiCell(12.6,5,"Carrying Amount","1","C","");
$pdf->SetXY($pdf->GetX()+183.7,$pdf->GetY() -10);
$pdf->Cell(16.3,10,"Remarks","1","","C");
$pdf->Cell(40,5,"DISPOSAL","1","","C");
$pdf->MultiCell(13.7,5,"Appraised Value","1","C","");
$pdf->SetXY($pdf->GetX()+253.8,$pdf->GetY() -10);
$pdf->Cell(24,5,"RECORD OF SALES","1","1","C");
$pdf->SetXY($pdf->GetX()+200,$pdf->GetY());
$pdf->SetFont('Helvetica','',5);
$pdf->Cell(40/5,5,"SALE","1","","C");
$pdf->SetFont('Helvetica','',4);
$pdf->Cell(40/5,5,"TRANSFER","1","","C");
$pdf->Cell(40/5,5,"Destruction","1","","C");
$pdf->MultiCell(40/5,2.5,"Others (Specify)","1","C","");
$pdf->SetXY($pdf->GetX()+232,$pdf->GetY()-5);
$pdf->Cell(40/5,5,"Total","1","1","C");
$pdf->SetXY($pdf->GetX()+253.8,$pdf->GetY()-5);
$pdf->Cell(24/2,5,"OR No","1","","C");
$pdf->Cell(24/2,5,"Amount","1","1","C");
$sql = $conn->query("select * from disposal_request where id = ". $_GET['id']);
$data = $sql->fetch_assoc();
$pdf->SetFont('Helvetica','',5);
$pdf->Cell(24/2,5,$data['date_acquired'],"1","0","C");
$pdf->SetFont('Helvetica','',7);
$pdf->Cell(30,5,$data['particulars_articles'],"1","0","C");
$pdf->SetFont('Helvetica','',5);
$pdf->Cell(12,5,"_________","1","0","C");
$pdf->Cell(5,5,$data['qty'],"1","0","C");
$pdf->SetFont('Helvetica','',6);
$pdf->Cell(13,5,'Php '. $data['unit_cost'],"1","0","C");
$pdf->Cell(13,5,'Php '. $data['total_cost'],"1","0","C");
$pdf->Cell(14,5,'_________',"1","0","C");
$pdf->Cell(12,5,'_________',"1","0","C");
//get college info
$sql_coll = $conn->query("select emp.*,coll.* from tbl_supplier_employee emp inner join tbl_branch coll on emp.college = coll.branchID where emp.id= ".$data['name_of_employee']);
$data_coll = $sql_coll->fetch_assoc();
$pdf->MultiCell(12,2.5,$data_coll['branch'],"1","0","");
$pdf->SetXY($pdf->GetX() + 123,$pdf->GetY() - 5);
$pdf->MultiCell(13,2.5,$data_coll['first_name'] .' '. $data_coll['last_name'],"1","0","");
$pdf->SetXY($pdf->GetX()+136,$pdf->GetY()-5);
$pdf->Cell(17,5,"___________","1","0","C");
$pdf->Cell(18,5,"___________","1","0","C");
$pdf->Cell(12.6,5,"________","1","0","C");
$pdf->Cell(16.3,5,"________","1","0","C");
$pdf->Cell(40/5,5,"","1","0","C");
$pdf->Cell(40/5,5,"","1","0","C");
$pdf->Cell(40/5,5,"","1","0","C");
$pdf->Cell(40/5,5,"","1","0","C");
$pdf->Cell(40/5,5,"","1","0","C");
$pdf->Cell(13.7,5,"","1","0","C");
$pdf->Cell(24/2,5,"","1","0","C");
$pdf->Cell(24/2,5,"","1","1","C");

$pdf->SetFont('Helvetica','',7);
$pdf->Cell(200,30,"","1","");
$pdf->Cell(77.5,30,"","1","1");
$pdf->SetXY($pdf->GetX()+2,$pdf->GetY()-31);
$pdf->Cell(20,'10','I HEREBY request inspection and disposition, pursuant to Section 79 of PD 1445, of the property enumerated above.','','1');
$pdf->SetXY($pdf->GetX()+2,$pdf->GetY()-5);
$pdf->Cell(100,10,'Requested by:','','','L');
$pdf->Cell(100,10,'Approved by:','','1','L');
$pdf->SetXY($pdf->GetX()+2,$pdf->GetY()-6);
$pdf->Cell(100,10,'','','0','L');
$pdf->Cell(100,10,'','','1','L');
$pdf->SetXY($pdf->GetX()+10,$pdf->GetY()-3);
$pdf->Cell(70,4,'(Signature over Printed Name of Accountable Officer)','T','0','C');
$pdf->SetX($pdf->GetX()+ 40);
$pdf->Cell(70,4,'(Signature over Printed Name of Authorized Official)','T','1','C');
$pdf->SetXY($pdf->GetX()+10,$pdf->GetY()+2);
$pdf->Cell(70,3.5,'SUPERVISING ADMINISTRATIVE OFFICER - SUPPLY','','0','C');
$pdf->SetX($pdf->GetX()+ 40);
$pdf->Cell(70,3.5,'UNIVERSITY PRESIDENT','','1','C');
$pdf->SetX($pdf->GetX()+10);
$pdf->Cell(70,3.9,'(Designation of Accountable Officer)','T','0','C');
$pdf->SetX($pdf->GetX()+40);
$pdf->Cell(70,3.9,'(Designation of Authorized Official)','T','1','C');
$pdf->SetXY($pdf->GetX()+200,$pdf->GetY()-27);
$pdf->MultiCell(40,2,'I CERTIFY that i have inspected each and every article enumerated in this report and that the disposition made thereof was in my judgement the best for the public interest.','','L','');
$pdf->SetXY($pdf->GetX()+239,$pdf->GetY()-12);
$pdf->MultiCell(40,2,'I CERTIFY that i have witnessed the disposition  of the articles enumerated on this report this _______ day of __________','','L','');
$pdf->SetXY($pdf->GetX()+202,$pdf->GetY()+10);
$pdf->SetFont('Helvetica','B',7);
$pdf->Cell(77.5 / 2.1,4,'DR. JAIME P. PULUMBARIT','T','','C');
$pdf->SetX($pdf->GetX()+2);
$pdf->Cell(77.5 / 2.2,4,'MR. IVY MAR RAMOS','T','1','C');
$pdf->SetFont('Helvetica','',7);
$pdf->SetXY($pdf->GetX()+202,$pdf->GetY());
$pdf->Cell(77.5 / 2.2,4,'Chairman, Disposal Committee','','','C');
$pdf->SetX($pdf->GetX()+3);
$pdf->Cell(77.5 / 2.2,4,'BulSU Internal Auditor','','1','C');
$pdf->SetY($pdf->GetY()+2.7);
$pdf->Cell(200,25,'','1','','');
$pdf->Cell(77.5,25,'','1','1','');
$pdf->SetY($pdf->GetY()-15);
$pdf->Cell(200 / 2,4,'ISABELITA C. BENEDICTOS','','0','C');
$pdf->Cell(77.5 ,4,'FELICITAS G. MIRABUENOS','','1','C');
$pdf->SetX($pdf->GetX()+16);
$pdf->Cell(200 / 3,4,'Disposal Committee - Member(ADMIN)','T','0','C');
$pdf->SetX($pdf->GetX()+16);
$pdf->Cell(77,4,'Disposal Committee - Member(ACCOUNTING)','T','1','C');
$pdf->SetXY($pdf->GetX()+200,$pdf->GetY() -17);
$pdf->MultiCell(77,3,'I CERTIFY that i have witnessed the disposition of the articles enumerated on this report this ______ day of ________________','','C');
$pdf->SetXY($pdf->GetX()+200,$pdf->GetY()+5);
$pdf->Cell(77,4,'BARBARA FRANCISCO','','1','C');
$pdf->SetXY($pdf->GetX()+200,$pdf->GetY()-1.5);
$pdf->SetFont('Arial','',6);
$pdf->Cell(77,4,'COA  Representative','','1','C');
$pdf->Output();