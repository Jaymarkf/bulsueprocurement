<?php include('../dbcon.php'); ?>
<?php
	//require_once 'config.php';
	//if(isset($_GET['idsup'])) {
	//	$update_id = $_GET['idsup'];

		//mysqli_query($conn,"UPDATE tbl_ppmp SET BO_PPMP_Status = 'Supplemental' WHERE Status = 'Requested' AND BO_PPMP_Status <> 'Approved' AND EndUserUnit='$update_id'");
	//	mysqli_query($conn,"UPDATE tbl_ppmp SET BO_PPMP_Status = 'Supplemental' WHERE Status = 'Requested' AND BO_PPMP_Status = 'Approved' AND EndUserUnit='$update_id'");

	//	header('Location: ppmp_requested.php?id='.$update_id);
	//}
	
	//if(isset($_GET['idrev'])) {
	//	$update_id = $_GET['idrev'];

		//mysqli_query($conn,"UPDATE tbl_ppmp SET BO_PPMP_Status = 'Revise' WHERE Status = 'Requested' AND BO_PPMP_Status <> 'Approved' AND EndUserUnit='$update_id'");
	//	mysqli_query($conn,"UPDATE tbl_ppmp SET BO_PPMP_Status = 'Revise' WHERE Status = 'Requested' AND BO_PPMP_Status = 'Approved' AND EndUserUnit='$update_id'");

	//	header('Location: ppmp_requested.php?id='.$update_id);
	//}
	
	if(isset($_GET['idsendback'])) {
		$update_id = $_GET['idsendback'];

		mysqli_query($conn,"UPDATE tbl_ppmp SET Status = 'Pending' WHERE Status = 'Requested' AND BO_PPMP_Status = 'Approved' AND EndUserUnit='$update_id'");

		header('Location: ppmp_requested.php?id='.$update_id);
	}
	
	if(isset($_GET['idapp'])) {
		$update_id = $_GET['idapp'];

		mysqli_query($conn,"UPDATE tbl_ppmp SET Status = 'Completed', PU_PPMP_Status = 'Approved' WHERE Status = 'Requested' AND EndUserUnit='$update_id'");
		$dataquery = mysqli_query($conn,"select * from  tbl_ppmp WHERE Status = 'Completed' AND BO_PPMP_Status = 'Approved' AND PU_PPMP_Status = 'Approved' AND EndUserUnit='$update_id'");
		//insert all data in ppmp consolidated after bo_ppmp and pu_ppmp is confirmed and completed status
        while($datarow = $dataquery->fetch_array()){
            $qry = "insert into tbl_ppmp_consolidated (Year,ItemCatDesc,itemdetailDesc,UnitOfMeasurement,PriceCatalogue,TotalQty,TotalAmount)
                 values('".$datarow['Year']."','".$datarow['ItemCatDesc']."','".$datarow['itemdetailDesc']."','".$datarow['UnitOfMeasurement']."','".$datarow['PriceCatalogue']."','".$datarow['TotalQty']."','".$datarow['TotalAmount']."')";
                mysqli_query($conn,$qry);
        }


		//mysqli_query($conn,$qry);
		header('Location: ppmp_approved.php?id='.$update_id);
	}
?>

