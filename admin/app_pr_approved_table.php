<script src="../plugins/jquery.table.marge.js"></script>
<div class="">
	<form method="POST">
		<table cellpadding="0" cellspacing="0" border="0" id="tbl" class="table table-bordered table-stripped" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th rowspan="1" style="text-align:center;font-weight: bold">Entity Name</th>
					<th rowspan="1" style="text-align:center;font-weight: bold" ><b>Item Description</b></th>
					<th rowspan="1" style="text-align:center;font-weight: bold" ><b>Estimated Budget</b></th>
					<th rowspan="1" style="text-align:center;font-weight: bold" ><b>Total Cost</b></th>
					<th rowspan="1" style="text-align:center;font-weight: bold" ><b>Fund Cluster</b></th>
					<th rowspan="1" style="text-align:center;font-weight: bold" ><b>Quantity</b></th>
					<th rowspan="1" style="text-align:center;font-weight: bold" ><b>PR#</b></th>
					<th rowspan="1" style="text-align:center;font-weight: bold" ><b>Responsibility Center</b></th>
					<th rowspan="1" style="text-align:center;font-weight: bold" ><b>Date</b></th>
					<th rowspan="1" style="text-align:center;font-weight: bold" ><b>Requested by</b></th>
					<th rowspan="1" style="text-align:center;font-weight: bold" ><b>Approved by</b></th>
					<th rowspan="1" style="text-align:center;font-weight: bold" ><b>Action</b></th>
				</tr>
			</thead>
			
			<tbody>
				<?php					
					$query3 = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
					while($row3 = mysqli_fetch_array($query3)) {
					$Year3 = $row3['Year'];
					
				  //$query4 = mysqli_query($conn,       "SELECT * FROM tbl_pr WHERE Year = $Year3 AND PRno <> '0000' ORDER BY PRno DESC");
                        $query4 = $conn->query("select tbl_pr_items.prID as id_item,tbl_pr_items.Quantity,tbl_pr_items.pr_num_merge,tbl_pr.*,tbl_pr_items.EstimatedBudget,tbl_pr_items.ItemDescription,tbl_pr_items.TotalCost from tbl_pr
                                                         inner join tbl_pr_items on tbl_pr_items.PRno = tbl_pr.PRno
                                                         where tbl_pr.Year = '$Year3' and tbl_pr.PRno <> '0000' ORDER BY tbl_pr_items.itemDescription");

                        while($row4 = mysqli_fetch_array($query4)){
                            $PR = $row4['pr_num_merge'];
                            ?>

                            <tr>

                                <td width="500" style="text-align:center;"><?php echo $row4['EntityName']; ?></td>
                                <td width="500"  style="text-align:center;vertical-align: middle;text-shadow: 1px 1px 2px #b75252;"><?php echo $row4['ItemDescription']; ?></td>
                                <td width="500" style="text-align:center;"><?=$row4['EstimatedBudget'];?></td>
                                <td width="500" style="text-align:center;"><?=$row4['TotalCost'];?></td>
                                <td width="50" style="text-align:center;"><?php echo $row4['FundCluster']; ?></td>
                                <td width="100" style="text-align:center;"><?php echo $row4['Quantity']; ?></td>
                                <td width="150" style="text-align:center;vertical-align: middle;"><?php echo $row4['pr_num_merge']; ?></td>
                                <td width="150" style="text-align:right;"><?php echo $row4['ResponsibilityCenter']; ?></td>
                                <td width="150" style="text-align:right;"><?php echo $row4['PR_Date']; ?></td>
                                <td width="150" style="text-align:center;"><?php echo $row4['RequestedBy']; ?></td>
                                <td width="150" style="text-align:center;vertical-align: middle"><button data-id="<?=$row4['id_item']?>" data-toggle="modal" data-target="#modalFrame" class="edit_btn btn btn-info" style="text-align:center;"><i class="icon icon-edit text-warning"></i> Edit</button></td>
                                <td width="150" style="text-align:center;vertical-align: middle">

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
                                    <a data-placement="top" title="Print Purchase Request Detail" id="print" href="app_pr_approved-print-preview.php?item=<?=$PR?>" class="btn btn-success"><i class="icon-print icon-large"></i><br/><span class="badge badge-primary"></a>
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

<!-- Modal -->
<div style="display:none" class="modal fade" id="modalFrame" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form method="POST">
            <div class="modal-content">
            <div class="modal-header" style="background-color:#f36161 !important;border-bottom-right-radius: 0px !important;border-bottom-left-radius: 0px !important;">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="icon icon-edit"></i> &nbsp;&nbsp;Edit Purchase Request</h5>
            </div>
            <div class="modal-body">
                <div class="row-fluid">
                    <div class="span2 text-right">
                        Fund Cluster:
                    </div>
                    <div class="span10 text-left">
                        <select id="sel" class="form-control span10" name="edit_fund_cluster">
                            <?php
                            $q = "select * from tbl_fund";
                            $d = $conn->query($q);
                            while($x = $d->fetch_assoc()){
                                ?>
                                <option value="<?=$x['fund_id'];?>"><?=$x['fund_description'];?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row-fluid">
                    <div class="span2 text-right">
                        Quantity :
                    </div>
                    <div class="span10 text-left">
                        <input id="qty" type="text" class="form-control span10" name="edit_quantity" />
                    </div>
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="hidden" name="prID" id="prID"/>
                <button type="submit" name="submit_" class="btn btn-success"><i class="icon icon-save"> Update Changes</i></button>
            </div>
        </div>
        </form>
    </div>
</div>
<script>
    $('#tbl').margetable({
        type: 2,
        colindex: [1,6,11] // column 1, 2
    });

    $(document).on("click",'.edit_btn',function(){
        var e = $(this).attr('data-id');
        $.ajax({
            type: "POST",
            url: "../ajaxPOST/post_data.php",
            data: {e:e},
            dataType: 'json',
            success:function(x) {

                $('#sel').val(x.fundcluster);
                $('#qty').val(x.quantity);
                $('#prID').val(x.prID);

            }
            });

    });
</script>