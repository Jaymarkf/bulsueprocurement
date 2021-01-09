			<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
			<?php
			if (isset($_POST['login'])){
				include('dbcon.php');
				$username = $_POST['username'];
				$password = $_POST['password'];

				/* student */
				$query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND approved='yes'";
				$result = mysqli_query($conn,$query);
				$row = mysqli_fetch_array($result);
				$num_row = mysqli_num_rows($result);

				//$pass=$row['password'];
				$status =$row['status'];
				$department =$row['branch'];

				if( $num_row > 0 ) { 			
					session_start();
					
					if($status=='default' AND $department=='Main Office'){
						$_SESSION['admin_id']=$row['user_id'];
						if($password=='12345'){
							header('location: admin/password-default.php');
						}else{
							header('location: admin/dashboard.php');				
							mysqli_query($conn,"insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")");
						}
					}elseif($status=='administrator' AND $department=='Main Office'){
						$_SESSION['admin_id']=$row['user_id'];
						if($password=='12345'){
							header('location: admin/password-default.php');
						}else{
							header('location: admin/dashboard.php');				
							mysqli_query($conn,"insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")");
						}
					}elseif($status=='administrator' AND $department=='Budget Office'){
						$_SESSION['bo_admin_id']=$row['user_id'];
						if($password=='12345'){
							header('location: budget-office/password-default.php');
						}else{
							header('location: budget-office/dashboard.php');				
							mysqli_query($conn,"insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")");
						}
					}elseif($status=='administrator' AND $department=='Procurement Unit'){
						$_SESSION['admin_id']=$row['user_id'];
						if($password=='12345'){
							header('location: admin/password-default.php');
						}else{
							header('location: admin/dashboard.php');				
							mysqli_query($conn,"insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")");
						}
					}elseif($status=='user'){
						$_SESSION['member_id']=$row['user_id'];
						if($password=='12345'){
							header('location: users/password-default.php');
						}else{
							header('location: users/dashboard.php');
							mysqli_query($conn,"insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")");
						}
					}
					else{
						//header('location: index.php');
					?>

						<script>
						$.ajax({
								success: function(html){
									$.jGrowl("ACCESS DENIED! Please Check your username and Password", { header: 'LOGIN FAILED' });
									var delay = 3000;
									setTimeout(function(){ window.location = 'index.php' }, delay);
								}
							});
						</script>
				<?php
					}
				}else{
						//header('location: index.php');
				?>
						<script>
						$.ajax({
								success: function(html){
									$.jGrowl("ACCESS DENIED! Please Check your username and Password", { header: 'LOGIN FAILED' });
									var delay = 3000;
									setTimeout(function(){ window.location = 'index.php' }, delay);
								}
							});
						</script>
				<?php
					}
			}
			?>