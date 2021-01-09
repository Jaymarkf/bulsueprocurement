<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php include('session.php'); ?>
<body>
	<?php include('navbar.php'); ?>
	<h4 class="span12">Manage Quotation</h4>
	
	<div class="container-fluid">
		<div class="row-fluid">
			<!-- <div class="span3" id="content">
				<?php  //include('quotation-add.php');  ?>		   			
			</div> -->
			
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
						
			<div class="span12" id="content">
				 <div class="row-fluid">
					<!-- block -->
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
						<?php 
						$query = mysqli_query($conn,"SELECT * FROM tbl_quotation");
						$count = mysqli_num_rows($query);
						?>
							<div class="muted pull-left"><i class="icon-user icon-large"></i> Quotation List</div>
							<div class="muted pull-right">
								Number of Quotation: <span class="badge badge-info"><?php echo $count; ?></span>
							</div>
						</div>
						
						<div class="block-content collapse in">
							<div class="span12">
							<form action="quotation-delete.php" method="post" id="deleteForm">
								<table cellpadding="0" cellspacing="0" border="0" class="table" id="example1">
								<div class="pull-left">
								<a data-placement="right" title="Click to Delete check item" data-toggle="modal" href="#delete_quotation" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i> Delete</a>
									<script type="text/javascript">
									$(document).ready(function(){
										$('#delete').tooltip('show');
										$('#delete').tooltip('hide');
									});
									</script>
								<?php include('modal_delete.php'); ?>
								</div>
								
								<div class="pull-right">
								<a href="quotation-add-main.php" title="Add new quotation" id="back" data-placement="top" class="btn btn-success"><i class="icon-plus-sign icon-large"></i> New Quotation </a>
								<script type="text/javascript">
									$(document).ready(function(){
										$('#back').tooltip('show');
										$('#back').tooltip('hide');
									});
								</script>
								</div>
								
									<thead>
									  <tr>
											<th>Select</th>
										<!--	<th>Edit</th> -->
											<th>Company</th>
											<th>Address</th>
											<th>Contact Person</th>
											<th>Contact Number</th>
											<th>E-mail</th>
											<th>Reference Number</th>
											<th>Item Description</th>
											<th>Unit of Measurement</th>
											<th>Unit Price</th>
									   </tr>
									</thead>
									<tbody>
										<?php
											$query = mysqli_query($conn,"SELECT * FROM tbl_quotation ORDER BY quotation_id DESC");
											while($row = mysqli_fetch_array($query)){
											$id = $row['quotation_id'];
										?>
											<tr>
												<td width="5" style="text-align:center;">
													<input title="Check to Delete" id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
											<!--	<td width="5" style="text-align:center;">
													<a data-placement="top" id="edit<?php echo $id; ?>" title="Click to Edit" href="quotation-edit.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-small"></i></a>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#edit<?php echo $id; ?>').tooltip('show');
															$('#edit<?php echo $id; ?>').tooltip('hide');
														});
														</script>
												</td> -->
												<td width="200"><?php echo $row['Company']; ?> </td>
												<td width="300"><?php echo $row['Address']; ?></td>
												<td width="50"><?php echo $row['Contact_Person']; ?> </td>
												<td width="20"><?php echo $row['Contact_No']; ?></td>
												<td width="30"><?php echo $row['email']; ?></td>
												<td width="5"><?php echo $row['Ref_No']; ?></td>
												<td width="200"><?php echo $row['itemDescription']; ?></td>
												<td width="50"><?php echo $row['unitOfMeasurement']; ?></td>
												<td width="10"><?php echo $row['unitPrice']; ?></td>
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