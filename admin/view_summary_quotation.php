<?php
session_start();
if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>

<?php include('session.php'); ?>
<?php include('navbar.php'); ?>
<script src="../plugins/jquery.table.marge.js"></script>
<div class="container-fluid">
    <div class="row-fluid">
        <!-- <div class="span3" id="content">
				<?php  //include('quotation-add.php');  ?>
			</div> -->
        <div class="span12" id="content">
            <div class="row-fluid">
                <div class="pull-left">
                    <h3><img src="../images/buttons/rfq.png" width="8%">Quotation Summary Table</h3>
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
                    <a href="quotation.php" title="Back to PPMP-Dashboard" id="back" data-placement="right" class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#back').tooltip('show');
                            $('#back').tooltip('hide');
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


                        ?>
                        <div class="muted pull-left"><img src="../images/buttons/rfq.png" width="10%">Quotation List</div>
                        <div class="muted pull-right">
                        </div>
                    </div>

                    

                    <div class="block-content collapse in">
                        <div class="span12">
                            <!-- <form action="quotation-delete.php" method="post" id="deleteForm"> -->
                            <div class="row-fluid">
                                <a href="view_summary_quotation_pdf.php" class="btn btn-success btn-lg"><i class="icon icon-print"></i> &nbsp;Print Form</a>
                            </div>
                            <div class="container-fluid" style="padding:24px">
                                <table class="table table-bordered table-striped table-condensed" id="quot">
                                    <thead>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Item Description</th>
                                            <th>Unit Bid Price</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    $ArrList = array();
                                    //select company first to filter the rfq
                                    $qrycompany = $conn->query("select * from tbl_company");
                                    while($company = $qrycompany->fetch_assoc()){
                                        // select a.*,b.* from tbl_rfq a inner join tbl_rfq_item_details b on a.id = b.rfq_item_id


                                        $dqry = $conn->query("select a.*,b.* from tbl_rfq a inner join tbl_rfq_item_details b on a.id = b.rfq_item_id where company_name = '".$company['name']."'");
                                        while($row = $dqry->fetch_assoc()){
//                                            $ArrList[$company['name']]['description'][] = array($row['item_and_specification'] => $row['unit_price']);
                                            $ArrList[$company['name']]['description'][] = $row['item_and_specification'];
                                            $ArrList[$company['name']]['bid'][] = $row['unit_price'];
                                        }
//
//
                                    }
                                    foreach ($ArrList as $index => $item) {
                                        foreach ($item['description'] as $key => $i) {
                                            ?>
                                                <tr>
                                                    <td style="vertical-align: middle;text-align: center"><?=$index?></td>
                                                    <td><?=$i?></td>
                                                    <td><?='Php: '.$item['bid'][$key]?></td>
                                                </tr>
                                            <?php
                                        }

                                    }


                                    ?>
                                    </tbody>
                                </table>
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
<script>
    $('#quot').margetable({
        type: 2,
        colindex: [0] // column 1, 2
    });
</script>