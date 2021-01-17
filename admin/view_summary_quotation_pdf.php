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
$pdf->Cell("","20",'Price Quotation Summary Report','','','C');
$pdf->Ln(25);
$pdf->SetFont('Arial','',10);
$pdf->Cell("40","10","Company Name","1","0","C");
$pdf->Cell("105","10","Item Description","1","0","C");
$pdf->Cell("40","10","Unit Bid Price","1","1","C");
$ArrList = array();
                                    //select company first to filter the rfq
                                    $qrycompany = $conn->query("select * from tbl_company");
                                    while($company = $qrycompany->fetch_assoc()){
                                        // select a.*,b.* from tbl_rfq a inner join tbl_rfq_item_details b on a.id = b.rfq_item_id


                                        $dqry = $conn->query("select a.*,b.* from tbl_rfq a inner join tbl_rfq_item_details b on a.id = b.rfq_item_id where company_name = '".$company['name']."'");
                                        while($row = $dqry->fetch_assoc()){
//                                            $ArrList[$company['name']]['description'][] = array($row['item_and_specification'] => $row['unit_price']);
                                            $ArrList[$company['name']]['description'][] = $row['item_and_specification'];
                                            $ArrList[$company['name']]['bid'][] = $row['unit_price'];
                                        }
//
//
                                    }
                           
                                    foreach ($ArrList as $index => $item) {
                                        foreach ($item['description'] as $key => $i) {
                                                $t = $pdf->GetStringWidth($i);
                                                if($t > 105){
                                                    $height = 5;
                                                }else{
                                                    $height =10;
                                                }
                                                $pdf->MultiCell("40","10",$index,"1","C","0");
                                                $pdf->SetXY($pdf->GetX()+40,$pdf->GetY()-10);
                                                $pdf->MultiCell("105",$height,$i,"1","C","");
                                                $pdf->SetXY($pdf->GetX()+145,$pdf->GetY()-10);
                                                $pdf->Cell("40","10",$item['bid'][$key],"1","1","C");




                                        }

                                    }





$pdf->Output();