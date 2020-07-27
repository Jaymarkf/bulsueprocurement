<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php
	$item = $_GET['item'];
					
	//$qry = mysql_query("SELECT *, sum(Quantity) as Quantity FROM tbl_pr_items WHERE ItemDescription = '$item' GROUP BY ItemDescription")or die(mysql_error());
	$qry = mysql_query("SELECT *, sum(Quantity) as Quantity FROM tbl_quotation WHERE Company = '$item' GROUP BY Company")or die(mysql_error());
	while($row = mysql_fetch_array($qry)) {
		//$row = mysql_fetch_array($qry)
	$date = $row['Q_date'];
	$year = $row['Year'];
	$item = $row['itemDescription'];
	$Brand_Model = $row['Brand_Model'];
	$quantity = $row['Quantity'];
	$unit = $row['unitOfMeasurement'];
	$unitcost = $row['unitPrice'];
	//$abc = $quantity * $unitcost;
	$abc = 	$row['extPrice'];
	
	$Company = $row['Company'];
	$Address = $row['Address'];
	$Contact_No = $row['Contact_No'];
	$email = $row['email'];
	//$word = new NumberFormatter("en", NumberFormatter::SPELLOUT);
    //echo $word->format($abc);
	}
	
	function convertNumberToWord($num = false)
	{
		$num = str_replace(array(',', ' '), '' , trim($num));
		if(! $num) {
			return false;
		}
		$num = (int) $num;
		$words = array();
		$list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
			'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
		);
		$list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
		$list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
			'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
			'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
		);
		$num_length = strlen($num);
		$levels = (int) (($num_length + 2) / 3);
		$max_length = $levels * 3;
		$num = substr('00' . $num, -$max_length);
		$num_levels = str_split($num, 3);
		for ($i = 0; $i < count($num_levels); $i++) {
			$levels--;
			$hundreds = (int) ($num_levels[$i] / 100);
			$hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
			$tens = (int) ($num_levels[$i] % 100);
			$singles = '';
			if ( $tens < 20 ) {
				$tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
			} else {
				$tens = (int)($tens / 10);
				$tens = ' ' . $list2[$tens] . ' ';
				$singles = (int) ($num_levels[$i] % 10);
				$singles = ' ' . $list1[$singles] . ' ';
			}
			$words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
		} //end for loop
		$commas = count($words);
		if ($commas > 1) {
			$commas = $commas - 1;
		}
		return implode(' ', $words);
	}
?>

<div class="span12">
	<a class = "btn btn-success" onclick="window.print();" style="font-size:20px";><i class="icon-print icon-large"></i> Print</a>
	<a class = "btn btn-inverse" href="quotation-view-main.php?item=<?php echo $item; ?>&year=<?php echo $year; ?>" style="font-size:20px";>Back</a>
</div>

