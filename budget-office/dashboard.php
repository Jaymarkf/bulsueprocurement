<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body >
		<?php include('navbar.php'); ?>
		<div class="container-fluid">
            <div class="row-fluid">
                <div class="span12" id="content">
                    <div class="row-fluid">
						<div class="pull-left">
							<h3>BUDGET OFFICE - DASHBOARD</h3>
							<i class="icon-calendar icon-large"></i>
							<?php
								$Today=date('y:m:d');
								$new=date('l, F d, Y',strtotime($Today));
								//$Year=date('Y');
								echo $new;
							?>
						</div>

						<?php
							$query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
								while($row = mysqli_fetch_array($query)) {
								$Year = $row['Year'];
							}
						?>
						<a href="year.php" class="pull-right" data-placement="left" title="Click to Change the year" id="yearbtn"><div class="pull-right" style="color:#ffa500;background-color:rgba(295,235,215,0.8);padding:3px 20px;border-radius:50px;"><h3><?php echo 'Year: '.$Year; ?></h3></div></a>
							<script type="text/javascript">
								$(document).ready(function(){
									$('#yearbtn').tooltip('show');
									$('#yearbtn').tooltip('hide');
								});
							</script>
					</div>
				</div>
			</div>
		</div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
						<?php
							$query1= mysqli_query($conn,"select * from users WHERE Year<> '0' AND Year='$Year' AND level='user' AND approved='yes'");
							$count1 = mysqli_num_rows($query1);
						 	
						?>
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i><a href="dashboard.php" class="muted"> Project Procurement Managemen Plan - Budget Request </a></div>
                                <div class="muted pull-right">
									Total Record(s): <span class="badge badge-info"><?php  echo $count1;  ?></span>
								</div>
                            </div>
                            
							<?php include('dashboard_table.php'); ?>

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