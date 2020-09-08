
<div class="">
	<form method="POST">
		<table cellpadding="0" cellspacing="0" border="0" id="example" class="table table-bordered table-stripped" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th rowspan="1"><b>Entity Name</b></th>
					<th rowspan="1"><b>Item Description</b></th>
					<th rowspan="1"><b>Estimated Budget</b></th>
					<th rowspan="1"><b>Total Cost</b></th>
					<th rowspan="1"><b>Fund Cluster</b></th>
					<th rowspan="1"><b>Office/Section</b></th>
					<th rowspan="1"><b>PR#</b></th>
					<th rowspan="1"><b>Responsibility Center</b></th>
					<th rowspan="1"><b>Date</b></th>
					<th rowspan="1"><b>Requested by</b></th>
					<th rowspan="1"><b>Approved by</b></th>
					<th rowspan="1"><b>Action</b></th>
				</tr>
			</thead>
			
			<tbody>
				<?php					
					$query3 = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
					while($row3 = mysqli_fetch_array($query3)) {
					$Year3 = $row3['Year'];
					
				  //$query4 = mysqli_query($conn,       "SELECT * FROM tbl_pr WHERE Year = $Year3 AND PRno <> '0000' ORDER BY PRno DESC");
					$query4 = mysqli_query($conn,"select tbl_pr.*,tbl_pr_items.EstimatedBudget,tbl_pr_items.ItemDescription,tbl_pr_items.TotalCost from tbl_pr
                                                         inner join tbl_pr_items on tbl_pr_items.PRno = tbl_pr.PRno
                                                         where tbl_pr.Year = '2021' and tbl_pr.PRno <> '0000' ORDER BY tbl_pr.PRno");
					while($row4 = mysqli_fetch_array($query4)){
					$PR = $row4['PRno'];
				?>

				<tr>
					<td width="500" style="text-align:center;"><?php echo $row4['EntityName']; ?></td> 
					<td width="500" style="text-align:center;"><?php echo $row4['ItemDescription']; ?></td>
					<td width="500" style="text-align:center;"><?=$row4['EstimatedBudget'];?></td>
					<td width="500" style="text-align:center;"><?=$row4['TotalCost'];?></td>
					<td width="50" style="text-align:center;"><?php echo $row4['FundCluster']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['OfficeSection']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['PRno']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['ResponsibilityCenter']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['PR_Date']; ?></td>
					<td width="150" style="text-align:center;"><?php echo $row4['RequestedBy']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['ApprovedBy']; ?></td>
					<td width="150" style="text-align:right;">
					<!--	<a data-placement="top" title="View Purchase Request Detail" id="view" href="app_pr_approved-view.php<?php echo '?pr='.$PR; ?>" class="btn btn-inverse"><i class="icon-eye-open icon-large"></i><br/><span class="badge badge-primary"></a>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#view').tooltip('show');
								$('#view').tooltip('hide');
							});
							</script> -->
							
						<!-- <a target="_blank" data-placement="top" title="Print Purchase Request Detail" id="print" href="app_pr_approved-print.php<?php echo '?pr='.$PR; ?>" class="btn btn-success"><i class="icon-print icon-large"></i><br/><span class="badge badge-primary"></a>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#print').tooltip('show');
								$('#print').tooltip('hide');
							});
							</script> -->
						<a data-placement="top" title="Print Purchase Request Detail" id="print" href="app_pr_approved-print-preview.php<?php echo '?pr='.$PR; ?>" class="btn btn-success"><i class="icon-print icon-large"></i><br/><span class="badge badge-primary"></a>
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