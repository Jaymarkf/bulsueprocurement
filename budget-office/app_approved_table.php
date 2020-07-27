
<div class="">	
	<div class="">
		<a href="dashboard.php" title="Back to PPMP-Dashboard" id="back" data-placement="right" class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#back').tooltip('show');
					$('#back').tooltip('hide');
				});
			</script>
	</div>
	
	<br/>
	<form method="POST">
		<table cellpadding="0" cellspacing="0" border="0" id="example1" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th rowspan="2"><b>Item Code</b></th>
					<th rowspan="2"><b>Item Description</b></th>
					<th rowspan="2"><b>Unit of Measurement</b></th>
					<th colspan="12"><b>Schedule/ Milestones of Activities:</b></th>
					<th rowspan="2"><b>Total Qty</b></th>
					<th rowspan="2"><b>Price Catalogue</b></th>
					<th rowspan="2"><b>Total Amount</b></th>
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
					$query3 = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
					while($row3 = mysqli_fetch_array($query3)) {
					$Year3 = $row3['Year'];
					
					//$query4 = mysqli_query($conn,"SELECT *,SUM(Quantity) as SQty,SUM(TotalAmount) as TAmt FROM tbl_ppmp WHERE Year = $Year3 AND Status = 'Completed' AND Status_PPMP='Approved' GROUP BY itemdetailCode");
					$query4 = mysqli_query($conn,"SELECT *, SUM(Jan) AS SJan,SUM(Feb) AS SFeb,SUM(Mar) AS SMar,SUM(Apr) AS SApr,
					SUM(May) AS SMay,SUM(Jun) AS SJun,SUM(Jul) AS SJul,SUM(Aug) AS SAug,SUM(Sep) AS SSep,SUM(Oct) AS SOct,
					SUM(Nov) AS SNov,SUM(`Dec`) AS SDec,SUM(TotalQty) AS STQty,SUM(TotalAmount) as TAmt FROM tbl_ppmp WHERE Year = $Year3 AND Status = 'Completed' AND Status_PPMP='Approved' GROUP BY itemdetailCode");
					while($row4 = mysqli_fetch_array($query4)){
					$id4 = $row4['ppmpID'];
				?>
				<tr>
					<td width="50" style="text-align:center;"><?php echo $row4['itemdetailCode']; ?></td> 
					<td width="500" style="text-align:center;"><?php echo $row4['itemdetailDesc']; ?></td> 
					<td width="50" style="text-align:center;"><?php echo $row4['UnitOfMeasurement']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['SJan']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['SFeb']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['SMar']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['SApr']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['SMay']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['SJun']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['SJul']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['SAug']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['SSep']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['SOct']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['SNov']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['SDec']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['STQty']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['PriceCatalogue']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['TAmt']; ?></td>
				<!--	<td width="100" style="text-align:center;"><?php echo '<span class="badge badge-success">'.$row4['Status_PPMP']; ?></span></td> -->
				</tr>
				<?php 
					}
				}
				?>    		
			</tbody>
			<tfooter>
				<tr>
					<th colspan="17" align="right"><h4>TOTAL AMOUNT: </h4></th>
					
					<?php
						//$row = mysqli_query($conn,"SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year=$Year3 AND user_id='$session_id'  AND Status = 'Requested'") ;
						$row5 = mysqli_query($conn,"SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year=$Year3 AND Status = 'Completed' AND Status_PPMP='Approved'") ;
						while($result5 = mysqli_fetch_array($row5)){
							echo "<th style='text-align:right;'><h4>" . $result5['Totalx'] . "</h4></th>";
						}
					?>
				</tr>
			</tfooter>
		</table>
	</form>
	<div class="">
		<a href="dashboard.php" title="Back to PPMP-Dashboard" id="back" data-placement="right" class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#back').tooltip('show');
					$('#back').tooltip('hide');
				});
			</script>
	</div>
</div>