
<?php
	if(isset($_GET['update_id'])) {
		$update_id = $_GET['update_id'];
		
		mysqli_query($conn,"UPDATE tbl_ppmp SET Status = 'Completed' WHERE Status = 'Requested' AND BO_PPMP_Status='Approved' AND EndUserUnit='$update_id'");
		
		header('Location: dashboard.php');
	}
?>
<div class="block-content collapse in">
	<div class="span12">
	<h2 id="noch">DASHBOARD</h2>
	<form method="POST">
		<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
			<thead>
				<tr>
					<th width="10%" style="text-align:center;"><b>PPMP Year</b></th>
					<th width="40%"><b>End-User/Unit</b></th>
					<th width="10%"><b>Requested by</b></th>
					<th width="40%"	colspan="4" style="text-align:center;"><b>Actions</b></th>
				</tr>
			</thead>
			
			<tbody>
				<?php
				$query2 = mysqli_query($conn,"SELECT * FROM users WHERE Year<> '0' AND Year='$Year' AND level='user' AND approved='yes'");
				while($row2 = mysqli_fetch_array($query2)){
					$Branch2 = $row2['branch'];
					$user_id2 = $row2['user_id'];
					$Year2 = $row2['Year'];
						
					//$query3= mysql_query("select * from tbl_ppmp WHERE Year = '$Year' AND EndUserUnit='$Branch2' AND Status = 'Requested' AND BO_PPMP_Status <> 'Approved' AND user_id = '$user_id2'")or die(mysql_error());
					$query3= mysqli_query($conn,"select * from tbl_ppmp WHERE Year = '$Year' AND EndUserUnit='$Branch2' AND Status = 'Requested' AND BO_PPMP_Status = 'Approved' AND user_id = '$user_id2' GROUP BY Year");
					$count3 = mysqli_num_rows($query3);
					
					$query4 = mysqli_query($conn,"SELECT *,COUNT(Year) FROM tbl_ppmp WHERE Year = '$Year' AND EndUserUnit='$Branch2' AND Status = 'Completed'  AND BO_PPMP_Status = 'Approved' AND user_id = '$user_id2' GROUP BY Year");
					$count4 = mysqli_num_rows($query4);
					
					$query5 = mysqli_query($conn,"SELECT *,COUNT(Year) FROM tbl_ppmp WHERE Year < '$Year' AND EndUserUnit='$Branch2' AND Status = 'Completed'  AND BO_PPMP_Status = 'Approved' AND user_id = '$user_id2' GROUP BY Year");
					$count5 = mysqli_num_rows($query5);
				?>
				<tr>
					<td style="text-align:center;"><?php echo $Year2; ?></td>
					<td ><?php echo $row2['branch']; ?></td> 
					<td ><?php echo $row2['username']; ?></td>
					<td style="text-align:center;">
						
						<?php if ($count3 == "0") { ?>
							<a data-placement="top" title="VIEW Details" id="view" href="#" class="btn btn-default"><i class="icon-certificate icon-large"></i> New PPMP Approval <br/><span class="badge badge-default"><?php  echo $count3;  ?></span></a>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#view').tooltip('show');
								$('#view').tooltip('hide');
							});
							</script>
						<?php }else{ ?>
							<a data-placement="top" title="VIEW Details" id="view1" href="ppmp_requested.php<?php echo '?id='.$Branch2; ?>" class="btn btn-warning"><i class="icon-certificate icon-large"></i> New PPMP Approval <br/><span class="badge badge-inverse"><?php  echo $count3;  ?></span></a>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#view1').tooltip('show');
								$('#view1').tooltip('hide');
							});
							</script>
						<?php } ?>
						
						<?php if ($count4 == "0") { ?>
							<a data-placement="top" title="APPROVED PPMP" id="approved" href="#" class="btn btn-default"><i class="icon-check icon-large"></i> Approved PPMP <br/><span class="badge badge-default"><?php  echo $count4;  ?></a>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#approved').tooltip('show');
								$('#approved').tooltip('hide');
							});
							</script>
						<?php }else{ ?>
							<a data-placement="top" title="APPROVED PPMP" id="approved1" href="ppmp_approved.php<?php echo '?id='.$Branch2; ?>" class="btn btn-success"><i class="icon-check icon-large"></i> Approved PPMP <br/><span class="badge badge-inverse"><?php  echo $count4;  ?></a>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#approved1').tooltip('show');
								$('#approved1').tooltip('hide');
							});
							</script>
						<?php } ?>
						
						<?php if ($count5 == "0") { ?>
							<a data-placement="top" title="PREVIOUS PPMP" id="previous" href="#" class="btn btn-default"><i class="icon-eye-open icon-large"></i> Previous PPMP <br/><span class="badge badge-default"><?php  echo $count5;  ?></a>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#previous').tooltip('show');
								$('#previous').tooltip('hide');
							});
							</script>
						<?php }else{ ?>
							<a data-placement="top" title="PREVIOUS PPMP" id="previous1" href="ppmp_previous.php<?php echo '?id='.$Branch2; ?>" class="btn btn-inverse"><i class="icon-eye-open icon-large"></i> Previous PPMP <br/><span class="badge badge-primary"><?php  echo $count5;  ?></a>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#previous1').tooltip('show');
								$('#previous1').tooltip('hide');
							});
							</script>
						<?php } ?>
					</td>
				</tr>
				<?php } ?>					
			</tbody>
		</table>
	</form>
	</div>
</div>