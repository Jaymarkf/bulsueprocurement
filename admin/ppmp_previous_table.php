
<div class="">
	<div class="span12">
		<a href="dashboard.php" data-placement="right" title="Click to go back in previous screen" id="back1" class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#back1').tooltip('show');
				$('#back1').tooltip('hide');
			});
		</script>
	</div>
	<br/>
	<div class="span12" id="content">
		<h3>EndUser/Unit: <?php echo $id;?></h3>
	</div>
	<br/>
	<form action="" method="POST">
		<table cellpadding="0" cellspacing="0" border="0" id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th><b>Year</b></th>
					<th><b>Total Amount</b></th>
					<th><b>Actions</b></th>
				</tr>
			</thead>
			
			<tbody>
				<?php
					$query2 = mysqli_query($conn,"SELECT *,SUM(TotalAmount) as TAmt FROM tbl_ppmp WHERE EndUserUnit='$id' AND Status = 'Completed' AND Year < '$Year' GROUP BY Year");				
					while($row2 = mysqli_fetch_array($query2)){
					$id = $row2['Year'];
					$euu = $row2['EndUserUnit'];
				?>

				<tr>				
					<td width="300" style="text-align:center;"><?php echo $row2['Year']; ?></td> 
				
					<td width="300" style="text-align:center;">&#8369; <?php echo number_format($row2['TAmt'],2, '.', ','); ?></td>

					<td class="empty" width="50" style="text-align:center;">
						<div class="span12">
							
							<a data-placement="left" id="view<?php echo $id; ?>" title="View PPMP Lists Details" href="ppmp_previous_view.php<?php echo '?id='.$id.'&branchid='.$euu; ?>" data-toggle="modal" class="btn btn-primary"><i class="icon-eye-open icon-large"></i> View</a>
								<script type="text/javascript">
								$(document).ready(function(){
									$('#view<?php echo $id; ?>').tooltip('show');
									$('#view<?php echo $id; ?>').tooltip('hide');
								});
								</script>
						</div>
					</td>
				</tr>
				<?php 
					}
				//}
				?>    		
			</tbody>
		</table>
	</form>
	<div class="span12" id="content">
		<a href="dashboard.php" data-placement="right" title="Click to go back in previous screen" id="back1" class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#back1').tooltip('show');
				$('#back1').tooltip('hide');
			});
		</script>
	</div>
</div>