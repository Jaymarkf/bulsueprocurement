
<div class="">	
	<div class="">
		<a href="dashboard.php" title="Back to PPMP-Dashboard" id="back" data-placement="right" class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#back').tooltip('show');
					$('#back').tooltip('hide');
				});
			</script>
		
		<!-- CHECK IF ALREADY CONSOLIDATE THE PPMP YEAR -->	
		<?php
			//$query = mysql_query("SELECT * FROM tbl_year")or die(mysql_error());
			$query = mysql_query("SELECT * FROM users WHERE user_id='$session_id'")or die(mysql_error());
			while($row = mysql_fetch_array($query)) {
				$Year = $row['Year'];
			}
			
			$query1= mysql_query("select * from tbl_ppmp_consolidated WHERE Year = '$Year'")or die(mysql_error());
			$count1 = mysql_num_rows($query1);
		?>	
		
		<?php if ($count1 == "0") { ?>
			<a href="app_approved_consolidate.php?link=1" name="consolidate" title="Consolidate PPMP" id="back" data-placement="right" class="btn btn-warning"><i class="icon-inbox icon-large"></i> Consolidate </a>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#back').tooltip('show');
					$('#back').tooltip('hide');
				});
			</script>
		<?php }else{ ?>
			<a href="#" title="Consolidate not possible..." id="back" data-placement="right" class="btn btn-default"><i class="icon-inbox icon-large"></i> Consolidate </a>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#back').tooltip('show');
					$('#back').tooltip('hide');
				});
			</script>
		<?php } ?>
		<!-- CHECK IF ALREADY CONSOLIDATE THE PPMP YEAR -->
		<!-- RESET THE CONSOLIDATE PPMP YEAR -->
		<?php
			//$query = mysql_query("SELECT * FROM tbl_year")or die(mysql_error());
			$query = mysql_query("SELECT * FROM users WHERE user_id='$session_id'")or die(mysql_error());
			while($row = mysql_fetch_array($query)) {
				$Year = $row['Year'];
			}
			
			$query2= mysql_query("select * from tbl_ppmp_consolidated WHERE Year = '$Year'")or die(mysql_error());
			$count2 = mysql_num_rows($query2);
		?>	
		
		<?php if ($count2 == "0") { ?>
			<a title="Reset not possible..." id="back" data-placement="right" class="btn btn-alert"><i class="icon-undo icon-large"></i> Reset </a>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#back').tooltip('show');
					$('#back').tooltip('hide');
				});
			</script>
		<?php }else{ ?>
			<a href="reset_app_approved_consolidate.php<?php echo '?id='.$Year; ?>" title="Reset the Consolidated PPMP Year" id="back" data-placement="right" class="btn btn-danger"><i class="icon-undo icon-large"></i> Reset </a>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#back').tooltip('show');
					$('#back').tooltip('hide');
				});
			</script>
		<?php } ?>	
		<!-- RESET THE CONSOLIDATE PPMP YEAR -->		
	</div>
	
	<br/>
	<form method="POST">
		<table cellpadding="0" cellspacing="0" border="0" id="example1" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th rowspan="2"><b>Item Description</b></th>
					<th rowspan="2"><b>Unit of Measurement</b></th>
					<th rowspan="2"><b>Total Qty</b></th>
					<th rowspan="2"><b>Price Catalogue</b></th>
					<th rowspan="2"><b>Total Amount</b></th>
				</tr>
			</thead>
			
			<tbody>
				<?php					
					$query3 = mysql_query("SELECT * FROM users WHERE user_id = '$session_id'")or die(mysql_error());
					while($row3 = mysql_fetch_array($query3)) {
					$Year3 = $row3['Year'];
					
					$query4 = mysql_query("SELECT * FROM tbl_ppmp_consolidated WHERE Year = $Year3")or die(mysql_error());
					while($row4 = mysql_fetch_array($query4)){
					$id4 = $row4['consolidatedID'];
				?>
				<tr>
					<td width="500" style="text-align:center;"><?php echo $row4['itemdetailDesc']; ?></td> 
					<td width="50" style="text-align:center;"><?php echo $row4['UnitOfMeasurement']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['TotalQty']; ?></td>
					<td width="150" style="text-align:right;">&#8369;<?php echo number_format($row4['PriceCatalogue'],2, '.', ','); ?></td>
					<td width="150" style="text-align:right;">&#8369;<?php echo number_format($row4['TotalAmount'],2, '.', ','); ?></td>
				</tr>
				<?php 
					}
				}
				?>    		
			</tbody>
			<tfooter>
				<tr>
					<th colspan="4" align="right"><h4>TOTAL AMOUNT: </h4></th>
					
					<?php
						//$row = mysql_query("SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year=$Year3 AND user_id='$session_id'  AND Status = 'Requested'") or die(mysql_error());
						$row5 = mysql_query("SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp_consolidated WHERE Year=$Year3") or die(mysql_error());
						while($result5 = mysql_fetch_array($row5)){
							echo "<th style='text-align:right;'><h4>&#8369;" . number_format($result5['Totalx'],2, '.', ',') . "</h4></th>";
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