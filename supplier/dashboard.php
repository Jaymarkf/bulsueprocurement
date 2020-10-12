<?php session_start(); ?>
<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body >
<?php include('navbar.php'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12" id="content">
            <div class="row-fluid">
                <div class="pull-left">
                    <h3><img src="../images/buttons/ppmp.png" width="5%"> Supplier  - Dashboard</h3>
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
                <a href="year.php" class="pull-right" data-placement="left" title="Click to Change the year" id="yearbtn"><div class="pull-right" style="color:#ffa500;background-color:rgba(295,235,215,0.8);padding:3px 20px;border-radius:50px;"><h3> <?php echo 'Year: '.$Year; ?></h3></div></a>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#yearbtn').tooltip('show');
                        $('#yearbtn').tooltip('hide');
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
<!--    <div class="row-fluid">-->
<!--        <div class="span12" id="content">-->
<!--            <div class="row-fluid">-->
<!--                 block -->
<!--                <div  id="block_bg" class="block">-->
<!--                    --><?php
//                    $query1= mysqli_query($conn,"select * from users WHERE Year<> '0' AND Year='$Year' AND level='user' AND approved='yes'");
//                    $count1 = mysqli_num_rows($query1);
//
//                    ?>
<!--                    <div class="navbar navbar-inner block-header">-->
<!--                        <div class="muted pull-left"><img src="../images/buttons/ppmp.png" width="5%"><a href="dashboard.php" class="muted"> Project Procurement Managemen Plan - Dashboard</a></div>-->
<!--                        <div class="muted pull-right">-->
<!--                            Total Record(s): <span class="badge badge-info">--><?php // echo $count1;  ?><!--</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                   --><?php ////include('dashboard_table.php'); ?>
<!---->
<!--                </div>-->
<!--                 /block -->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <hr>
    <div class="row-fluid">
            <div class="block">


                        <div class="row-fluid" style="margin-top:15px;background-color:#7d5c5c;">
                            <div class="span12" style="color:white;font-weight: bold;padding:5px;"> <img src="../images/buttons/app.png" style="width:30px;height:30px;"/>&nbsp;&nbsp;Inventory Custodian Report</div>
                        </div>
                        <div class="block-content collapse in">
                                <table cellpadding="0" cellspacing="0" border="0" class="" id="example1">
                                    <thead>
                                        <tr>
                                            <th>ICS No. :</th>
                                            <th>Item Description </th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th>Total Cost</th>
                                            <th>Fund Cluster Code</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        //get ics table data
                                        $qics = $conn->query("select * from tbl_ics");
                                        while($data_ics = $qics->fetch_assoc()){
                                            //get item
                                            $item_query = $conn->query("select * from tbl_rfq_item_details where id =" . $data_ics['item_desc']);
                                            //fetch
                                            $f_item  = $item_query->fetch_assoc();
                                            ?>
                                                <tr>
                                                    <td style="text-align:center;"><?php echo str_replace(",","-",$data_ics['ics_num'])?></td>
                                                    <td style="text-align:center;"><?=$f_item['item_and_specification']?></td>
                                                    <td style="text-align:center;"><?=$f_item['quantity_and_unit']?></td>
                                                    <td style="text-align:center;"><?=$f_item['unit_price']?></td>
                                                    <td style="text-align:center;"><?=$f_item['total_price']?></td>
                                                    <td style="text-align:center;"><?=str_replace(",","-",$data_ics['fundcluster_code'])?></td>
                                                    <td style="text-align:center;">
                                                        <a href="ics.php?edit=<?=$data_ics['id']?>" class="btn btn-primary"><i class="icon icon-edit"></i> Edit</a>
                                                        <button class="delete_dashboard_btn btn btn-danger" data-id="<?=$data_ics['id']?>"><i class="icon icon-trash"></i> Delete</button>
                                                        <a href="ics-print-preview.php?preview=<?=$data_ics['id']?>" class="btn btn-success"><i class="icon icon-print"></i> Print</a>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                        </div>

            </div>
    </div>




    <?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>
</body>
</html>
<script>
    $(document).ready(function(){
        $('.delete_dashboard_btn').click(function(){
            if(confirm("are you sure you want to delete this selected item?? this could not be undone")){
                var data_id_delete_ics = $(this).attr('data-id');

                $.ajax({
                    url: '../ajaxPOST/supplier.php',
                    type: 'post',
                    data:{data_id_delete_ics:data_id_delete_ics},
                    success:function(){
                        $.jGrowl("ICS was successfully deleted!", { header: 'SUCCESS' });
                        var delay = 3000;
                        setTimeout(function(){ window.location = 'dashboard.php'  }, delay);

                    }

                });


            }
        });
    });
</script>