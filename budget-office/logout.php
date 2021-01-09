<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php
include('../dbcon.php');
include('session.php');
//mysqli_query($conn,"update user_log set logout_Date = NOW() where user_id = '$session_id' ");
session_unset();
session_destroy();
//header('location:../index.php');
?>
<script>
$.ajax({
		success: function(html){
			$.jGrowl("You have successfully logout the system!  Wait for a moment... ", { header: 'LOGOUT SUCCESS' });
			var delay = 3000;
			setTimeout(function(){ window.location = 'https://www.bulsueprocurement.com/' }, delay);
		}
	});
</script>