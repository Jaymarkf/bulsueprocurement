<?php
    session_start();
	include('header.php');
 ?>
<body id="login">
	<div class="row-fluid">
		<?php include('navbar.php') ?>
	</div>

	<div class="row-fluid">
		<?php include('slider.php'); ?>
	</div>

    <div class="container-fluid">
		<div class="row-fluid">
			<br/>
			<!-- <div class="span12"> -->
			<div class="row-fluid">
				<div class="span12" id="content">
					<div class="span4" id="">
						<h2><span style="color: maroon;">The BulSU<br />Transparency Seal</span></h2>
						<p id="content" style="text-align: justify;">A pearl buried inside a tightly-shut shell is practically worthless. Government information is a pearl, meant to be shared with the public in order to maximize its inherent value.The Transparency Seal, depicted by a pearl shining out of an open shell, is a symbol of a policy shift towards openness in access to government information. On the one hand, it hopes to inspire Filipinos in the civil service to be more open to citizen engagement; on the other, to invite the Filipino citizenry to exercise their right to participate in governance&#8230;</p>
						<a href="http://bulsu.edu.ph/transparency-seal/" title="http://bulsu.edu.ph/transparency-seal/" target="_blank"><span class="creative_title">Read More...</span></a>
					</div>	

					<div class="span4" id="">
						<h2><span style="color: maroon;">About BulSU</span></h2>
						<p id="content" style="text-align: justify;">Bulacan State University (BulSU) is a state-funded institution of higher learning established in 1904 and converted into a university in 1993 by virtue of Republic Act 7665.The University in mandated to provide higher professional/technical and special instruction for special purpose and to promote research and extension services, advanced studies and extension services, advanced studies and progressive leadership in Engineering, Architecture, Education, Art and Science, Fine Arts, Information Technology, Technical courses, Commerce&#8230;</p>
						<a href="http://bulsu.edu.ph/about" title="http://bulsu.edu.ph/about/" target="_blank"><span class="creative_title">Read More...</span>	</a>
					</div>

				<!-- </div>  -->
					<div class="span4"  id="">
						<form class="form-signin block-content" method="POST">
							<?php include('sidebar_header.php'); ?>
							<hr/>
							<h4 class="form-signin-heading"><i class="icon-lock"></i> Sign-in your account</h4>
							<input type="text" class="input-block-level" id="usernmae" name="username" placeholder="Username" required>
							<input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
							<center>
							<button data-placement="top" title="Click to Login" id="tooltip" name="login" class="btn btn-success" type="submit"><i class="icon-signin icon-large"></i> Sign-in</button>
							<!-- <a href="registration.php" data-placement="top" title="Click to Register" id="tooltip1" name="register" class="btn btn-warning" type=""><i class="icon-signin icon-large"></i> Register</a> -->
							<h5><span style="color: maroon;">BULSU e-PROCUREMENT v1.0</span></h5>
							</center>
								<script type="text/javascript">
									$(document).ready(function(){
										$('#tooltip').tooltip('show');
										$('#tooltip').tooltip('hide');
									});

									$(document).ready(function(){
										$('#tooltip1').tooltip('show');
										$('#tooltip1').tooltip('hide');
									});
								</script>
						</form>
					</div>
				</div>
			</div>
		</div>
		
			<?php
			if (isset($_POST['login'])){
				//include('dbcon.php');
				$username = $_POST['username'];
				$password = $_POST['password'];

				/* student */
				$query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND approved='yes'";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
				$num_row = mysqli_num_rows($result);
              
				//$pass=$row['password'];
				$level =$row['level'];
				$department = $row['branch'];
				if( $num_row > 0 ) {
					//session_start();
					if($level=='default' AND $department=='Main Office'){
						$_SESSION['admin_id']=$row['user_id'];
						
					
						if($password=='12345'){
							//header('location: admin/password-default.php');
					?>
							<script>
							$.ajax({
									success: function(html){
										$.jGrowl("ACCESS GRANTED! Wait for a moment while preparing the system for you... ", { header: 'LOGIN SUCCESS' });
										var delay = 3000;
										setTimeout(function(){ window.location = 'admin/password-default.php' }, delay);
									}
								});
							</script>
					<?php
						}else{
							//header('location: admin/dashboard.php');
					?>
							<script>
							$.ajax({
									success: function(html){
										$.jGrowl("ACCESS GRANTED! Wait for a moment while preparing the system for you... ", { header: 'LOGIN SUCCESS' });
										var delay = 3000;
										setTimeout(function(){ window.location = 'admin/dashboard.php' }, delay);
									}
								});
							</script>
					<?php
							//mysqli_query($conn,"insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")");
						}
					}elseif($level=='administrator' AND $department=='Main Office'){
						$_SESSION['admin_id']=$row['user_id'];
						if($password=='12345'){
							//header('location: admin/password-default');
					?>
							<script>
							$.ajax({
									success: function(html){
										$.jGrowl("ACCESS GRANTED! Wait for a moment while preparing the system for you... ", { header: 'LOGIN SUCCESS' });
										var delay = 3000;
									setTimeout(function(){ window.location = 'admin/password-default.php' }, delay);
									}
								});
							</script>
					<?php
						}else{
							//header('location: admin/dashboard');
					?>
							<script>
							$.ajax({
									success: function(html){
										$.jGrowl("ACCESS GRANTED! Wait for a moment while preparing the system for you... ", { header: 'LOGIN SUCCESS' });
										var delay = 3000;
										setTimeout(function(){ window.location = 'admin/dashboard.php' }, delay);
									}
								});
							</script>
					<?php
							//mysqli_query($conn,"insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")");
						}
					}elseif($level=='administrator' AND $department=='Budget Office'){
						$_SESSION['bo_admin_id']=$row['user_id'];
						
						if($password=='12345'){
							//header('location: budget-office/password-default');
					?>
							<script>
							$.ajax({
									success: function(html){
										$.jGrowl("ACCESS GRANTED! Wait for a moment while preparing the system for you... ", { header: 'LOGIN SUCCESS' });
										var delay = 3000;
										setTimeout(function(){ window.location = 'budget-office/password-default.php' }, delay);
									}
								});
							</script>
					<?php		
						}else{
							//header('location: budget-office/dashboard');
					?>
							<script>
							$.ajax({
									success: function(html){
										$.jGrowl("ACCESS GRANTED! Wait for a moment while preparing the system for you... ", { header: 'LOGIN SUCCESS' });
										var delay = 3000;
										setTimeout(function(){ window.location = 'budget-office/dashboard.php' }, delay);
									}
								});
							</script>
					<?php
							//mysqli_query($conn,"insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")");
						}
					}elseif($level =='supplier' AND $department == 'Supplier'){
                            $_SESSION['supplier_id']=$row['user_id'];
                            if($password=='12345'){
                            //header('location: budget-office/password-default');
                            ?>
                            <script>
                                $.ajax({
                                    success: function(html){
                                        $.jGrowl("ACCESS GRANTED! Wait for a moment while preparing the system for you... ", { header: 'LOGIN SUCCESS' });
                                        var delay = 3000;
                                        setTimeout(function(){ window.location = 'supplier/password-default.php' }, delay);
                                    }
                                });
                            </script>
                        <?php
                        }else{
                        //header('location: budget-office/dashboard');
                        ?>
                            <script>
                                $.ajax({
                                    success: function(html){
                                        $.jGrowl("ACCESS GRANTED! Wait for a moment while preparing the system for you... ", { header: 'LOGIN SUCCESS' });
                                        var delay = 3000;
                                        setTimeout(function(){ window.location = 'supplier/dashboard.php' }, delay);
                                    }
                                });
                            </script>
                        <?php
                        //mysqli_query($conn,"insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")");
                        }

                    }elseif($level=='administrator' AND $department=='Procurement Unit'){
						$_SESSION['admin_id']=$row['user_id'];
						
						if($password=='12345'){
							//header('location: admin/password-default');
					?>
							<script>
							$.ajax({
									success: function(html){
										$.jGrowl("ACCESS GRANTED! Wait for a moment while preparing the system for you... ", { header: 'LOGIN SUCCESS' });
										var delay = 3000;
										setTimeout(function(){ window.location = 'admin/password-default.php' }, delay);
									}
								});
							</script>
					<?php
						}else{
							//header('location: admin/dashboard');
					?>
							<script>
							$.ajax({
									success: function(html){
										$.jGrowl("ACCESS GRANTED! Wait for a moment while preparing the system for you... ", { header: 'LOGIN SUCCESS' });
										var delay = 3000;
										setTimeout(function(){ window.location = 'admin/dashboard.php' }, delay);
									}
								});
							</script>
					<?php
							//mysqli_query($conn,"insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")");
						}
					}elseif($level=='user'){
						$_SESSION['member_id']=$row['user_id'];
						if($password=='12345'){
							//header('location: users/password-default');
					?>
							<script>
							$.ajax({
									success: function(html){
										$.jGrowl("ACCESS GRANTED! Wait for a moment while preparing the system for you... ", { header: 'LOGIN SUCCESS' });
										var delay = 3000;
										setTimeout(function(){ window.location = 'users/password-default.php' }, delay);
									}
								});
							</script>
					<?php
						}else{
							//header('location: users/dashboard')
					?>
					   
							<script>
							$.ajax({
									success: function(html){
										$.jGrowl("ACCESS GRANTED! Wait for a moment while preparing the system for you... ", { header: 'LOGIN SUCCESS' });
										var delay = 3000;
										setTimeout(function(){ window.location = 'users/dashboard.php' }, delay);
									}
								});
							</script>
					<?php
							//mysqli_query($conn,"insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")");
						}
					}
					else{
						//header('location: index');
					?>

						<script>
						$.ajax({
								success: function(html){
									$.jGrowl("ACCESS DENIED! Please Check your username and Password", { header: 'LOGIN FAILED' });
									var delay = 3000;
									setTimeout(function(){ window.location = '' }, delay);
								}
							});
						</script>
				<?php
					}
				}else{
						//header('location: index');
				?>
						<script>
						$.ajax({
								success: function(html){
									$.jGrowl("ACCESS DENIED! Please Check your username and Password", { header: 'LOGIN FAILED' });
									var delay = 3000;
									setTimeout(function(){ window.location = '' }, delay);
								}
							});
						</script>
				<?php
					}
			}
			?>

	<?php include('footer.php'); ?>

	</div> <!-- /container -->

	<?php include('script.php'); ?>

</body>

</html>