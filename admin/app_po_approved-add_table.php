
<div class="">
	<form method="POST">
		<table cellpadding="0" cellspacing="0" border="0" id="example" class="display" cellspacing="0" width="100%">
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
					$query3 = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
					while($row3 = mysqli_fetch_array($query3)) {
					$Year3 = $row3['Year'];
					
					$query4 = mysqli_query($conn,"SELECT * FROM tbl_po_items WHERE Year = $Year3 AND POno = $PO ORDER BY poID DESC");
					while($row4 = mysqli_fetch_array($query4)){
					$id4 = $row4['poID'];
				?>
				<tr>
					<td width="150" style="text-align:center;"><?php echo $row4['StockPropertyNo']; ?></td>
					<td width="150" style="text-align:center;"><?php echo $row4['Unit']; ?></td>
					<td width="500" style="text-align:left;"><?php echo $row4['ItemDescription']; ?></td>
					<td width="100" style="text-align:right;"><?php echo $row4['Quantity']; ?></td>
					<td width="100" style="text-align:right;">&#8369;<?php echo number_format($row4['UnitCost'],2, '.', ','); ?></td>
					<td width="100" style="text-align:right;">&#8369;<?php echo number_format($row4['TotalCost'],2, '.', ','); ?></td>
					<!-- <td width="50" style="text-align:right;"><a class="btn btn-danger"><i class="icon-trash icon-small"></i></a></td> -->
					<td class="empty" style="text-align:center;">
						<div class="span12">
								<a name="delete" data-placement="top" title="Click to remove the item" id="delete<?php echo $id; ?>" href="app_po_approved-delete.php<?php echo '?id='.$id4; ?>" class="btn btn-danger"><i class="icon-trash icon-small"></i></a>
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
		</table>
	</form>
</div>