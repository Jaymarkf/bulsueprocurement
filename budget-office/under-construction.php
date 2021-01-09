<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php include('session.php'); ?>

  <body id="login">
  <?php include('navbar.php'); ?>
  	<center>
	<br/>
    <div class="container-fluid">
		<form class="form-pass" style="color:red;">
		<?php include('sidebar_header.php'); ?>
		<hr/>
        <h3 class="form-signin-heading"><i class="icon-warning-sign"></i> Sorry for the inconvenience <br/> this page is under construction.</h3>
		
		<a href="dashboard.php" title="Click to Edit" "  class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
		
		</form>			
    </div> <!-- /container -->
	</center>
<?php include('footer.php'); ?>
  </body>
</html>