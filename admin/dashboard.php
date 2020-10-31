<?php session_start(); ?>
<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php');?>
		<div class="container-fluid">
            <div class="row-fluid">
                <div class="span12" id="content">
                    <div class="row-fluid">
						<div class="pull-left">
							<h3><img src="../images/buttons/ppmp.png" width="5%"> Project Procurement Management Plan - Dashboard</h3>
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
						<a href="year.php" class="pull-right" data-placement="left" title="Click to Change the year" id="yearbtn"><div class="pull-right" style="color:#ffa500;background-color:rgba(295,235,215,0.8);padding:3px 20px;border-radius:50px;"><h3> <?php echo 'Year: '.$Year; ?></h3></div></a>

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
                                <div class="muted pull-left"><img src="../images/buttons/ppmp.png" width="5%"><a href="dashboard.php" class="muted"> Project Procurement Managemen Plan - Dashboard</a></div>
                                <div class="muted pull-right">
									Total Record(s): <span class="badge badge-info"><?php  echo $count1;  ?></span>
								</div>
                                <div class="text-right">

                                    <button class="btn btn-primary" style="margin-right:24px;position:relative;bottom:10px;"   data-toggle="modal" data-target="#exampleModalCenter"><i class="icon icon-eye-open"></i> Unsubmitted/Pending PPMP</button>
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

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="width:95%;border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;">
                <h5 class="modal-title" id="exampleModalLongTitle">List of Unsubmitted / Pending PPMP Branches</h5>
            </div>
            <div class="modal-body">
                <?php
                    $ff = $conn->query("select * from tbl_ppmp where Status = 'Pending'");
                    while($row = $ff->fetch_assoc()){
                        ?>
                            <div class="row-fluid" style="font-color:blue"><?=$row['EndUserUnit']?></div>
                        <?php
                    }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</html>
<script type="text/javascript">
    $(document).ready(function(){


        $('#yearbtn').tooltip('show');
        $('#yearbtn').tooltip('hide');
    });
</script>