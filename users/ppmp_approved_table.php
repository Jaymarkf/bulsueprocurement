<!-- <?php //include('../dbcon.php'); ?> -->

<div class="">
	<div class="span3 pull-left">
		<p style="color: green;"><i class="icon-ok icon-large"></i><b> Budget Office</b></p>
		<p style="color: green;"><i class="icon-ok icon-large"></i><b> Procurement Unit</b></p>
	</div>
	
	<div class="span3 pull-right">
		<form method="post">
			<b>View by: </b>
			<select class="span9" name="viewby" id="empid" onchange="getData(this.value, 'displaydata')" required >
				<option></option>
				<option value="GAA">GAA</option>
				<option value="Income">Income</option>
				<option value="Fiduciary Fund">Fiduciary Fund</option>
				<option value="All">All</option>
			</select>
		</form>
	</div>
	
	<div id="displaydata">
	<!-- TABLE PARA SA ITEM -->
	<!--	<form action="ppmp-add-item-delete.php" method="post" class="scroll"> -->
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
						$query2 = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE Year = $Year AND user_id='$session_id'  AND Status = 'Completed'");
						while($row2 = mysqli_fetch_array($query2)){
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
							$row = mysqli_query($conn,"SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year=$Year AND user_id='$session_id'  AND Status = 'Completed'") ;
							while($result = mysqli_fetch_array($row)){
								echo "<th style='text-align:right;'><h4>" . $result['Totalx'] . "</h4></th>";
								echo "<th></th>";
							}
						?>
					</tr>
				</tfooter>
			</table>
	<!--	</form> -->
	</div>	
</div>

<script type="text/javascript">
	function getData(viewby, divid){
		$.ajax({
			url: 'ppmp_approved_load.php?viewby='+viewby, //call storeemdata.php to store form data
			success: function(html) {
				var ajaxDisplay = document.getElementById(divid);
				ajaxDisplay.innerHTML = html;
			}
		});
	}
</script>