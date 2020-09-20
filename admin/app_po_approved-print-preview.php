<?php include('header.php'); ?>
<?php include('session.php'); ?>
<div class="span12">
	<a class = "btn btn-success" onclick="window.print()" style="font-size:20px";><i class="icon-print icon-large"></i> Print</a>
	<a class = "btn btn-inverse" href="app_po_approved.php" style="font-size:20px";>Back</a>
</div>
<?php
	$PO = $_GET['po'];
	
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
<hr/>
<?php					
	$qry = mysqli_query($conn,"SELECT po.*,com.* FROM tbl_po inner join tbl_company com on po.company_id = com.id WHERE po.id = '$PO'");
	$row = mysqli_fetch_array($qry)
?>
<body>
<div class="container-fluid">
    <div class="row-fluid">
		<div class="span12" id="studentTableDiv">
			<div class="row-fluid">
				<div id="block_bg" class="block span12">
				
				<p colspan="6">
					<h5>&nbsp;&nbsp;&nbsp;&nbsp;Standard Form Number: SF-GOOD-58</h5>
					<!-- <h5>Revised on: <?php echo date("F j, Y",strtotime($row['date_generate'])); ?></h5> -->
					<h5>&nbsp;&nbsp;&nbsp;&nbsp;Revised on: May 24, 2004</h5>
					<h5>&nbsp;&nbsp;&nbsp;&nbsp;Standard Form Title: Purchase Order</h5>
				</p>
				
				<p colspan="6"><h3  style="text-align: center;">PURCHASE ORDER</h3><h3  style="text-align: center;">BULACAN STATE UNIVERSITY</h3></p>
				
				<table cellpadding="0" id="" cellspacing="0" border="1" class="display" cellspacing="0" style="background-color: #fff; width:100%;">
					<thead>							
						<tr>
							<th colspan="3" style="text-align: left;">
								&nbsp;&nbsp;&nbsp;&nbsp;Supplier: <?php echo $row['name']; ?><br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;Address: <?php echo $row['address']; ?><br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;E-Mail Add: <?php echo $row['email']; ?><br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;Tel/Cell No.: <?php echo $row['contact']; ?><br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;TIN: <?php echo $row['tin']; ?><br/>
							</th>
						
							<th colspan="3" style="text-align: left;">
                                &nbsp;&nbsp;&nbsp;&nbsp;PO No.: <?php echo $row['purchase_request_no']; ?><br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;Date: <?php echo $row['date_generate']; ?><br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;Mode of Procurement: <?php echo $row['mode_of_payment']; ?><br/>
							</th>
						</tr>
						
						<tr>
							<th colspan="12" height="10" style="text-align:left;">
								<h6>&nbsp;&nbsp;&nbsp;&nbsp;Gentlemen:</h6>
								<h6>&nbsp;&nbsp;&nbsp;&nbsp;Please furnish this Office the following articles subject to the terms and conditions herein:</h6>
							</th>
						</tr>
						
						<tr>
							<th colspan="3" height="10" style="text-align:left;">
								<p>&nbsp;&nbsp;&nbsp;&nbsp;Place of delivery:  _________________________________________________________</p>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;Date of Delivery: ____________________________________</p>
							</th>
							<th colspan="3" height="10" style="text-align:left;">
								<p>&nbsp;&nbsp;&nbsp;&nbsp;Delivery Term:  _________________________________________________________</p>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;Payment Term: ____________________________________</p>
							</th>
						</tr>
						
						<tr>
							<th width="100" style="text-align: center;">Stock/ Property No.</th>
							<th width="100" style="text-align: center;">Unit</th>
							<th width="300" style="text-align: center;">Description</th>
							<th width="100" style="text-align: center;">Quantity</th>
							<th width="150" style="text-align: center;">Unit Cost</th>
							<th width="150" style="text-align: center;">Total Cost</th>
						</tr>
					</thead>
					<?php
					$qry1 = mysqli_query($conn,"SELECT * FROM tbl_po WHERE id = '$PO'");
							while($row1 = mysqli_fetch_array($qry1)){
					?>
					<tbody>
						<tr>
							<td style="text-align:center"><?php echo $row1['stock_property_no']; ?></td>
							<td style="text-align:center"><?php echo $row1['item_description']; ?></td>
							<td style="text-align:center"><?php echo $row1['unit']; ?></td>
							<td style="text-align: center;"><?php echo $row1['quantity']; ?></td>
							<td style="text-align: right;">&#8369; <?php echo number_format($row1['unit_cost'],2, '.', ','); ?></td>
							<td style="text-align: right;">&#8369; <?php echo number_format($row1['total_cost'],2, '.', ','); ?></td>
						</tr>
					<?php 
						}
					?>
					<?php
					$qry2 = mysqli_query($conn,"SELECT SUM(total_cost) as Total FROM tbl_po WHERE id = '$PO'");
					$row2 = mysqli_fetch_array($qry2)
					?>
						<tr>
							<th colspan="5" style="text-align: right;"> TOTAL: </th>
							<td style="text-align: right;">&#8369; <?php echo number_format($row2['Total'],2, '.', ','); ?></td>
						</tr>
						<tr>
							<td colspan="6"><b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper(convertNumberToWord($row2['Total'])); ?> PESOS</b></td>
						</tr>
						<tr>
							<td colspan="6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In case of failure to make the full delivery within the time specified above, a penalty of one tenth((1/10) of one percent for every day of delivery shall be imposed on the undelivered items/s.</td>
						</tr>
						<tr style="text-align: center;">
							<td colspan="3">
								<br/><br/> Conforme: <br/><br/><br/>
								_______________________________________ <br/>
								<h6>Signature over Printed Name of Supplier</h6><br/><br/>
								____________________________________
								<h6>Date</h6>
							</td>
														<td colspan="3">
								<br/><br/> Very truly yours, <br/><br/><br/>
								_______________________________________ <br/>
								<h6>Signature over Printed Name of Authorized Official</h6>
								<h6>President</h6>
							</td>
						</tr>
						<tr style="text-align: center;">
							<td colspan="3">
								<p style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;Fund Cluster: ________________________<br/>
                                    &nbsp;&nbsp;&nbsp;&nbsp;Funds Available: ________________________<br/><br/>
								</p>
								
								<h6>Signature over Printed Name of Supplier</h6>
								<h6>Accounting Division Unit</h6>
							</td>
							<td colspan="3">
								<p style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;ORS/BURS No.: ________________________<br/>
                                    &nbsp;&nbsp;&nbsp;&nbsp;Date of the ORS/BURS: ________________________<br/>
                                    &nbsp;&nbsp;&nbsp;&nbsp;Amount: ________________________
								</p>
							</td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>