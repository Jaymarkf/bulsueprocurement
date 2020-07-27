<?php
	if(isset($_POST['get_option'])) {
		include('../dbcon.php');
		
		$level = $_POST['get_option'];
		/*$find=mysqli_query($conn,"SELECT branch FROM tbl_branch WHERE level='$level' ORDER BY branch ASC");*/
		/*SELECT name FROM table2 WHERE name NOT IN  (SELECT name FROM table1)*/
		$find=mysqli_query($conn,"SELECT branch FROM tbl_branch WHERE level='$level' AND branch NOT IN (SELECT branch FROM users WHERE level='$level') ORDER BY branch ASC");
		
		echo "<option disabled selected>Select Branch</option>";
		while($row=mysqli_fetch_array($find)){
				echo "<option>".$row['branch']."</option>";
		}
		exit;
	}
?>