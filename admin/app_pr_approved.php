<?php
session_start();
   if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php include('session.php'); ?>
<?php
if(isset($_POST['submit_'])){
//    //check the items where to update
    $get_unit_cost = "select * from tbl_pr_items where prID = ".$_POST['prID'];
    /** @var TYPE_NAME $conn */
    $res = $conn->query($get_unit_cost);
    $val = $res->fetch_assoc();
    $unit_cost = $val['UnitCost']; //stock as number

    $fund_cluster_stock = $val['FundCluster'];

    //get the fundcluster name/descirption depends on id
    $get_fund_qry = "select * from tbl_fund where fund_id = ".$_POST['edit_fund_cluster'];
    $e = $conn->query($get_fund_qry);
    $ff = $e->fetch_assoc();
    $fund_cluster = $ff['fund_description']; //fund cluster in form

    $qty = $_POST['edit_quantity']; //form post
    $totalcost = $qty * $unit_cost;

////update ppmp changes
    $get_user_id = $val['user_id'];
//    $get_stock_fund_cluster = $val['FundCluster'];

    $get_item_description = $val['ItemDescription'];
    $get_stock_quantity = $val['Quantity'];
    $updateqry = "update tbl_pr_items set FundCluster = '$fund_cluster',Quantity = '$qty', TotalCost ='$totalcost' where prID = ".$_POST['prID'];
    $conn->query($updateqry);

//    //update source of fund and quantity in month of table ppmp
    $update_ppmp = "update tbl_ppmp set SourceOfFund = '$fund_cluster',".date('M')." = '$qty' where
                    user_id = '$get_user_id' and SourceOfFund = '$fund_cluster' and itemdetailDesc = '$get_item_description' and ".date('M')." = '$get_stock_quantity'";
    $pexec = $conn->query($update_ppmp);


    //select the id that we want to change the data
    $qry_t = "select * from tbl_ppmp where
             user_id = '$get_user_id' and SourceOfFund = '$fund_cluster' and itemdetailDesc = '$get_item_description' and ".date('M')." = '$qty'";
    $exec = $conn->query($qry_t);
    $p = $exec->fetch_assoc();

    //get total count of quantity and total cost
    $total_quantity_ppmp = $p['Jan'] + $p['Feb'] + $p['Mar'] + $p['Apr'] + $p['May'] + $p['Jun'] + $p['Jul'] + $p['Aug'] + $p['Sep'] + $p['Oct'] + $p['Nov'] + $p['Dec'];
    $total_cost_ppmp = $total_quantity_ppmp * $p['PriceCatalogue'];

    //update the result into tbl_ppmp
    $final_update = "update tbl_ppmp set TotalQty = '$total_quantity_ppmp',TotalAmount = '$total_cost_ppmp' where
                    user_id = '$get_user_id' and SourceOfFund = '$fund_cluster' and itemdetailDesc = '$get_item_description' and ".date('M')." = '$qty'";
    $conn->query($final_update);
//
//
//    //update pr_items




//    echo print_r($_POST);

}



?>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<style>
    .toggle-on.btn{
        line-height:30px;
    }
    .toggle-off.btn{
        line-height:30px;
    }
    ul{
        list-style: none;
    }
    .material-switch > input[type="checkbox"] {
        display: none;
    }

    .material-switch > label {
        cursor: pointer;
        height: 0px;
        position: relative;
        width: 40px;
    }

    .material-switch > label::before {
        background: rgb(0, 0, 0);
        box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        content: '';
        height: 16px;
        margin-top: -8px;
        position:absolute;
        opacity: 0.3;
        transition: all 0.4s ease-in-out;
        width: 40px;
    }
    .material-switch > label::after {
        background: rgb(255, 255, 255);
        border-radius: 16px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        content: '';
        height: 24px;
        left: -4px;
        margin-top: -8px;
        position: absolute;
        top: -4px;
        transition: all 0.3s ease-in-out;
        width: 24px;
    }
    .material-switch > input[type="checkbox"]:checked + label::before {
        background: inherit;
        opacity: 0.5;
    }
    .material-switch > input[type="checkbox"]:checked + label::after {
        background: inherit;
        left: 20px;
    }
