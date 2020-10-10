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
                                <a tab-index="-1" href="ics.php" class="jkl"><img src="../images/buttons/app.png" width="10%"> Inventory Custodian Form</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="dashboard.php" class="jkl"><img src="../images/buttons/ppmp.png" width="10%"> Property Acknowledgement<br/>&nbsp;Receipt</a>
                            </li>

<!--                            <li class="divider"></li>-->
<!--                            <li>-->
<!--                                <a tabindex="-1" href="app_approved.php--><?php //echo '?year='.$row['Year']; ?><!--" class="jkl"><img src="../images/buttons/app.png" width="10%"> CONSOLIDATED<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Annual Procurement<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Plan </a>-->
<!--                            </li>-->
<!--                            <li class="divider"></li>-->
<!--                            <li>-->
<!--                                 <a tabindex="-1" href="app_pr_approved--><?php //echo '?year='.$row['Year']; ?><!--" class="jkl"><img src="../images/buttons/pr.png" width="10%"> Purchase Request </a> -->
<!--                                <a tabindex="-1" href="app_pr_approved.php" class="jkl"><img src="../images/buttons/pr.png" width="10%"> Purchase Request </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a tabindex="-1" href="quotation.php--><?php //echo '?year='.$row['Year']; ?><!--" class="jkl"><img src="../images/buttons/rfq.png" width="10%"> Price Quotation </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a tabindex="-1" href="bac-res-main.php" class="jkl"><img src="../images/buttons/app.png" width="10%"></i> BAC Resolution </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a tabindex="-1" href="app_po_approved.php" class="jkl"><img src="../images/buttons/po.png" width="10%"> Purchase Order </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a tabindex="-1" href="inspection-main.php" class="jkl"><img src="../images/buttons/iaa.png" width="10%"> Inspection and Accept...</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a tabindex="-1" href="property_transfer.php" class="jkl"><img src="../images/buttons/transfer.png" width="10%" style="background-color: #f6bb9a;border-radius: 50%;padding:1px;left:0px;"> Property Transfer</a>-->
<!--                            </li>-->
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
                                <a tab-index="-1" href="manage_employee.php" class="jkl"><i class="icon icon-user"></i> Manage Employee</a>
                            </li>
                            <li>
                                    <a tabindex="-1" href="manage_position.php" class="jkl"><i class="icon icon-user-md"></i> Manage Position</a>
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
                        <a><i class="icon-hdd icon-large"></i>Supplier</a>
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