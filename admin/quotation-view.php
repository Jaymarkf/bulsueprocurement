<?php
/*for the dropdown and another dropdown*/
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM tbl_pr WHERE PRno <> '0000'";
$results = $db_handle->runQuery($query);
?>

	<div class="container-fluid">
		<div class="row-fluid">	
						<div class="span12" id="content">
							<div class="row-fluid">
								<br/>
								<div class="pull-left">
									<a href="quotation.php" title="Back to item quotation listing" id="back" data-placement="right" class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
										<script type="text/javascript">
											$(document).ready(function(){
												$('#back').tooltip('show');
												$('#back').tooltip('hide');
											});
										</script>
								</div>
								<div class="pull-right">
									<?php
									//	$item = $itemID;
									//	echo '<a href="quotation-view-print.php?item='.$item.'" title="Print Preview" id="back" data-placement="top"
									//  class="btn btn-success"><i class="icon-print icon-large"></i> Preview </a>';
									?>
										<script type="text/javascript">
										//	$(document).ready(function(){
										//		$('#back').tooltip('show');
										//		$('#back').tooltip('hide');
										//	});
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
						//$sqlSelectItem = mysql_query("SELECT * FROM tbl_quotation WHERE itemDescription = '$itemID'") or die(mysql_error());
						//$getItemInfo = mysql_fetch_array($sqlSelectItem);
		
						$query = mysql_query("SELECT * FROM tbl_quotation WHERE Year = $Year AND itemDescription = '$itemID'")or die(mysql_error());
						$count = mysql_num_rows($query);
						
						?>
							<div class="muted pull-left"><img src="../images/buttons/rfq.png" width="10%"> Listing of Company</div>
							<div class="muted pull-right">
								Total Listing: <span class="badge badge-info"><?php echo $count; ?></span>
							</div>
						</div>
						
						<div class="block-content collapse in">
							<div class="span12">
							<!-- <form action="quotation-delete.php" method="post" id="deleteForm"> -->
							<form action="" method="post" id="">
								<table cellpadding="0" cellspacing="0" border="0" class="table" id="example1">
									<thead>
									  <tr>
											<th>Company Name</th>
											<th>Company Address</th>
											<th>Contact Person</th>
											<th>Contact Number</th>
											<th>E-mail</th>
											<th>TIN</th>
											<th>Brand | Model</th>
											<th>Unit Price</th>
											<th>Extended Price</th>
											<th>Action</th>
									   </tr>
									</thead>
									<tbody>
										<?php
											$query = mysql_query("SELECT * FROM tbl_quotation WHERE Year = $Year AND itemDescription = '$itemID'")or die(mysql_error());
											while($row = mysql_fetch_array($query)){
											$id = $row['quotation_id'];
										?>
											<tr>
												<td width="200"><?php echo $row['Company']; ?></td>
												<td width="300"><?php echo $row['Address']; ?></td>
												<td width="10"><?php echo $row['Contact_Person']; ?></td>
												<td width="5"><?php echo $row['Contact_No']; ?></td>
												<td width="5"><?php echo $row['email']; ?></td>
												<td width="5"><?php echo $row['TIN']; ?></td>
												<td width="200"><?php echo $row['Brand_Model']; ?></td>
												<td width="5" style="text-align:right;">&#8369;<?php echo number_format($row['unitPrice'],2, '.', ','); ?></td>
												<td width="5" style="text-align:right;">&#8369;<?php echo number_format($row['extPrice'],2, '.', ','); ?></td>
												<!-- <td>
													<div class="pull-right">
														<?php
														//	$item = $itemID;
														//	$company = $row['Company'];
														//	$year = $Year;
														//	echo '<a href="quotation-view-print.php?item='.$item.'&company='.$company.'&year='.$year.'" //title="Print Preview" id="back" data-placement="top"
														//    class="btn btn-success"><i class="icon-print icon-large"></i> Preview </a>';
														?>
															<script type="text/javascript">
															//	$(document).ready(function(){
															//		$('#back').tooltip('show');
															//		$('#back').tooltip('hide');
															//	});
															</script>
													</div>
												</td> -->
												<td>
													<?php
															echo '<a href="quotation-form-preview.php?item='.$row['Company'].'" title="Preview Quotation Form" id="back" data-placement="top" class="btn btn-success"><i class="icon-print icon-large"></i> Form </a>';
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
	</div>