	<?php
			$query = mysql_query("select * from users where user_id = '$session_id'")or die(mysql_error());
			$row = mysql_fetch_array($query);
	?>		
	
    <form id="change_password" class="form-pass" method="post">
		<?php include('sidebar_header.php'); ?>
        <h3 class="form-signin-heading"><i class="icon-lock"></i> Change Password</h3>
		<input type="hidden" id="password" name="password" value="<?php echo $row['password']; ?>"  placeholder="Current Password">
		<input type="password" id="current_password" name="current_password"  placeholder="Current Password" required>
        <input type="password" id="new_password" name="new_password" placeholder="New Password" required>
		<input type="password" id="retype_password" name="retype_password" placeholder="Re-type New Password" required>
		<br>
		<button  type="submit" data-placement="right" id="save" name="save" class="btn btn-success"><i class="icon-save icon-large"></i> Save </button>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;				
		<a href="dashboard.php" title="Click to Edit" "  class="btn btn-danger"><i class="icon-remove icon-large"></i> Cancel </a>

			<?php
			if (isset($_POST['save'])){
			$password = $_POST['password'];
			$current_password  = $_POST['current_password'];
			$new_password  = $_POST['new_password'];
			$retype_password  = $_POST['retype_password'];
			
			if ($row['password'] != $current_password){
			?>
				<script>
				$.ajax({
						success: function(html){
							$.jGrowl("Your Password does not matched with your current password  ", { header: 'FAILED' });
							var delay = 6000;
							setTimeout(function(){ window.location = 'password.php'  }, delay);
						}
					});
				</script>
			<?php
			}elseif ($new_password != $retype_password){
				?>
				<script>
				$.ajax({
						success: function(html){
							$.jGrowl("Your New Password and Re-type password does not matched ", { header: 'FAILED' });
							var delay = 6000;
							setTimeout(function(){ window.location = 'password.php'  }, delay);
						}
					});
				</script>
				<?php
			}elseif (($password == $current_password) && ($new_password == $retype_password)){		
				// Validate password strength
				$uppercase = preg_match('@[A-Z]@', $new_password);
				$lowercase = preg_match('@[a-z]@', $new_password);
				$number    = preg_match('@[0-9]@', $new_password);
				$specialChars = preg_match('@[^\w]@', $new_password);

				if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($new_password) < 8) {
			?>
					<script>
					$.ajax({
							success: function(html){
								$.jGrowl("Your New Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character. ", { header: 'FAILED' });
								var delay = 6000;
								setTimeout(function(){ window.location = 'password.php'  }, delay);
							}
						});
					</script>
			<?php
				}else{
					mysql_query("update users set password = '$new_password' where user_id = '$session_id'")or die(mysql_error());
			?>
				<script>
					$.ajax({
							success: function(html){
								$.jGrowl("Your New Password was changed successfully", { header: 'SUCCESS' });
								var delay = 6000;
								setTimeout(function(){ window.location = 'dashboard.php'  }, delay);
							}
						});
					</script>
			<?php		
				}
			}
			}
			?>			
	</form>