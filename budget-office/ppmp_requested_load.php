<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php
	if (isset($_GET['viewby'])) {
		$viewby = $_GET['viewby'];
		IF ($viewby <> 'All') {
?>

<?php
$id = $_SESSION['branch_id'];
$Year = $_SESSION['year_id'];
?>

		<!-- <table cellpadding="0" cellspacing="0" border="0" id="example1" class="display" width="100%"> -->
		<table cellpadding="0" cellspacing="0" border="1" id="" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th rowspan="2"><b>Item Description</b></th>
					<th rowspan="2"><b>Unit of Measurement</b></th>
					<th rowspan="2"><b>Estimated Budget</b></th>
					<th colspan="12"><b>Schedule/ Milestones of Activities:</b></th>
					<th rowspan="2"><b>Total Qty</b></th>
					<th rowspan="2"><b>Price Catalogue</b></th>
					<th rowspan="2"><b>Total Amount</b></th>
					<th rowspan="2"><b>Remarks</b></th>
					<th rowspan="2"><b>Actions</b></th>
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
					$query3 = mysqli_query($conn,"SELECT * FROM users WHERE branch='$id'");
					while($row3 = mysqli_fetch_array($query3)) {
					$Year3 = $row3['Year'];
					$user_id3 = $row3['user_id'];
					$query4 = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE Year = $Year3 AND user_id='$user_id3'  AND Status = 'Requested' AND BO_PPMP_Status <> 'Approved' AND SourceOfFund = '$viewby'");
					while($row4 = mysqli_fetch_array($query4)){
					$id4 = $row4['ppmpID'];
				?>
				<tr>
					<td width="500" style="text-align:center;"><?php echo $row4['itemdetailDesc']; ?></td> 
					<td width="50" style="text-align:center;"><?php echo $row4['UnitOfMeasurement']; ?></td>
					<td width="50" style="text-align:center;"><?php echo "&#8369;" . number_format($row4['EstimatedBudget'],0,'',','); ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Jan']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Feb']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Mar']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Apr']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['May']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Jun']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Jul']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Aug']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Sep']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Oct']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Nov']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Dec']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['TotalQty']; ?></td>
					<td width="50" style="text-align:right;"><?php echo $row4['PriceCatalogue']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['TotalAmount']; ?></td>
					<td width="300" style="text-align:center;"><?php echo $row4['Remarks']; ?></td>
					<td class="empty" width="200" style="text-align:center;">
						<div class="span12">
								<a class="btn btn-success"><i class="icon-pencil icon-small"></i></a>
								<a class="btn btn-danger"><i class="icon-trash icon-small"></i></a>
						</div>
					</td>
					<?php } ?>
				</tr>
				<?php 
					}
				?>    		
			</tbody>
			<tfooter>
				<tr>
					<th colspan="16" align="right"><h4>TOTAL AMOUNT: </h4></th>					
					<?php
						$row5 = mysqli_query($conn,"SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year = $Year3 AND EndUserUnit='$id'  AND Status = 'Requested' AND BO_PPMP_Status <> 'Approved' AND SourceOfFund = '$viewby'") ;
						
						while($result5 = mysqli_fetch_array($row5)){
							echo "<th colspan='10' style='text-align:right;'><h4>" . $result5['Totalx'] . "</h4></th>";
//							echo "<th></th>";
//							echo "<th></th>";
						}
					?>
				</tr>
			</tfooter>
		</table>
		<?php
			exit();
		} else{
		?>
<?php
$id = $_SESSION['branch_id'];
$Year = $_SESSION['year_id'];
?>
		<!-- <table cellpadding="0" cellspacing="0" border="0" id="example1" class="display" width="100%"> -->
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
					<th rowspan="2"><b>Actions</b></th>
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
					$query3 = mysqli_query($conn,"SELECT * FROM users WHERE branch='$id'");
					while($row3 = mysqli_fetch_array($query3)) {
					$Year3 = $row3['Year'];
					$user_id3 = $row3['user_id'];
					
					$query4 = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE Year = $Year3 AND user_id='$user_id3'  AND Status = 'Requested' AND BO_PPMP_Status <> 'Approved'");
					
					while($row4 = mysqli_fetch_array($query4)){
					$id4 = $row4['ppmpID'];
				?>
				<tr>
					<td width="500" style="text-align:center;"><?php echo $row4['itemdetailDesc']; ?></td> 
					<td width="50" style="text-align:center;"><?php echo $row4['UnitOfMeasurement']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Jan']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Feb']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Mar']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Apr']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['May']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Jun']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Jul']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Aug']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Sep']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Oct']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Nov']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Dec']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['TotalQty']; ?></td>
					<td width="50" style="text-align:right;"><?php echo $row4['PriceCatalogue']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['TotalAmount']; ?></td>
					<td width="300" style="text-align:center;"><?php echo $row4['Remarks']; ?></td>
					<td class="empty" width="200" style="text-align:center;">
						<div class="span12">
								<a class="btn btn-success"><i class="icon-pencil icon-small"></i></a>
								<a class="btn btn-danger"><i class="icon-trash icon-small"></i></a>
						</div>
					</td>
					<?php } ?>
				</tr>
				<?php 
					}
				?>    		
			</tbody>
			<tfooter>
				<tr>
					<th colspan="16" align="right"><h4>TOTAL AMOUNT: </h4></th>
					
					<?php
						$row5 = mysqli_query($conn,"SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year = $Year3 AND EndUserUnit='$id'  AND Status = 'Requested' AND BO_PPMP_Status <> 'Approved'") ;
						
						while($result5 = mysqli_fetch_array($row5)){
							echo "<th style='text-align:right;'><h4>" . $result5['Totalx'] . "</h4></th>";
							echo "<th></th>";
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