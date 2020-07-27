<?php
	//$id=$_POST['selector'];
	$YearID = "2017";
?>

<div id="view" class="modal hide fade span12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-left:-643px;">
	<div class="modal-header span12">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h4 id="myModalLabel"><i class="icon-info-sign icon-large"></i> Previous Project Procurement Management Plan - Year <?php echo $YearID; ?></h4>
	</div>

	<div class="modal-body">
		<div class="alert alert-success">
		
		<!-- TABLE PARA SA ITEM -->
		<form action="ppmp-add-item-delete.php" method="post" class="scroll  span12">
			<table cellpadding="0" cellspacing="0" border="0" id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th><b>Item Code</b></th>
						<th><b>Item Description</b></th>
						<th><b>Unit of Measurement</b></th>
						<th><b>Schedule/ Milestones of Activities:</b></th>
						<th><b>Quantity</b></th>
						<th><b>Price Catalogue</b></th>
						<th><b>Total Amount</b></th>
					</tr>
				</thead>
				
				<tbody>
					<?php
					//$query1 = mysqli_query($conn,"SELECT * FROM users WHERE Year='$YearID'");
					//while($row1 = mysqli_fetch_array($query1)) {
					//$Year = $row1['Year'];
					
					$query3 = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE Year = $YearID AND user_id='$session_id'  AND Status = 'Completed'");
					while($row3 = mysqli_fetch_array($query3)){
					$id = $row3['ppmpID'];
					?>
					<tr>
						<td width="100" style="text-align:center;"><?php echo $row2['itemdetailCode']; ?></td> 
						<td width="300" style="text-align:center;"><?php echo $row2['itemdetailDesc']; ?></td> 
						<td width="100" style="text-align:center;"><?php echo $row2['UnitOfMeasurement']; ?></td>
						<td width="100" style="text-align:center;"><?php echo $row2['Month']; ?></td>			
						<td width="100" style="text-align:center;"><?php echo $row2['Quantity']; ?></td>
						<td width="150" style="text-align:right;"><?php echo $row2['PriceCatalogue']; ?></td>
						<td width="300" style="text-align:right;"><?php echo $row2['TotalAmount']; ?></td>
					</tr>
					<?php
						}
					?>
				</tbody>
				<tfooter>
					<tr>
						<th colspan="6" align="right"><h4>TOTAL AMOUNT: </h4></th>
						
						<?php
							$row = mysqli_query($conn,"SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year=$YearID AND user_id='$session_id'  AND Status = 'Completed'") ;
							while($result = mysqli_fetch_array($row)){
								echo "<th style='text-align:right;'><h4>" . $result['Totalx'] . "</h4></th>";
							}
						?>
					</tr>
				</tfooter>
			</table>
		</form>
		
		
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
		<!-- <button name="delete" class="btn btn-danger" id="yes"><i class="icon-check icon-large"></i> Yes</button> -->
	</div>
</div>