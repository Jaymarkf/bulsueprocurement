
<div class="">
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
					$query2 = mysqli_query($conn,"SELECT *,SUM(TotalAmount) as TAmt FROM tbl_ppmp WHERE Year < '$Year' AND user_id='$session_id'  AND Status = 'Completed' GROUP BY Year");				
					while($row2 = mysqli_fetch_array($query2)){
					$id = $row2['Year'];
				?>
				<tr>				
					<td width="300" style="text-align:center;"><?php echo $row2['Year']; ?></td> 
				<!--	<td width="300" style="text-align:center;"><?php echo "Php ".number_format($row2['TAmt'],2); ?></td> -->
					<td width="300" style="text-align:center;"><?php echo $row2['TAmt']; ?></td>

					<td class="empty" width="50" style="text-align:center;">
						<div class="span12">
							
							<a data-placement="left" id="view<?php echo $id; ?>" title="View PPMP Lists Details" href="ppmp_previous_view.php<?php echo '?id='.$id; ?>" data-toggle="modal" class="btn btn-primary"><i class="icon-eye-open icon-large"></i> View</a>
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
</div>