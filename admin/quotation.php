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
						
						<div class="block-content collapse in">
							<div class="span12">
							<!-- <form action="quotation-delete.php" method="post" id="deleteForm"> -->
							<form action="" method="post" id="">
								<table cellpadding="0" cellspacing="0" border="0" class="table" id="example1">
									<thead>
									  <tr>
											<th>Name of Articles being Requisitioned</th>
											<th>Approved Unit Price per Item</th>
											<th>Quantity and Unit</th>
											<th>ABC Price</th>
											<th style="text-align: center;">Company Quotation</th>
									   </tr>
									</thead>
									<tbody>
										<?php
											//$query = mysqli_query($conn,"SELECT * FROM tbl_quotation ORDER BY quotation_id DESC");
											//$query = mysqli_query($conn,"SELECT * FROM tbl_pr_items WHERE Year='2018'");
											$query =  mysqli_query($conn,"SELECT *, sum(TotalCost) as TotalCost, sum(Quantity) as Quantity FROM tbl_pr_items WHERE Year = $Year GROUP BY ItemDescription");
											while($row = mysqli_fetch_array($query)){
											//$id = $row['quotation_id'];
											$id = $row['prID'];
										?>
											<tr>
												<td><?php echo $row['ItemDescription']; ?></td>
												<td style="text-align:center;">&#8369;<?php echo number_format($row['UnitCost'],2, '.', ','); ?></td>
												<td style="text-align:center;"><?php echo $row['Quantity'] . " " .$row['Unit']; ?></td>
												<td style="text-align:center;">&#8369;<?php echo number_format($row['TotalCost'],2, '.', ','); ?></td>
												<td style="text-align: center;">
														<?php
															$item = $row['ItemDescription'];
															
															$check = mysqli_query($conn,"SELECT *,COUNT(Year) FROM tbl_quotation WHERE Year = '$Year' AND itemDescription = '$item' GROUP BY itemDescription");
															$bilang = mysqli_num_rows($check);
															//$Year = $row['Year'];
															
															if ($bilang == "0") {
																echo '<a title="View Company Quotation" id="back" data-placement="top" class="btn btn-default"><i class="icon-eye-close icon-large"></i> View </a>';
															}else{
																echo '<a href="quotation-view-main.php?item='.$item.'&year='.$Year.'" title="View Company Quotation" id="back" data-placement="top" class="btn btn-inverse"><i class="icon-eye-open icon-large"></i> View Supplier</a>';
															}	
														?>
														<script type="text/javascript">
															$(document).ready(function(){
																$('#back').tooltip('show');
																$('#back').tooltip('hide');
															});
														</script>
														<!-- echo '<a href="product-details.php?prodid='.$prodID.'" class="btn btn-success"><i class="icon-shopping-cart icon-large"></i> Item Details </a>'; -->
														
														<?php
														$item = $row['ItemDescription'];
														echo '<a href="quotation-add-main.php?item='.$item.'" title="Add New Company Quotation" id="back" data-placement="top" class="btn btn-success"><i class="icon-plus-sign icon-large"></i> New Supplier</a>';
														?>
														<script type="text/javascript">
															$(document).ready(function(){
																$('#back').tooltip('show');
																$('#back').tooltip('hide');
															});
														</script>
														
													<!--	<?php
															echo '<a href="quotation-form-preview.php?item='.$item.'" title="Preview Quotation Form" id="back" data-placement="top" class="btn btn-information"><i class="icon-print icon-large"></i> Form </a>';
														?>
														<script type="text/javascript">
															$(document).ready(function(){
																$('#back').tooltip('show');
																$('#back').tooltip('hide');
															});
														</script> -->
												</td>
											</tr>
										<?php }; ?>
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