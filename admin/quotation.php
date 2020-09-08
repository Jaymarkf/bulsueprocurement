<?php
session_start();
include('header.php'); ?>
<?php include('session.php'); ?>
<?php
if(isset($_GET['id'])){
    header('Location: rfq_print_preview.php?id='.$_GET['id']);
}
?>
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
								<h3><img src="../images/buttons/rfq.png" width="8%"> Manage Quotation</h3>
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
									<a href="dashboard.php" title="Back to PPMP-Dashboard" id="back" data-placement="right" class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
										<script type="text/javascript">
											$(document).ready(function(){
												$('#back').tooltip('show');
												$('#back').tooltip('hide');
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
						$query = mysqli_query($conn,"SELECT * FROM tbl_pr_items WHERE Year = $Year GROUP BY ItemDescription");
						$count = mysqli_num_rows($query);
						
						?>
							<div class="muted pull-left"><img src="../images/buttons/rfq.png" width="10%"> Item Quotation List</div>
							<div class="muted pull-right">
								Number of Items for Quotation: <span class="badge badge-info"><?php echo $count; ?></span>
							</div>
						</div>
                        <div class="container-fluid">
                            <a class="btn btn-success btn-lg" href="RFQ.php" style="margin-top:10px;">Add New Quotation</a>
                        </div>

						<div class="block-content collapse in">
							<div class="span12">
							<!-- <form action="quotation-delete.php" method="post" id="deleteForm"> -->
							<form action="" method="post" id="">
								<table cellpadding="0" cellspacing="0" border="0" class="table" id="example1">
									<thead>
									  <tr>
                                          <td>Quotation Number</td>
                                          <td>Company Name</td>
                                          <td>Total Price</td>
                                          <td>Quotation Date Created</td>
                                          <td>Actions</td>
									   </tr>
									</thead>
                                    <tbody>
                                    <?php
                                        $qry = "select * from tbl_rfq";
                                        $res = $conn->query($qry);
                                        while($row = $res->fetch_assoc()){
                                            $temp = "select SUM(total_price) as price from tbl_rfq_item_details where rfq_item_id = ".$row['id'].";";
                                            $data = $conn->query($temp);
                                            $price = $data->fetch_assoc();
                                            ?>
                                            <tr>
                                                <td><?=$row['quotation_no']?></td>
                                                <td><?=$row['company_name']?></td>
                                                <td><?=$price['price'];?></td>
                                                <td><?=$row['date_created']?></td>
                                                <td>
                                                <a href="?id=<?=$row['id']?>" class="btn btn-success btn-small"><i class="icon-eye-open icon-large"></i>&nbsp;View</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                    </tbody>
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