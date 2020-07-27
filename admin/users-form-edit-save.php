<?php
include('../dbcon.php');
include('session.php');

if (isset($_POST['update'])){
	$get_id= $_GET['id'];
	$branch= $_POST['branch'];
	$status= $_POST['status'];
	$username = $_POST['username'];
	$password = trim($_POST['password']);
	$approved = $_POST['approved'];
	
	//ECHO $get_id;
	//ECHO $branch;
	//ECHO $status;
	//ECHO $username;
	//ECHO $password;
	//ECHO $approved;

	// Validate password strength
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);

	if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
?>
		<script>
		$.ajax({
				success: function(html){
					$.jGrowl("Your New Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character. ", { header: 'FAILED' });
					var delay = 6000;
					setTimeout(function(){ window.location = 'users.php'  }, delay);
				}
			});
		</script>
<?php
	}else{
	
		mysql_query("update users set branch= '$branch',username = '$username',password = '$password',status='$status',approved='$approved' where user_id = '$get_id' ")or die(mysql_error());
?>
		<script>
			$.ajax({
				success: function(html){
					$.jGrowl("Selected user is successfully updated", { header: 'SUCCESS' });
					var delay = 3000;
					setTimeout(function(){ window.location = 'users.php'  }, delay);
				}
			});
		</script>
<?php		
	}
}
?>