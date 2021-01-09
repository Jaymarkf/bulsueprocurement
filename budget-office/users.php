<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
		<h4 class="span12">Manage Users</h4>
		
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="span2" id="content">
					<?php  include('users-add.php');  ?>		   			
				</div>
                <div class="span10" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
							<?php 
							$query = mysqli_query($conn,"SELECT * FROM users WHERE status='normal' OR status='administrator'");
							$count = mysqli_num_rows($query);
							?>
                                <div class="muted pull-left"><i class="icon-user icon-large"></i> Users List</div>
                                <div class="muted pull-right">
									Number of Users: <span class="badge badge-info"><?php echo $count; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="users-delete.php" method="post" id="deleteForm">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-placement="right" title="Click to Delete check item" data-toggle="modal" href="#delete_user" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i> Delete</a>
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
												<th>School Branch</th>
												<th>Full Name</th>
												<th>Username</th>
												<th>Password</th>
												<th>E-mail</th>
												<th>Access Level</th>
												<th><i class="icon-key icon-large"></i></th>
												<th>Registered<br/>Date</th>
										   </tr>
										</thead>
										<tbody>
											<?php
												$user_query1 = mysqli_query($conn,"SELECT * FROM users WHERE status='normal' OR status='administrator' ORDER BY user_id DESC");
												while($row = mysqli_fetch_array($user_query1)){
												$id = $row['user_id'];
											?>
											<?php if($row['approved']=="yes") { ?>
											<tr>
												<td width="5" style="text-align:center;">
													<input title="Check to Delete" id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td width="5" style="text-align:center;">
													<a data-placement="top" id="edit<?php echo $id; ?>" title="Click to Edit" href="users-edit.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-small"></i></a>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#edit<?php echo $id; ?>').tooltip('show');
															$('#edit<?php echo $id; ?>').tooltip('hide');
														});
														</script>
												</td>
												<td width="200"><?php echo $row['branch']; ?> </td>
												<td width="300"><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
												<td width="50"><?php echo $row['username']; ?> </td>
												<td width="20"><?php echo $row['password']; ?></td>
												<td width="30"><?php echo $row['email']; ?></td>
												<td width="5"><?php echo $row['status']; ?></td>
												<td class="badge badge-success"><?php echo $row['approved']; ?></td>
												<td><?php echo $row['registered_date']; ?></td>
											</tr>
											<?php } else { ?>
											<tr>
												<td width="5" style="text-align:center;">
													<input title="Check to Delete" id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td idth="5" style="text-align:center;">
													<a data-placement="top" id="edit<?php echo $id; ?>" title="Click to Edit" href="users-edit.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-small"></i></a>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#edit<?php echo $id; ?>').tooltip('show');
															$('#edit<?php echo $id; ?>').tooltip('hide');
														});
														</script>
												</td>
												<td width="200"><?php echo $row['branch']; ?> </td>
												<td width="300"><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
												<td width="50"><?php echo $row['username']; ?> </td>
												<td width="20"><?php echo $row['password']; ?></td>
												<td width="30"><?php echo $row['email']; ?></td>
												<td width="5"><?php echo $row['status']; ?></td>
												<td class="badge badge-warning"><?php echo $row['approved']; ?></td>
												<td><?php echo $row['registered_date']; ?></td>
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