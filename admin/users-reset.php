<?php
include('header.php');
include('../dbcon.php');
include('session.php');

$get_id = $_GET['id'];

//if (isset($_GET['reset'])){
    mysqli_query($conn,"UPDATE users SET password = '12345' WHERE user_id = '$get_id' ");
?>
    <script>
    	$.ajax({
    		success: function(html){
    			$.jGrowl("Selected user password is successfully SET to DEFAULT", { header: 'SUCCESS' });
    			var delay = 1500;
    			setTimeout(function(){ window.location = 'users.php'  }, delay);
    		}
    	});
    </script>
<?php
//}
?>