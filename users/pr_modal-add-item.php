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
							$query3 = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
							while($row3 = mysqli_fetch_array($query3)) {
							$Year3 = $row3['Year'];
							$EUU = $row3['branch'];
							
							//$query4 = mysqli_query($conn,"SELECT * FROM tbl_ppmp_consolidated WHERE Year = $Year3");
							$query4 = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE Year = '$Year3' AND EndUserUnit = '$EUU'");

							while($row4 = mysqli_fetch_array($query4)){
							//$id4 = $row4['ppmpID'];
                                $qty = $row4[Date('M')];
                                $total_qty = $qty * $row4['PriceCatalogue'];
                                if($qty != '0'){

						?>
                            <tr>
                                <input type="hidden" name="estimated_budget" value="<?=$row4['EstimatedBudget'];?>"/>
                                <input id="Year" type="hidden" name="Year" value="<?php echo $Year3;?>"/>
                                <input id="PR" type="hidden" name="PR" value="<?php echo $PR;?>"/>
                                <input type="hidden" name="user_id" value="<?=$row4['user_id'];?>"/>
                                <td><input id="itemDesc" type="checkbox" name="itemDesc[]" value="<?php echo $row4['itemdetailDesc']; ?>"/></td>
                                <td><?php echo $row4['itemdetailDesc']; ?></td>
                                <td><input id="UOM" type="hidden" name="UOM" value="<?php echo $row4['UnitOfMeasurement']; ?>"/><?php echo $row4['UnitOfMeasurement']; ?></td>
                                <td><input id="STQty" type="hidden" name="STQty" value="<?php echo $qty; ?>"/><?php echo $qty; ?></td>
                                <td><input id="PriceCat" type="hidden" name="PriceCat" value="<?php echo $row4['PriceCatalogue']; ?>"/><?php echo $row4['PriceCatalogue']; ?></td>
                                <td><input id="TAmt" type="hidden" name="TAmt" value="<?php echo $total_qty; ?>"/><?php echo $total_qty; ?></td>
                                <input type="hidden" name="fc" value="<?php echo $row4['SourceOfFund'];?>"/>
                            </tr>
                        <?php


                            }else{
							    echo '<h4 class="text-center text-warning">There is no purchase request for this month of '.Date('M').'</h4>';
                                }
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