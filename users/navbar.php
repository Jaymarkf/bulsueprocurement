<?php
	//$query1 = mysqli_query($conn,"SELECT * FROM tbl_year");
	$query1 = mysqli_query($conn,"SELECT * FROM users WHERE user_id='$session_id'");
	while($row1 = mysqli_fetch_array($query1)) {
	$Year = $row1['Year'];
	}
	$query2= mysqli_query($conn,"select * from tbl_ppmp WHERE Year = $Year AND user_id='$session_id' AND Status = 'Pending' GROUP BY Year");
	$count2 = mysqli_num_rows($query2);

	$query3= mysqli_query($conn,"select * from tbl_ppmp WHERE Year = $Year AND user_id='$session_id' AND Status = 'Requested' OR Year = $Year AND user_id='$session_id' AND Status = 'Completed' GROUP BY Year");
	$count3 = mysqli_num_rows($query3);
	
	//$query4= mysqli_query($conn,"select * from tbl_ppmp WHERE Year = $Year AND user_id='$session_id'");
	$query4 = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE Year = '$Year' AND user_id='$session_id'  AND Status = 'Completed' ORDER BY Year");
	$count4 = mysqli_num_rows($query4);
	
	//$query5= mysqli_query($conn,"select * from tbl_ppmp WHERE Year = $Year AND user_id='$session_id'");
	$query5 = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE Year = '$Year' AND user_id='$session_id'  AND Status = 'Completed' ORDER BY Year");
	$count5 = mysqli_num_rows($query5);
	
	$query6 = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE user_id = '$session_id' AND Year = '$Year' AND BO_PPMP_Status = 'Approved' ORDER BY Year");
	$count6 = mysqli_num_rows($query6);
?>
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
					<li class="dropdown">
						<a href="#" id="name123" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-tasks icon-large"></i> MENU <i class="caret"></i></a>
						<ul class="dropdown-menu">
							<!--  <li><a class="jkl" tabindex="-1" href="#">Profile</a></li> -->
							<li>
								<a tabindex="-1" href="year.php" class="jkl"><i class="icon-calendar icon-large"></i> Set PPMP Year <span class="badge"></span></a>
							</li>
							<li class="divider"></li>	
							<li>
								<a tabindex="-1" href="dashboard.php" class="jkl"><i class="icon-tags icon-large"></i> Price Catalogue <span class="badge"></span></a>
							</li>
							<li class="divider"></li>
							
							<?php if ($count2 == "0") { ?>
								<li>
									<!-- <a tabindex="-1" href="#" class="jkl"><i class="icon-envelope icon-large"></i> Contact Us</a> -->
									<a tabindex="-1" href="#" class="jkl" disabled><i class="icon-shopping-cart icon-large"></i> PPMP CART List <span class="badge"><?php  echo $count2;  ?></span></a>
								</li>							
							<?php }else{ ?>
								<li>
									<!-- <a tabindex="-1" href="#" class="jkl"><i class="icon-envelope icon-large"></i> Contact Us</a> -->
									<a tabindex="-1" href="ppmp.php" class="jkl"><i class="icon-shopping-cart icon-large"></i> PPMP CART List <span class="badge"><?php  echo $count2;  ?></span></a>
								</li>
							<?php } ?>
							
							<?php if ($count3 == "0") { ?>
								<li>
									<!-- <a tabindex="-1" href="#" class="jkl"><i class="icon-envelope icon-large"></i> Contact Us</a> -->
									<a tabindex="-1" href="#" class="jkl" disabled><img src="../images/buttons/ppmp.png" width="12%"> NEW PPMP - <?php  echo $Year;  ?> <span class="badge"><?php  echo $count3;  ?></span></a>
								</li>								
							<?php }else{ ?>
								<li>
									<!-- <a tabindex="-1" href="#" class="jkl"><i class="icon-envelope icon-large"></i> Contact Us</a> -->
									<a tabindex="-1" href="ppmp_requested.php" class="jkl"><img src="../images/buttons/ppmp.png" width="12%"> NEW PPMP - <?php  echo $Year;  ?> <span class="badge"><?php  echo $count3;  ?></span></a>
								</li>
							<?php } ?>
							
							<!-- <li> -->
								<!-- <a tabindex="-1" href="#" class="jkl"><i class="icon-envelope icon-large"></i> Contact Us</a> -->
							<!--	<a tabindex="-1" href="ppmp_approved.php" class="jkl"><img src="../images/buttons/ppmp-approved.png" width="12%"> APPROVED PPMP <span class="badge"><?php  echo $count4;  ?></span></a>
							</li> -->
							<?php if ($count5 == "0") { ?>
								<li>
									<!-- <a tabindex="-1" href="#" class="jkl"><i class="icon-envelope icon-large"></i> Contact Us</a> -->
									<a tabindex="-1" href="#" class="jkl" disabled><img src="../images/buttons/ppmp-previous.png" width="12%"> PPMP History <span class="badge"><?php  echo $count5;  ?></span></a>
								</li>							
							<?php }else{ ?>
								<li>
									<!-- <a tabindex="-1" href="#" class="jkl"><i class="icon-envelope icon-large"></i> Contact Us</a> -->
									<a tabindex="-1" href="ppmp_previous.php" class="jkl"><img src="../images/buttons/ppmp-previous.png" width="12%"> PPMP History <span class="badge"><?php  echo $count5;  ?></span></a>
								</li>
							<?php } ?>
							<li class="divider"></li>
							
							<?php if ($count6 == 0) { ?>
								<li>
									<a tabindex="-1" href="" class="jkl" disabled><img src="../images/buttons/pr.png" width="12%"> Purchase Request List </a>
								</li>
							<?php }else{ ?>
								<li>
									<a tabindex="-1" href="pr.php" class="jkl"><img src="../images/buttons/pr.png" width="12%"> Purchase Request List </a>
								</li>
							<?php } ?>
						</ul>
					</li>
				</ul>
			</div>
			<!--/.nav-collapse -->
			
			<a href="dashboard.php"><span class="brand">BULSU e-PROCUREMENT v1.0</span></a>
			
			<div id="coll" class="nav-collapse collapse">
				<ul class="nav pull-right">
					<li class="dropdown">
						<a><i class="icon-hdd icon-large"></i>Users CPanel</a>
					</li>
					<?php 
						$query= mysqli_query($conn,"select * from users where user_id = '$session_id'");
						$row = mysqli_fetch_array($query);
					?>
					<li class="dropdown">
						<a href="#" id="name123" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user icon-large">
							</i><?php echo $row['username'];  ?> <i class="caret"></i></a>
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