<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>
	<?php include('navbar.php'); ?>
	
	<div class="container-fluid">
		<div class="row-fluid">
			<!-- <div class="span3" id="content">
				<?php  //include('quotation-add.php');  ?>		   			
			</div> -->
			
					<div class="span12" id="content">
						<div class="row-fluid">
							<div class="pull-left">
								<h3><img src="../images/buttons/app.png" width="8%"> Manage BAC Resolution</h3>
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
								<div class="pull-left">
									<a href="bac-res-add.php" title="Add New" id="add" data-placement="top" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add New </a>
										<script type="text/javascript">
											$(document).ready(function(){
												$('#add').tooltip('show');
												$('#add').tooltip('hide');
											});
										</script>
								</div>
							</div>
						</div>
						<?php
							$query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
								while($row = mysqli_fetch_array($query)) {
								$Year = $row['Year'];
							}
						?>
						
			<div class="span12" id="content">
				 <div class="row-fluid">
					<!-- block -->
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
						<?php 
						//$query = mysqli_query($conn,"SELECT * FROM tbl_quotation");
						$query = mysqli_query($conn,"SELECT * FROM tbl_bac_resolution WHERE Year = $Year GROUP BY itemDescription");
						$count = mysqli_num_rows($query);
						
						?>
							<div class="muted pull-left"><img src="../images/buttons/app.png" width="10%"> BAC Resolution List</div>
							<div class="muted pull-right">
								Number of BAC Resolution: <span class="badge badge-info"><?php echo $count; ?></span>
							</div>
						</div>
						
						<div class="block-content collapse in">
							<div class="span12">
							<!-- <form action="quotation-delete.php" method="post" id="deleteForm"> -->
                                <div class="row-fluid">
                                    <div class="text-center text-success">
                                        <h5>BAC RESOLUTIONS RECORD</h5>
                                    </div>
                                </div>
							<form action="" method="post" id="">
                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="example1">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">Date Created</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $qry = "select * from tbl_bac_reso";
                                        $res = $conn->query($qry);
                                        while($data = $res->fetch_array()){
                                            ?>
                                            <tr>
                                                <td style="text-align:center;"><?=$data['date_created']?></td>
                                                <td>
                                                    <a class="btn btn-success" href="bac_reso_list.php?c_id=<?=$data['c_id_array']?>" title="view BAC RESOLUTIONS RECORD HERE">
                                                        <i class="icon icon-print"></i>
                                                        &nbsp;View
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
							</form>
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