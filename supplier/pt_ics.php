<?php session_start(); ?>
<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php include('session.php'); ?>
<body >
<?php include('navbar.php'); ?>
<style>
    .ui-datepicker-calendar {
        display: none;
    }
</style>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12" id="content">
            <div class="row-fluid">
                <div class="pull-left">
                    <h3><i class="icon icon-large icon-external-link"></i> Property Transfer</h3>
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
    <hr>
    <div class="text-center">
        <h4>Transaction Type - <span style="color:deepskyblue;font-family: 'Helvetica Neue', 'Helvetica'">Inventory Custodian Slip</span></h4>
    </div>
    <?php
    include('pt_ics-form-input.php');
    include('footer.php');
    ?>
</div>
<?php include('script.php'); ?>
</body>
</html>