
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
//					$query3 = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
//					while($row3 = mysqli_fetch_array($query3)) {
//					$Year3 = $row3['Year'];
//
//					$query4 = mysqli_query($conn,"SELECT * FROM tbl_po WHERE Year = $Year3 AND POno <> '0000' ORDER BY POno DESC");
//					//$query4 = mysqli_query($conn,"SELECT * FROM tbl_po WHERE Year = $Year3 AND (POno != '' OR POno IS NOT NULL)");
//					while($row4 = mysqli_fetch_array($query4)){
//					$PO = $row4['POno'];

                    $ex = $conn->query("SELECT * FROM users WHERE user_id = '$session_id'");
                    $tempex = $ex->fetch_assoc();
                    $Year3 = $tempex['Year'];
                    $ex2 = $conn->query("select po.*,po.id as idd,company.* from tbl_po po inner join tbl_company company on po.company_id = company.id  where po.date_term = '$Year3'");
                    while($row4 = $ex2->fetch_assoc()){
				?>
				<tr>
					<td width="500" style="text-align:center;"><?php echo $row4['name']; ?></td>
					<td width="50" style="text-align:center;"><?php echo $row4['address']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['email']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['contact']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['tin']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['po_number']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['date_generate']; ?></td>
					<td width="150" style="text-align:right;"><?php echo $row4['mode_of_payment']; ?></td>
					<td width="150" style="text-align:left;">
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
						<a style="position:relative;display:block;width:100%;"data-placement="top" title="Print Purchase Order Detail" id="print" href="app_po_approved-print-preview.php<?php echo '?po='.$row4['idd']; ?>" class="btn btn-success"><i class="icon-print icon-large"></i><br/><span class="badge badge-primary"></a>
						<div style="height:5px;display;block;"></div>
                        <span style="position:relative;display:block;width:100%;"  data-id="<?=$row4['idd']?>"  class="btn btn-small btn-danger delete_id"><i class="icon icon-trash"></i> Delete</span>
					</td>
					
				</tr>
				<?php 

				}
				?>    		
			</tbody>
		</table>
	</form>
</div>