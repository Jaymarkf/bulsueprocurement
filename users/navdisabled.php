<!-- <?php //include('../dbcon.php'); ?> -->

<?php
	//$query1 = mysql_query("SELECT * FROM tbl_year")or die(mysql_error());
	$query1 = mysql_query("SELECT * FROM users WHERE user_id='$session_id'")or die(mysql_error());
	while($row1 = mysql_fetch_array($query1)) {
	$Year = $row1['Year'];
	}
	$query2= mysql_query("select * from tbl_ppmp WHERE Year = $Year AND user_id='$session_id' AND Status = 'Pending' GROUP BY Year")or die(mysql_error());
	$count2 = mysql_num_rows($query2);

	$query3= mysql_query("select * from tbl_ppmp WHERE Year = $Year AND user_id='$session_id' AND Status = 'Requested' OR Year = $Year AND user_id='$session_id' AND Status = 'Completed' GROUP BY Year")or die(mysql_error());
	$count3 = mysql_num_rows($query3);
	
	//$query4= mysql_query("select * from tbl_ppmp WHERE Year = $Year AND user_id='$session_id'")or die(mysql_error());
	$query4 = mysql_query("SELECT *,COUNT(Year) FROM tbl_ppmp WHERE Year = '$Year' AND user_id='$session_id'  AND Status = 'Completed' GROUP BY Year")or die(mysql_error());
	$count4 = mysql_num_rows($query4);
	
	//$query5= mysql_query("select * from tbl_ppmp WHERE Year = $Year AND user_id='$session_id'")or die(mysql_error());
	$query5 = mysql_query("SELECT *,COUNT(Year) FROM tbl_ppmp WHERE Year < '$Year' AND user_id='$session_id'  AND Status = 'Completed' GROUP BY Year")or die(mysql_error());
	$count5 = mysql_num_rows($query5);
	
	$query6 = mysql_query("SELECT * FROM tbl_ppmp WHERE user_id = '$session_id' AND Year = '$Year' AND BO_PPMP_Status = 'Approved' GROUP BY Year")or die(mysql_error());
	$count6 = mysql_num_rows($query6);
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
						$query= mysql_query("select * from users where user_id = '$session_id'")or die(mysql_error());
						$row = mysql_fetch_array($query);
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