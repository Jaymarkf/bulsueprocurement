<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
		<h4 class="span12">Manage Item Details</h4>
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="span3" id="">
				<?php  include('item-details-add.php');  ?>		   			
				</div>
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
							<?php 
							$query = mysql_query("select * from tbl_item_details")or die(mysql_error());
							$count = mysql_num_rows($query);
							?>
                                <div class="muted pull-left"><i class="icon-tags icon-large"></i> Items Detail List</div>
                                <div class="muted pull-right">
									Number of Items: <span class="badge badge-info"><?php echo $count; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="item-details-delete.php" method="post" class="scroll">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-placement="right" title="Click to Delete check item" data-toggle="modal" href="#delete_item_details" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i> Delete</a>
										<script type="text/javascript">
											$(document).ready(function(){
												$('#delete').tooltip('show');
												$('#delete').tooltip('hide');
											});
										</script>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												<th>Select</th>
												<th>Edit</th>
												<th>Category</th>
												<th>Description</th>
												<th>PriceCatalogue</th>
										   </tr>
										</thead>
										<tbody>
												<?php
													$query1 = mysql_query("select * from tbl_item_details ORDER BY itemdetailID DESC")or die(mysql_error());
													while($row1 = mysql_fetch_array($query1)){
														$id = $row1['itemdetailID'];
														$itemcategoryID = $row1['itemcategoryID'];												
												?>
													
												<tr>
												<td width="10" style="text-align:center;">
												<input title="Check to Delete" id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td width="10" style="text-align:center;">
												<a data-placement="top" id="edit<?php echo $id; ?>" title="Click to Edit" href="item-details-edit.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-small"></i></a>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#edit<?php echo $id; ?>').tooltip('show');
															$('#edit<?php echo $id; ?>').tooltip('hide');
														});
														</script>
												</td>
												<?php
													$query2 = mysql_query("select * from tbl_item_category where itemcategoryID='$itemcategoryID'")or die(mysql_error());
													while($row2= mysql_fetch_array($query2)){
														$itemCatDesc = $row2['ItemCatDesc'];	
												?>
												<td><?php echo $itemCatDesc; ?> </td>
												<?php
													}
												?>
												<td><?php echo $row1['itemdetailDesc']; ?></td>
												<td style="text-align:right;"><?php echo "&#8369;". number_format($row1['PriceCatalogue'],2, '.', ','); ?></td>
												</tr>
												<?php
													}
												?>
										</tbody>
									</table>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>