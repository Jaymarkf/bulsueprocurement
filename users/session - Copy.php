<?php
	session_start();

	$now = time();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if (!isset($_SESSION['member_id']) || (trim($_SESSION['member_id']) == '')) {
		header('Location: ../index.php');
	} elseif ($now > $_SESSION['expiry']){ 
		session_unset();
		session_destroy();
?>
		<script>
		$.ajax({
				success: function(html){
					$.jGrowl("You are logout because of no activity done for 5 minutes... ", { header: 'WARNING!' });
					var delay = 3000;
					setTimeout(function(){ window.location = '../index.php' }, delay);
				}
			});
		</script>
<?php
	}else {	
		$session_id=$_SESSION['member_id'];
		$query= mysql_query("select * from users where user_id = '$session_id'")or die(mysql_error());
		$row = mysql_fetch_array($query);
		$user_username = $row['username'];
	}
?>