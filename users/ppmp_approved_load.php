<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php
	if (isset($_GET['viewby'])) {
		$viewby = $_GET['viewby'];
		IF ($viewby <> 'All') {
?>
			<!-- TABLE PARA SA ITEM -->
			<table cellpadding="0" cellspacing="0" border="1" id="" class="display" cellspacing="0" width="100%"> 
				<thead>
					<tr>
						<th rowspan="2"><b>Item Description</b></th>
						<th rowspan="2"><b>Unit of Measurement</b></th>
						<th colspan="12"><b>Schedule/ Milestones of Activities:</b></th>
						<th rowspan="2"><b>Total Qty</b></th>
						<th rowspan="2"><b>Price Catalogue</b></th>
						<th rowspan="2"><b>Total Amount</b></th>
						<th rowspan="2"><b>Remarks</b></th>
					</tr>
					
					<tr>
						<th><b>Jan</b></th>
						<th><b>Feb</b></th>
						<th><b>Mar</b></th>
						<th><b>Apr</b></th>
						<th><b>May</b></th>
						<th><b>Jun</b></th>
						<th><b>Jul</b></th>
						<th><b>Aug</b></th>
						<th><b>Sep</b></th>
						<th><b>Oct</b></th>
						<th><b>Nov</b></th>
						<th><b>Dec</b></th>
					</tr>
				</thead>
				
				<tbody>
					<?php
						$query = mysql_query("SELECT * FROM users WHERE user_id='$session_id'")or die(mysql_error());
						while($row = mysql_fetch_array($query)) {
						$Year = $row['Year'];
						}
							
						$query3 = mysql_query("SELECT * FROM tbl_ppmp WHERE Year = $Year AND user_id='$session_id' AND Status = 'Completed' AND SourceOfFund = '$viewby'")or die(mysql_error());
						while($row3 = mysql_fetch_array($query3)){
						$id = $row3['ppmpID'];
					?>
					<tr>
						<td width="300" style="text-align:center;"><?php echo $row3['itemdetailDesc']; ?></td> 
						<td width="100" style="text-align:center;"><?php echo $row3['UnitOfMeasurement']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row3['Jan']; ?></td>			
						<td width="100" style="text-align:center;"><?php echo $row3['Feb']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row3['Mar']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row3['Apr']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row3['May']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row3['Jun']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row3['Jul']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row3['Aug']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row3['Sep']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row3['Oct']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row3['Nov']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row3['Dec']; ?></td>
						<td width="150" style="text-align:right;"><?php echo $row3['TotalQty']; ?></td>
						<td width="150" style="text-align:right;"><?php echo $row3['PriceCatalogue']; ?></td>
						<td width="300" style="text-align:right;"><?php echo $row3['TotalAmount']; ?></td>
						<td width="300" style="text-align:center;"><?php echo $row3['Remarks']; ?></td> 
					</tr>
					<?php
						}
					?>
				</tbody>
				<tfooter>
					<tr>
						<th colspan="16" align="right"><h4>TOTAL AMOUNT: </h4></th>
						
						<?php
							$row = mysql_query("SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year=$Year AND user_id='$session_id'  AND Status = 'Completed' AND SourceOfFund = '$viewby'") or die(mysql_error());
							while($result = mysql_fetch_array($row)){
								echo "<th style='text-align:right;'><h4>" . $result['Totalx'] . "</h4></th>";
								echo "<th></th>";
							}
						?>
					</tr>
				</tfooter>
			</table>
		<?php
			exit();
		} else{
		?>
			<table cellpadding="0" cellspacing="0" border="1" id="" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th rowspan="2"><b>Item Description</b></th>
						<th rowspan="2"><b>Unit of Measurement</b></th>
						<th colspan="12"><b>Schedule/ Milestones of Activities:</b></th>
						<th rowspan="2"><b>Total Qty</b></th>
						<th rowspan="2"><b>Price Catalogue</b></th>
						<th rowspan="2"><b>Total Amount</b></th>
						<th rowspan="2"><b>Remarks</b></th>
					</tr>
					
					<tr>
						<th><b>Jan</b></th>
						<th><b>Feb</b></th>
						<th><b>Mar</b></th>
						<th><b>Apr</b></th>
						<th><b>May</b></th>
						<th><b>Jun</b></th>
						<th><b>Jul</b></th>
						<th><b>Aug</b></th>
						<th><b>Sep</b></th>
						<th><b>Oct</b></th>
						<th><b>Nov</b></th>
						<th><b>Dec</b></th>
					</tr>
				</thead>
				
				<tbody>
					<?php
						$query = mysql_query("SELECT * FROM users WHERE user_id='$session_id'")or die(mysql_error());
						while($row = mysql_fetch_array($query)) {
						$Year = $row['Year'];
						}
						
						$query2 = mysql_query("SELECT * FROM tbl_ppmp WHERE Year = $Year AND user_id='$session_id'  AND Status = 'Completed'")or die(mysql_error());
						while($row2 = mysql_fetch_array($query2)){
						$id = $row2['ppmpID'];
					?>
					<tr>
						<td width="300" style="text-align:center;"><?php echo $row2['itemdetailDesc']; ?></td> 
						<td width="100" style="text-align:center;"><?php echo $row2['UnitOfMeasurement']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row2['Jan']; ?></td>			
						<td width="100" style="text-align:center;"><?php echo $row2['Feb']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row2['Mar']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row2['Apr']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row2['May']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row2['Jun']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row2['Jul']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row2['Aug']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row2['Sep']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row2['Oct']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row2['Nov']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row2['Dec']; ?></td>
						<td width="150" style="text-align:right;"><?php echo $row2['TotalQty']; ?></td>
						<td width="150" style="text-align:right;"><?php echo $row2['PriceCatalogue']; ?></td>
						<td width="300" style="text-align:right;"><?php echo $row2['TotalAmount']; ?></td>
						<td width="300" style="text-align:center;"><?php echo $row2['Remarks']; ?></td> 
					</tr>
					<?php
						}
					?>
				</tbody>
				<tfooter>
					<tr>
						<th colspan="16" align="right"><h4>TOTAL AMOUNT: </h4></th>
						
						<?php
							$row = mysql_query("SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year=$Year AND user_id='$session_id'  AND Status = 'Completed'") or die(mysql_error());
							while($result = mysql_fetch_array($row)){
								echo "<th style='text-align:right;'><h4>" . $result['Totalx'] . "</h4></th>";
								echo "<th></th>";
							}
						?>
					</tr>
				</tfooter>
			</table>
		<?php
			exit();
		}
	}else{
		echo 'no selected';
		mysql_close($connection); // Connection Closed
	}
?>