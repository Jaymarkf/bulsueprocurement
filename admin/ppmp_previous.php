<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body >
		<?php include('navbar.php'); ?>					
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="span12" id="content">
					<div class="span12" id="content">
						<div class="row-fluid">
							<div class="span12">
								<div class="pull-left">
									<h3>PROCUREMENT UNIT - DASHBOARD</h3>
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
								<a href="year.php" class="pull-right" data-placement="left" title="Click to Change the year" id="yearbtn"><div class="pull-right" style="color:#ffa500;background-color:rgba(295,235,215,0.8);padding:3px 20px;border-radius:50px;"><h3> <?php echo 'Year: '.$Year; ?></h3></div></a>
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
				
                <div class="span12" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
						<?php
							$id = $_GET['id'];
							
							$query1 = mysql_query("SELECT * FROM users WHERE Branch='$id'")or die(mysql_error());
							while($row1 = mysql_fetch_array($query1)) {
							$Year1 = $row1['Year'];
							}
							
							$query1 = mysql_query("SELECT *,COUNT(Year) FROM tbl_ppmp WHERE EndUserUnit='$id'  AND Status = 'Completed' AND Year < '$Year' GROUP BY Year")or die(mysql_error());
							$count1 = mysql_num_rows($query1);
						?>
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><img src="../images/buttons/ppmp.png" width="5%"> PREVIOUS Project Procurement Management Plan</div>
                                <div class="muted pull-right">
									Total Record(s): <span class="badge badge-info"><?php  echo $count1;  ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
								<div class="span12" id="studentTableDiv">
								<h2 id="noch">Project Procurement Management Plan</h2>
									
									<?php include('ppmp_previous_table.php'); ?>
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