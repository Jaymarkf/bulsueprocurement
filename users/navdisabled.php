<!-- <?php //include('../dbcon.php'); ?> -->

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
	$query4 = mysqli_query($conn,"SELECT *,COUNT(Year) FROM tbl_ppmp WHERE Year = '$Year' AND user_id='$session_id'  AND Status = 'Completed' GROUP BY Year");
	$count4 = mysqli_num_rows($query4);
	
	//$query5= mysqli_query($conn,"select * from tbl_ppmp WHERE Year = $Year AND user_id='$session_id'");
	$query5 = mysqli_query($conn,"SELECT *,COUNT(Year) FROM tbl_ppmp WHERE Year < '$Year' AND user_id='$session_id'  AND Status = 'Completed' GROUP BY Year");
	$count5 = mysqli_num_rows($query5);
	
	$query6 = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE user_id = '$session_id' AND Year = '$Year' AND BO_PPMP_Status = 'Approved' GROUP BY Year");
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
						<a href="" id="name123" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-tasks icon-large"></i> MENU <i class="caret"></i></a>
					</li>
				</ul>
			</div>
			<!--/.nav-collapse -->
			
			<a><span class="brand">BULSU e-PROCUREMENT v1.0</span></a>
			
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
						<a href="" id="name123" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user icon-large">
							</i><?php echo $row['username'];  ?> <i class="caret"></i></a>
					</li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
</div>