<div class="">	
	<div class="">
		<a data-placement="bottom" href="dashboard.php" title="Back to PPMP-Dashboard" id="back" class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#back').tooltip('show');
					$('#back').tooltip('hide');
				});
			</script>
		<!-- <th colspan="2" style="text-align:right;"> -->
		<!--	<a data-placement="bottom" title="Supplemental PPMP" id="view" href="ppmp_requested_table.php<?php echo '?idsup='.$id; ?>" class="btn btn-warning"><i class="icon-edit icon-small"></i> Supplemental </a>
				<script type="text/javascript">
				$(document).ready(function(){
					$('#view').tooltip('show');
					$('#view').tooltip('hide');
				});
				</script>
				
			<a data-placement="bottom" title="Revise PPMP" id="reset" href="ppmp_requested_table.php<?php echo '?idrev='.$id; ?>" class="btn btn-danger"><i class="icon-edit icon-small"></i> Revise </a>
				<script type="text/javascript">
				$(document).ready(function(){
					$('#reset').tooltip('show');
					$('#reset').tooltip('hide');
				});
				</script> -->
		
			<a data-placement="bottom" title="Approved PPMP" id="previous" href="ppmp_requested_table.php<?php echo '?idapp='.$id; ?>" class="btn btn-success"><i class="icon-check icon-small"></i> Approved </a>
				<script type="text/javascript">
				$(document).ready(function(){
					$('#previous').tooltip('show');
					$('#previous').tooltip('hide');
				});
				</script>
			
			<a data-placement="bottom" title="Send Back" id="sendback" href="ppmp_requested_table.php<?php echo '?idsendback='.$id; ?>" class="btn btn-warning"><i class="icon-share icon-small"></i> Send Back </a>
				<script type="text/javascript">
				$(document).ready(function(){
					$('#sendback').tooltip('show');
					$('#sendback').tooltip('hide');
				});
				</script>
		<!-- </th> -->
	</div>
	<div class="span6" id="content">
	<h3>EndUser/Unit: 
	<?php 
		echo $id;
	?>
	</h3>
	</div>
	<div class="span6">
	<?php					
		$query3a = mysqli_query($conn,"SELECT * FROM users WHERE branch='$id'");
		while($row3a = mysqli_fetch_array($query3a)) {
		$Year3a = $row3a['Year'];
		$user_id3a = $row3a['user_id'];
		
		//$query4a = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE Year = $Year3a AND user_id='$user_id3a'  AND Status = 'Requested' AND BO_PPMP_Status <> 'Approved' GROUP BY BO_PPMP_Status");
		$query4a = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE Year = '$Year3a' AND user_id = '$user_id3a'  AND Status = 'Requested' AND BO_PPMP_Status = 'Approved' GROUP BY BO_PPMP_Status");
		while($row4a = mysqli_fetch_assoc($query4a)){
		$id4a = $row4a['ppmpID'];
	?>
	<h5 class="pull-right">Budget Office: 
	<?php
			if ($row4a['BO_PPMP_Status'] == "Supplemental") {
				echo "<span class='badge badge-warning'>".$row4a['BO_PPMP_Status']."</span>";
			} elseif ($row4a['BO_PPMP_Status'] == "Revise") {	
				echo "<span class='badge badge-important'>".$row4a['BO_PPMP_Status']."</span>";
			} elseif ($row4a['BO_PPMP_Status'] == "Approved"){
				echo "<span class='badge badge-success'>".$row4a['BO_PPMP_Status']."</span>";
			}
		}
	}
	?>
	</h5>
	</div>
	
	<form method="POST">
		<table cellpadding="0" cellspacing="0" border="0" id="example1" class="display" width="100%">
			<thead>
				<tr>
					<th rowspan="2"><b>Item Description</b></th>
					<th rowspan="2"><b>Unit of Measurement</b></th>
					<th colspan="12"><b>Schedule/ Milestones of Activities:</b></th>
					<th rowspan="2"><b>Total Qty</b></th>
					<th rowspan="2"><b>Price Catalogue</b></th>
					<th rowspan="2"><b>Total Amount</b></th>
					<th rowspan="2"><b>Remarks</b></th>
					<th rowspan="2"><b>Actions</b></th>
				</tr>
				
				<tr>
					<th><b>Jan</b></th>
					<th><b>Feb</b></th>
					<th><b>March</b></th>
					<th><b>Apr</b></th>
					<th><b>May</b></th>
					<th><b>Jun</b></th>
					<th><b>Jul</b></th>
					<th><b>Aug</b></th>
					<th><b>Sep</b></th>
					<th><b>Oct</b></th>
					<th><b>Nov</b></th>
					<th><b>Dec</b></th>
				</tr>
			</thead>
			
			<tbody>
				<?php					
					$query3 = mysqli_query($conn,"SELECT * FROM users WHERE branch='$id'");
					while($row3 = mysqli_fetch_array($query3)) {
					$Year3 = $row3['Year'];
					$user_id3 = $row3['user_id'];
					
					//$query4 = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE Year = $Year3 AND user_id='$user_id3'  AND Status = 'Requested' AND BO_PPMP_Status <> 'Approved'");
					$query4 = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE Year = $Year3 AND user_id='$user_id3'  AND Status = 'Requested' AND BO_PPMP_Status = 'Approved'");
					while($row4 = mysqli_fetch_array($query4)){
					$id4 = $row4['ppmpID'];
				?>
				<tr>				
					<?php if ($row4['BO_PPMP_Status'] == "Supplemental") { ?>
					<td width="500" style="text-align:center;"><?php echo $row4['itemdetailDesc']; ?></td> 
					<td width="100" style="text-align:center;"><?php echo $row4['UnitOfMeasurement']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Jan']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Feb']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Mar']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Apr']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['May']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Jun']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Jul']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Aug']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Sep']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Oct']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Nov']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Dec']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['TotalQty']; ?></td>
					<td width="150" style="text-align:right;">&#8369;<?php echo number_format($row4['PriceCatalogue'],2, '.', ','); ?></td>
					<td width="150" style="text-align:right;">&#8369;<?php echo number_format($row4['TotalAmount'],2, '.', ','); ?></td>					
					<td width="100" style="text-align:center;"><?php echo $row4['Remarks']; ?></td> 
					<td class="empty" width="200" style="text-align:center;">
						<div class="span12">
								<!-- <a data-placement="left" title="Click to Edit" id="edit<?php echo $id; ?>" href="edit_stud.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i> Edit</a> -->
								<a data-placement="top" title="Click to edit the item" id="edit<?php echo $id; ?>" href="ppmp_requested_edit.php<?php echo '?id='.$id4.'&branchid='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-small"></i></a>
								<script type="text/javascript">
								$(document).ready(function(){
									$('#edit<?php echo $id; ?>').tooltip('show');
									$('#edit<?php echo $id; ?>').tooltip('hide');
								});
								</script>

								<a data-placement="top" title="Click to remove the item" id="delete<?php echo $id; ?>" href="ppmp_requested_delete.php<?php echo '?id='.$id4.'&branchid='.$id; ?>" class="btn btn-danger"><i class="icon-trash icon-small"></i></a>
								<script type="text/javascript">
								$(document).ready(function(){
									$('#delete<?php echo $id; ?>').tooltip('show');
									$('#delete<?php echo $id; ?>').tooltip('hide');
								});
								</script>
						</div>
					</td>
					<?php } elseif ($row4['BO_PPMP_Status'] == "Revise") { ?>
					<td width="500" style="text-align:center;"><?php echo $row4['itemdetailDesc']; ?></td> 
					<td width="100" style="text-align:center;"><?php echo $row4['UnitOfMeasurement']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Jan']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Feb']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Mar']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Apr']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['May']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Jun']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Jul']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Aug']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Sep']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Oct']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Nov']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Dec']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['TotalQty']; ?></td>
					<td width="150" style="text-align:right;">&#8369;<?php echo number_format($row4['PriceCatalogue'],2, '.', ','); ?></td>
					<td width="150" style="text-align:right;">&#8369;<?php echo number_format($row4['TotalAmount'],2, '.', ','); ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Remarks']; ?></td> 
					<td class="empty" width="200" style="text-align:center;">
						<div class="span12">
								<!-- <a data-placement="left" title="Click to Edit" id="edit<?php echo $id; ?>" href="edit_stud.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i> Edit</a> -->
								<a data-placement="top" title="Click to edit the item" id="edit<?php echo $id; ?>" href="ppmp_requested_edit.php<?php echo '?id='.$id4.'&branchid='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-small"></i></a>
								<script type="text/javascript">
								$(document).ready(function(){
									$('#edit<?php echo $id; ?>').tooltip('show');
									$('#edit<?php echo $id; ?>').tooltip('hide');
								});
								</script>

								<a name="delete" data-placement="top" title="Click to remove the item" id="delete<?php echo $id; ?>" href="ppmp_requested_delete.php<?php echo '?id='.$id4; ?>" class="btn btn-danger"><i class="icon-trash icon-small"></i></a>
								<script type="text/javascript">
								$(document).ready(function(){
									$('#delete<?php echo $id; ?>').tooltip('show');
									$('#delete<?php echo $id; ?>').tooltip('hide');
								});
								</script>
						</div>
					</td>
					<?php } elseif ($row4['BO_PPMP_Status'] == "Approved"){ ?> 
					<td width="500" style="text-align:center;"><?php echo $row4['itemdetailDesc']; ?></td> 
					<td width="50" style="text-align:center;"><?php echo $row4['UnitOfMeasurement']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Jan']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Feb']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Mar']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Apr']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['May']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Jun']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Jul']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Aug']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Sep']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Oct']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Nov']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Dec']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['TotalQty']; ?></td>
					<td width="150" style="text-align:right;">&#8369;<?php echo number_format($row4['PriceCatalogue'],2, '.', ','); ?></td>
					<td width="150" style="text-align:right;">&#8369;<?php echo number_format($row4['TotalAmount'],2, '.', ','); ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['Remarks']; ?></td> 
					<td class="empty" width="200" style="text-align:center;">
						<div class="span12">
                            <div class="span12">
                                <!-- <a data-placement="left" title="Click to Edit" id="edit<?php echo $id; ?>" href="edit_stud.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i> Edit</a> -->
                                <a data-placement="top" title="Click to edit the item" id="edit<?php echo $id; ?>" href="ppmp_requested_edit.php<?php echo '?id='.$id4.'&branchid='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-small"></i></a>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $('#edit<?php echo $id; ?>').tooltip('show');
                                        $('#edit<?php echo $id; ?>').tooltip('hide');
                                    });
                                </script>

                                <a name="delete" data-placement="top" title="Click to remove the item" id="delete<?php echo $id; ?>" href="ppmp_requested_delete.php<?php echo '?id='.$id4; ?>" class="btn btn-danger"><i class="icon-trash icon-small"></i></a>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $('#delete<?php echo $id; ?>').tooltip('show');
                                        $('#delete<?php echo $id; ?>').tooltip('hide');
                                    });
                                </script>
                            </div>
						</div>
					</td>
					<?php } ?>
				</tr>
				<?php 
					}
				}
				?>    		
			</tbody>
			<tfooter>
				<tr>
					<th colspan="16" align="right"><h4>TOTAL AMOUNT: </h4></th>
					
					<?php
						//$row5 = mysqli_query($conn,"SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year=$Year AND EndUserUnit='$id'  AND Status = 'Requested' AND BO_PPMP_Status <> 'Approved'") ;
						$row5 = mysqli_query($conn,"SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year=$Year AND EndUserUnit='$id'  AND Status = 'Requested' AND BO_PPMP_Status = 'Approved'") ;
						while($result5 = mysqli_fetch_array($row5)){
							echo "<th style='text-align:right;'><h4>&#8369;" . number_format($result5['Totalx'],2, '.', ',') . "</h4></th>";
						}
					?>
					
				</tr>
			</tfooter>
		</table>
	</form>
	<div class="">
		<a data-placement="top" href="dashboard.php" title="Back to PPMP-Dashboard" id="back1" class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#back1').tooltip('show');
					$('#back1').tooltip('hide');
				});
			</script>
		<!-- <th colspan="2" style="text-align:right;"> -->
		<!--	<a data-placement="top" title="Supplemental PPMP" id="view1" href="ppmp_requested_table.php<?php echo '?idsup='.$id; ?>" class="btn btn-warning"><i class="icon-edit icon-small"></i> Supplemental </a>
				<script type="text/javascript">
				$(document).ready(function(){
					$('#view1').tooltip('show');
					$('#view1').tooltip('hide');
				});
				</script>
				
			<a data-placement="top" title="Revise PPMP" id="reset1" href="ppmp_requested_table.php<?php echo '?idrev='.$id; ?>" class="btn btn-danger"><i class="icon-edit icon-small"></i> Revise </a>
				<script type="text/javascript">
				$(document).ready(function(){
					$('#reset1').tooltip('show');
					$('#reset1').tooltip('hide');
				});
				</script> -->
		
			<a data-placement="top" title="Approved PPMP" id="previous1" href="ppmp_requested_table.php<?php echo '?idapp='.$id; ?>" class="btn btn-success"><i class="icon-check icon-small"></i> Approved </a>
				<script type="text/javascript">
				$(document).ready(function(){
					$('#previous1').tooltip('show');
					$('#previous1').tooltip('hide');
				});
				</script>
			
			<a data-placement="top" title="Send Back" id="sendback1" href="ppmp_requested_table.php<?php echo '?idsendback='.$id; ?>" class="btn btn-warning"><i class="icon-share icon-small"></i> Send Back </a>
				<script type="text/javascript">
				$(document).ready(function(){
					$('#sendback1').tooltip('show');
					$('#sendback1').tooltip('hide');
				});
				</script>
			
		<!-- </th> -->
	</div>
</div>