<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php
error_reporting(0);
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
            $.jGrowl.defaults.position = 'center';
            $.jGrowl("You have successfully logout the system!  Wait for a moment... ", { header: 'LOGOUT SUCCESS' });
            var delay = 3000;
            setTimeout(function(){ window.location = 'https://www.bulsueprocurement.com/' }, delay);
        }
    });
</script>