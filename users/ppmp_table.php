<?php include('../dbcon.php'); ?>

<?php
	if(isset($_GET['update_id'])) {
		$update_id = $_GET['update_id'];

		$query1 = mysql_query("SELECT * FROM users WHERE user_id = '$update_id'")or die(mysql_error());
			while($row1 = mysql_fetch_array($query1)) {
				$Year = $row1['Year'];
			}
		mysql_query("UPDATE tbl_ppmp SET Status = 'Requested' WHERE Status = 'Pending' AND Year = $Year AND user_id='$update_id'")or die(mysql_error());
		
		header('Location: ppmp_requested.php');
	}
?>

<div class="">
	<div class="span9" id="studentTableDiv">
		<a href="dashboard.php" data-placement="right" title="Click to Add New Item Request" id="newPPMP" name="NewPPMP" class="btn btn-warning"><i class="icon-plus-sign icon-large"></i> Add New Item</a>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#newPPMP').tooltip('show');
				$('#newPPMP').tooltip('hide');
			});
		</script>
		
		<a data-placement="bottom" title="Click to submit PPMP Lists" id="submit" href="ppmp_table.php<?php echo "?update_id=".$session_id;?>" class="btn btn-success"><i class="icon-save icon-large"></i> SUBMIT </a>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#submit').tooltip('show');
			$('#submit').tooltip('hide');
		});
		</script>
			
	</div>
	<form name="vtable" method="post">
		<div class="span3 pull-right">
			<b>View by: </b>
			<select class="span9" name="viewby" id="empid" onchange="getData(this.value, 'displaydata')" required >
				<option></option>
				<option value="GAA">GAA</option>
				<option value="Income">Income</option>
				<option value="Fiduciary Fund">Fiduciary Fund</option>
				<option value="All">All</option>
			</select>
		</div>
	</form>	
	<br/><br/>
	
	<form name="ftable" method="POST">
	<div id="displaydata" class="span12">
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
					$query1 = mysql_query("SELECT * FROM users WHERE user_id = '$session_id'")or die(mysql_error());
					while($row1 = mysql_fetch_array($query1)) {
					$Year = $row1['Year'];
					
					$query2 = mysql_query("SELECT * FROM tbl_ppmp WHERE Year = $Year AND user_id='$session_id'  AND Status = 'Pending'")or die(mysql_error());
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
					<td width="150" style="text-align:center;"><b><?php echo $row2['TotalQty']; ?></b></td>
					<td width="150" style="text-align:right;"><b><?php echo "&#8369;" . number_format($row2['PriceCatalogue'],2, '.', ','); ?></b></td>
					<td width="300" style="text-align:right;"><b><?php echo "&#8369;" . number_format($row2['TotalAmount'],2, '.', ','); ?></b></td>
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
						$row = mysql_query("SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year=$Year AND user_id='$session_id'  AND Status = 'Pending'") or die(mysql_error());
						while($result = mysql_fetch_array($row)){
							echo "<th style='text-align:right;'><h4>&#8369;" . number_format($result['Totalx'],2, '.', ',') . "</h4></th>";
							echo "<th></th>";
							echo "<th></th>";
						}
					?>
					
				</tr>
			</tfooter>
		</table>
	</div>
	</form>
	
	<br/><br/>
	<div class="span12 pull-left" id="content">
		<a href="dashboard.php" data-placement="right" title="Click to Add New Item Request" id="newPPMP1" name="NewPPMP" class="btn btn-warning"><i class="icon-plus-sign icon-large"></i> Add New Item</a>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#newPPMP1').tooltip('show');
				$('#newPPMP1').tooltip('hide');
			});
		</script>
	
		<a data-placement="top" title="Click to submit PPMP Lists" id="submit1" href="ppmp_table.php<?php echo "?update_id=".$session_id;?>" class="btn btn-success"><i class="icon-save icon-large"></i> SUBMIT </a>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#submit1').tooltip('show');
			$('#submit1').tooltip('hide');
		});
		</script>
	</div>
</div>

<script type="text/javascript">
	function getData(viewby, divid){
		$.ajax({
			url: 'ppmp_table_load.php?viewby='+viewby, //call storeemdata.php to store form data
			success: function(html) {
				var ajaxDisplay = document.getElementById(divid);
				ajaxDisplay.innerHTML = html;
			}
		});
	}
</script>