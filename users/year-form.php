<?php
	$query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
	$row = mysqli_fetch_array($query);
?>

<form class="form-pass" method="POST" style="color: #000;">
	<?php include('sidebar_header.php'); ?>
	<hr/>
	<center>
		<h3 class="form-signin-heading"><i class="icon-calendar"></i> Set PPMP Year</h3>
	</center>
	
	<div class="control-group">
	  <div class="controls">
		<label>Set Year</label>
		<input name="syYear" value="<?php echo $row['Year']; ?>" class="input focused span12" id="focusedInput" placeholder = "Description" type="text" required>
	  </div>
	</div>
	
	<div class="control-group">
	  <div class="controls">
			<button name="update" id="update" data-placement="right" title="Click to update the current year" class="btn btn-success"><i class="icon-save icon-large"></i> Update</button>
				<script type="text/javascript">
					$(document).ready(function(){
						$('#update').tooltip('show');
						$('#update').tooltip('hide');
					});
				</script>
			<a href="dashboard.php" name="cancel" id="cancel" data-placement="right" title="Click to cancel update" class="btn btn-failed"><i class="icon-undo icon-large"></i> Cancel</a>
				<script type="text/javascript">
					$(document).ready(function(){
						$('#cancel').tooltip('show');
						$('#cancel').tooltip('hide');
					});
				</script>
	  </div>
	</div>
	
</form>

<?php
if (isset($_POST['update'])){
$syYear = $_POST['syYear'];

$Year=date('Y');

if ($syYear < $Year) {
	//exit();
?>
<script>
$.ajax({
		success: function(html){
			$.jGrowl("Set year cannot be less than the current year", { header: 'FAILED' });
			var delay = 3000;
			//setTimeout(function(){ window.location = 'dashboard.php'  }, delay);
			setTimeout(function(){ window.location = 'year.php'  }, delay);
		}
	});
</script>
<?php
	exit();
}

if ($syYear > $Year + 1) {
	//exit();
?>
<script>
$.ajax({
		success: function(html){
			$.jGrowl("Set year cannot be greater than one year ahead of the current year", { header: 'FAILED' });
			var delay = 3000;
			//setTimeout(function(){ window.location = 'dashboard.php'  }, delay);
			setTimeout(function(){ window.location = 'year.php'  }, delay);
		}
	});
</script>
<?php
	exit();
}

mysqli_query($conn,"UPDATE users SET Year ='$syYear' WHERE user_id = '$session_id'");
?>
<script>
$.ajax({
		success: function(html){
			$.jGrowl("Current Year is successfully updated", { header: 'SUCCESS' });
			var delay = 1500;
			setTimeout(function(){ window.location = 'dashboard.php'  }, delay);
		}
	});
</script>
<?php
}
?>
