<?php include('header.php'); ?>
<?php
include('../dbcon.php');
include('session.php');
//mysql_query("update user_log set logout_Date = NOW() where user_id = '$session_id' ")or die(mysql_error());
session_unset();
session_destroy();
//header('location:../index.php');
?>
<script>
$.ajax({
		success: function(html){
			$.jGrowl("You have successfully logout the system!  Wait for a moment... ", { header: 'LOGOUT SUCCESS' });
			var delay = 3000;
			setTimeout(function(){ window.location = '../index.php' }, delay);
		}
	});
</script>