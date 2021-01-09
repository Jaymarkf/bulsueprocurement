<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
		<h4 class="span12">Manage Item Category</h4>
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="span3" id="">
				<?php include('item-details-form-edit.php'); ?>		   			
				</div>
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                             		<?php 
							$user_query = mysqli_query($conn,"select * from tbl_item_details");
							$count = mysqli_num_rows($user_query);
							?>
                                <div class="muted pull-left"><i class="icon-filter icon-large"></i> Items Detail List</div>
                                <div class="muted pull-right">
									Number of Items: <span class="badge badge-info"><?php echo $count; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="item-category-delete.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a disabled data-placement="right" title="" data-toggle="modal" href="#user_delete" id="delete"  class="btn btn-default" name=""><i class="icon-trash icon-large"></i> Delete</a>
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
												<th>Price Catalogue</th>
										   </tr>
										</thead>
										<tbody>
												<?php
													$query1 = mysqli_query($conn,"select * from tbl_item_details ORDER BY itemdetailID DESC");
													while($row1 = mysqli_fetch_array($query1)){
														$id = $row1['itemdetailID'];
														$itemcategoryID = $row1['itemcategoryID'];												
												?>
													
												<tr>
												<td width="10" style="text-align:center;">
												<input disabled title="Check to Delete" id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td width="10" style="text-align:center;">
												<a disabled data-placement="top" id="edit<?php echo $id; ?>" title="" href=""  data-toggle="modal" class="btn btn-default"><i class="icon-pencil icon-small"></i></a>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#edit<?php echo $id; ?>').tooltip('show');
															$('#edit<?php echo $id; ?>').tooltip('hide');
														});
														</script>
												</td>
												<?php
													$query2 = mysqli_query($conn,"select * from tbl_item_category where itemcategoryID='$itemcategoryID'");
													while($row2= mysqli_fetch_array($query2)){
														$itemCatDesc = $row2['ItemCatDesc'];	
												?>
												<td><?php echo $itemCatDesc; ?> </td>
												<?php
													}
												?>
												<td><?php echo $row1['itemdetailDesc']; ?></td>
												<!-- <td><?php echo $row1['PriceCatalogue']; ?></td> -->
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