
<div class="">
	<form method="POST">
		<table cellpadding="0" cellspacing="0" border="0" id="example1" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th><b>Stock Property No.</b></th>
					<th><b>Unit</b></th>
					<th><b>Item Description</b></th>
					<th><b>Quantity</b></th>
					<th><b>Unit Cost</b></th>
					<th><b>Total Cost</b></th>
					<th><b>Action</b></th>
				</tr>
			</thead>
			
			<tbody>
				<?php					
					$query3 = mysql_query("SELECT * FROM users WHERE user_id = '$session_id'")or die(mysql_error());
					while($row3 = mysql_fetch_array($query3)) {
					$Year3 = $row3['Year'];
					
					$query4 = mysql_query("SELECT * FROM tbl_pr_items WHERE Year = $Year3 AND PRno = $PR ORDER BY prID DESC")or die(mysql_error());
					while($row4 = mysql_fetch_array($query4)){
					$id4 = $row4['prID'];
					$PRno4 = $row4['PRno']; 
				?>
				<tr>
					<td width="150" style="text-align:center;"><?php echo $row4['StockPropertyNo']; ?></td>
					<td width="150" style="text-align:center;"><?php echo $row4['Unit']; ?></td>
					<td width="500" style="text-align:left;"><?php echo $row4['ItemDescription']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Quantity']; ?></td>
					<td width="100" style="text-align:right;"><?php echo "&#8369;" . number_format($row4['UnitCost'],2, '.', ','); ?></td>
					<td width="100" style="text-align:right;"><?php echo "&#8369;" . number_format($row4['TotalCost'],2, '.', ','); ?></td>
					<!-- <td width="50" style="text-align:right;"><a class="btn btn-danger"><i class="icon-trash icon-small"></i></a></td> -->
					<td class="empty" style="text-align:center;">
						<div class="span12">
								<a name="delete" data-placement="top" title="Click to remove the item" id="delete<?php echo $id; ?>" href="pr_approved-delete.php<?php echo '?id='.$id4; ?>" class="btn btn-danger"><i class="icon-trash icon-small"></i></a>
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
					<th colspan="5" align="right"><h4>TOTAL AMOUNT: </h4></th>
					<?php
						//$row = mysql_query("SELECT SUM(TotalAmount) as Totalx FROM tbl_pr_items WHERE Year=$Year AND user_id='$session_id'  AND Status = 'Pending'") or die(mysql_error());
						$row = mysql_query("SELECT SUM(TotalCost) as Totalx FROM tbl_pr_items WHERE Year=$Year AND PRno = '$PR'") or die(mysql_error());				
						while($result = mysql_fetch_array($row)){
							echo "<th style='text-align:right;'><h4>&#8369;" . number_format($result['Totalx'],2, '.', ',') . "</h4></th>";
							echo "<th></th>";
							echo "<th></th>";
						}
					?>
				</tr>
			</tfooter>			
		</table>
	</form>
</div>