<?php include('header.php'); ?>
<?php include('session.php'); ?>
<!--php starts here PART1-->

    <body >
		<?php include('navbar.php') ?>
        <div class="container-fluid" id="">
            <div class="row-fluid">
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
				
                <div class="span12" id="content">						
                    <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-calendar icon-large"></i><a href="dashboard.php" class="muted"> Set Project Procurement Management Plan Year</a></div>
                            </div>

							<?php include('year-form.php'); ?>

						</div>
                </div>
				</div>
    
			<?php include('footer.php'); ?>
		 
			</div>
		</div>
	<?php include('script.php'); ?>
    </body>
</html>