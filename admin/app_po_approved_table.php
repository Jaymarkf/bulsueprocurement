
<div class="">
	<form method="POST">
		<table cellpadding="0" cellspacing="0" border="0" id="example1" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th rowspan="1"><b>Supplier</b></th>
					<th rowspan="1"><b>Address</b></th>
					<th rowspan="1"><b>E-mail</b></th>
					<th rowspan="1"><b>Contact No.</b></th>
					<th rowspan="1"><b>TIN</b></th>
					<th rowspan="1"><b>PONo</b></th>
					<th rowspan="1"><b>PO_Date</b></th>
					<th rowspan="1"><b>MOP</b></th>
					<th rowspan="1"><b>Action</b></th>
				</tr>
			</thead>
			
			<tbody>
				<?php					
					$query3 = mysql_query("SELECT * FROM users WHERE user_id = '$session_id'")or die(mysql_error());
					while($row3 = mysql_fetch_array($query3)) {
					$Year3 = $row3['Year'];
					
					$query4 = mysql_query("SELECT * FROM tbl_po WHERE Year = $Year3 AND POno <> '0000' ORDER BY POno DESC")or die(mysql_error());
					//$query4 = mysql_query("SELECT * FROM tbl_po WHERE Year = $Year3 AND (POno != '' OR POno IS NOT NULL)")or die(mysql_error());
					while($row4 = mysql_fetch_array($query4)){
					$PO = $row4['POno'];
				?>
				<tr>
					<td width="500" style="text-align:center;"><?php echo $row4['supplier']; ?></td> 
					<td width="50" style="text-align:center;"><?php echo $row4['address']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['email']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['contact_no']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['TIN']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['POno']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['PO_Date']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['MOP']; ?></td>
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
						<a data-placement="top" title="Print Purchase Order Detail" id="print" href="app_po_approved-print-preview.php<?php echo '?po='.$PO; ?>" class="btn btn-success"><i class="icon-print icon-large"></i><br/><span class="badge badge-primary"></a>
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