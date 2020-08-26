
<?php
	//require_once 'config.php';
	if(isset($_GET['update_id'])) {
		$update_id = $_GET['update_id'];
		
		mysqli_query($conn,"UPDATE tbl_ppmp SET Status = 'Completed' WHERE Status = 'Requested' AND BO_PPMP_Status = 'Approved' AND EndUserUnit='$update_id'");
		
		header('Location: app_approved.php');
	}
?>

<div class="">	
	<div class="span9 pull-left">
		<a href="dashboard.php" title="Back to PPMP-Dashboard" id="back" data-placement="right" class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#back').tooltip('show');
					$('#back').tooltip('hide');
				});
			</script>
	</div>
	
	<div class="span3 pull-right">
		<form name="vTable" method="post">
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
	
	<h3>EndUser/Unit: 
	<?php 
		echo $id;
	?>
	</h3>
	<br/>
	
	<form method="POST">
	<div id="displaydata">	
		<!-- <table cellpadding="0" cellspacing="0" border="0" id="example1" class="display" cellspacing="0" width="100%"> -->
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
					
					//$query4 = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE Year = $Year3 AND user_id='$user_id3'  AND Status = 'Requested' AND BO_PPMP_Status = 'Approved'");
					$query4 = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE Year = $Year3 AND user_id='$user_id3' AND BO_PPMP_Status = 'Approved'");
					while($row4 = mysqli_fetch_array($query4)){
					$id4 = $row4['ppmpID'];
				?>
				<tr>				
				<?php if ($row4['BO_PPMP_Status'] == "Supplemental") { ?>
					<td width="300" style="text-align:center;"><?php echo $row4['itemdetailDesc']; ?></td> 
					<td width="100" style="text-align:center;"><?php echo $row4['UnitOfMeasurement']; ?></td>
                    <td width="100" style="text-align:center;"><?php echo "&#8369;" . number_format($row4['EstimatedBudget'],0,'',','); ?></td>
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
					<td width="300" style="text-align:right;">&#8369; <?php echo number_format($row4['PriceCatalogue'],2, '.', ','); ?></td>
					<td width="300" style="text-align:right;">&#8369; <?php echo number_format($row4['TotalAmount'],2, '.', ','); ?></td>
					<td width="300" style="text-align:center;"><?php echo $row4['Remarks']; ?></td> 

				<?php } elseif ($row4['BO_PPMP_Status'] == "Revise") { ?>
					<td width="300" style="text-align:center;"><?php echo $row4['itemdetailDesc']; ?></td> 
					<td width="100" style="text-align:center;"><?php echo $row4['UnitOfMeasurement']; ?></td>
                    <td width="100" style="text-align:center;"><?php echo "&#8369;" . number_format($row4['EstimatedBudget'],0,'',','); ?></td>
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
					<td width="300" style="text-align:right;">&#8369; <?php echo number_format($row4['PriceCatalogue'],2, '.', ','); ?></td>
					<td width="300" style="text-align:right;">&#8369; <?php echo number_format($row4['TotalAmount'],2, '.', ','); ?></td>
					<td width="300" style="text-align:center;"><?php echo $row4['Remarks']; ?></td> 
					
				<?php } elseif ($row4['BO_PPMP_Status'] == "Approved"){ ?>
					<td width="300" style="text-align:center;"><?php echo $row4['itemdetailDesc']; ?></td> 
					<td width="50" style="text-align:center;"><?php echo $row4['UnitOfMeasurement']; ?></td>
                    <td width="100" style="text-align:center;"><?php echo "&#8369;" . number_format($row4['EstimatedBudget'],0,'',','); ?></td>
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
					<td width="300" style="text-align:right;">&#8369; <?php echo number_format($row4['PriceCatalogue'],2, '.', ','); ?></td>
					<td width="300" style="text-align:right;">&#8369; <?php echo number_format($row4['TotalAmount'],2, '.', ','); ?></td>
					<td width="300" style="text-align:center;"><?php echo $row4['Remarks']; ?></td> 
					
				<?php } ?>
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
						//$row5 = mysqli_query($conn,"SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year=$Year AND EndUserUnit='$id'  AND Status = 'Requested' AND BO_PPMP_Status = 'Approved'") ;
						$row5 = mysqli_query($conn,"SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year=$Year3 AND EndUserUnit='$id' AND BO_PPMP_Status = 'Approved'") ;
						while($result5 = mysqli_fetch_array($row5)){
							echo "<th colspan='2' style='text-align:center;'><h4>&#8369; " . number_format($result5['Totalx'],2, '.', ',') . "</h4></th>";
							echo "<th></th>";
						}
					?>
					
				</tr>
			</tfooter>
		</table>
	</div> <!-- end of <div id="displaydata"> -->
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