<body style="font-size:12pt;">
<div class="container-fluid">
    <div class="row-fluid">
		<div class="span12" id="content">
			<div class="row-fluid">
				<div class="block-content collapse in" style="background-color: #fff;" id="content">
					<div class="span12">
						<p style="text-align:center;">
							<img src="../images/logo.png"  width="75px"><br />
							Republic of the Philippines<br />
							BULACAN STATE UNIVERSITY<br />
							City of Malolos, Bulacan
						</p>
						
						<div class="span12" id="content">
							<div style="float: left;">
								<h6>
									Standard For Number: SF-GOOD-60<br/>
									Revised on: May 24, 2004<br/>
									Standard Form Title: Request for Price Quotation
								</h6>
							</div>
							<?php $dates=date('F d, Y',strtotime($date)); ?>
							<div style="float: right;"> Date: <?php echo $dates; ?></div>
						</div>

						<div class="span12" style="clear: both;">
							<div style="width: 60%;">
								<h6>
										Quotation No.: <u>18-232-05</u><br/>
										Purchase Request No.: <u>G-03-131-18</u><br/>
										Purpose: <u>FOR Sarmiento Campus USE</u><br/>
										<p class="span12" id="content" style="text-indent: 50px; text-align:justify;">ABC: <u>&#8369;<?php echo number_format($abc,2, '.', ','); ?></u></p>
									
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
										<b><i>of distributorship/dealership from teh manufacturers (for equipment)</i></b> 
									</p>
								</h6>
							</div>
							<div style="width: 40%; float: right;">
								<h4><u>ISABELITA C. BENEDICTOS</u></h4>
								<h6>Chairman, BAC(Goods)</h6>
							</div>
						
						<br/>
						
						
						<div style="display: block; font-size: 10pt;" class="span12" id="content">
							<table cellpadding="0" id="" cellspacing="0" border="1" class="display" cellspacing="0" style="background-color: #fff; width:100%;">
								<thead>
									<tr>
										<th width="10%" style="text-align:center;">Item No.</th>
										<th width="30%" style="text-align:center;">ITEM & DESCRIPTION</th>
										<th width="10%" style="text-align:center;">BRAND & MODEL</th>
										<th width="10%" style="text-align:center;">QTY./UNIT</th>
										<th width="10%" style="text-align:center;">UNIT PRICE</th>
										<th width="10%" style="text-align:center;">TOTAL PRICE</th>
									</tr>
								</thead>
								<tbody>
									<tr row>
										<!-- <td><?php echo $row1['StockPropertyNo']; ?></td> -->
										<td height="100" style="text-align: center;"><?php echo "1"?></td>
										<td><?php echo $item; ?></td>
										<td style="text-align:center;"><?php echo $Brand_Model; ?></td>
										<td style="text-align:center;"><?php echo $quantity." ".$unit; ?></td>
										<td style="text-align:center;">&#8369;<?php echo number_format($unitcost,2, '.', ','); ?></td>
										<td style="text-align:center;">&#8369;<?php echo number_format($abc,2, '.', ','); ?></td>
									</tr>
									</tbody>
							</table>
						</div>
						<br/>
						<div style="display: block;">
							<table>
								<tbody>
									<tr style="border: none; font-size: 10pt;">
										<td colspan="2">
											I.  Attachment:<br/>
											<p style="text-indent: 25px;">a.) Brochure with Specification of the product</p>
												<p style="text-indent: 25px;"><b>b.) Please Attach Philgephs Registration</b></p>
												<p style="text-indent: 25px;">c.) Please Attach the ff:</p>
												<p style="text-indent: 50px;"><b>*DTI/SEC Registration</b></p>
												<p style="text-indent: 50px;"><b>*BIR (Certificate of Registration; Authority to Print</b></p>
												<p style="text-indent: 50px;"><b>*Mayor's/Business Permit</b></p>
												<p style="text-indent: 50px;"><b>*PhilGEPS Registration</b></p>
											</p>
										</td>
										<td colspan="4">
											II. Warranty:<br/>
											<p style="text-indent: 25px;">a.) Supplies & Materials = 3 months</p>
											<p style="text-indent: 25px;">b.) Equipment = 1 year</p>
											<p style="text-indent: 25px;">c.) Outright replacement if found defective</p>
											III. Delivery period from receipt of Purchase Order: <b><u>7 days</u><b><br/>
											<p style="text-indent: 25px;">*Subject to government creditable/with holding tax</p>
											<p style="text-indent: 25px;">All items must conform with PNS/Global Mark/ICC standard</p>
											<p style="text-indent: 25px;">Sub standard items shall not be accepted</p>
										</td>
									</tr>
									
									<tr>
										<td colspan="6">
											<p style="font-weight:bold; font-size: 10pt;">After having carefully read and accepted your General Conditions, I/We quote you on the item at prices noted above.</p>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						
						<div style="display: block; font-size: 8pt;">
							<table border="0">
								<tr>
									<td width="60%">
										<p class="span12" id="content" ><b>VAT Registered: _________________________</b></p>
										<p class="span12" id="content" ><b>NON-VAT Registered: ____________________</b></p>
										<p class="span12" id="content" ><b>Company Name: <u><?php echo $Company; ?></u></b></p>
										<p class="span12" id="content" ><b>Address: <u><?php echo $Address; ?></u></b></p>
										<p class="span12" id="content" ><b>Tel. No./Cellphone No.: <u><?php echo $Contact_No; ?></u></b></p>
										<p class="span12" id="content" ><b>Email Address: <u><?php echo $email; ?></u></b></p>
									</td>
									<td width="40%">
										<p class="span12" id="content" ><b>Accepts check on government terms: _______</b></p>
										<p class="span12" id="content" ><b>Printed Name / Signature: ____________________</b></p>
										<p class="span12" id="content" ><b>Date: _______________</b></p>
										<p class="span12" id="content" ><b>Canvass By: ____________________</b></p>
									</td>
								</tr>
							</table>
							<p class="span12" id="content" >BulSU-OP-PU-03F3<br/>Revision: 0</p>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>