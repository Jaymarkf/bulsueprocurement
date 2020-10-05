<div class="navbar navbar-fixed-top navbar-inverse">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
			</a>
			
			<div id="coll" class="nav-collapse collapse">
				<ul class="nav pull-left">
					<?php 
						$query = mysqli_query("SELECT * FROM users WHERE approved='no'");
						$count = mysqli_num_rows($query);
					?>
					<li class="dropdown">
						<?php if($count=='0') { ?>
							<a href="#" id="name123" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-wrench icon-large"></i> SETTINGS <i class="caret"></i></a>
						<?php } else { ?>
							<a href="#" id="name123" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-wrench icon-large"></i> SETTINGS <i class="caret"></i><span class="badge badge-warning"><i class="icon-user icon-small"></i><?php echo $count; ?></span></a>
						<?php } ?>
						<ul class="dropdown-menu">
							<!--  <li><a class="jkl" tabindex="-1" href="#">Profile</a></li> -->
							<li>
								<a tabindex="-1" href="year.php" class="jkl"><i class="icon-calendar icon-large"></i> Set PPMP Year</a>
							</li>							
							<li class="divider"></li>
							<li>
							<?php if($count=='0') { ?>
								<a tabindex="-1" href="users.php" class="jkl"><i class="icon-user icon-large"></i> Manage Users</a>
							<?php } else { ?>
								<a tabindex="-1" href="users.php" class="jkl"><i class="icon-user icon-large"></i> Manage Users<span class="badge badge-warning"><?php echo $count; ?> New User</span></a>
							<?php } ?>
							</li>							
							<li class="divider"></li>
							<li>
								<a tabindex="-1" href="item-category.php" class="jkl"><i class="icon-filter icon-large"></i> Manage Item Category</a>
							</li>							
							<li>
								<a tabindex="-1" href="item-details.php" class="jkl"><i class="icon-tags icon-large"></i> Manage Item Detail</a>
							</li>
							<li class="divider"></li>
							<li>
								<a tabindex="-1" href="item-purpose.php" class="jkl"><i class="icon-comments icon-large"></i> Manage Purpose </a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<!--/.nav-collapse -->
			
			<div id="coll" class="nav-collapse collapse">
				<ul class="nav pull-left">
					<li class="dropdown">
						<a href="#" id="name123" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-tasks icon-large"></i> MENU <i class="caret"></i></a>
						<ul class="dropdown-menu">
							<!--  <li><a class="jkl" tabindex="-1" href="#">Profile</a></li> -->
							
							<li>
								<a tabindex="-1" href="dashboard.php" class="jkl"><img src="../images/buttons/ppmp.png" width="10%"> Project Procurement<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Management Plan</a>
							</li>
							<li class="divider"></li>
							<li>
								<a tabindex="-1" href="app_approved.php<?php echo '?year='.$row['Year']; ?>" class="jkl"><img src="../images/buttons/app.png" width="10%"> CONSOLIDATED<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Annual Procurement<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Plan </a>
							</li>
							<li class="divider"></li>
							<li>
								<!-- <a tabindex="-1" href="app_pr_approved<?php echo '?year='.$row['Year']; ?>" class="jkl"><img src="../images/buttons/pr.png" width="10%"> Purchase Request </a> -->
								<a tabindex="-1" href="app_pr_approved.php" class="jkl"><img src="../images/buttons/pr.png" width="10%"> Purchase Request </a>
							</li>
							<li>
								<a tabindex="-1" href="quotation.php<?php echo '?year='.$row['Year']; ?>" class="jkl"><img src="../images/buttons/rfq.png" width="10%"> Price Quotation </a>
							</li>
							<li>
								<a tabindex="-1" href="bac-res-main.php" class="jkl"><img src="../images/buttons/app.png" width="10%"></i> BAC Resolution </a>
							</li>
							<li>
								<a tabindex="-1" href="app_po_approved.php" class="jkl"><img src="../images/buttons/po.png" width="10%"> Purchase Order </a>
							</li>
							<li>
								<a tabindex="-1" href="inspection-main.php" class="jkl"><img src="../images/buttons/iaa.png" width="10%"> Inspection and Accept...</a>
							</li>
                            <li>
                                <a tabindex="-1" href="property_transfer.php" class="jkl"><img src="../images/buttons/transfer.png" width="10%" style="background-color: #f6bb9a;border-radius: 50%;padding:1px;left:0px;"> Property Transfer</a>
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
						<a><i class="icon-hdd icon-large"></i>Administrator CPanel</a>
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