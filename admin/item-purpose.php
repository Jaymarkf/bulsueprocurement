<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
		<h4 class="span12">Manage Item Purpose</h4>
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="span3" id="">
				<?php  include('item-purpose-add.php');  ?>		   			
				</div>
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
							<?php 
							$query = mysqli_query($conn,"select * from tbl_item_category");
							$count = mysqli_num_rows($query);
							?>
                                <div class="muted pull-left"><i class="icon-comments icon-large"></i> Item Purpose List</div>
                                <div class="muted pull-right">
									Number of Item Purpose: <span class="badge badge-info"><?php echo $count; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="item-purpose-delete.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-placement="right" title="Click to Delete check item" data-toggle="modal" href="#delete_item_purpose" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i> Delete</a>
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
												<th>Description</th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$user_query1 = mysqli_query($conn,"select * from tbl_purpose ORDER BY purpose ASC");
													while($row = mysqli_fetch_array($user_query1)){
													$id = $row['purposeID'];
													?>
												<tr>
													<td width="10" style="text-align:center;">
													<input title=" Check to Delete " id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
													</td>
													<td width="25" style="text-align:center;">
													<a data-placement="top" id="edit<?php echo $id; ?>" title="Click to Edit" href="item-purpose-edit.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-small"></i></a>
															<script type="text/javascript">
															$(document).ready(function(){
																$('#edit<?php echo $id; ?>').tooltip('show');
																$('#edit<?php echo $id; ?>').tooltip('hide');
															});
															</script>
													</td>
													<td><?php echo $row['purpose']; ?></td>
												</tr>
												<?php } ?>
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