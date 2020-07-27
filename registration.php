<?php include('header.php'); ?>

  <body id="login">
  <?php include('navbar.php'); ?>
    <div class="container-fluid">
	<br/><br/><br/>
		<!-- <form id="add_user" class="form-pass" method="post"> -->
		<form class="form-pass" action="registration-save.php" method="post">
			<center>
				<h3 class="form-signin-heading"><i class="icon-user"></i> Registration Form</h3>
			</center>
			<div class="control-group block-content">
				<div class="controls">
				<label>College</label>
				<select name="branch" placeholder = "Branch" class="span3" required>
					<option></option>
					<?php
						$query = mysql_query("SELECT * FROM tbl_branch WHERE branch<>'Main Office' AND branch<>'Budget Office' AND branch<>'Procurement Unit' ORDER BY branch ASC")or die(mysql_error());
						while($row = mysql_fetch_array($query)){
							$branch = $row['branch'];
							echo "<option>".$branch."</option>";
						}
					?>
				</select>
				</div>
			</div>
			<div class="control-group block-content">
				<div class="controls ">
					<label>First Name</label>
					<input class="input focused span3"  name="fname" id="focusedInput" type="text" placeholder = "First Name" required>
				</div>
			</div>
					
			<div class="control-group">
				<div class="controls block-content">
					<label>Last Name</label>
					<input class="input focused span3"  name="lname" id="focusedInput" type="text" placeholder = "Last Name" required>
				</div>
			</div>
			
			<div class="control-group block-content">
				<div class="controls">
					<label>E-mail</label>
					<input class="input focused span3"  name="email" id="focusedInput" type="email" placeholder = "E-mail" required>
					<span></span>
				</div>
			</div>
			
			<div class="control-group block-content">
				<div class="controls">
					<button  data-placement="top" title="Click to submit registration" id="register" name="register" class="btn btn-success"><i class="icon-save icon-large"></i> Save </button>
					<script type="text/javascript">
						$(document).ready(function(){
							$('#register').tooltip('show');
							$('#register').tooltip('hide');
						});
					</script>
					
					<a data-placement="top" href="index.php" id="back" title="Back to Home Page" "  class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
					<script type="text/javascript">
						$(document).ready(function(){
							$('#back').tooltip('show');
							$('#back').tooltip('hide');
						});
					</script>
				</div>
			</div>
			<script>
				jQuery(document).ready(function($){
					$("#add_user").submit(function(e){
						e.preventDefault();
						var _this = $(e.target);
						var formData = $(this).serialize();
						$.ajax({
							type: "POST",
							url: "registration-save.php",
							data: formData,
							success: function(html){
								$.jGrowl("Registration Successfully", { header: 'Registration Success' });
								var delay = 500;
								setTimeout(function(){ window.location = 'registration-success.php'  }, delay);
								//window.location = 'registration-success.php';  
							}
						});
					});
				});
			</script>
		</form>			
    </div> <!-- /container -->
<?php include('footer.php'); ?>
<?php include('script.php'); ?>
  </body>
</html>