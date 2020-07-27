<?php
	include('app_pr_approved-database.php');

	$PR = $_GET['pr'];
	
	$database = new Database();
	$result = $database->runQuery("SELECT Unit,ItemDescription,Quantity,UnitCost,TotalCost FROM tbl_pr_items WHERE PRno= '$PR'");
	
	$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
	FROM `INFORMATION_SCHEMA`.`COLUMNS` 
	WHERE `TABLE_SCHEMA`='bulsuepronew' 
	AND `TABLE_NAME`='tbl_pr_items'
	and `COLUMN_NAME` in ('Unit','ItemDescription','Quantity','UnitCost','TotalCost')");

	require('fpdf/fpdf.php');
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',7);
	
	foreach($header as $heading) {
		foreach($heading as $column_heading)
			$pdf->Cell(38,6,$column_heading,1);
	}
	foreach($result as $row) {
		$pdf->Ln();
		foreach($row as $column)
			$pdf->Cell(38,6,$column,1);
	}
	$pdf->Output();
?>