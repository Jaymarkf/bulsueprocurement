<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="additems" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form name="pritem" method="POST">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add New Items</h4>
			</div>
			<div class="modal-body">			
				<div class="form-group">
				<!-- <label class="span2">PR NO: </label><input class="span10" type="text" name="ciPRno" value="<?php echo $PR; ?>"> -->
				<table cellpadding="0" cellspacing="0" border="1" id="example" class="display" cellspacing="0" width="100%">
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
							$query3 = mysql_query("SELECT * FROM users WHERE user_id = '$session_id'")or die(mysql_error());
							while($row3 = mysql_fetch_array($query3)) {
							$Year3 = $row3['Year'];
							$EUU = $row3['branch'];
							
							//$query4 = mysql_query("SELECT * FROM tbl_ppmp_consolidated WHERE Year = $Year3")or die(mysql_error());
							$query4 = mysql_query("SELECT * FROM tbl_ppmp WHERE Year = '$Year3' AND EndUserUnit = '$EUU'")or die(mysql_error());
							while($row4 = mysql_fetch_array($query4)){
							//$id4 = $row4['ppmpID'];
						?>
						<tr>
							<input id="Year" type="hidden" name="Year" value="<?php echo $Year3;?>"/>
							<input id="PR" type="hidden" name="PR" value="<?php echo $PR;?>"/>
							<td><input id="itemDesc" type="checkbox" name="itemDesc[]" value="<?php echo $row4['itemdetailDesc']; ?>"/></td>
							<td><?php echo $row4['itemdetailDesc']; ?></td> 
							<td><input id="UOM" type="hidden" name="UOM" value="<?php echo $row4['UnitOfMeasurement']; ?>"/><?php echo $row4['UnitOfMeasurement']; ?></td>
							<td><input id="STQty" type="hidden" name="STQty" value="<?php echo $row4['TotalQty']; ?>"/><?php echo $row4['TotalQty']; ?></td>
							<td><input id="PriceCat" type="hidden" name="PriceCat" value="<?php echo $row4['PriceCatalogue']; ?>"/><?php echo $row4['PriceCatalogue']; ?></td>
							<td><input id="TAmt" type="hidden" name="TAmt" value="<?php echo $row4['TotalAmount']; ?>"/><?php echo $row4['TotalAmount']; ?></td>
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
		</form>
	</div>
</div>
<!-- // Modal -->