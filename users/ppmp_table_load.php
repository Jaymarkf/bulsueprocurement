<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php include('session.php'); ?>
<?php
	if (isset($_GET['viewby'])) {
		$viewby = $_GET['viewby'];
		IF ($viewby <> 'All') {
?>
			<!-- <table cellpadding="0" cellspacing="0" border="0" id="example1" class="display" > -->
			<table cellpadding="0" cellspacing="0" border="1" id="" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th rowspan="2"><b>Item Description</b></th>
						<th rowspan="2"><b>Unit of Measurement</b></th>
						<th colspan="12"><b>Schedule/Milestones of Activities:</b></th>
						<th rowspan="2"><b>Total Qty</b></th>
						<th rowspan="2"><b>Price Catalogue</b></th>
						<th rowspan="2"><b>Total Amount</b></th>
						<th rowspan="2"><b>Remarks</b></th>
						<th rowspan="2" class="empty"><b>Action</b></th>
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
						$session_id=$_SESSION['member_id'];
						$query1 = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
						while($row1 = mysqli_fetch_array($query1)) {
						$Year = $row1['Year'];
						
						$query2 = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE Year = $Year AND user_id='$session_id'  AND Status = 'Pending' AND SourceOfFund = '$viewby'");
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
						<td width="150" style="text-align:center;"><b><?php echo $row2['TotalQty']; ?></b></td>
						<td width="150" style="text-align:right;"><b><?php echo $row2['PriceCatalogue']; ?></b></td>
						<td width="300" style="text-align:right;"><b><?php echo $row2['TotalAmount']; ?></b></td>
						<td width="300" style="text-align:right;"><b><?php echo $row2['Remarks']; ?></b></td>
						
						<td class="empty" width="200" style="text-align:center;">
							<div class="span12">
									<a data-placement="top" title="Click to edit the item" id="edit<?php echo $id; ?>" href="ppmp_edit.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-small"></i></a>
									<script type="text/javascript">
									$(document).ready(function(){
										$('#edit<?php echo $id; ?>').tooltip('show');
										$('#edit<?php echo $id; ?>').tooltip('hide');
									});
									</script>

									<a name="delete" data-placement="top" title="Click to remove the item" id="delete<?php echo $id; ?>" href="ppmp_delete.php<?php echo '?id='.$id; ?>" class="btn btn-danger"><i class="icon-trash icon-small"></i></a>
									<script type="text/javascript">
									$(document).ready(function(){
										$('#delete<?php echo $id; ?>').tooltip('show');
										$('#delete<?php echo $id; ?>').tooltip('hide');
									});
									</script>
							</div>
						</td>
					</tr>
					<?php 
						}
					}
					?>    		
				</tbody>
				<tfooter>
					<tr>
						<th colspan="16" align="right"><h4>TOTAL AMOUNT: </h4></th>
						
						<?php
							$row = mysqli_query($conn,"SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year=$Year AND user_id='$session_id'  AND Status = 'Pending' AND SourceOfFund = '$viewby'") ;
							while($result = mysqli_fetch_array($row)){
								echo "<th style='text-align:right;'><h4>" . $result['Totalx'] . "</h4></th>";
								echo "<th></th>";
								echo "<th></th>";
							}
						?>
						
					</tr>
				</tfooter>
			</table>
		<br/><br/>
		<?php
			exit();
		} else{
		?>

			<!-- <table cellpadding="0" cellspacing="0" border="0" id="example1" class="display" > -->
			<table cellpadding="0" cellspacing="0" border="1" id="" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th rowspan="2"><b>Item Description</b></th>
						<th rowspan="2"><b>Unit of Measurement</b></th>
						<th colspan="12"><b>Schedule/Milestones of Activities:</b></th>
						<th rowspan="2"><b>Total Qty</b></th>
						<th rowspan="2"><b>Price Catalogue</b></th>
						<th rowspan="2"><b>Total Amount</b></th>
						<th rowspan="2"><b>Remarks</b></th>
						<th rowspan="2" class="empty"><b>Action</b></th>
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
						$session_id=$_SESSION['member_id'];
						$query1 = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
						while($row1 = mysqli_fetch_array($query1)) {
						$Year = $row1['Year'];
						
						$query2 = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE Year = $Year AND user_id='$session_id'  AND Status = 'Pending'");
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
						<td width="150" style="text-align:center;"><b><?php echo $row2['TotalQty']; ?></b></td>
						<td width="150" style="text-align:right;"><b><?php echo $row2['PriceCatalogue']; ?></b></td>
						<td width="300" style="text-align:right;"><b><?php echo $row2['TotalAmount']; ?></b></td>
						<td width="300" style="text-align:right;"><b><?php echo $row2['Remarks']; ?></b></td>
						
						<td class="empty" width="200" style="text-align:center;">
							<div class="span12">
									<a data-placement="top" title="Click to edit the item" id="edit<?php echo $id; ?>" href="ppmp_edit.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-small"></i></a>
									<script type="text/javascript">
									$(document).ready(function(){
										$('#edit<?php echo $id; ?>').tooltip('show');
										$('#edit<?php echo $id; ?>').tooltip('hide');
									});
									</script>

									<a name="delete" data-placement="top" title="Click to remove the item" id="delete<?php echo $id; ?>" href="ppmp_delete.php<?php echo '?id='.$id; ?>" class="btn btn-danger"><i class="icon-trash icon-small"></i></a>
									<script type="text/javascript">
									$(document).ready(function(){
										$('#delete<?php echo $id; ?>').tooltip('show');
										$('#delete<?php echo $id; ?>').tooltip('hide');
									});
									</script>
							</div>
						</td>
					</tr>
					<?php 
						}
					}
					?>    		
				</tbody>
				<tfooter>
					<tr>
						<th colspan="16" align="right"><h4>TOTAL AMOUNT: </h4></th>
						
						<?php
							$row = mysqli_query($conn,"SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year=$Year AND user_id='$session_id'  AND Status = 'Pending'") ;
							while($result = mysqli_fetch_array($row)){
								echo "<th style='text-align:right;'><h4>" . $result['Totalx'] . "</h4></th>";
								echo "<th></th>";
								echo "<th></th>";
							}
						?>
						
					</tr>
				</tfooter>
			</table>
		<br/><br/>
		<?php
			exit();
		}
	}else{
		echo 'no selected';
		mysql_close($connection); // Connection Closed
	}
?>