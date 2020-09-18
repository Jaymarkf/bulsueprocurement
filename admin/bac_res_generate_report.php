<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>
<?php include('navbar.php'); ?>
<?php
if(isset($_POST['submit'])){
//delete all
$delete_qry = "delete from tbl_bac_filter_item";
$conn->query($delete_qry);
//insert item so every generated report will be new data
    foreach ($_POST['selected_item'] as $index => $item) {
        $qry = "insert into tbl_bac_filter_item (selected_item) values('$item')";
        $conn->query($qry);
    }
}



//
//echo '<pre>';
//print_r($name);
//echo '</pre>';



?>
<div class="container-fluid">
    <div class="row-fluid">
        <!-- <div class="span3" id="content">
				<?php  //include('quotation-add.php');  ?>
			</div> -->

        <div class="span12" id="content">
            <div class="row-fluid">
                <div class="pull-left">
                    <h3><img src="../images/buttons/app.png" width="8%"> Generate BAC Resolution Report</h3>
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
                    <a href="bac-res-main.php" title="Add New" id="add" data-placement="top" class="btn btn-info"><i class="icon icon-large icon-circle-arrow-left"></i> Back</a>
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
                        <div class="muted pull-left"><img src="../images/buttons/app.png" width="10%"> Generate Report</div>
                    </div>

                    <div class="block-content collapse in">
                        <form method="POST">
                            <div class="row-fluid">
                            <div class="span12">
                                <div class="text-center">
                                    <span class="text-info" style="font-weight: bold">Check the item you want to generate report</span>
                                </div>
                                <hr>
                            </div>
                            <div class="row-fluid">
                                <div class="text-center">
                                    <?php
                                    $qry = "select ItemDescription from tbl_pr_items group by ItemDescription";
                                    $r = $conn->query($qry);
                                    while($d = $r->fetch_assoc()){
                                      ?>
                                          <div class="row-fluid">
                                              <div style="width:400px;position:relative;margin:0px auto;text-align:left">
                                                <input type="checkbox" name="selected_item[]" value="<?=$d['ItemDescription']?>"/>&nbsp;<span class="text-info" style="font-weight: bold;font-family: 'Courier New', Courier, monospace"><?=$d['ItemDescription']?></span>
                                              </div>
                                           </div>
                                      <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row-fluid">
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-success btn-small">Submit Selected</button>
                                </div>
                            </div>
                        </div>
                        </form>
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