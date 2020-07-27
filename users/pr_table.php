
<div class="">
	<form method="POST">
		<table cellpadding="0" cellspacing="0" border="0" id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<!-- <th rowspan="1"><b>Entity Name</b></th>
					<th rowspan="1"><b>Fund Cluster</b></th>
					<th rowspan="1"><b>Office/Section</b></th> -->
					<th><b>PR#</b></th>
					<!-- <th rowspan="1"><b>Responsibility Center</b></th> -->
					<th><b>Date</b></th>
					<th><b>Requested by</b></th>
					<th><b>Item Status</b></th>
					<th><b>Action</b></th>
				</tr>
			</thead>
			
			<tbody>
				<?php					
					$query3 = mysql_query("SELECT * FROM users WHERE user_id = '$session_id'")or die(mysql_error());
					while($row3 = mysql_fetch_array($query3)) {
					$Year3 = $row3['Year'];
					$branch = $row3['branch'];
					
					$query4 = mysql_query("SELECT * FROM tbl_pr WHERE EntityName = '$branch' AND (PRno <> '0000') AND (PRno != '' OR PRno IS NOT NULL) ORDER BY PR_Date DESC")or die(mysql_error());
					while($row4 = mysql_fetch_array($query4)){
					$PR = $row4['PRno'];
				?>
				<tr>
					<!-- <td width="500" style="text-align:center;"><?php echo $row4['EntityName']; ?></td> 
					<td width="50" style="text-align:center;"><?php echo $row4['FundCluster']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['OfficeSection']; ?></td> -->
					<td style="text-align:center;"><?php echo $row4['PRno']; ?></td>
					<!-- <td width="150" style="text-align:center;"><?php echo $row4['ResponsibilityCenter']; ?></td> -->
					<td style="text-align:center;"><?php echo $row4['PR_Date']; ?></td>
					<td style="text-align:center;"><?php echo $row4['RequestedBy']; ?></td>
					<!-- <td width="150" style="text-align:center;"><?php echo $row4['ApprovedBy']; ?></td> -->
					<!-- <td style="text-align:center;">
						<span class="badge badge-primary">Pending</span>
						<span class="badge badge-warning">Still Canvassing</span>
						<span class="badge badge-danger">Failed Quotation</span>
					</td> -->
					<td style="text-align:center;">			
						<a data-placement="top" title="View item status" id="print" href="pr_view.php<?php echo '?pr='.$PR; ?>" class="btn btn-success"><i class="icon-eye-open icon-large"></i><br/><span class="badge badge-primary"></a>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#print').tooltip('show');
								$('#print').tooltip('hide');
							});
							</script>
					</td>
					<td style="text-align:center;">			
						<a data-placement="top" title="Print Purchase Request Detail" id="print" href="pr_print-preview.php<?php echo '?pr='.$PR; ?>" class="btn btn-success"><i class="icon-print icon-large"></i><br/><span class="badge badge-primary"></a>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#print').tooltip('show');
								$('#print').tooltip('hide');
							});
							</script>
					</td>
					
				</tr>
				<?php 
					}
				}
				?>    		
			</tbody>
		</table>
	</form>
</div>