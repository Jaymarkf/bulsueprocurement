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
							<form action="" method="post" id="">
								<table cellpadding="0" cellspacing="0" border="0" class="table" id="example1">
									<thead>
									  <tr>
											<th>Date Created</th>
											<th>Name of Articles being Requisitioned</th>
											<th>Company A</th>
											<th>Company B</th>
											<th>Company C</th>
											<th>Action</th>
									   </tr>
									</thead>
									<tbody>
										<?php
											//$query = mysqli_query($conn,"SELECT * FROM tbl_quotation ORDER BY quotation_id DESC");
											//$query = mysqli_query($conn,"SELECT * FROM tbl_pr_items WHERE Year='2018'");
											//$query =  mysqli_query($conn,"SELECT *, sum(TotalCost) as TotalCost, sum(Quantity) as Quantity FROM tbl_pr_items WHERE Year = $Year GROUP BY ItemDescription");
											$query =  mysqli_query($conn,"SELECT * FROM tbl_bac_resolution WHERE Year = $Year GROUP BY itemDescription");
											while($row = mysqli_fetch_array($query)){
											//$id = $row['quotation_id'];
											$id = $row['bacresID'];
										?>
											<tr>
												<td width="5"><?php echo $row['Date_Created']; ?></th>
												<td width="200"><?php echo $row['itemDescription']; ?></td>
												<td width="5"><?php echo $row['companyA']; ?></td>
												<td width="5"><?php echo $row['companyB']; ?></td>
												<td width="5"><?php echo $row['companyC']; ?></td>
												<td width="130">
														<!-- echo '<a href="product-details.php?prodid='.$prodID.'" class="btn btn-success"><i class="icon-shopping-cart icon-large"></i> Item Details </a>'; -->
														<?php
														$item = $row['itemDescription'];
														$coA = $row['companyA'];
														$coB = $row['companyB'];
														$coC = $row['companyC'];
														//name1=value1&name2=value2
														echo '<a href="bac-res-edit.php?item='.$item.'&coA='.$coA.'&coB='.$coB.'&coC='.$coC.'" title="Add New Company Quotation" id="back" data-placement="top" class="btn btn-success"><i class="icon-edit icon-large"></i> Update </a>';
														?>
														<script type="text/javascript">
															$(document).ready(function(){
																$('#back').tooltip('show');
																$('#back').tooltip('hide');
															});
														</script>
														
														<?php
															$item = $row['itemDescription'];
															$year = $row['Year'];
															$dateC = $row['Date_Created'];
															
															$check = mysqli_query($conn,"SELECT *,COUNT(Year) FROM tbl_quotation WHERE Year = '$Year' AND itemDescription = '$item' GROUP BY itemDescription");
															$bilang = mysqli_num_rows($check);
															
															if ($bilang == "0") {
																echo '<a title="View Company Quotation" id="back" data-placement="top" class="btn btn-default"><i class="icon-print icon-large"></i> Preview </a>';
															}else{
																echo '<a href="bac-res-preview.php?item='.$item.'&year='.$year.'&dateC='.$dateC.'&coA='.$coA.'&coB='.$coB.'&coC='.$coC.'" title="View Company Quotation" id="back" data-placement="top" class="btn btn-inverse"><i class="icon-print icon-large"></i> Preview </a>';
															}	
														?>
														<script type="text/javascript">
															$(document).ready(function(){
																$('#back').tooltip('show');
																$('#back').tooltip('hide');
															});
														</script>
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