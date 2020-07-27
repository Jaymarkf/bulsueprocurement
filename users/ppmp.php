<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body >
		<?php include('navbar.php'); ?>					
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="span12" id="content">
					<div class="span6" id="content">
						<div class="row-fluid">
							<a href="year.php" class="pull-left" data-placement="right" title="Click to Change the year" id="yearbtn"><div class="pull-left"><h3 style="color:#ffa500;background-color:rgba(295,235,215,0.8);padding:3px 20px;border-radius:50px;"> Year: <?php echo $Year; ?></h3></div></a>
							<script type="text/javascript">
								$(document).ready(function(){
									$('#yearbtn').tooltip('show');
									$('#yearbtn').tooltip('hide');
								});
							</script>
						</div>
					</div>
				</div>
			
                <div class="span12" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
						<?php
							//$query1 = mysql_query("SELECT * FROM tbl_year")or die(mysql_error());
							$query = mysql_query("SELECT * FROM users WHERE user_id='$session_id'")or die(mysql_error());
							while($row = mysql_fetch_array($query)) {
							$Year = $row['Year'];
							}
							$query1= mysql_query("SELECT * FROM tbl_ppmp WHERE Year = '$Year' AND user_id='$session_id' AND Status = 'Pending'")or die(mysql_error());
							$count = mysql_num_rows($query1);
						?>					
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-shopping-cart icon-large"></i> PPMP CART Lists - <span class="badge badge-warning">YEAR <?php echo $Year; ?></span></div>
                                <div class="muted pull-right">
									Total Item(s): <span class="badge badge-info"><?php  echo $count;  ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
								<div class="span12" id="studentTableDiv">
								<h2 id="noch">Project Procurement Management Plan</h2>
									
									<?php include('ppmp_table.php'); ?>
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