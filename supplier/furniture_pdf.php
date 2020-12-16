<?php
session_start();
include('session.php');
include('../dbcon.php');
require('../fpdf/fpdf.php');

$code = $_GET['ecode'];
$sql = $conn->query("select * from equipment_code where id = ".$code);
$data = $sql->fetch_assoc();


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
$pdf->Cell("","5","INVENTORY OF ".$data['description']." (".$data['code'].")","","1","C");
$pdf->Cell("",5,"As of ".date("F d, Y"),"","1","C");
$pdf->Ln(10);
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(20,5,"For which","","","C");
$pdf->SetX($pdf->GetX()+10);
$pdf->Cell(20,20,"( Name of Accountable Officer )","","","C");
$pdf->SetX($pdf->GetX()+20);
$pdf->MultiCell(40,6.5,"              President               ( Official Designation )","","C","");

$pdf->SetXY($pdf->GetX()+110,$pdf->GetY()-13);
$pdf->MultiCell(40,6.5,"Bulacan State University    (Agency/Office)","","C","");

$pdf->SetXY($pdf->GetX()+160,$pdf->GetY()-13);
$pdf->MultiCell(120,6.5,"                  is accountable, having assumed such accountability on                             ( Date of As   sumption)",'',"C","");


$pdf->SetLeftMargin(5);
$pdf->Ln(10);
$pdf->Cell(20,12,"ARTICLE","1","","C");
$pdf->Cell(60,12,"D E S C R I P T I O N","1","","C");
$pdf->MultiCell(15,"6","  Date   Acquired","1","C","");
$pdf->SetXY($pdf->GetX()+95,$pdf->GetY()-12);
$pdf->MultiCell(15,"6","Property Number","1","C","");
$pdf->SetXY($pdf->GetX()+110,$pdf->GetY()-12);
$pdf->MultiCell(22,"6","Unit of Measurement","1","C","");
$pdf->SetXY($pdf->GetX()+132,$pdf->GetY()-12);
$pdf->MultiCell(18,"12","Unit Value","1","C","");
$pdf->SetXY($pdf->GetX()+150,$pdf->GetY()-12);
$pdf->Cell("34","6","Balance Per Card","1","","C");
$pdf->Cell("34","6","On Hand Per Cost","1","","C");
$pdf->Cell("27","6","ShortageOverage","1","","C");  //wrong spelling part
$pdf->Cell("20","12","Remarks","1","","C");
$pdf->Cell("20","12","Fund Source","1","1","C");

//quantity and value header
$pdf->SetXY($pdf->GetX()+150,$pdf->GetY()-6);
$pdf->Cell((30/2)/2,"6","Qty","1","","C");
$pdf->Cell((30/2) + 11.5,6,"Value","1","","C");
$pdf->Cell((30/2)/2,"6","Qty","1","","C");
$pdf->Cell((30/2) + 11.5,6,"Value","1","","C");
$pdf->Cell((27/2)/2,"6","Qty","1","","C");
$pdf->Cell((27/2) + (27/2)/2,6,"Value","1","1","C");
$d = 0;
$arr = '';



