<!-- user modal -->
<div id="add_item" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="btn btn-danger pull-right" data-dismiss="modal" aria-hidden="true">x</button>
		<a href="ppmp-add-item-delete.php" name="item-add" class="btn btn-success" id="yes"><i class="icon-check icon-large"></i> Add</a>
		<br/><br/>
		<h3 id="myModalLabel"><i class="icon-tags icon-large"></i> Select Item</h3>
	</div>
	
	<div class="modal-body">
		<div class="alert alert-success">
		
			<!-- TABLE PARA SA ITEM -->
			<form action="ppmp-add-item-delete.php" method="post" class="scroll">
			
				<table cellpadding="0" cellspacing="0" border="0" class="table" id="example1">
					<thead>
					  <tr>
							<th>Select</th>
							<th>Category</th>
							<th>Code</th>
							<th>Description</th>
							<th>PriceCatalogue</th>
					   </tr>
					</thead>
					<tbody>
							<?php
								$query1 = mysqli_query($conn,"select * from tbl_item_details ORDER BY itemdetailID DESC");
								while($row1 = mysqli_fetch_array($query1)){
									$id = $row1['itemdetailID'];
									$itemcategoryID = $row1['itemcategoryID'];
								
								$query2 = mysqli_query($conn,"select * from tbl_item_category where itemcategoryID='$itemcategoryID'");
								while($row2= mysqli_fetch_array($query2)){
									$itemCatDesc = $row2['ItemCatDesc'];
								}
							?>
								
							<tr>
							<td width="10" style="text-align:center;">
								<input title="Check to Add" id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
							</td>

							<td><?php echo $itemCatDesc; ?> </td>
							<td><?php echo $row1['itemdetailCode']; ?></td>
							<td><?php echo $row1['itemdetailDesc']; ?></td>
							<td><?php echo $row1['PriceCatalogue']; ?></td>
							</tr>
							<?php } ?>
					</tbody>
				</table>
			</form>
			
		</div>
	</div>
</div>