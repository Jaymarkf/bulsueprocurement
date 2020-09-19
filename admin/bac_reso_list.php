<?php
session_start();
include('session.php');
include('../dbcon.php');
require('../fpdf/fpdf.php');
$time_filter = $_GET['c_id'];

$qc = "select * from tbl_company";
/** @var TYPE_NAME $conn */
$rc = $conn->query($qc);
$ac = array();
$aname = array();
while($dc = $rc->fetch_array()){

    $ac[] = $dc['id']; //data of company id's
    $aname[] = $dc['name'];
}
//loop company list
$data = array();
foreach ($ac as $index => $item) {
    $qr = "select a.*,b.*,c.* from tbl_rfq a 
            inner join tbl_rfq_item_details b on a.id = b.id 
            inner join tbl_generate_bac_report c on a.id_company = c.company_id
            where
            b.approved_by = 'approved' and a.id_company= '$item' and c.date_generated = '$time_filter'";

    $qrc  = $conn->query($qr);
    while($qres = $qrc->fetch_array()){
//        $data[$qres['company_name']]['item_no']  = $qres['item_no'];
        $data[$qres['company_name']]['company_name'] = $qres['company_name'] ;
        $data[$qres['company_name']]['total_amount'] = $data[$qres['company_name']]['total_amount'] + $qres['unit_price'] ;
        $data[$qres['company_name']]['items'][] = $qres['item_and_specification']."[".$qres['quantity_and_unit']."]"."|" . $qres['unit_price'];

    }
}
//
//echo '<pre>';
//print_r($data);
//echo '</pre>';
$textHeightY = 4;
$margin_left = 10;
$header_height = 13;
$Y = 59;
$column_3 = 96.01;
$column_4 = $margin_left + 121;
$body_row_height  = 7;
$pdf = new FPDF('L','mm','A4');
$p_width = $pdf->GetPageWidth();
$p_height = $pdf->GetPageHeight();
$pdf->AddPage();
$pdf->Image('../images/logo.png',($p_width / 2) - 9,3,15,15,'PNG');
$pdf->Ln(9);
$pdf->SetFont('Arial','',10);
$pdf->Cell(-10);
$pdf->Cell($p_width,$textHeightY,'Republic of the Philippines','','2','C','','');
$pdf->Cell($p_width,$textHeightY,'Bulacan State University','','2','C','','');
$pdf->SetFont('Arial','B',10);
$pdf->Cell($p_width,$textHeightY,'Bids and Awards Committee for goods and services','','2','C','','');
$pdf->SetFont('Arial','',10);
$pdf->Cell($p_width,$textHeightY,'City of Malolos, Bulacan','','2','C','','');
$pdf->SetFont('Arial','B',10);
$pdf->Cell($p_width,$textHeightY,'ABSTRACT OF CANVASS AND BAC RESOLUTION','','2','C','','');
$pdf->Cell($p_width,$textHeightY,'RESOLUTION RECOMMENDING TO AWARD OF THE PROCUREMENT OF MEDICAL & DENTAL SUPPLY ','','2','C','','');
$pdf->Cell($p_width,$textHeightY,'FOR COVID-19 PREVENTIVE MEASURE THROUGH SMALL VALUE PROCUREMENT-BY LOT','','2','C','','');
$pdf->Ln(4);
$pdf->SetFont('Arial','',10);
$pdf->Cell($p_width-50,$textHeightY,'Date: '.date("d M Y"),'','2','R','','');
$pdf->Ln(4);
$pdf->SetX($margin_left);
$pdf->SetFont('Arial','',9);
$pdf->MultiCell('',$header_height,'',1,'C');
$pdf->SetXY($margin_left,$Y);
$pdf->SetXY($margin_left+16,$Y+2.5);
$pdf->MultiCell(70,$header_height / 3.5,'NAME AND DESCRIPTION OF ARTICLES BEING REQUISITIONED','0','C');
$pdf->SetXY($column_3,$Y+3);
$pdf->MultiCell(35,$header_height / 3.5,'Approved Unit Price per item','','C');
$pdf->SetXY($column_4,$Y);
$pdf->Cell(35,$header_height,'Quantity and Unit','1','0','C');
$pdf->Cell(35,$header_height,'Unit Price','1','0','C');
$pdf->Cell(40,$header_height,'Extended Amount','1','0','C');
$pdf->Cell(40,$header_height,'Supplier/Company Name','LTB','1','C');
$pdf->Line($column_3,$Y,$column_3,$Y+$header_height);
$pdf->SetFont('Courier','','8');
foreach ($data as $index => $datum) {

    foreach ($datum['items'] as $index => $item) {
        $pdf->Cell('86',$body_row_height,strstr($item,"[",true),'1','0','C');
        $pdf->Cell('35',$body_row_height,'','1','0','C');
        $start = '[';
        $end = ']';
        $pattern = sprintf(
            '/%s(.+?)%s/ims',
            preg_quote($start, '/'), preg_quote($end, '/')
        );
        if (preg_match($pattern, $item, $matches)) {
            list(, $match) = $matches;
        }
        $pdf->Cell('35',$body_row_height,$match,'1','0','C');
        $pdf->Cell('35',$body_row_height,"Php: ".substr($item,strpos($item,"|") + 1),'1','1','C');

    }

}
$pdf->SetXY(201,72);
foreach ($data as $index => $datum) {
        $pdf->SetXY(201,$pdf->GetY());
        $pdf->MultiCell('40',$body_row_height * count($datum['items']),"Php: ".$datum['total_amount'],'1','C');

}
$pdf->SetXY(241,72);
foreach ($data as $index => $datum) {
    $pdf->SetXY(241,$pdf->GetY());
    $pdf->MultiCell('46',$body_row_height * count($datum['items']),$datum['company_name'],'1','C');

}
$pdf->Ln(10);
$pdf->SetFont('Courier','B','9');
$pdf->Cell(11,$body_row_height,'WHEREAS,');
$pdf->SetFont('Courier','','9');
$pdf->Cell('',$body_row_height,'  the items to be procured are included in the Annual Procurement Plan for the year 2020 of the Bulacan State University with an Approved','','1','C');
$pdf->Cell(52,$body_row_height - 5,'Budget for the Contract of ','','0');
$pdf->SetFont('Courier','B','9');
$pdf->Cell($pdf->GetStringWidth(numberTowords($price)),$body_row_height - 5,numberTowords($price).' PESOS (Php '.$price.'.00).');
$pdf->Ln(5);
$pdf->Cell($pdf->GetStringWidth('WHEREAS, Section 10 '),$body_row_height,'WHEREAS, Section 10');
$pdf->SetFont('Courier','','9');
$pdf->Cell($pdf->GetStringWidth('of'),$body_row_height,'of','','0');
$pdf->SetFont('Courier','B','9');
$pdf->Cell($pdf->GetStringWidth(' Republic Act No. 9184'),$body_row_height,' Republic Act No. 9184');
$pdf->SetFont('Courier','','9');
$pdf->Cell('',$body_row_height,' entitled "Government Procurement Reform Act" provides that all procurement shall be done through','','1');
$pdf->Cell('',$body_row_height -6,'competitive bidding, except as provided for in Article XVI (Alternative Methods of Procurement) of the act, namely: Limited Source Bidding, Direct','','1');
$pdf->Cell('',$body_row_height,'Contracting, Repeat Order, Shopping and Negotiated Procurement.');
$pdf->Ln(10);
$pdf->SetFont('Courier','B','9');
$pdf->Cell($pdf->GetStringWidth('WHEREAS, Section 53.9'),$body_row_height,'WHEREAS, Section 53.9','','0');
$pdf->SetFont('Courier','','9');
$pdf->Cell($pdf->GetStringWidth(' of the '),$body_row_height,' of the ','','0');
$pdf->SetFont('Courier','B','9');
$pdf->Cell($pdf->GetStringWidth('2016 Revised Implementing Rules and Regulations (IRR)'),$body_row_height,'2016 Revised Implementing Rules and Regulations (IRR)','','0');
$pdf->SetFont('Courier','','9');
$pdf->Cell('',$body_row_height,' of the said act provides that "where the procurement','','1');
$pdf->Cell('',$body_row_height-6,'does not fall under Shopping in Section 52 of the IRR and the amount involved does not exceed the thresholds prescribed in Annex "H" of the IRR:"','','1');
$pdf->SetX(90);
$pdf->SetFont('Courier','B','9');
$pdf->Cell('',$body_row_height+9,'THRESHOLDS FOR SMALL VALUE PROCUREMENT:','','1');
$pdf->SetFont('Courier','','9');
$pdf->SetX(100);
$pdf->Cell($pdf->GetStringWidth('2.'),$body_row_height-15,'2.');
$pdf->SetFont('Courier','B','9');
$pdf->Cell($pdf->GetStringWidth('Small Value Procurement'),$body_row_height-15,'Small Value Procurement','');
$pdf->SetFont('Courier','','9');
$pdf->Cell('',$body_row_height-15,' shall not exceed the following:','','1');
$pdf->SetX(120);
$pdf->Cell('',$body_row_height+9,' a.) For NGAs, GOCCs, GFIs, and SUCs, One Million Pesos (P 1, 000,000.00)');
$pdf->Ln(5);
$pdf->SetFont('Courier','B','9');
$pdf->Cell($pdf->GetStringWidth('WHEREAS, '),$body_row_height+6,'WHEREAS, ');
$pdf->SetFont('Courier','','9');
$pdf->Cell('',$body_row_height+6,'the BAC decided to procure the said items on a lot basis;');
$pdf->Ln(7);
$pdf->SetFont('Courier','B','9');
$pdf->Cell($pdf->GetStringWidth('WHEREAS, '.count(count(explode(",",$_GET['c_id']))).' ('.numberTowords(count(explode(",",$_GET['c_id']))).') suppliers'),$body_row_height,'WHEREAS, '.numberTowords(count(explode(",",$_GET['c_id']))).' ('.count(explode(",",$_GET['c_id'])).') suppliers');
$pdf->SetFont('Courier','','9');
$pdf->Cell('',$body_row_height,' secured Request for Quotations and submitted their respective proposals to the Bids and Awards Committee, to wit: ','','1');
$pdf->SetFont('Courier','B','9');
$pdf->SetTextColor('255','0','0');
$pdf->Cell('',$body_row_height-5,'(list of suppliers)');
$pdf->Ln(5);
$pdf->SetTextColor('0','0','0');
$pdf->SetFont('Courier','B','9');
$pdf->Cell($pdf->GetStringWidth('WHEREAS, (winning bidder).'),$body_row_height-3,'WHEREAS, (winning bidder).');
$pdf->SetFont('Courier','','9');
$pdf->Cell($pdf->GetStringWidth(' submitted the'),$body_row_height-3,' submitted the ');
$pdf->SetFont('Courier','B','9');
$pdf->Cell($pdf->GetStringWidth(' lowest obtainable proposal '),$body_row_height-3,' lowest obtainable proposal ');
$pdf->SetFont('Courier','','9');
$pdf->Cell('',$body_row_height-3,'items to be procured;');
$pdf->SetFont('Courier','B','9');
$pdf->Ln(5);
$pdf->Cell($pdf->GetStringWidth('NOW THEREFORE, '),$body_row_height-3,'NOW THEREFORE, ');
$pdf->SetFont('Courier','','9');
$pdf->Cell('',$body_row_height-3,'after meticulous perusal, validation and verification, we, the members of Bids and Awards Committee hereby certify that the','','1');
$pdf->SetFont('Courier','','8.8');
$pdf->Cell('',$body_row_height-2,'foregoing abstract of canvass is true and correct and that we have reviewed and evaluated the quotation and hereby recommend to the University President','','1');
$pdf->SetFont('Courier','B','9');
$pdf->Cell($pdf->GetStringWidth('to procure '),$body_row_height-2,'to procure ');
$pdf->SetFont('Courier','','');
$pdf->Cell($pdf->GetStringWidth(' the items from'),$body_row_height-2,'the items from ');
$pdf->SetFont('Courier','B','9');
$pdf->Cell($pdf->GetStringWidth('(WINNING BIDDER). '),$body_row_height-2,'(WINNING BIDDER). ');
$pdf->SetFont('Courier','','9');
$pdf->Cell($pdf->GetStringWidth('amounting to '),$body_row_height-2,'amounting to ');
$pdf->SetFont('Courier','B','9');
$pdf->Cell('',$body_row_height-2,'WINNING BID AMOUNT (bid amount);');
$pdf->Ln(5);
$pdf->Cell($pdf->GetStringWidth('RESOLVED, '),$body_row_height,'RESOLVED, ');
$pdf->SetFont('Courier','','9');
$pdf->Cell($pdf->GetStringWidth('at the Bulacan State University, City of Malolos, Bulacan, this '),$body_row_height,'at the Bulacan State University, City of Malolos, Bulacan, this ');
$pdf->SetTextColor('255','0','0');
$pdf->SetFont('Courier','B','9');
$pdf->Cell('',$body_row_height,date('d').'th of '.date('M'). ' '.date('Y'));
$pdf->Ln(7);
$pdf->SetFont('Courier','B','9');
$pdf->SetTextColor('','0','0');
$pdf->SetXY(50,$pdf->GetY());
$pdf->Cell($pdf->GetStringWidth('JOSEPH ROY F. CELESTINO')+7,$body_row_height+7,'JOSEPH ROY F. CELESTINO','1','','C');
$pdf->Cell($pdf->GetStringWidth('Dr. DOLLY P. MAROMA')+7,$body_row_height+7,'Dr. DOLLY P. MAROMA','1','','C');
$pdf->Cell($pdf->GetStringWidth('Dr. MARVIN R. TULLAO')+7,$body_row_height+7,'Dr. MARVIN R. TULLAO','1','','C');
$pdf->Cell($pdf->GetStringWidth('_______________________')+7,$body_row_height+7,'_______________________','1','','C');
$pdf->SetXY(68,$pdf->GetY()+5);
$pdf->SetFont('Courier','','8');
$pdf->Cell('',11,'Chair');
$pdf->SetXY(108,$pdf->GetY());
$pdf->Cell('',11,'Vice Chair');
$pdf->SetXY(152,$pdf->GetY());
$pdf->Cell('',11,'Vice Chair');
$pdf->SetXY(208,$pdf->GetY());
$pdf->Cell('',11,'End User');
$pdf->SetX($margin_left+49);
$pdf->SetY($pdf->GetY()+9);
$pdf->SetFont('Courier','B','9');
$pdf->SetX(78);
$pdf->Cell($pdf->GetStringWidth('YOLANDA ROBERTO')+7,$body_row_height+7,'YOLANDA ROBERTO','1','','C');
$pdf->Cell($pdf->GetStringWidth('Engr. NOEMI P. REYES')+7,$body_row_height+7,'Engr. NOEMI P. REYES','1','','C');
$pdf->Cell($pdf->GetStringWidth('Engr. DONALD M. LAPIGUERA')+7,$body_row_height+7,'Engr. DONALD M. LAPIGUERA','1','','C');
$pdf->SetFont('Courier','','8');
$pdf->SetXY(92,$pdf->GetY()+4);
$pdf->Cell($pdf->GetStringWidth('Member'),$body_row_height+7,'Member','','','C');
$pdf->SetX(132);
$pdf->Cell($pdf->GetStringWidth('Member'),$body_row_height+7,'Member','','','C');
$pdf->SetX(180);
$pdf->Cell($pdf->GetStringWidth('Member'),$body_row_height+7,'Member','','1','C');
$pdf->SetY($pdf->GetY());
$pdf->Cell('',$body_row_height+24,'','1','1','C');
$pdf->SetY($pdf->GetY()-25);
$pdf->Cell('',$body_row_height,'APPROVED:','','1','C');
$pdf->SetY($pdf->GetY());
$pdf->SetFont('Courier','B','9');
$pdf->Cell('',$body_row_height,'Prof. CECILIA NAVASERO GASCON, Ph. D.','','1','C');
$pdf->SetFont('Courier','','8');
$pdf->Cell('',$body_row_height-5,'President','','1','C');
$pdf->Output();
function numberTowords($num)
{

    $ones = array(
        0 =>"ZERO",
        1 => "ONE",
        2 => "TWO",
        3 => "THREE",
        4 => "FOUR",
        5 => "FIVE",
        6 => "SIX",
        7 => "SEVEN",
        8 => "EIGHT",
        9 => "NINE",
        10 => "TEN",
        11 => "ELEVEN",
        12 => "TWELVE",
        13 => "THIRTEEN",
        14 => "FOURTEEN",
        15 => "FIFTEEN",
        16 => "SIXTEEN",
        17 => "SEVENTEEN",
        18 => "EIGHTEEN",
        19 => "NINETEEN",
        "014" => "FOURTEEN"
    );
    $tens = array(
        0 => "ZERO",
        1 => "TEN",
        2 => "TWENTY",
        3 => "THIRTY",
        4 => "FORTY",
        5 => "FIFTY",
        6 => "SIXTY",
        7 => "SEVENTY",
        8 => "EIGHTY",
        9 => "NINETY"
    );
    $hundreds = array(
        "HUNDRED",
        "THOUSAND",
        "MILLION",
        "BILLION",
        "TRILLION",
        "QUARDRILLION"
    ); /*limit t quadrillion */
    $num = number_format($num,2,".",",");
    $num_arr = explode(".",$num);
    $wholenum = $num_arr[0];
    $decnum = $num_arr[1];
    $whole_arr = array_reverse(explode(",",$wholenum));
    krsort($whole_arr,1);
    $rettxt = "";
    foreach($whole_arr as $key => $i){

        while(substr($i,0,1)=="0")
            $i=substr($i,1,5);
        if($i < 20){
            /* echo "getting:".$i; */
            $rettxt .= $ones[$i];
        }elseif($i < 100){
            if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)];
            if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)];
        }else{
            if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0];
            if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)];
            if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)];
        }
        if($key > 0){
            $rettxt .= " ".$hundreds[$key]." ";
        }
    }
    if($decnum > 0){
        $rettxt .= " and ";
        if($decnum < 20){
            $rettxt .= $ones[$decnum];
        }elseif($decnum < 100){
            $rettxt .= $tens[substr($decnum,0,1)];
            $rettxt .= " ".$ones[substr($decnum,1,1)];
        }
    }
    return $rettxt;
}