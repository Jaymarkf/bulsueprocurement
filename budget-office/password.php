<?php include('header.php'); ?>
<?php include('session.php'); ?>

  <body id="login">
  <?php include('navbar.php'); ?>
  	<center>
	<br/>
    <div class="container-fluid">
		<div class="span12" id="content">
			<div class="span12" id="content">
				<div class="row-fluid">
					<div class="span12">
						<div class="pull-left">
							<h3>BUDGET OFFICE</h3>
							<i class="icon-calendar icon-large"></i>
							<?php
								$Today=date('y:m:d');
								$new=date('l, F d, Y',strtotime($Today));
								echo $new;
							?>
						</div>
						
						<?php
							//use for admin year
							$query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
								while($row = mysqli_fetch_array($query)) {
								$Year = $row['Year'];
							}
						?>
						
					</div>
				</div>
			</div>
		</div>
		<?php include('password-change.php'); ?>			
    </div> <!-- /container -->
	</center>
<?php include('footer.php'); ?>
<?php include('script.php'); ?>
  </body>
</html>