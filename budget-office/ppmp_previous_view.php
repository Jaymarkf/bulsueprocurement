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
									$query = mysql_query("SELECT * FROM users WHERE user_id = '$session_id'")or die(mysql_error());
										while($row = mysql_fetch_array($query)) {
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
							$query= mysql_query("SELECT * FROM tbl_ppmp WHERE Year = '$YearID' AND EndUserUnit ='$BranchID' AND Status = 'Completed' AND BO_PPMP_Status='Approved'")or die(mysql_error());
							$count = mysql_num_rows($query);
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