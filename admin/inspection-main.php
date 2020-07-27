<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>
	<?php include('navbar.php'); ?>
	<div class="container-fluid">
			<div class="row-fluid">	
				<div class="span12" id="content">
					<div class="row-fluid">
						<div class="pull-left">
							<h3><img src="../images/buttons/iaa.png" width="5%"> Manage Inspection and Acceptance Report</h3>
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
	
			<!-- <div class="span3" id="content">
				<?php  //include('quotation-add.php');  ?>		   			
			</div> -->
			
						<div class="span12" id="content">
							<div class="row-fluid">
								<br/>
								<div class="pull-left">
									<a href="inspection-add.php" title="Create New IAR" id="add" data-placement="top" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Create New </a>
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
							$query = mysql_query("SELECT * FROM users WHERE user_id = '$session_id'")or die(mysql_error());
								while($row = mysql_fetch_array($query)) {
								$Year = $row['Year'];
							}
						?>
						
			<div class="span12" id="content">
				 <div class="row-fluid">
					<!-- block -->
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
						<?php 
						//$query = mysql_query("SELECT * FROM tbl_quotation")or die(mysql_error());
						//$query = mysql_query("SELECT * FROM tbl_po_items WHERE Year = $Year GROUP BY POno")or die(mysql_error());
						$query = mysql_query("SELECT * FROM tbl_iar WHERE Year = $Year AND iar_No <> 0 GROUP BY POno")or die(mysql_error());
						$count = mysql_num_rows($query);
						
						?>
							<div class="muted pull-left"><img src="../images/buttons/iaa.png" width="5%"> Inspection and Acceptance Reports Lists</div>
							<div class="muted pull-right">
								Number of Inspection and Acceptance Report: <span class="badge badge-info"><?php echo $count; ?></span>
							</div>
						</div>
						
						<div class="block-content collapse in">
							<div class="span12">
							<!-- <form action="quotation-delete.php" method="post" id="deleteForm"> -->
							<form action="" method="post" id="">
								<table cellpadding="0" cellspacing="0" border="0" class="table" id="example1">
									<thead>
									  <tr>
											<th>I.A.R. No.</th>
											<th>Date</th>
											<th>Supplier</th>
											<th>P.O. No.</th>
											<th>Date</th>
											<th>Action</th>
									   </tr>
									</thead>
									<tbody>
										<?php
											//$query =  mysql_query("SELECT * FROM //tbl_po, tbl_po_items WHERE tbl_po.Year = //$Year GROUP BY tbl_po_items.POno")or //die(mysql_error());
											//$query =  mysql_query("SELECT * FROM tbl_po JOIN tbl_po_items USING (POno) WHERE tbl_po.Year = $Year AND tbl_po.POno <> '' GROUP BY tbl_po_items.POno")or die(mysql_error());
											$query =  mysql_query("SELECT * FROM tbl_iar JOIN tbl_iar_items USING (POno) WHERE tbl_iar.Year = $Year AND tbl_iar.POno <> 0 GROUP BY tbl_iar_items.POno")or die(mysql_error());
											while($row = mysql_fetch_array($query)){
										?>
											<tr>
												<td width="5"><?php echo $row['iar_No']; ?></th>
												<td width="5"><?php echo $row['iar_Date']; ?></th>
												<td width="150"><?php echo $row['supplier']; ?></td>
												<td width="5"><?php echo $row['POno']; ?></td>
												<td width="5"><?php echo $row['po_Date']; ?></td>
												<td width="5">													
														<?php
															$iar_No = $row['iar_No'];
															$POno = $row['POno'];
															$year = $row['Year'];
															//$dateC = $row['Date_Created'];
															
															$check = mysql_query("SELECT *,COUNT(Year) FROM tbl_iar WHERE Year = '$Year' AND iar_No = '$iar_No'")or die(mysql_error());
															$bilang = mysql_num_rows($check);
															
															if ($bilang == "0") {
																echo '<a title="Preview Inspection and Acceptance Report" id="back" data-placement="top" class="btn btn-default"><i class="icon-print icon-large"></i> Preview </a>';
															}else{
																echo '<a href="inspection-preview.php?iar_No='.$iar_No.'&POno='.$POno.'" title="Preview Inspection and Acceptance Report" id="back" data-placement="top" class="btn btn-inverse"><i class="icon-print icon-large"></i> Preview </a>';
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