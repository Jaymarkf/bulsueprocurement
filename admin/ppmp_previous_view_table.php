<div class="">
	<div class="span12" id="content">
		<a href="ppmp_previous.php<?php echo '?id='.$BranchID; ?>" data-placement="right" title="Click to go back in previous screen" id="back" class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#back').tooltip('show');
				$('#back').tooltip('hide');
			});
		</script>
	</div>
	<br/>
	<div class="span12" id="content">
		<h3>EndUser/Unit: <?php echo $BranchID;?></h3>
	</div>
	<br/>
	<!-- TABLE PARA SA ITEM -->
		<form action="ppmp-add-item-delete.php" method="post" class="scroll">
			<table cellpadding="0" cellspacing="0" border="0" id="example1" class="display" cellspacing="0" width="100%">
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
						<th><b>March</b></th>
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
					$query2 = mysql_query("SELECT * FROM tbl_ppmp WHERE Year = '$YearID' AND EndUserUnit ='$BranchID' AND Status = 'Completed' AND BO_PPMP_Status='Approved'")or die(mysql_error());
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
						<td width="100" style="text-align:center;"><?php echo $row2['TotalQty']; ?></td>
						<td width="150" style="text-align:right;">&#8369;<?php echo number_format($row2['PriceCatalogue'],2, '.', ','); ?></td>
						<td width="150" style="text-align:right;">&#8369;<?php echo number_format($row2['TotalAmount'],2, '.', ','); ?></td>
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
							$row = mysql_query("SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year = '$YearID' AND EndUserUnit ='$BranchID' AND Status = 'Completed' AND BO_PPMP_Status='Approved'") or die(mysql_error());
							while($result = mysql_fetch_array($row)){
								echo "<th style='text-align:right;'><h4>&#8369;" . number_format($result['Totalx'],2, '.', ',') . "</h4></th>";
							}
						?>
					</tr>
				</tfooter>
			</table>
		</form>
		<div class="span12" id="content">
			<a href="ppmp_previous.php<?php echo '?id='.$BranchID; ?>" data-placement="right" title="Click to go back in previous screen" id="back1" class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#back1').tooltip('show');
					$('#back1').tooltip('hide');
				});
			</script>
		</div>
</div>