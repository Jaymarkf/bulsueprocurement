<?php
	if(isset($_POST['get_option'])) {
		include('../dbcon.php');
		
		$level = $_POST['get_option'];
		$find=mysql_query("SELECT branch FROM tbl_branch WHERE level='$level' ORDER BY branch ASC");
		
		echo "<option disabled selected>Select Branch</option>";
		while($row=mysql_fetch_array($find)){
				echo "<option>".$row['branch']."</option>";
		}
		exit;
	}
?>