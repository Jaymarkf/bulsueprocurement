<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body >
		<?php include('navbar.php'); ?>					
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="span12" id="content">
					<div class="row-fluid">
						<div class="pull-left">
							<h3>BAC Resolution</h3>
							<i class="icon-calendar icon-large"></i>
							<?php
								$Today=date('y:m:d');
								$new=date('l, F d, Y',strtotime($Today));
								echo $new;
							?>
						</div>

						<?php
							$query = mysql_query("SELECT * FROM users WHERE user_id = '$session_id'")or die(mysql_error());
								while($row = mysql_fetch_array($query)) {
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
				
				<div class="span12" id="content">
					<div class="row-fluid">
						<br/>
					<!--	<div class="pull-left">
							<a href="app_po_approved-add.php" title="Add new purchase request" id="back" data-placement="top" class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Add New </a>
								<script type="text/javascript">
									$(document).ready(function(){
										$('#back').tooltip('show');
										$('#back').tooltip('hide');
									});
								</script>
						</div> -->
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
							
							$query1 = mysql_query("SELECT * FROM users WHERE user_id = '$session_id'")or die(mysql_error());
							while($row1 = mysql_fetch_array($query1)) {
								$Year1 = $row1['Year'];
								$user_id1 = $row1['user_id'];
							}
							
							//$query2 = mysql_query("SELECT * FROM tbl_po WHERE Year = $Year  AND (POno != '' OR POno IS NOT NULL)")or die(mysql_error());
							$query2 = mysql_query("SELECT * FROM tbl_quotation WHERE Year = $Year")or die(mysql_error());
							$count2 = mysql_num_rows($query2);
						?>
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><img src="../images/buttons/app.png" width="5%"> BAC Resolution - <span class="badge badge-warning">YEAR <?php echo $Year; ?></span></div>
                                <div class="muted pull-right">
									Total Record(s): <span class="badge badge-info"><?php  echo $count2;  ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
								<div class="span12" id="studentTableDiv">
								<h2 id="noch"> Purchase Order</h2>
									
									<?php include('bac-res-table.php'); ?>

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