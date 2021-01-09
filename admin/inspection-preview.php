<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php include('session.php'); ?>
<div class="span12">
	<a class = "btn btn-success" onclick="window.print();" style="font-size:20px";><i class="icon-print icon-large"></i> Print</a>
	<a class = "btn btn-inverse" href="inspection-main.php" style="font-size:20px";>Back</a>
</div>
<?php
//	$iar_No = $_GET['iar_No'];
//	$POno = $_GET['POno'];
//	$qry = mysqli_query($conn,"SELECT * FROM tbl_iar JOIN tbl_iar_items USING (POno) WHERE POno = '$POno'");
//	//$qry = mysqli_query($conn,"SELECT * FROM tbl_pr_items WHERE ItemDescription = '$item' AND Year = '$year' GROUP BY ItemDescription");
//	while($row = mysqli_fetch_array($qry)) {
//		$iar_No = $row['iar_No'];
//		$iar_Date = $row['iar_Date'];
//		$Year = $row['Year'];
//		$supplier = $row['supplier'];
//		$POno = $row['POno'];
//		$po_Date = $row['po_Date'];
//		$rod = $row['rod'];
//		$rcc = $row['rcc'];
//	}
$id = $_GET['iar_id'];
$qry = $conn->query("select DATE(po.date_generate) as pd,iar.iar_date as i, com.name,iar.*,po.* from tbl_iar_items iar
                            inner join tbl_po po on iar.poID = po.id
                            inner join tbl_company com on po.company_id = com.id where iar.id = '$id'");
$data = $qry->fetch_assoc();
//echo '<pre>';
//print_r($data);
//echo '</pre>';
//die()
?>
<body style="font-size:12pt;">
<div class="container-fluid">
    <div class="row-fluid">
		<div class="span12" id="content">
			<div class="row-fluid">
				<div class="block-content collapse in" style="background-color: #fff;">
					<div class="span12" id="content">
						<p><i><b>Appendix 62</b></i></p>						
						<p colspan="6"><h3 style="text-align: center;">
							INSPECTION AND ACCEPTANCE REPORT</h3></p>
						<br/>
						
						<div style="display: block; page-break-after: always;">
						<table cellpadding="0" id="" cellspacing="0" border="0" class="display" style="background-color: #fff; width:100%;">
							<tr>
								<th colspan="2" style="text-align:left;">Entity Name: <u>________________________________</u></th>


								<th colspan="2" style="text-align:left;">Fund Cluster: <u>________________________________</u></th>
							</tr>
							</table><br/>
							<table cellpadding="0" id="" cellspacing="0" border="1" class="display" style="background-color: #fff; width:100%;">
								<thead>
									<tr>
										<th colspan="2" style="text-align:left;">Supplier: <?=$data['name']?></th>
										<th colspan="2" style="text-align:left;">IAR No.: <?=$data['iar_no']?></th>
									</tr>
									<tr>
                                        <?php

                                        ?>
										<th colspan="2" style="text-align:left;">PO No / Date: (<?php echo $data['poID'].' / '.$data['pd']; ?>)</th>
										<th colspan="2" style="text-align:left;">Date: <?=$data['i']?></th>
									</tr>
									<tr>
										<th colspan="2" style="text-align:left;">Requisitioning Office/Dept.: <?=$data['requisition_office']?></th>
										<th colspan="2" style="text-align:left;">Invoice No.: </th>
									</tr>
									<tr>
										<th colspan="2" style="text-align:left;">Responsibility Center Code: <?=$data['responsibility_code_center']?></th>

									</tr>
								</thead>
								<tbody>
									<tr>
										<td style="width:20%; text-align:center; background-color:lightgrey;"><i><b>Stock/Property No.</b></i></td>
										<td style="width:40%; text-align:center; background-color:lightgrey;"><i><b>Description</b></i></td>
										<td style="width:20%; text-align:center; background-color:lightgrey;"><i><b>Unit</b></i></td>
										<td style="width:20%; text-align:center; background-color:lightgrey;"><i><b>Quantity</b></i></td>
									</tr>
                                    <?php
                                    $dd = "select * from tbl_iar_items iar
                                           inner join tbl_po po on iar.poID = po.id
                                           inner join tbl_generate_bac_report bac on po.bac_id = bac.id
                                           where iar.id = ".$_GET['iar_id'];
                                        $ff = $conn->query($dd);
                                        $ex = $ff->fetch_assoc();
                                    //get item list
                                    $items = explode(",",$ex['item_details_id_array']);

                                    foreach ($items as $index => $item) {

                                    $fa = "select d.*,de.* from tbl_rfq_item_details d inner join tbl_item_details de on d.item_and_specification = de.itemdetailDesc where d.id = '$item'";
                                    $aa = $conn->query($fa);
                                    $dat = $aa->fetch_array();
                                    ?>
									<tr>
										<td style="text-align:center;"><?=$index?></td>
										<td style="text-align:center;"><?=$dat['item_and_specification']?></td>
										<td style="text-align:center;"><?=$dat['UnitOfMeasurement']?></td>
										<td style="text-align:center;"><?=$dat['quantity_and_unit']?></td>
									</tr>
                                    <?php
                                    }
                                    ?>
								</tbody>
								<thead>
									<tr>
										<th colspan="2" style="text-align:center; background-color:lightgrey;">INSPECTION</th>
										<th colspan="2" style="text-align:center; background-color:lightgrey;">ACCEPTANCE</th>
									</tr>
									<tr>
										<th colspan="2" style="text-align:left;">
											<br/>
											<p><b>Date Inspected: ________________________</b></p>
											<p style="text-indent: 2em;"><b><span style='font-size:20px;'>&#9634;</span> Inspected, verified and found in order as to quantity and inspections.</b></p>
											<p>.</p>
										</th>
										<th colspan="2" style="text-align:left;">
											<br/>
											<p><b>Date Received: ________________________</b><br/></p>
											<p style="text-indent: 2em;"><b><span style='font-size:20px;'>&#9634;</span> Complete</b></p>
											<p style="text-indent: 2em;"><b><span style='font-size:20px;'>&#9634;</span> Partial</b></p>
										</th>
									</tr>
									<tr>
										<th colspan="2" style="text-align:center;">
											<br/><br/>
											<p>_________________________________</p>
											<p>Inspection Officer/Inspection Committee</p>
										</th>
										<th colspan="2" style="text-align:center;">
											<br/><br/>
											<p>_________________________________</p>
											<p>Supply and/or Property Custodian</p>
										</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>