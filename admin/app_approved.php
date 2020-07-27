<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body >
		<?php include('navbar.php'); ?>					
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="span12" id="content">
					<div class="row-fluid">
						<div class="pull-left">
							<h3><img src="../images/buttons/app.png" width="5%"> Consolidated Annual Procurement Plan</h3>
							<i class="icon-calendar icon-large"></i>
							<?php
								$Today=date('y:m:d');
								$new=date('l, F d, Y',strtotime($Today));
								echo $new;
							?>
						</div>

						<?php
							$query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
								while($row = mysqli_fetch_array($query)) {
								$Year = $row['Year'];
							}
						?>
						<a href="year.php" class="pull-right" data-placement="left" title="Click to Change the year" id="yearbtn"><div class="pull-right" style="color:#ffa500;background-color:rgba(295,235,215,0.8);padding:3px 20px;border-radius:50px;"><h3> APP <?php echo 'Year: '.$Year; ?></h3></div></a>
							<script type="text/javascript">
								$(document).ready(function(){
									$('#yearbtn').tooltip('show');
									$('#yearbtn').tooltip('hide');
								});
							</script>
					</div>
				</div>
			
                <div class="span12" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
						
						<?php
							if(isset($_GET['year'])){
								$year = $_GET['year'];
							}
							
							$query1 = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
							while($row1 = mysqli_fetch_array($query1)) {
								$Year1 = $row1['Year'];
								$user_id1 = $row1['user_id'];
							}
							
							//$query2 = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE Year = $Year AND Status = 'Completed' AND BO_PPMP_Status='Approved' AND PU_PPMP_Status='Approved' GROUP BY itemdetailDesc");
							$query2 = mysqli_query($conn,"SELECT * FROM tbl_ppmp_consolidated WHERE Year = $Year");
							$count2 = mysqli_num_rows($query2);
						?>
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><img src="../images/buttons/app.png" width="5%"> Consolidated Annual Procurement Plan - <span class="badge badge-warning">YEAR <?php echo $Year; ?></span></div>
                                <div class="muted pull-right">
									Total Record(s): <span class="badge badge-info"><?php  echo $count2;  ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
								<div class="span12" id="studentTableDiv">
								<h2 id="noch">Consolidated Annual Procurement Plan</h2>
									
									<?php include('app_approved_table.php'); ?>

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