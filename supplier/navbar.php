
<style>
    .pt_css{
        background-color: #efefef;
        width:200px;
        height:20px;
        list-style:none;
        left:-24px;
        position:relative;
        padding:10px;
        padding-left:30px;
        font-weight: bold;
        font-family: "Courier New", Courier, monospace;
        box-shadow: 3px 1px 3px 0px #504f4f;
        display:none;

    }
    .pt_css:hover,#flag_pt:hover{
        background-color:#08c;
        cursor: pointer;
    }
   #flag_pt:hover  .pt_css{
       display:flex;
   }

</style>

<div class="navbar navbar-fixed-top navbar-inverse">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <!--/.nav-collapse -->

            <div id="coll" class="nav-collapse collapse">
                <ul class="nav pull-left">
                    <li class="dropdown">
                        <a href="#" id="name123" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-tasks icon-large"></i> MENU <i class="caret"></i></a>
                        <ul class="dropdown-menu">
                            <!--  <li><a class="jkl" tabindex="-1" href="#">Profile</a></li> -->
                            <li>
                                <a tabindex="-1" href="dashboard.php" class="jkl"><i class="icon icon-hdd"></i> Dashboard</a>
                            </li>
                            <li>
                                <a tab-index="-1" href="ics.php" class="jkl"><img src="../images/buttons/app.png" width="10%"> Inventory Custodian Form</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="par.php" class="jkl"><img src="../images/buttons/ppmp.png" width="10%"> Property Acknowledgement<br/>&nbsp;Receipt</a>
                            </li>
                            <li class="text-left" style="position:relative;padding-left:20px;height:25px;" id="flag_pt">
                                <i class="icon icon-external-link"></i>Property Transfer<i class="icon icon-angle-right" style="position:absolute;right:0px;top:5px;"></i>
                                <ul style="position:absolute;left:100%;top:0px; height:0px;">
                                    <li class="pt_css" style="font-size:11px !important;border-top-right-radius: 5px;" id="pt_ics"><img src="../images/buttons/app.png" width="10%"> Inventory Custodian Slip</li>
                                    <li class="pt_css" style="font-size:9px !important;" id="pt_par"><img src="../images/buttons/ppmp.png" width="10%"> Property Acknowledgement Receipt</li>
                                    <li class="pt_css" style="font-size:11px !important; border-bottom-right-radius: 5px;border-bottom-left-radius: 5px;" id="summary_report"><i class="icon icon-file"></i> Summary Report</li>
                                </ul>
                            </li>
                            <li>
                                <a tabindex="-1" href="unserviceable_property.php" class="jkl"><i class="icon icon-trash"></i> Unserviceable Property</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="general_inventory.php" class="jkl"><img src="../images/inventory_logo.png" width="10%"> General Inventory Reports</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="view_inventory_reports.php" class="jkl"><i class="icon icon-book text-success"></i> View Inventory Reports</a>
                            </li>

                        </ul>


                    </li>
                </ul>

            </div>
            <div id="coll" class="nav-collapse collapse">
                <ul class="nav pull-left">
                    <li class="dropdown">
                        <a href="#" id="name123" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-cogs icon-large"></i> Settings<i class="caret"></i></a>
                        <ul class="dropdown-menu">
                            <!--  <li><a class="jkl" tabindex="-1" href="#">Profile</a></li> -->
                            <li>
                                <a tab-index="-1" href="manage_enduser.php" class="jkl"><i class="icon icon-user text-warning"></i> Manage End User</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="enduser_position.php" class="jkl"><i class="icon icon-user-md  text-success"></i> Manage End User Position</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="equipment_code.php" class="jkl"><i class="icon icon-cog" style="color:#702828;"></i> Manage Equipment Code</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="manage_supply_office_employee.php" class="jkl"><i class="icon icon-user text-warning" style="color:#fdf900;"></i> Manage Supply Employee</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="manage_supply_office_employee_position.php" class="jkl"><i class="icon icon-user-md text-warning" style="color:#070707;"></i> Manage Supply Position</a>
                            </li>


                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
            <!-- <div id="coll" class="nav-collapse collapse">
                <ul class="nav pull-left">
                    <li class="dropdown">
                        <a href="#" id="name123" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-print icon-large"></i> REPORTS <i class="caret"></i></a>
                        <ul class="dropdown-menu"> -->
            <!--  <li><a class="jkl" tabindex="-1" href="#">Profile</a></li> -->
            <!-- 			<li>
                                <a tabindex="-1" href="activity_log" class="jkl"><i class="icon-user icon-large"></i> Activity Log</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div> -->
            <!--/.nav-collapse -->

            <a href="dashboard.php"><span class="brand">BULSU e-PROCUREMENT v1.0</span></a>

            <div id="coll" class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a><i class="icon-hdd icon-large"></i>Supply Office</a>
                    </li>

                    <?php
                    $query= mysqli_query($conn,"select * from users where user_id = '$session_id'");
                    $row = mysqli_fetch_array($query);
                    ?>
                    <li class="dropdown">
                        <a href="#" id="name123" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user icon-large">
                            </i><?php echo $row['username'] ?> <i class="caret"></i></a>
                        <ul class="dropdown-menu">
                            <!--  <li><a class="jkl" tabindex="-1" href="#">Profile</a></li> -->
                            <li>
                                <a tabindex="-1" href="password.php" class="jkl">Change Password</a>
                            </li>
                            <li class="divider"></li>
                            <li><a  class="jkl" tabindex="-1" href="logout.php"><i class="icon-signout icon-large"></i>&nbsp;Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#pt_ics').click(function(){
            window.location = 'pt_ics.php';

        });
        $('#pt_par').click(function(){
           window.location = 'pt_par.php';
        });
        $('#summary_report').click(function(){
            window.location = 'summary_report.php';
        });
    });
</script>