<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
		<h4 class="span12">Manage Users</h4>
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="span3" id="">
				<?php include('users-form-edit.php'); ?>		   			
				</div>
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                             		<?php 
							$user_query = mysqli_query($conn,"SELECT * FROM users WHERE level='user' OR level='administrator'");
							$count = mysqli_num_rows($user_query);
							?>
                                <div class="muted pull-left"><i class="icon-user icon-large"></i> Users List</div>
                                <div class="muted pull-right">
									Number of Users: <span class="badge badge-info"><?php echo $count; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example1">
									<a data-placement="right" title="Delete is disabled using edit mode" data-toggle="modal" href="#user_delete" id="delete"  class="btn btn-default" name="" disabled><i class="icon-trash icon-large"></i> Delete</a>
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
												<th width="200">College/ Department</th>
												<th width="50">Username</th>
												<th width="5">Access Level</th>
												<th>Registered<br/>Date</th>
												<th>Reset Password</th>
												<th>Active</th>												
										   </tr>
										</thead>
										<tbody>
											<?php
												$user_query1 = mysqli_query($conn,"SELECT * FROM users WHERE level='user' OR level='administrator' ORDER BY user_id DESC");
												while($row = mysqli_fetch_array($user_query1)){
												$id = $row['user_id'];
											?>
											<?php if($row['approved']=="yes") { ?>
											<tr>
												<td width="10" style="text-align:center;">
													<!--<input title="Check to Delete" id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">-->
													<input title="Check to Delete" id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="" disabled>
												</td>
												<td style="text-align:center;">
													<!--<a data-placement="top" id="edit<?php echo $id; ?>" title="Click to Edit" href="users-edit.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-small"></i></a>-->
													<a data-placement="top" id="edit" title="Click to Edit" href=""  data-toggle="modal" class="btn btn-default" disabled><i class="icon-pencil icon-small"></i></a>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#edit').tooltip('show');
															$('#edit').tooltip('hide');
														});
														</script>
												</td>
												<td><?php echo $row['branch']; ?> </td>
												<td><?php echo $row['username']; ?> </td>
												<td><?php echo $row['level']; ?></td>
												<td><?php echo $row['registered_date']; ?></td>
												<td style="text-align:center;">
													<!--<a data-placement="top" id="edit<?php echo $id; ?>" title="Click to Edit" href="users-edit.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-small"></i></a>-->
													<a data-placement="top" id="edit" title="Disabled" href=""  data-toggle="modal" class="btn btn-default" disabled><i class="icon-refresh icon-large"></i></a>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#edit').tooltip('show');
															$('#edit').tooltip('hide');
														});
														</script>
												</td>
												<td class="badge badge-success"><i class="icon-ok icon-small"></i></td>
											</tr>
											<?php } else { ?>
											<tr>
												<td width="10" style="text-align:center;">
													<input title="Check to Delete" id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td style="text-align:center;">
													<a data-placement="top" id="edit<?php echo $id; ?>" title="Click to Edit" href="users-edit.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-small"></i></a>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#edit<?php echo $id; ?>').tooltip('show');
															$('#edit<?php echo $id; ?>').tooltip('hide');
														});
														</script>
												</td>
												<td><?php echo $row['branch']; ?> </td>
												<td><?php echo $row['username']; ?> </td>
												<td><?php echo $row['level']; ?></td>
												<td><?php echo $row['registered_date']; ?></td>
												<td style="text-align:center;">
													<!--<a data-placement="top" id="edit<?php echo $id; ?>" title="Click to Edit" href="users-edit.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-small"></i></a>-->
													<a data-placement="top" id="edit" title="Disabled" href=""  data-toggle="modal" class="btn btn-default" disabled><i class="icon-refresh icon-large"></i></a>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#edit').tooltip('show');
															$('#edit').tooltip('hide');
														});
														</script>
												</td>
                                                <td class="badge badge-warning"><i class="icon-remove icon-small"></i></td>												
											</tr>
											<?php } ?>
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