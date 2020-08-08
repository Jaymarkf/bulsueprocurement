<?php include('header.php'); ?>
<?php include('session.php'); ?>
<div class="span12">
	<a class = "btn btn-success" onclick="window.print();" style="font-size:20px";><i class="icon-print icon-large"></i> Print</a>
	<a class = "btn btn-inverse" href="bac-res-main.php" style="font-size:20px";>Back</a>
</div>
<?php
	$item = $_GET['item'];
	$year = $_GET['year'];
	$dateC = $_GET['dateC'];
	$coA = $_GET['coA'];
	$coB = $_GET['coB'];
	$coC = $_GET['coC'];
					
	$qry = mysqli_query($conn,"SELECT *, sum(Quantity) as Quantity FROM tbl_pr_items WHERE ItemDescription = '$item' AND Year = '$year' GROUP BY ItemDescription");
	while($row = mysqli_fetch_array($qry)) {
		//$row = mysqli_fetch_array($qry)
	
	$year = $row['Year'];
	$item = $row['ItemDescription'];
	$quantity = $row['Quantity'];
	$unit = $row['Unit'];
	$unitcost = $row['UnitCost'];
	$abc = $quantity * $unitcost;
	//$word = new NumberFormatter("en", NumberFormatter::SPELLOUT);
    //echo $word->format($abc);
	}
	
	//to fetch the company
	$qry1 = mysqli_query($conn,"SELECT * FROM tbl_bac_resolution WHERE itemDescription = '$item' AND Year = '$year'");
	while($row1 = mysqli_fetch_array($qry1)) {
		//$row = mysqli_fetch_array($qry)
	
	$coA = $row1['companyA'];
	$coB = $row1['companyB'];
	$coC = $row1['companyC'];
	}
	
	//to fetch the company A price
	$qry2 = mysqli_query($conn,"SELECT * FROM tbl_quotation WHERE itemDescription = '$item' AND Year = '$year' AND Company = '$coA'");
	while($row2 = mysqli_fetch_array($qry2)) {
		//$row = mysqli_fetch_array($qry)
	
	$unitPriceA = $row2['unitPrice'];
	$extPriceA = $row2['extPrice'];
	}
	
	//to fetch the company B price
	$qry3 = mysqli_query($conn,"SELECT * FROM tbl_quotation WHERE itemDescription = '$item' AND Year = '$year' AND Company = '$coB'");
	while($row3 = mysqli_fetch_array($qry3)) {
		//$row = mysqli_fetch_array($qry)
	
	$unitPriceB = $row3['unitPrice'];
	$extPriceB = $row3['extPrice'];
	}
	
	//to fetch the company C price
	$qry4 = mysqli_query($conn,"SELECT * FROM tbl_quotation WHERE itemDescription = '$item' AND Year = '$year' AND Company = '$coC'");
	while($row4 = mysqli_fetch_array($qry4)) {
		//$row = mysqli_fetch_array($qry)
	
	$unitPriceC = $row4['unitPrice'];
	$extPriceC = $row4['extPrice'];
	}
	
	//to fetch the company name who got the nearest price
	$qry5 = mysqli_query($conn,"SELECT min(extPrice) as ePrice FROM tbl_quotation WHERE itemDescription = '$item' AND Year = '$year'");
	while($row5 = mysqli_fetch_array($qry5)) {
		$unitPrice_win = $row5['ePrice'];
	}
	
	//to fetch the company name who got the nearest price
	$qry6 = mysqli_query($conn,"SELECT Company FROM tbl_quotation WHERE itemDescription = '$item' AND Year = '$year' AND extPrice ='$unitPrice_win'");
	while($row6 = mysqli_fetch_array($qry6)) {
		$company_win = $row6['Company'];
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
<body>
<div class="container-fluid">
    <div class="row-fluid">
		<div class="span12" id="content">
			<div class="row-fluid">
				<div class="block-content collapse in" style="background-color: #fff;">
					<div class="span12" id="content">
						<p colspan="6" style="text-align:center;">
							<img src="../images/logo.png"  width="75px"><br />
							Republic of the Philippines<br />
							Bulacan State University<br />
							BIDS AND AWARDS COMMITTEE FOR GOODS AND SERVICES<br />
							City of Malolos, Bulacan
						</p>
						
						<p colspan="6"><h4  style="text-align: center; text-transform: uppercase;">
							ABSTRACT OF CANVASS / BAC RESOLUTION<br /> 
							RESOLUTION RECOMMENDING TO AWARD THE PROCUREMENT OF <?php echo $item; ?><br />
							FOR THE ADMISSIONS AND SERVICES OFFICE THROUGH SMALL VALUE PROCUREMENT</h4></p>
						<br/>
						
						<div style="display: block; page-break-after: always;">
							<table cellpadding="0" id="" cellspacing="0" border="1" class="display" cellspacing="0" style="background-color: #fff; width:100%;">
								<thead>
									<tr>
										<th colspan="3" style="text-align:left;">ABC: Php<?php echo number_format($abc,2); ?></th>
										<?php
											$Today=$dateC;
											//$dateC=date('l, F d, Y',strtotime($Today));
											$dateC=strtoupper(date('d F Y',strtotime($Today)));
										?>
										<th colspan="7" style="text-align:right;">DATE: <?php echo $dateC; ?></th>
									</tr>
									<tr>
										<th rowspan="3" width="1%" style="text-align:center;">Item No.</th>
										<th rowspan="3" width="10%" style="text-align:center;">NAME OF ARTICLES BEING REQUISITIONED</th>
										<th rowspan="3" width="2%" style="text-align:center;">Approved unit price per item</th>
										<th rowspan="3" width="2%" style="text-align:center;">Quantity and Unit</th>
										<th colspan="6"  width="5%" style="text-align:center;">NAME OF SUPPLIERS / DEALERS</th>
									</tr>
									<tr>
										<th colspan="2" width="2%" style="text-align:center;"><?php echo $coA; ?></th>
										<th colspan="2" width="2%" style="text-align:center;"><?php echo $coB; ?></th>
										<th colspan="2" width="2% style="text-align:center;""><?php echo $coC; ?></th>
									</tr>
									<tr>
										<th width="1%" style="text-align:center;">Unit Price</th>
										<th width="1%" style="text-align:center;">Extended Price</th>
										<th width="1%" style="text-align:center;">Unit Price</th>
										<th width="1%" style="text-align:center;">Extended Price</th>
										<th width="1%" style="text-align:center;">Unit Price</th>
										<th width="1%" style="text-align:center;">Extended Price</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<!-- <td><?php echo $row1['StockPropertyNo']; ?></td> -->
										<td><?php echo "Item here..."?></td>
										<td><?php echo $item; ?></td>
										<td style="text-align:right;">&#8369;<?php echo number_format($unitcost,2); ?></td>
										<td style="text-align:center;"><?php echo $quantity . ' ' . $unit; ?></td>
										<td style="text-align:right;">&#8369;<?php echo number_format($unitPriceA,2); ?></td>
										<td style="text-align:right;">&#8369;<?php echo number_format($extPriceA,2); ?></td>
										<td style="text-align:right;">&#8369;<?php echo number_format($unitPriceB,2); ?></td>
										<td style="text-align:right;">&#8369;<?php echo number_format($extPriceB,2); ?></td>
										<td style="text-align:right;">&#8369;<?php echo number_format($unitPriceC,2); ?></td>
										<td style="text-align:right;">&#8369;<?php echo number_format($extPriceC,2); ?></td>
									</tr>
									
									<tr>
										<td></td>
										<td><b>TOTAL: </b> </td>
										<td></td>
										<td></td>
										<td></td>
										<td style="text-align:right;"><b>&#8369;<?php echo number_format($extPriceA,2); ?></b></td>
										<td></td>
										<td style="text-align:right;"><b>&#8369;<?php echo number_format($extPriceB,2); ?></b></td>
										<td></td>
										<td style="text-align:right;"><b>&#8369;<?php echo number_format($extPriceC,2); ?></b></td>
									</tr>
								</tbody>
							</table>
						</div>
						
						<div style="display: block; page-break-before: always;">
							<br/>
							<br/>
							<p class="span12" id="content" style="text-indent: 50px; text-align:justify;"><b>WHEREAS</b>, the items to be procured are included in the Annual Procurement Plan for the year <b><?php echo $year;?></b> of the Bulacan State University with an Approved Budget for the Contract of <b><?php echo strtoupper(convertNumberToWord($abc)); ?> PESOS (&#8369;<?php echo number_format($abc,2); ?>);</b></p>

							<p class="span12" id="content" style="text-indent: 50px; text-align:justify;"><b>WHEREAS, Section 10 of Republic Act No. 9184</b> entitled “Government Procurement Reform Act” provides that all procurement shall be done through competitive bidding, except as provided for in Article XVI (Alternative Methods of Procurement) of the act, namely: Limited Source Bidding, Direct Contracting, Repeat Order, Shopping and Negotiated Procurement;</p>
							
							<p class="span12" id="content" style="text-indent: 50px; text-align:justify;"><b>WHEREAS, Section 53.9</b> of the <b>2016 Revised Implementing Rules and Regulations (IRR)</b> of the said act provides that “where the procurement does not fall under Shopping in Section 52 of the IRR and the amount involved does not exceed the thresholds prescribed in Annex “H” of the IRR:”</p>

							<p class="span12" id="content" style="text-indent: 150px; text-align:justify;"><b>THRESHOLDS FOR SMALL VALUE PROCUREMENT:</b></p>
							<p class="span12" id="content" style="text-indent: 200px; text-align:justify;"><b>2. Small Value Procurement</b> shall not exceed the following:</p>
							<p class="span12" id="content" style="text-indent: 250px; text-align:justify;"><i>a.)For NGAs, GOCCs, GFIs, and SUCs, One Million Pesos (&#8369;1, 000,000.00)</i></p>
							<p class="span12" id="content" style="text-indent: 300px; text-align:justify;"><i>x     x     x</i></p>
							
							<p class="span12" id="content" style="text-indent: 50px; text-align:justify;"><b>WHEREAS, three (3) suppliers</b> secured Request for Quotations and submitted their respective proposals to the Bids and Awards Committee, to wit: <b><?php echo $coA; ?></b>; <b><?php echo $coB; ?></b>; and <b><?php echo $coC; ?></b>;</p> 
							
							<p class="span12" id="content" style="text-indent: 50px; text-align:justify;"><b>WHEREAS</b>, the opening of quotations was conducted at the Administration Building, Bulacan State University, Malolos, Bulacan on <b><?php echo $dateC; ?></b>;</p>

							<p class="span12" id="content" style="text-indent: 50px; font-weight: normal; text-align:justify;"><b>WHEREAS,
							<?php echo $company_win; ?></b> submitted the lowest obtainable amount and most responsive proposal for the items to be procured;</p> 
						</div>
						
						<div style="display: block; page-break-before: always;">
							<p class="span12" id="content" style="text-indent: 50px; font-weight: normal; text-align:justify;">
								<b>NOW THEREFORE</b>, after meticulous perusal, validation and verification, 
								we, the members of Bids and Awards Committee hereby certify that the foregoing 
								abstract of canvass is true and correct and that we have reviewed and evaluated 
								the quotation and hereby recommend to the University President to procure the 
								said items from 
								<b><?php echo $company_win; ?></b> 
								amounting to <b>
								<?php echo strtoupper(convertNumberToWord($unitPrice_win)); ?> 
								PESOS (&#8369;<?php echo number_format($unitPrice_win,2); ?>);</b></p> 
								<?php
									$Today=$dateC;
									//$dateC=date('l, F d, Y',strtotime($Today));
									$day=strtoupper(date('d',strtotime($Today)));
									$month=strtoupper(date('F',strtotime($Today)));
									$year=strtoupper(date('Y',strtotime($Today)));
									
									function ordinal($number) {
										$ends = array('th','st','nd','rd','th','th','th','th','th','th');
										if ((($number % 100) >= 11) && (($number%100) <= 13))
											return $number. 'th';
										else
											return $number. $ends[$number % 10];
									}
								?>
							<p class="span12" id="content" style="text-indent: 50px; text-align:justify;">
							<b>RESOLVED</b>, at the Bulacan State University, City of Malolos, Bulacan, this 
							<b><?php echo ordinal($day); ?></b> day of <b><?php echo $month.' '. $year; ?></b>.</p>

							<table name="Second" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
								<thead>
									<tr>
										<th>&nbsp;</th>
									</tr>
									<tr>
										<th>&nbsp;</th>
									</tr>
									<tr>
										<th>&nbsp;</th>
									</tr>
									<tr>
										<th style="text-align:center;">Chair</th>
										<th colspan="2" width="40" style="text-align:center;">Vice Chair</th>
										<th style="text-align:center;">Member</th>
									</tr>
									<tr>
										<th>&nbsp;</th>
									</tr>
									<tr>
										<th>&nbsp;</th>
									</tr>
									<tr>
										<th>&nbsp;</th>
									</tr>
									<tr>
										<th width="14.28" style="text-align:center;">Member</th>
										<th width="14.28" style="text-align:center;">Member</th>
										<th width="14.28" style="text-align:center;">Member</th>
										<th width="14.28" style="text-align:center;">Member</th>
									</tr>
									<tr>
										<th>&nbsp;</th>
									</tr>
									<tr>
										<th>&nbsp;</th>
									</tr>
									<tr>
										<th colspan="4" style="text-align:center;">APPROVED:</th>
									</tr>
									<tr>
										<th>&nbsp;</th>
									</tr>
									<tr>
										<th>&nbsp;</th>
									</tr>
									<tr>
										<th>&nbsp;</th>
									</tr>
									<tr>
										<th colspan="4" style="text-align:center;">President</th>
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