$sql = $conn->query("select * from item_owner where equipment_code_id = ".$_GET['ecode']);
while($data = $sql->fetch_assoc()) {


$articlez = $conn->query("select * from tbl_item_details where itemdetailDesc = '".$data['item_id']."'");
$data_art = $articlez->fetch_assoc();
//array data
    if (strpos($data['par_owner_id'], ',') !== false) {
        //multiple owner
        $data_emp = explode(",",$data['par_owner_id']);
        foreach ($data_emp as $index) {
            $sql_emp = $conn->query("select * from tbl_supplier_employee where id = ".$index);
            $data_employee = $sql_emp->fetch_assoc();
            $arr .= $data_employee['first_name'] . ' '. $data_employee['last_name']. ' ';
        }
    }else{
        //single owner
        $sql_emp = $conn->query("select * from tbl_supplier_employee where id = ".$data['par_owner_id']);
        $data_employee = $sql_emp->fetch_assoc();
        $arr = $data_employee['first_name'] . ' '. $data_employee['last_name'];
    }
    $get_unit_val = $conn->query("select * from tbl_par_items where item_description = '".$data['item_id']."' limit 1");
    $gval = $get_unit_val->fetch_assoc();
    $article = $data_art['article'];
    $description = $data['item_id'];
    $date_acquired = $data['date_acquired'];
    $property_number = '2020-11-00'.$d;
    $unit_of_measurement = $data_art['UnitOfMeasurement'];
    $unit_value = number_format($gval['unit_cost'],2);
    $qty_balance_per_card = $data['quantity'];
    $value_balance_per_card = number_format($gval['unit_cost'] * $data['quantity'],2);
    $qty_on_hand_per_cost = $data['quantity'];
    $value_on_hand_per_cost = number_format($gval['unit_cost'] * $data['quantity'],2);
    $qty_s = "";
    $value_s = "";
    $remarks = $arr;
    $fund_source = "";


    $col = 0;
    $col1 = 0;
    $data = $pdf->GetStringWidth($article);
    if ($data > 28.762325) {
        $pdf->MultiCell("20", 12 / 3, $article, "1", "C");
        $col = 1;
    } else if ($data > 20) {
        $pdf->MultiCell("20", 6, $article, "1", "C");
        $col = 1;
    } else {
        $pdf->Cell(20, 12, $article, "1", "", "C");
        $col = 0;
    }


//description row

    $desc_w = $pdf->GetStringWidth($description);
    if ($col == 1) {
        $pdf->SetXY($pdf->GetX() + 20, $pdf->GetY() - 12);
        if ($desc_w > 60) {

            $pdf->MultiCell("60", "6", $description, "1", "C");
            $col1 = 1;
        } else {
            $pdf->Cell("60", "12", $description, "1", "", "C");
            $col1 = 0;
        }
    } else {
        if ($desc_w > 60) {
            $pdf->MultiCell("60", "6", $description, "1", "C");
            $col1 = 1;
        } else {
            $pdf->Cell("60", "12", $description, "1", "", "C");
            $col1 = 0;
        }

    }
//date acquired col
    $pdf->SetFont('Helvetica', '', 7);
    if ($col1 == 1) {
        $pdf->SetXY($pdf->GetX() + 80, $pdf->GetY() - 12);
        $pdf->Cell("15", "12", $date_acquired, "1", "", "C");
    } else {
        $pdf->Cell("15", "12", $date_acquired, "1", "", "C");
    }
    $pdf->SetFont('Helvetica', '', 9);


//property number row
    $pdf->SetFont('Helvetica', '', 7);
    $pdf->Cell("15", "12", $property_number, "1", '', 'C');
    $pdf->SetFont('Helvetica', '', 9);
    $pdf->Cell("22", "12", $unit_of_measurement, "1", '', 'C');
    $pdf->Cell("18", "12", $unit_value, "1", '', 'C');
    $pdf->Cell((30 / 2) / 2, "12", $qty_balance_per_card, "1", '', 'C');
    $pdf->Cell((30 / 2) + 11.5, "12", $value_balance_per_card, "1", '', 'C');
    $pdf->Cell((30 / 2) / 2, "12", $qty_on_hand_per_cost, "1", '', 'C');
    $pdf->Cell((30 / 2) + 11.5, "12", $value_on_hand_per_cost, "1", '', 'C');
    $pdf->Cell((27 / 2) / 2, "12", $qty_s, "1", '', 'C');
    $pdf->Cell((27 / 2) + (27 / 2) / 2, "12", $qty_s, "1", '', 'C');


    $len = $pdf->GetStringWidth($remarks);
    $flag = 0;
    if ($len > 34.2393) {
        $pdf->MultiCell("20", 12 / 3, $remarks, "1", "C");
        $flag = 1;
    } else if ($len > 17.2974) {
        $pdf->MultiCell("20", 12 / 2, $remarks, "1", "C");
        $flag = 1;
    } else {
        $pdf->Cell("20", 12, $remarks, "1", "", "C");
        $flag = 0;
    }
    if ($flag == 1) {
        //multicell active
        $pdf->SetXY($pdf->GetX() + 265, $pdf->GetY() - 12);
        $pdf->Cell("20", "12", $fund_source, "1", "1", "C");
    } else {
        $pdf->Cell("20", "12", $fund_source, "1", "1", "C");
    }


//reset the indicator on multicell or cell next to each row
    $col = 0;
    $col1 = 0;
    $flag = 0;
    $d++;
}

//end of data array();

$pdf->Output();