<?php include('header.php'); ?>
<?php include('session.php'); ?>

  <body id="login">
  <?php include('navbar.php'); ?>
  	<center>
	<br/>
    <div class="container-fluid">
	<?php
			$query = mysqli_query($conn,"select * from users where user_id = '$session_id'");
			$row = mysqli_fetch_array($query);
	?>		
	<h3 style="color:#ffa500;background-color:rgba(295,235,215,0.8);padding:3px 20px;border-radius:50px;">Your need to change your default password. Thank you!</h3>
      <form id="change_password" class="form-pass" method="post">
		<?php include('sidebar_header.php'); ?>
        <h3 class="form-signin-heading"><i class="icon-lock"></i> Change Password</h3>
		<input type="hidden" id="password" name="password" value="<?php echo $row['password']; ?>"  placeholder="Current Password">
		<input type="password" id="current_password" name="current_password"  placeholder="Current Password" required>
        <input type="password" id="new_password" name="new_password" placeholder="New Password" required>
		<input type="password" id="retype_password" name="retype_password" placeholder="Re-type Password" required>
		<br>
		<button  type="submit" data-placement="right" id="save" name="save" class="btn btn-success"><i class="icon-save icon-large"></i> Save </button>       <a href="dashboard.php" title="Click to Edit" "  class="btn btn-danger"><i class="icon-remove icon-large"></i> Cancel </a>
		

			<script>
			jQuery(document).ready(function(){
			jQuery("#change_password").submit(function(e){
					e.preventDefault();
						
						var password = jQuery('#password').val();
						var current_password = jQuery('#current_password').val();
						var new_password = jQuery('#new_password').val();
						var retype_password = jQuery('#retype_password').val();
						if (password != current_password)
						{
						$.jGrowl("Password does not match with your current password  ", { header: 'FAILED' });
						}else if  (new_password != retype_password){
						$.jGrowl("Password does not match with your new password  ", { header: 'FAILED' });
						}else if ((password == current_password) && (new_password == retype_password)){
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "password-update.php",
						data: formData,
						success: function(html){
					
						$.jGrowl("Your password has been changed successfully.", { header: 'SUCCESS' });
						var delay = 3000;
							setTimeout(function(){ window.location = 'dashboard.php'  }, delay);  
						}
					});
					}
				});
			});
			</script>
			</form>			
    </div> <!-- /container -->
	</center>
<?php include('footer.php'); ?>
<?php include('script.php'); ?>
  </body>
</html>