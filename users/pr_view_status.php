<?php include('header.php'); ?>

<?php
	$PR = $_GET['pr'];
?>

<?php					
	$qry = mysql_query("SELECT * FROM tbl_pr WHERE PRno = '$PR'")or die(mysql_error());
	$row = mysql_fetch_array($qry)
?>
<body>
<div class="container-fluid">
    <div class="row-fluid">
		<div class="span12" id="studentTableDiv">
			<div class="row-fluid">				
				<table cellpadding="0" cellspacing="0" border="0" id="example" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<!-- <th width="100" style="text-align: center;">Stock/ Property No.</th> -->
							<!-- <th width="100" style="text-align: center;">Unit</th> -->
							<th width="300" style="text-align: center;">Item Description</th>
							<th width="100" style="text-align: center;">Quantity</th>
							<!-- <th width="200" style="text-align: center;">Unit Cost</th>
							<th width="200" style="text-align: center;">Total Cost</th> -->
							<th width="200" style="text-align: center;">Status</th>
						</tr>
					</thead>
					<?php
					$qry1 = mysql_query("SELECT * FROM tbl_pr_items WHERE PRno = '$PR'")or die(mysql_error());
							while($row1 = mysql_fetch_array($qry1)){
							$items = $row1['ItemDescription'];
					?>
					<tbody>
						<tr>
							<!-- <td><?php echo $row1['StockPropertyNo']; ?></td> -->
							<!-- <td><?php echo $row1['Unit']; ?></td> -->
							<td style="text-align: center;"><?php echo $row1['ItemDescription']; ?></td>
							<td style="text-align: center;"><?php echo $row1['Quantity'] .' '. $row1['Unit']; ?></td>
							<!-- <td style="text-align: right;">&#8369; <?php echo number_format($row1['UnitCost'],2, '.', ','); ?></td>
							<td style="text-align: right;">&#8369; <?php echo number_format($row1['TotalCost'],2, '.', ','); ?></td> -->
							<td style="text-align: center;">
							<?php
							
							$query2 = mysql_query("SELECT * FROM tbl_quotation WHERE itemDescription = '$items' AND Year = '$Year'")or die(mysql_error());
							$row2 = mysql_fetch_array($query2);
							$count2 = mysql_num_rows($query2);
							
							if ($count2 == 0){
							?>
								<span class="badge badge-primary">Pending</span> <!-- pag wala pang nagbigay ng quotation QUOTATION TBL-->
							<?php
							} elseif ($count2 > 0) {
							?>
								<span class="badge badge-warning">Canvassing</span> <!-- pag may quotation ng supplier QUOTATION TBL-->
							<?php
							}
							
							$query3 = mysql_query("SELECT * FROM tbl_po_items WHERE ItemDescription = '$items' AND Year = '$Year'")or die(mysql_error());
							$row3 = mysql_fetch_array($query3);
							$count3 = mysql_num_rows($query3);
							
							if ($count3 > 0){
							?>
								<span class="badge badge-success">Purchasing</span> <!-- pag may quotation na at nasa bacreso na BACRESO TBL-->
							<?php
							}
							
							$query4 = mysql_query("SELECT * FROM tbl_iar_items WHERE ItemDescription = '$items' AND Year = '$Year'")or die(mysql_error());
							$row4 = mysql_fetch_array($query4);
							$count4 = mysql_num_rows($query4);
							
							if ($count4 > 0){
							?>
								<span class="badge badge-info">Delivered</span> <!-- pag may quotation na at nasa bacreso na BACRESO TBL-->
							<?php
							}
							?>
							</td>
						</tr>
					<?php
						}
					?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>
</body>