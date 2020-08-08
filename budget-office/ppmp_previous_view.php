<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php 
	$YearID = $_GET['id'];
	$BranchID = $_GET['branchid'];
	//$euu = $_GET['$euu'];
?>
    <body >
		<?php include('navbar.php'); ?>					
        <div class="container-fluid">
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
                        <div  id="block_bg" class="block">
						<?php
							$query= mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE Year = '$YearID' AND EndUserUnit ='$BranchID' AND BO_PPMP_Status='Approved'");
							$count = mysqli_num_rows($query);
						?>
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><img src="../images/buttons/ppmp.png" width="5%"> PREVIOUS Approved Project Procurement Management Plan - Budget Request <span class="badge badge-warning">YEAR <?php echo $YearID; ?></span></div>
                                <div class="muted pull-right">
									Total Record(s): <span class="badge badge-info"><?php  echo $count;  ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
								<div class="span12" id="studentTableDiv">
								<h2 id="noch">Project Procurement Management Plan</h2>
									
									<?php include('ppmp_previous_view_table.php'); ?>
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