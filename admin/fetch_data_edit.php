<?php
	if(isset($_POST['get_option'])) {
		include('../dbcon.php');
		
		$level = $_POST['get_option'];
		$find=mysqli_query($conn,"SELECT branch FROM tbl_branch WHERE level='$level' ORDER BY branch ASC");
		
		echo "<option disabled selected>Select Branch</option>";
		while($row=mysqli_fetch_array($find)){
				echo "<option>".$row['branch']."</option>";
		}
		exit;
	}
?>