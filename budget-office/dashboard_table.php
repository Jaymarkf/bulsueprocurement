
<?php
	if(isset($_GET['update_id'])) {
		$update_id = $_GET['update_id'];
		
		mysql_query("UPDATE tbl_ppmp SET Status = 'Completed' WHERE Status = 'Requested' AND BO_PPMP_Status='Approved' AND EndUserUnit='$update_id'")or die(mysql_error());
		
		header('Location: dashboard.php');
	}
?>
<div class="block-content collapse in">
	<div class="span12">
	<h2 id="noch">DASHBOARD</h2>
	<form method="POST">
		<table cellpadding="0" cellspacing="0" border="0" class="table" id="example1">
			<thead>
				<tr>
					<th style="text-align:center;"><b>PPMP Year</b></th>
					<th><b>End-User/Unit</b></th>
					<th><b>Requested by</b></th>
					<th colspan="4" style="text-align:center;"><b>Actions</b></th>
				</tr>
			</thead>
			
			<tbody>
				<?php
				$query2 = mysql_query("SELECT * FROM users WHERE Year<> '0' AND Year='$Year' AND level='user' AND approved='yes'")or die(mysql_error());
				while($row2 = mysql_fetch_array($query2)){
					$Branch2 = $row2['branch'];
					$user_id2 = $row2['user_id'];
					$Year2 = $row2['Year'];
						
					$query3= mysql_query("select * from tbl_ppmp WHERE Year = '$Year' AND EndUserUnit='$Branch2' AND Status = 'Requested' AND BO_PPMP_Status <> 'Approved' AND user_id = '$user_id2' GROUP BY Year")or die(mysql_error());
					$count3 = mysql_num_rows($query3);
					
					//$query4 = mysql_query("SELECT *,COUNT(Year) FROM tbl_ppmp WHERE Year = '$Year' AND EndUserUnit='$Branch2' AND Status = 'Requested'  AND BO_PPMP_Status = 'Approved' AND user_id = '$user_id2' GROUP BY Year")or die(mysql_error());
					$query4 = mysql_query("SELECT *,COUNT(Year) FROM tbl_ppmp WHERE Year = '$Year' AND EndUserUnit='$Branch2' AND BO_PPMP_Status = 'Approved' AND user_id = '$user_id2' GROUP BY Year")or die(mysql_error());
					$count4 = mysql_num_rows($query4);
					
					$query5 = mysql_query("SELECT *,COUNT(Year) FROM tbl_ppmp WHERE Year < '$Year' AND EndUserUnit='$Branch2' AND Status = 'Completed'  AND BO_PPMP_Status = 'Approved' AND user_id = '$user_id2' GROUP BY Year")or die(mysql_error());
					$count5 = mysql_num_rows($query5);
				?>
				<tr>
					<td width="10%" style="text-align:center;"><?php echo $Year2; ?></td>
					<td width="40%"><?php echo $row2['branch']; ?></td> 
					<td width="10%"><?php echo $row2['username']; ?></td>
					<td width="40%" style="text-align:center;">
						
						<?php if ($count3 == "0") { ?>
							<a data-placement="top" title="VIEW Details" id="view" href="#" class="btn btn-default"><i class="icon-shopping-cart icon-large"></i> New PPMP <br/>Budget Request <br/><span class="badge badge-default"><?php  echo $count3;  ?></span></a>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#view').tooltip('show');
								$('#view').tooltip('hide');
							});
							</script>
						<?php }else{ ?>
							<a data-placement="top" title="VIEW Details" id="view" href="ppmp_requested.php<?php echo '?id='.$Branch2; ?>" class="btn btn-warning"><i class="icon-shopping-cart icon-large"></i> New PPMP <br/>Budget Request <br/><span class="badge badge-inverse"><?php  echo $count3;  ?></span></a>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#view').tooltip('show');
								$('#view').tooltip('hide');
							});
							</script>
						<?php } ?>
						
						<?php if ($count4 == "0") { ?>
							<a data-placement="top" title="APPROVED PPMP" id="approved" href="#" class="btn btn-default"><i class="icon-check icon-large"></i> Approved PPMP <br/>Budget Request<br/><span class="badge badge-default"><?php  echo $count4;  ?></a>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#approved').tooltip('show');
								$('#approved').tooltip('hide');
							});
							</script>
						<?php }else{ ?>
							<a data-placement="top" title="APPROVED PPMP" id="approved" href="ppmp_approved.php<?php echo '?id='.$Branch2; ?>" class="btn btn-success"><i class="icon-check icon-large"></i> Approved PPMP <br/>Budget Request<br/><span class="badge badge-inverse"><?php  echo $count4;  ?></a>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#approved').tooltip('show');
								$('#approved').tooltip('hide');
							});
							</script>
						<?php } ?>
						
						<?php if ($count5 == "0") { ?>
							<a data-placement="top" title="PREVIOUS PPMP" id="previous" href="#" class="btn btn-default"><i class="icon-eye-open icon-large"></i> PPMP <br/>Historical Records<br/><span class="badge badge-default"><?php  echo $count5;  ?></a>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#previous').tooltip('show');
								$('#previous').tooltip('hide');
							});
							</script>
						<?php }else{ ?>
							<a data-placement="top" title="PREVIOUS PPMP" id="previous" href="ppmp_previous.php<?php echo '?id='.$Branch2; ?>" class="btn btn-inverse"><i class="icon-eye-open icon-large"></i> PPMP <br/>Historical Records<br/><span class="badge badge-primary"><?php  echo $count5;  ?></a>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#previous').tooltip('show');
								$('#previous').tooltip('hide');
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