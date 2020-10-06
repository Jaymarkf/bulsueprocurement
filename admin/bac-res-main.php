<?php include('header.php'); ?>
<?php include('session.php'); ?>
<style>
    .myButton {
        box-shadow:inset 0px 1px 0px 0px #fff6af;
        background:linear-gradient(to bottom, #ffec64 5%, #e3af5b 100%);
        background-color:#ffec64;
        border-radius:6px;
        border:1px solid #ffaa22;
        display:inline-block;
        cursor:pointer;
        color:#333333;
        font-family:Arial;
        font-size:14px;
        font-weight:bold;
        padding:6px 24px;
        text-decoration:none;
        text-shadow:0px 1px 0px #ffee66;
    }
    .myButton:hover {
        background:linear-gradient(to bottom, #e3af5b 5%, #ffec64 100%);
        background-color:#e3af5b;
    }
    .myButton:active {
        position:relative;
        top:1px;
    }
</style>
<?php
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $qq = "delete from tbl_generate_bac_report where date_generated = '$id'";
    /** @var TYPE_NAME $conn */
    $conn->query($qq);


}
if(isset($_POST['generate_submit'])){
    $abc = $_POST['ABC_input'];
$qc = "select * from tbl_company";
    /** @var TYPE_NAME $conn */
    $rc = $conn->query($qc);
$ac = array();
$aname = array();
while($dc = $rc->fetch_array()){

    $ac[] = $dc['id']; //data of company id's
    $aname[] = $dc['name'];
}
//loop company list
    $data = array();
    foreach ($ac as $index => $item) {

        $qr = "select a.*,b.* from tbl_rfq a inner join tbl_rfq_item_details b on a.id = b.id where b.approved_by = 'approved' and a.id_company= '$item'";
        $qrc  = $conn->query($qr);

        while($qres = $qrc->fetch_array()){
            $data[$qres['company_name']]['total_amount'] = $data[$qres['company_name']]['total_amount'] + $qres['unit_price'] ;
//            $data[$qres['company_name']]['array_id'] = $data[$qres['company_name']]['array_id'] .",".$qres['rfq_item_id'];
            $data[$qres['company_name']]['array_id'] = $data[$qres['company_name']]['array_id'] .",".$qres['rfq_item_id'];
//            $data[$qres['company_name']]['array_id'] = substr($data[$qres['company_name']]['array_id'],1);
            $data[$qres['company_name']]['company_id'] = $qres['id_company'];
        }


    }




    foreach ($data as $index => $datum) {
        $datum['array_id'] = substr($datum['array_id'],1);
        $squery = "insert into tbl_generate_bac_report (`company_id`,`item_details_id_array`,`total_price`,`date_generated`,`abc_input`)
                    values('".$datum['company_id']."','".$datum['array_id']."','".$datum['total_amount']."',NOW(),'$abc')";
        $conn->query($squery);
    }
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();

}

?>

<body>
	<?php include('navbar.php'); ?>

	<div class="container-fluid">
		<div class="row-fluid">
			<!-- <div class="span3" id="content">
				<?php  //include('quotation-add.php');  ?>		   			
			</div> -->

					<div class="span12" id="content">
						<div class="row-fluid">
							<div class="pull-left">
								<h3><img src="../images/buttons/app.png" width="8%"> Manage BAC Resolution</h3>
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
									<a href="bac-res-add.php" title="Add New" id="add" data-placement="top" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add New </a>
										<script type="text/javascript">
											$(document).ready(function(){
												$('#add').tooltip('show');
												$('#add').tooltip('hide');
											});
										</script>
								</div>
							</div>
						</div>
						<?php
							$query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
								while($row = mysqli_fetch_array($query)) {
								$Year = $row['Year'];
							}
						?>

			<div class="span12" id="content">
				 <div class="row-fluid">
					<!-- block -->
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
						<?php
						//$query = mysqli_query($conn,"SELECT * FROM tbl_quotation");
						$query = mysqli_query($conn,"SELECT * FROM tbl_bac_resolution WHERE Year = $Year GROUP BY itemDescription");
						$count = mysqli_num_rows($query);

						?>
							<div class="muted pull-left"><img src="../images/buttons/app.png" width="10%"> BAC Resolution List</div>
							<div class="muted pull-right">
								Number of BAC Resolution: <span class="badge badge-info"><?php echo $count; ?></span>
							</div>
						</div>

						<div class="block-content collapse in">
<!--                            <div class="span12">-->
<!--                                <form method="POST">-->
<!--                                    <div class="text-left">-->
<!--                                         <button type="submit" name="generate_submit" class="myButton">Generate BAC Report</button>-->
<!--                                    </div>-->
<!--                                    <div class="text-left">-->
<!--                                        <label>ABC:</label>-->
<!--                                        <input name ="ABC_input" type="text" class="form-control" placeholder="Input Approved Budget Contract..."/>-->
<!--                                    </div>-->
<!--                                </form>-->
<!--                            </div>-->
                            <div class="row-fluid">
                                <form method="POST">
                                        <button style="float:left;margin-right:40px;" type="submit" name="generate_submit" class="myButton">Generate BAC Report</button>
                                        <span style="margin-right:15px;position:relative;float:left;line-height:35px;font-weight: bold;font-size:20px;color:gray">ABC: </span>
                                        <input style="position:relative;" name ="ABC_input" type="text" class="form-control" placeholder="Input Approved Budget Contract..." required/>
                                </form>
                            </div>
                            <div class="row-fluid">
							    <div class="span12">
							<!-- <form action="quotation-delete.php" method="post" id="deleteForm"> -->
                                <div class="row-fluid">
                                    <div class="text-center text-success">
                                        <h5>BAC RESOLUTIONS RECORD</h5>
                                    </div>
                                </div>
							<form action="" method="post" id="">
                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="example1">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">Date Created</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $qry = "select sum(date_generated) as dummy,date_generated from tbl_generate_bac_report group by date_generated";
                                        $res = $conn->query($qry);
                                        while($data = $res->fetch_array()){
                                            ?>
                                            <tr>
                                                <td style="text-align:center;"><?=$data['date_generated']?></td>
                                                <td>
                                                    <a class="btn btn-success" href="bac_reso_list.php?c_id=<?=$data['date_generated']?>" title="view BAC RESOLUTIONS RECORD HERE">
                                                        <i class="icon icon-print"></i>
                                                        &nbsp;View
                                                    </a>
                                                    <a class="btn btn-danger" href="?delete=<?=$data['date_generated']?>" title="view BAC RESOLUTIONS RECORD HERE">
                                                        <i class="icon icon-trash"></i>
                                                        &nbsp;Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
							</form>
							</div>
                            </div>
						</div>
					</div>
					<!-- /block -->
				</div>
			</div>
		</div>
	<?php include('footer.php'); ?>
	</div>
	<?php include('script.php'); ?>
</body>