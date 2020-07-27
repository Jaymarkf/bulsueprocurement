<?php include('header.php'); ?>
<?php include('session.php'); ?>
<div class="span12">
	<a class = "btn btn-success" onclick="window.print()" style="font-size:20px";><i class="icon-print icon-large"></i> Print</a>
	<a class = "btn btn-inverse" href="pr.php" style="font-size:20px";>Back</a>
</div>
<?php
	$PR = $_GET['pr'];
?>
<hr/>
<?php					
	$qry = mysql_query("SELECT * FROM tbl_pr WHERE PRno = '$PR'")or die(mysql_error());
	$row = mysql_fetch_array($qry)
?>
<body>
<div class="container-fluid">
    <div class="row-fluid">
		<div class="span12" id="studentTableDiv">
			<div class="row-fluid">
				<div id="block_bg" class="block span12">
				<table cellpadding="0" id="" cellspacing="0" border="1" class="display" cellspacing="0" style="background-color: #fff; width: 100%; margin: auto auto;">
					<thead>
						<tr>
							<th colspan="6" style="text-align: center;"><img src="../images/printlogo.png" width="50%"><h3>PURCHASE REQUEST</h3></th>
						</tr>
						<tr></tr>
						<tr>
							<th colspan="3" style="text-align: left;">PR No.: <?php echo $row['PRno']; ?></th>
							<th colspan="3" style="text-align: left;">Date: <?php echo $row['PR_Date']; ?></th>
						</tr>
						<tr>
							<th colspan="3" style="text-align: left;">Entity Name: <?php echo $row['EntityName']; ?></th>
							<th colspan="3" style="text-align: left;">Fund Cluster: <?php echo $row['FundCluster']; ?></th>
						</tr>
						<tr>
							<th colspan="3" style="text-align: left;">Office Section: <?php echo $row['OfficeSection']; ?></th>
							<th colspan="3" style="text-align: left;">Responsibility Center Code: <?php echo $row['ResponsibilityCenter']; ?></th>
						</tr>
						<tr>
							<th colspan="6" height="10"></th>
						</tr>
						<tr>
							<th width="100" style="text-align: center;">Stock/ Property No.</th>
							<th width="100" style="text-align: center;">Unit</th>
							<th width="300" style="text-align: center;">Item Description</th>
							<th width="100" style="text-align: center;">Quantity</th>
							<th width="200" style="text-align: center;">Unit Cost</th>
							<th width="200" style="text-align: center;">Total Cost</th>
						</tr>
					</thead>
					<?php
					$qry1 = mysql_query("SELECT * FROM tbl_pr_items WHERE PRno = '$PR'")or die(mysql_error());
							while($row1 = mysql_fetch_array($qry1)){
					?>
					<tbody>
						<tr>
							<td><?php echo $row1['StockPropertyNo']; ?></td>
							<td><?php echo $row1['Unit']; ?></td>
							<td><?php echo $row1['ItemDescription']; ?></td>
							<td style="text-align: center;"><?php echo $row1['Quantity']; ?></td>
							<td style="text-align: right;">&#8369; <?php echo number_format($row1['UnitCost'],2, '.', ','); ?></td>
							<td style="text-align: right;">&#8369; <?php echo number_format($row1['TotalCost'],2, '.', ','); ?></td>
						</tr>
					<?php 
						}
					?>
					<?php
					$qry2 = mysql_query("SELECT SUM(TotalCost) as Total FROM tbl_pr_items WHERE PRno = '$PR'")or die(mysql_error());
					$row2 = mysql_fetch_array($qry2)
					?>
						<tr>
							<th colspan="5" style="text-align: right;"> GRAND TOTAL COST </th>
							<th style="text-align: right;">&#8369; <?php echo number_format($row2['Total'],2, '.', ','); ?></th>
						</tr>
						<tr>
							<th colspan="6" height="10"></th>
						</tr>
						<tr>
							<td colspan="6">Purpose:</td>
						</tr>
						<tr>
							<th colspan="6" height="10"></th>
						</tr>
						<tr>
							<td colspan="3">Requested by: </td>
							<td colspan="3">Approved by: </td>
						</tr>
						<tr>
							<td height="50" colspan="3" style="text-align: center; vertical-align: bottom;"><?php echo $row['RequestedBy']; ?></td>
							<td  height="50" colspan="3" style="text-align: center; vertical-align: bottom;"><?php echo $row['ApprovedBy']; ?></td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: center;"><?php echo $row['RequestingDesignation']; ?></td>
							<td colspan="3" style="text-align: center;"><?php echo $row['ApprovingDesignation']; ?></td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>