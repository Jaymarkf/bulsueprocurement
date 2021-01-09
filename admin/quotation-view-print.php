<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php include('session.php'); ?>
<div class="span12">
	<a class = "btn btn-success" onclick="window.print();" style="font-size:20px";><i class="icon-print icon-large"></i> Print</a>
	<a class = "btn btn-inverse" href="quotation.php" style="font-size:20px";>Back</a>
</div>
<?php
	$item = $_GET['item'];
	$company = $_GET['company'];
	$year = $_GET['year'];
					
	$qry = mysqli_query($conn,"SELECT * FROM tbl_quotation WHERE ItemDescription = '$item' AND Company = '$company' AND Year = '$year'");
	while($row = mysqli_fetch_array($qry)) {
		$item = $row['itemDescription'];
		$brand = $row['Brand_Model'];
		$qty_unit = $row['Quantity']+' '+$row['unitOfMeasurement'];
		$unitPrice = $row['unitPrice'];
		$totalPrice = $row['extPrice'];
	}
?>
<body style="font-size:12pt;">
<div class="container-fluid">
    <div class="row-fluid">
		<div class="span12" id="content">
			<div class="row-fluid">
				<div class="block-content collapse in" style="background-color: #fff;">
					<div class="span12" id="content">
						<p style="text-align:center;">
							<img src="../images/logo.png"  width="75px"><br />
							Republic of the Philippines<br />
							BULACAN STATE UNIVERSITY<br />
							City of Malolos, Bulacan
						</p>
						
						<div class="span12">
							<div class="pull-left span8">
								<h6>
									Standard For Number: SF-GOOD-60<br/>
									Revised on: May 24, 2004<br/>
									Standard Form Title: Request for Price Quotation
								</h6>
							</div>
							
							<div style="float:right;">Date: 05-August-2018</div>
						</div>

						<div class="span12">
							<h6>
								Quotation No.: <u>18-232-05</u><br/>
								Purchase Request No.: <u>G-03-131-18</u><br/>
								Purpose: <u>FOR Sarmiento Campus USE</u><br/>
								<p class="span12" id="content" style="text-indent: 50px; text-align:justify;">ABC: <u>704,000.00</u></p>
							</h6>
							<p class="span12" id="content" style="text-indent: 50px; text-align:justify;">Please quote your lowest price on the item/s listed below, subject to the General Conditions on the last page.
							    <b><i>stating the shortest time of delivery and submit your quotation duly signed by your representative not later than 3 days upon receipt of this quotation.</i></b>
							</p>
							<p class="span12" id="content" style="text-indent: 50px; text-align:justify;">
							    <b><i>Please indicate the brand & model on the column provided. <u>Brochure/Literature</u> is</i></b>
							</p>
							<p class="span12" id="content" style="text-indent: 50px; text-align:justify;">
							    <b><i>a requirement.  Specify also the warranty period (for equipment).  Please attached certification</i></b>
							</p>
							<p class="span12" id="content" style="text-indent: 50px; text-align:justify;">
							    <b><i>of distributorship/dealership from the manufacturers (for equipment)</i></b> <span style="float:right;"><u>ISABELITA C. BENEDICTORS</u>
							</p>
							
						</div>
						
						<br/>
						
						
						<div style="display: block;">
							<table cellpadding="0" id="" cellspacing="0" border="1" class="display" cellspacing="0" style="background-color: #fff; width:100%;">
								<thead>
									<tr>
										<th width="10%" style="text-align:center;">Item No.</th>
										<th width="50%" style="text-align:center;">ITEM & DESCRIPTION</th>
										<th width="25%" style="text-align:center;">BRAND & MODEL</th>
										<th width="10%" style="text-align:center;">QTY./UNIT</th>
										<th width="10%" style="text-align:center;">UNIT PRICE</th>
										<th width="10%" style="text-align:center;">TOTAL PRICE</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<!-- <td><?php echo $row1['StockPropertyNo']; ?></td> -->
										<td></td>
										<td><?php echo $item; ?></td>
										<td><?php echo $brand; ?></td>
										<td><?php echo $qty_unit; ?></td>
										<td><?php echo $unitPrice; ?></td>
										<td><?php echo $totalPrice; ?></td>
									</tr>
									<tr style="border: none;">
										<td colspan="2">
											I.  Attachment:<br/>
											a.) Brochure with Specification of the product<br/>
											<b>b.) Please Attach Philgephs Registration</b><br/>
											II. Warranty:<br/>
											a.) Supplies & Materials = 3 months<br/>
											b.) Equipment = 1 year<br/>
											c.) Outright replacement if found defective<br/>
											III. Delivery period from receipt of Purchase Order: <b><u>7 days</u><b><br/>
											*Subject to government creditable/with holding tax<br/>
											*All items must conform with PNS/Global Mark/ICC standard<br/>
											*Sub standard items shall not be accepted<br/>
											After having carefully read and accepted your General Conditions, I/We quote you on the item at prices noted above.
										</td>
										<td colspan="4">
											c.) Please Attach the ff:<br/>
											<b>*DTI/SEC Registration</b><br/>
											<b>*BIR (Certificate of Registration; Authority to Print</b><br/>
											<b>*Mayor's/Business Permit</b><br/>
											<b>*PhilGEPS Registration</b><br/>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						
						<div style="display: block;">
							<br/>
							<br/>
							<p class="span12" id="content" style="text-align:justify;"><b>VAT Registered: ___________________________________</b><span style="float: right;">Accepts check on government terms: _______________</span></p>
							<p class="span12" id="content" style="text-align:justify;"><b>NON-VAT Registered: ___________________________________</b></p>
							<p class="span12" id="content" style="text-align:justify;"><b>Company Name: ___________________________________</b><span style="float: right;">Printed Name / Signature: ___________________________________</span></p>
							<p class="span12" id="content" style="text-align:justify;"><b>Address: ___________________________________</b><span style="float: right;">Date: _______________</span></p>
							<p class="span12" id="content" style="text-align:justify;"><b>Tel. No./Cellphone No.: ___________________________________</b></p>
							<p class="span12" id="content" style="text-align:justify;"><b>Email Address: ___________________________________</b><span style="float: right;">Canvass By: _______________</span></p>
							<p class="span12" id="content" style="text-align:justify;">BulSU-OP-PU-03F3<br/>Revision: 0</p>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>