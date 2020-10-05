<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12" id="content">
            <div class="row-fluid">
                <div class="pull-left">
                    <h3><img src="../images/buttons/iaa.png" width="5%"> Manage Inspection and Acceptance Report</h3>
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

 <div class="row" style="margin-bottom:50px;">
     <h2 class="text-center">Property Transform</h2>
 </div>
<!--ROW FLUID-->
    <div class="container-fluid">
        <div class="row">
            <div class="span4">
               <div class="text-center">
                   <div class="row">
                       <span class="text-left" style="font-weight: bold">From Accountable Office / Agency / Fund Cluster</span>
                       <input type="text" class="form-control text-left" placeholder="input here..." required>
                   </div>
                   <div style="margin-bottom:5px;"></div>
                   <div class="row">
                       <span class="text-left" style="font-weight: bold">To Accountable Office / Agency / Fund Cluster</span>
                       <input type="text" class="form-control text-left" placeholder="input here..." required>
                   </div>
               </div>
            </div>
            <div class="span3">
                <div class="text-center">
                    <div class="row">
                        <span class="text-left" style="font-weight: bold">PTR No</span>
                        <input type="text" class="form-control text-left" placeholder="input here..." required>
                    </div>
                    <div style="margin-bottom:20px;"></div>
                    <div class="row">
                        <span class="text-left" style="font-weight: bold">Date</span>
                        <input type="date" class="form-control text-left" placeholder="input here..." required>
                    </div>
                </div>
            </div>
            <div class="span5">
                <div class="row">
                    <div class="text-center">
                        <span style="font-weight: bold;font-size:18px;position:relative;margin-right:300px;">Transfer Type</span>
                    </div>
                </div>
                <div class="row">
                    <div class="span3">
                        <div class="row">
                            <div class="text-left" style="padding-left:50px;">
                                <input type="radio" class="form-control" />
                                <span style="position:relative;top:2px;margin-left:10px;">Donation</span>
                            </div>
                        </div>
                        <div style="margin-bottom:25px;margin-top:25px;"
                        <div class="row">
                            <div class="text-left" style="padding-left:50px;">
                                <input type="radio" class="form-control" />
                                <span style="position:relative;top:2px;margin-left:10px;">Donation</span>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="row">
                            <div class="text-left" style="padding-left:50px;">
                                <input type="radio" class="form-control" />
                                <span style="position:relative;top:2px;margin-left:10px;">Donation</span>
                            </div>
                        </div>
                        <div style="margin-bottom:25px;margin-top:25px;"
                        <div class="row">
                            <div class="text-left" style="padding-left:50px;">
                                <input type="radio" class="form-control" />
                                <span style="position:relative;top:2px;margin-left:10px;">Donation</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>
</body>