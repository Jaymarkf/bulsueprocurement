<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<form name="pritem" method="POST">
<div class="modal fade" id="additems" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add New Items</h4>
			</div>
			<div class="modal-body">			
				<div class="form-group">
				<!-- <label class="span2">PR NO: </label><input class="span10" type="text" name="ciPRno" value="<?php echo $PR; ?>"> -->
				<table cellpadding="0" cellspacing="0" border="1" id="example1" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th ></th>
							<th><b>Item Description</b></th>
							<th><b>Unit of Measurement</b></th>
							<th><b>Total Qty</b></th>
							<th><b>Price Catalogue</b></th>
							<th><b>Total Amount</b></th>
						</tr>
					</thead>
					<tbody>
						<?php					
							$query3 = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
							while($row3 = mysqli_fetch_array($query3)) {
							$Year3 = $row3['Year'];
							
//							$query4 = mysqli_query($conn,"SELECT * FROM tbl_ppmp_consolidated WHERE Year = $Year3");
                            $query4 =  mysqli_query($conn,"select sum(".Date('M').") as TotalQty,Status,ItemCatDesc,itemdetailDesc
                                                                ,UnitOfMeasurement,
                                                                PriceCatalogue,(sum(".Date('M').") * PriceCatalogue) as TotalAmount,Year
                                                                from tbl_ppmp
                                                                where Year = '2021' and Status = 'Completed'
                                                                group by Status,ItemCatDesc,itemdetailDesc,PriceCatalogue,UnitOfMeasurement");
							while($row4 = mysqli_fetch_array($query4)){
							//$id4 = $row4['ppmpID'];
						?>
						<tr>
							<input id="Year" type="hidden" name="Year" value="<?php echo $Year3;?>"/>
							<input id="PO" type="hidden" name="PO" value="<?php echo $PO;?>"/>
							<td><input id="itemDesc" type="checkbox" name="itemDesc[]" value="<?php echo $row4['itemdetailDesc']; ?>"/></td>
							<td><?php echo $row4['itemdetailDesc']; ?></td> 
							<td><input id="UOM" type="hidden" name="UOM[]" value="<?php echo $row4['UnitOfMeasurement']; ?>"/><?php echo $row4['UnitOfMeasurement']; ?></td>
							<td><input id="STQty" type="hidden" name="STQty[]" value="<?php echo $row4['TotalQty']; ?>"/><?php echo $row4['TotalQty']; ?></td>
							<td style="text-align: right;"><input id="PriceCat" type="hidden" name="PriceCat[]" value="<?php echo $row4['PriceCatalogue']; ?>"/>&#8369;<?php echo number_format($row4['PriceCatalogue'],2, '.', ','); ?></td>
							<td style="text-align: right;"><input id="TAmt" type="hidden" name="TAmt[]" value="<?php echo $row4['TotalAmount']; ?>"/>&#8369;<?php echo number_format($row4['TotalAmount'],2, '.', ','); ?></td>
						</tr>
						<?php 
							}
						}
						?>    		
					</tbody>
				</table>
				</div>
			</div>
								
			<div class="modal-footer">
				<button type="submit" name="btn-save-item" class="btn btn-primary"><i class="icon-save icon-large"></i> Submit </button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-undo icon-large"></i> Cancel </button>
			</div>
		</div>
	</div>
</div>
</form>
<!-- // Modal -->