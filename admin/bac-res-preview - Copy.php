<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php include('session.php'); ?>
<div class="span12">
	<a class = "btn btn-success" onclick="window.print()" style="font-size:20px";><i class="icon-print icon-large"></i> Print</a>
	<a class = "btn btn-inverse" href="bac-res-main.php" style="font-size:20px";>Back</a>
</div>
<?php
	$qID = $_GET['item'];
?>
<hr/>
<?php					
	$qry = mysqli_query($conn,"SELECT * FROM tbl_quotation WHERE quotation_id = '$qID'");
	$row = mysqli_fetch_array($qry)
?>
<body>
<div class="container-fluid">
    <div class="row-fluid">
		<div class="span12" id="studentTableDiv">
			<div class="row-fluid">
				<div id="block_bg" class="block span12">
				
				<p colspan="6" style="text-align:center;">
					<img src="../images/logo.png"  width="100px"><br />
					Republic of the Philippines<br />
					Bulacan State University<br />
					BIDS AND AWARDS COMMITTEE FOR GOODS AND SERVICES<br />
					City of Malolos, Bulacan
				</p>
				
				<p colspan="6"><h4  style="text-align: center;">
					ABSTRACT OF CANVASS / BAC RESOLUTION<br /> 
					RESOLUTION RECOMMENDING TO AWARD THE PROCUREMENT OF PRINTER<br />
					FOR THE ADMISSIONS AND SERVICES OFFICE THROUGH SMALL VALUE PROCUREMENT</h4></p>
				
				<table cellpadding="0" id="" cellspacing="0" border="1" class="display" cellspacing="0" style="background-color: #fff; width:100%;">
					<thead>							
						<tr>
							<th colspan="3" style="text-align: left;">
								Supplier: <?php echo $row['supplier']; ?><br/>
								Address: <?php echo $row['address']; ?><br/>
								E-Mail Add: <?php echo $row['email']; ?><br/>
								Tel/Cell No.: <?php echo $row['contact_no']; ?><br/>
								TIN: <?php echo $row['TIN']; ?><br/>
							</th>
						
							<th colspan="3" style="text-align: left;">
								PO No.: <?php echo $row['POno']; ?><br/>
								Date: <?php echo $row['PO_Date']; ?><br/>
								Mode of Procurement: <?php echo $row['MOP']; ?><br/>
							</th>
						</tr>
						
						<tr>
							<th colspan="12" height="10" style="text-align:left;">
								<h6>Gentlemen:</h6>
								<h6>Please furnish this Office the following articles subject to the terms and conditions herein:</h6>
							</th>
						</tr>
						
						<tr>
							<th colspan="3" height="10" style="text-align:left;">
								<p>Place of delivery:  _________________________________________________________</p>
								<p>Date of Delivery: ____________________________________</p>
							</th>
							<th colspan="3" height="10" style="text-align:left;">
								<p>Delivery Term:  _________________________________________________________</p>
								<p>Payment Term: ____________________________________</p>
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
					$qry1 = mysqli_query($conn,"SELECT * FROM tbl_pO_items WHERE POno = '$PO'");
							while($row1 = mysqli_fetch_array($qry1)){
					?>
					<tbody>
						<tr>
							<td><?php echo $row1['StockPropertyNo']; ?></td>
							<td><?php echo $row1['Unit']; ?></td>
							<td><?php echo $row1['ItemDescription']; ?></td>
							<td style="text-align: center;"><?php echo $row1['Quantity']; ?></td>
							<td style="text-align: right;">Php <?php echo $row1['UnitCost']; ?></td>
							<td style="text-align: right;">Php <?php echo $row1['TotalCost']; ?></td>
						</tr>
					<?php 
						}
					?>
					<?php
					$qry2 = mysqli_query($conn,"SELECT SUM(TotalCost) as Total FROM tbl_po_items WHERE POno = '$PO'");
					$row2 = mysqli_fetch_array($qry2)
					?>
						<tr>
							<th colspan="5" style="text-align: right;"> TOTAL: </th>
							<td style="text-align: right;">Php <?php echo $row2['Total']; ?></td>
						</tr>
						<tr>
							<td colspan="6">(Total Amount in Words) </td>
						</tr>
						<tr>
							<td colspan="6">In case of failure to make the full delivery within the time specified above, a penalty of one tenth((1/10) of one percent for every day of delivery shall be imposed on the undelivered items/s.</td>
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
								<p style="text-align: left;">Fund Cluster: ________________________<br/>
								 Funds Available: ________________________<br/><br/>
								</p>
								
								<h6>Signature over Printed Name of Supplier</h6>
								<h6>Accounting Division Unit</h6>
							</td>
							<td colspan="3">
								<p style="text-align: left;">ORS/BURS No.: ________________________<br/>
								Date of the ORS/BURS: ________________________<br/>
								Amount: ________________________
								</p>
							</td>
						</tr>
					</tbody>
				</table>
				
				<p style="text-indent: 50px;">WHEREAS, the items to be procured are included in the Annual Procurement Plan for the year 2018 of the Bulacan State University with an Approved Budget for the Contract of SIXTEEN THOUSAND PESOS (Php16,000.00);</p>

				<p style="text-indent: 50px;">WHEREAS, Section 10 of Republic Act No. 9184 entitled “Government Procurement Reform Act” provides that all procurement shall be done through competitive bidding, except as provided for in Article XVI (Alternative Methods of Procurement) of the act, namely: Limited Source Bidding, Direct Contracting, Repeat Order, Shopping and Negotiated Procurement;</p>
				
				<p style="text-indent: 50px;">WHEREAS, Section 53.9 of the 2016 Revised Implementing Rules and Regulations (IRR) of the said act provides that “where the procurement does not fall under Shopping in Section 52 of the IRR and the amount involved does not exceed the thresholds prescribed in Annex “H” of the IRR:”</p>

				<p style="text-indent: 50px;">THRESHOLDS FOR SMALL VALUE PROCUREMENT:    2. Small Value Procurement shall not exceed the following:         a.)For NGAs, GOCCs, GFIs, and SUCs, One Million Pesos (P 1, 000,000.00)    x     x     x</p>
				
				<p style="text-indent: 50px;">WHEREAS, three (3) suppliers secured Request for Quotations and submitted their respective proposals to the Bids and Awards Committee, to wit: Company A; Company B; and Company C;</p> 
				
				<p style="text-indent: 50px;">WHEREAS, the opening of quotations was conducted at the Administration Building, Bulacan State University, Malolos, Bulacan on 18 January 2018;</p>

				<p style="text-indent: 50px;">WHEREAS, Company A submitted the lowest obtainable amount and most responsive proposal for the items to be procured;</p> 

				<p style="text-indent: 50px;">NOW THEREFORE, after meticulous perusal, validation and verification, we, the members of Bids and Awards Committee hereby certify that the foregoing abstract of canvass is true and correct and that we have reviewed and evaluated the quotation and hereby recommend to the University President to procure the said items from Company A amounting to FIFTEEN THOUSAND ONE HUNDRED NINETY PESOS (Php15,190.00);</p> 
				
				<p style="text-indent: 50px;">RESOLVED, at the Bulacan State University, City of Malolos, Bulacan, this 18th day of January 2018.</p> 
				
				
				</div>
			</div>
		</div>
	</div>
</div>
</body>