</style>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="span12" id="content">
					<div class="row-fluid">
						<div class="pull-left">
							<h3><img src="../images/buttons/pr.png" width="9%"> Purchase Request</h3>
							<i class="icon-calendar icon-large"></i>
							<?php
								$Today=date('y:m:d');
								$new=date('l, F d, Y',strtotime($Today));
								echo $new;
							?>
						</div>

						<?php
							$query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
								while($row = mysqli_fetch_array($query)) {
								$Year = $row['Year'];
							}
						?>
						<a href="year.php" class="pull-right" data-placement="left" title="Click to Change the year" id="yearbtn"><div class="pull-right" style="color:#ffa500;background-color:rgba(295,235,215,0.8);padding:3px 20px;border-radius:50px;"><h3><?php echo 'Year: '.$Year; ?></h3></div></a>
							<script type="text/javascript">
								$(document).ready(function(){
									$('#yearbtn').tooltip('show');
									$('#yearbtn').tooltip('hide');
								});
							</script>
					</div>
				</div>

				<div class="span12" id="content">
					<div class="row-fluid">
						<br/>
						<div class="pull-left">
							<a href="dashboard.php" title="Back to PPMP-Dashboard" id="back" data-placement="right" class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
								<script type="text/javascript">
									$(document).ready(function(){
										$('#back').tooltip('show');
										$('#back').tooltip('hide');
									});
								</script>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="icon-tasks icon-large"></i>&nbsp;&nbsp;Request list to be approved
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display:none;">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="border-bottom-right-radius: 0px !important;border-bottom-left-radius: 0px !important;">
                                            <h5 class="modal-title" id="exampleModalLongTitle">End user list ( Approved by Budget offce and Procurement )</h5>
                                        </div>
                                        <form method="POST" id="forms">
                                            <div class="modal-body">
                                                <div class="row-fluid">
                                                        <div class="text-right">
                                                            <span class="text-left" style="color:red"><i class="icon-warning-sign"></i> &nbsp;&nbsp;Enabling action will grant end user to puchase request for this currently month</span>
                                                        </div>
                                                </div>
                                                <hr>

                                                    <table cellpadding="0" cellspacing="0" border="0" id="example" class="display" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>End Users</th>
                                                                <th>Item Detail</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $qry = "select * from tbl_ppmp where Year > YEAR(CURDATE()) and Status = 'Completed' and ".date('M')." > 0 and pr_approved  = 'pending'";
                                                            $temp = $conn->query($qry);
                                                            while($row = $temp->fetch_array()){
                                                                ?>
                                                                <tr>
                                                                    <td><?=$row['EndUserUnit']?></td>
                                                                    <td><?=$row['itemdetailDesc']?></td>
                                                                    <td align="center"><input class="ds" type="checkbox" data-onstyle="success" name="data[user_<?=$row['ppmpID']?>]"/></td>
                                                                </tr>

                                                                <?php
                                                            }
                                                        ?>

                                                        </tbody>
                                                    </table>

                                                </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                         </form>
                                    </div>
                                </div>
                            </div>
						<!--	<a href="app_pr_approved-add.php" title="Add new purchase request" id="back" data-placement="top" class="btn btn-success"><i class="icon-plus-sign icon-large"></i> New Purchase Request </a>
								<script type="text/javascript">
									$(document).ready(function(){
										$('#back').tooltip('show');
										$('#back').tooltip('hide');
									});
								</script> -->
						</div>
					</div>
				</div>

                <div class="span12" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">

						<?php
							if(isset($_GET['year'])){
								$year = $_GET['year'];
							}

							$query1 = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
							while($row1 = mysqli_fetch_array($query1)) {
								$Year1 = $row1['Year'];
								$user_id1 = $row1['user_id'];
							}

							//$query2 = mysqli_query($conn,"SELECT * FROM tbl_pr WHERE Year = $Year  AND (PRno != '' OR PRno IS NOT NULL)");
							$query2 = mysqli_query($conn,"SELECT * FROM tbl_pr WHERE (PRno != '' OR PRno IS NOT NULL)");
							$count2 = mysqli_num_rows($query2);
						?>
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><img src="../images/buttons/pr.png" width="7%"> Purchase Request - <span class="badge badge-warning">YEAR <?php echo $Year; ?></span></div>
                                <div class="muted pull-right">
									Total Record(s): <span class="badge badge-info"><?php  echo $count2;  ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
								<div class="span12" id="studentTableDiv">
								<h2 id="noch"> Purchase Request</h2>
									<?php include('app_pr_approved_table.php'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>

		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>

    </body>
</html>
<script>
        $(function() {
            $('.ds').bootstrapToggle({
                on: 'Enabled',
                off: 'Disabled'
            });
        })
    $('#forms').submit(function(e){
        e.preventDefault();
        var b = jQuery(this).serialize();
        $.ajax({
            type: "POST",
            url: "accept_purchase_request.php",
            data: b,
            success: function(html){
                $.jGrowl("Purchase request has been successfully approved!", { header: 'SUCCESS' });
                var delay = 3000;
                setTimeout(function(){ window.location = 'app_pr_approved.php'  }, delay);
            }
        });



    });
</script>