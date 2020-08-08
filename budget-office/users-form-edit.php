   <div class="row-fluid">       
		<!-- block -->
		<div class="block">
			<div class="navbar navbar-inner block-header">
				<div class="muted pull-left"><i class="icon-pencil icon-large"></i> Edit User </div>
			</div>

			<div class="block-content collapse in">
				<div class="span12">
				<form method="post" id="update_user">
						<div class="control-group">
						  <div class="controls">
							<?php
								$query = mysqli_query($conn,"select * from users where user_id = '$get_id'");
								$row = mysqli_fetch_array($query);
							?>
							  <label>Access Level</label>
								<select class="span12" name="status" placeholder = "Category" required>
									<option><?php echo $row['status'];?></option>
									<option value ="administrator">Administrator</option>
									<option value ="normal">Normal</option>
								</select>
						  </div>
						</div>
						
						<div class="control-group">
						  <div class="controls">
							  <label>School Branch</label>
								<select class="span12" name="branch" placeholder = "Branch" required>
									<option><?php echo $row['branch'];?></option>
									<?php
										$query = mysqli_query($conn,"select * from tbl_branch");
										while($row = mysqli_fetch_array($query)){
										$id = $row['branchID'];
									?>
									<option value ="<?php echo $row['branch'];?>"><?php echo $row['branch'];?></option>
									<?php } ?>
								</select>
						  </div>
						</div>
						
						<?php
							$query = mysqli_query($conn,"select * from users where user_id = '$get_id'");
							$row = mysqli_fetch_array($query);
						?>
				
						<div class="control-group">
						  <div class="controls">
							<label>First Name</label>
							<input name="fname" value="<?php echo $row['firstname']; ?>" class="input focused span12" id="focusedInput" type="text" required>
						  </div>
						</div>
						
						<div class="control-group">
						  <div class="controls">
						  <label>Last Name</label>
							<input name="lname" value="<?php echo $row['lastname']; ?>" class="input focused span12" id="focusedInput" type="text" required>
						  </div>
						</div>
						
						<div class="control-group">
						  <div class="controls">
						  <label>E-mail</label>
							<input name="email" value="<?php echo $row['email']; ?>" class="input focused span12" id="focusedInput" type="text" required>
						  </div>
						</div>
						
						<div class="control-group">
						  <div class="controls">
						  <label>Approved</label>
							<select class="span12" name="approved" placeholder = "Approved" required>
								<option><?php echo $row['approved'];?></option>
								<option value ="yes">Yes</option>
								<option value ="no">No</option>
							</select>
						  </div>
						</div>
						
						<div class="control-group">
						  <div class="controls">
								<button id="update" data-placement="top" title="Click to Update" name="update" class="btn btn-success"><i class="icon-save icon-large"></i> Update</button>
								<script type="text/javascript">
									$(document).ready(function(){
										$('#update').tooltip('show');
										$('#update').tooltip('hide');
									});
								</script>
								<br/>
								<br/>
								<a href="users.php" id="cancel" data-placement="top" title="Click to Cancel Update" name="cancel" class="btn btn-failed"><i class="icon-undo icon-large"></i> Cancel</a>
								<script type="text/javascript">
									$(document).ready(function(){
										$('#cancel').tooltip('show');
										$('#cancel').tooltip('hide');
									});
								</script>
						  </div>
						</div>
				</form>
				</div>
			</div>
		</div>
		<!-- /block -->
	</div>
<?php
if (isset($_POST['update'])){
	$branch= $_POST['branch'];
	$status= $_POST['status'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$approved = $_POST['approved'];
	$uname = $fname.'.'.$lname;

mysqli_query($conn,"update users set branch= '$branch',username = '$uname',firstname ='$fname', lastname='$lname', email='$email', status='$status',approved='$approved' where user_id = '$get_id' ");
?>

<script>
	$.ajax({
		success: function(html){
			$.jGrowl("Selected user is successfully updated", { header: 'SUCCESS' });
			var delay = 1500;
			setTimeout(function(){ window.location = 'users.php'  }, delay);
		}
	});
</script>
<?php
}
?>