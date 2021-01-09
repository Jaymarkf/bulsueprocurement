<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<body id="login">
	<div class="span12">
	<?php include('navbar.php') ?>
	</div>
    <div class="container-fluid">
		<div class="row-fluid">
			<br/><br/><br/><br/><br/>
			<div class="form-signin">
				<?php include('sidebar_header.php'); ?>
				<center>
					<h3><span style="color: maroon;">Registration Success</span></h3>
				</center>
				<p style="text-align: justify;">Your registration was successfully created.  Wait until the system administrator approve your pending registration.</p>
				<p style="text-align: justify;">The system administrator will contact you to your provided email address regarding the details of your registration account.</p>
				<p style="text-align: justify;">If you cannot wait for the approval of your account you are free to contact the system administrator through call using the phone office number.</p>
				<p>Thank you.</p>
				<center>
					<a href="index.php" id="back" title="Back to Home Page" "  class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
					<script type="text/javascript">
						$(document).ready(function(){
							$('#back').tooltip('show');
							$('#back').tooltip('hide');
						});
					</script>
				</center>
			</div>
		</div>
	<?php include('footer.php'); ?>
	</div> <!-- /container -->
	<?php include('script.php'); ?>
</body>
</html>