<?php include('header.php'); ?>
<?php include('session.php'); ?>
<div class="span12">
	<a class = "btn btn-success" onclick="window.print();" style="font-size:20px";><i class="icon-print icon-large"></i> Print</a>
	<a class = "btn btn-inverse" href="inspection-main.php" style="font-size:20px";>Back</a>
</div>
<?php
	$iar_No = $_GET['iar_No'];
	$POno = $_GET['POno'];
	
	$qry = mysql_query("SELECT * FROM tbl_iar JOIN tbl_iar_items USING (POno) WHERE POno = '$POno'")or die(mysql_error());	
	//$qry = mysql_query("SELECT * FROM tbl_pr_items WHERE ItemDescription = '$item' AND Year = '$year' GROUP BY ItemDescription")or die(mysql_error());
	while($row = mysql_fetch_array($qry)) {
		$iar_No = $row['iar_No'];
		$iar_Date = $row['iar_Date'];
		$Year = $row['Year'];
		$supplier = $row['supplier'];
		$POno = $row['POno'];
		$po_Date = $row['po_Date'];
		$rod = $row['rod'];
		$rcc = $row['rcc'];
	}
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
								<th colspan="2" style="text-align:left;">Entity Name: <u><?php echo "Entity name here..."; ?></u></th>
								<?php
									//$Today=$dateC;
									//$dateC=strtoupper(date('d F Y',strtotime($Today)));
								?>
								<th colspan="2" style="text-align:left;">Fund Cluster: <u><?php echo "Fund Cluster here..."; ?></u></th>
							</tr>
							</table><br/>
							<table cellpadding="0" id="" cellspacing="0" border="1" class="display" style="background-color: #fff; width:100%;">
								<thead>
									<tr>
										<th colspan="2" style="text-align:left;">Supplier: <?php echo $supplier; ?></th>
										<th colspan="2" style="text-align:left;">IAR No.: <?php echo $iar_No; ?></th>
									</tr>
									<tr>
										<th colspan="2" style="text-align:left;">PO No./Date: <?php echo $POno.' / '.$po_Date ; ?></th>
										<th colspan="2" style="text-align:left;">Date: <?php echo $iar_Date; ?></th>
									</tr>
									<tr>
										<th colspan="2" style="text-align:left;">Requisitioning Office/Dept.: <?php echo $rod; ?></th>
										<th colspan="2" style="text-align:left;">Invoice No.: </th>
									</tr>
									<tr>
										<th colspan="2" style="text-align:left;">Responsibility Center Code: <?php echo $rcc; ?></th>
										<th colspan="2" style="text-align:left;">Date: </th>
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
										$qry1 = mysql_query("SELECT *, SUM(Quantity) as Quantity FROM  tbl_iar_items WHERE POno = '$POno' GROUP BY ItemDescription")or die(mysql_error());	
										while($row = mysql_fetch_array($qry1)) {
											$SPno = $row['SPno'];
											$Unit = $row['Unit'];
											$ItemDescription = $row['ItemDescription'];
											$Quantity = $row['Quantity'];
									?>
									<tr>
										<td style="text-align:center;"><?php echo $SPno; ?></td>
										<td style="text-align:center;"><?php echo $ItemDescription; ?></td>
										<td style="text-align:center;"><?php echo $Unit; ?></td>
										<td style="text-align:center;"><?php echo $Quantity; ?></td>
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