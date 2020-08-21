<script type="text/javascript">
	function fetch_select(val) {
		$.ajax({
			type: 'post',
			url: 'fetch_data_edit.php',
			data: {
				get_option:val
			},
				success: function (response) {
				document.getElementById("new_select").innerHTML=response; 
			}
		});
	}
</script>

   <div class="row-fluid">       
		<!-- block -->
		<div class="block">
			<div class="navbar navbar-inner block-header">
				<div class="muted pull-left"><i class="icon-pencil icon-large"></i> Edit User </div>
			</div>

			<div class="block-content collapse in">
				<div class="span12">
				<?php
					$query = mysqli_query($conn,"select * from users where user_id = '$get_id'");
					$row = mysqli_fetch_array($query);
				?>
				
				<!-- <form action="users-form-edit-save.php?id=<?php echo $get_id; ?>" method="POST" id="update_user"> -->
				<form method="POST" id="update_user">
						<div class="control-group" id="select_box">
							<div class="controls">
								<?php
									$query = mysqli_query($conn,"select * from users where user_id = '$get_id'");
									$rows = mysqli_fetch_array($query);
								?>							
								<label>Access Level</label>
								<select name="level" placeholder = "Status" class="span12" onchange="fetch_select(this.value);" required>
									<option><?php echo $row['level'];?></option>
									<?php
										$select=mysqli_query($conn,"SELECT level FROM tbl_branch GROUP BY level");
										while($row=mysqli_fetch_array($select)){
											echo "<option>".$row['level']."</option>";
										}
									?>
								</select>
							</div>
						</div>
						
						<div class="control-group">
						  <div class="controls">
							<label>College/Department</label>
							<select id="new_select" name="branch" placeholder = "Branch" class="span12" required>
								<option><?php echo $rows['branch'];?></option>
							</select>
						  </div>
						</div>
						
						<?php
							$query = mysqli_query($conn,"select * from users where user_id = '$get_id'");
							$row = mysqli_fetch_array($query);
						?>
				
						<div class="control-group">
						  <div class="controls">
							<label>Username</label>
							<input name="username" value="<?php echo $row['username']; ?>" class="input focused span12" id="focusedInput" type="text" required>
						  </div>
						</div>
						
						<div class="control-group">
						  <div class="controls">
							<label>Password</label>
<!--							<label>atleast 8 characters long a combination of numbers, symbols, upper and lower case letters.</label>-->
							    <label>atleast 8 characters long</label>
                              <input name="password" value="<?php echo $row['password']; ?>" class="input focused span12" id="focusedInput" type="text" required>
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
	//$get_id= $_GET['id'];
	$branch= $_POST['branch'];
	$level= $_POST['level'];
	$username = $_POST['username'];
	$password = trim($_POST['password']);
	$approved = $_POST['approved'];
	//ECHO $get_id;
	//ECHO $branch;
	//ECHO $level;
	//ECHO $username;
	//ECHO $password;
	//ECHO $approved;
	// Validate password strength
//	$uppercase = preg_match('@[A-Z]@', $password);
//	$lowercase = preg_match('@[a-z]@', $password);
//	$number    = preg_match('@[0-9]@', $password);
//	$specialChars = preg_match('@[^\w]@', $password);

	if(/*!$uppercase || !$lowercase || !$number || !$specialChars ||*/ strlen($password) < 8) {
?>
		<script>
		$.ajax({
				success: function(html){
				    /*Password should be atleast 8 characters in length and should include atleast one upper case letter, number, and a special character. Try Again.*/
					$.jGrowl("Password should be atleast 8 characters in length.", { header: 'FAILED' });
					var delay = 3000;
					setTimeout(function(){ window.location = 'users.php'  }, delay);
				}
			});
		</script>
<?php
	}else{
	
		mysqli_query($conn,"update users set branch= '$branch',username = '$username',password = '$password',level='$level',approved='$approved' where user_id = '$get_id' ");
?>
		<script>
			$.ajax({
				success: function(html){
					$.jGrowl("Selected user is successfully updated", { header: 'SUCCESS' });
					var delay = 3000;
					setTimeout(function(){ window.location = 'users.php'  }, delay);
				}
			});
		</script>
<?php		
	}
}
?>