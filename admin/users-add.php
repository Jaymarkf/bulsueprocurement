<script type="text/javascript">
	function fetch_select(val) {
		$.ajax({
			type: 'post',
			url: 'fetch_data.php',
			data: {
				get_option:val
			},
				success: function (response) {
				document.getElementById("new_select").innerHTML=response; 
			}
		});
	}
</script>

<div class="row-fluid">
	<!-- block -->
	<div class="block">
		<div class="navbar navbar-inner block-header">
			<div class="muted pull-left"><i class="icon-plus-sign icon-large"></i> Add User</div>
		</div>
		<div class="block-content collapse in">
			<div class="span12">
			<form method="post" id="add_user">
					<div class="control-group" id="select_box">
						<div class="controls">
							<label>Access Level</label>
							<select name="level" placeholder = "Status" class="span12" onchange="fetch_select(this.value);" required>
								<option value="" disabled selected>Select Access Level</option>
								<?php
									$select=mysqli_query($conn,"SELECT level FROM tbl_branch GROUP BY level");
									while($row=mysqli_fetch_array($select)){
										echo "<option>".$row['level']."</option>";
									}
								?>
							</select>
						</div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
						<label>College/Department</label>
						<select id="new_select" name="branch" placeholder = "Branch" class="span12" required>
							<option value="" disabled selected>Select your option</option>
							
						</select>
					  </div>
					</div>
					 
					<div class="control-group">
					  <div class="controls">
					  <label>Unique Username</label>
					   <input class="input focused span12"  name="username" id="focusedInput" type="text" placeholder = "Username" required>
					  </div>
					</div>

					<div class="control-group">
					  <div class="controls">
							<button  data-placement="right" title="Click to Save" id="save" name="save" class="btn btn-success"><i class="icon-save icon-large"></i> Save</button>
									<script type="text/javascript">
									$(document).ready(function(){
										$('#save').tooltip('show');
										$('#save').tooltip('hide');
									});
									</script>
					  </div>
					</div>
			</form>
			</div>
		</div>
	</div>
	<!-- /block -->
</div>
<!-- <script>
	jQuery(document).ready(function($){
		$("#add_user").submit(function(e){
			e.preventDefault();
			var _this = $(e.target);
			var formData = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "users-save.php",
				data: formData,
				success: function(html){
					$.jGrowl("New user is successfully added", { header: 'SUCCESS' });
					var delay = 3000;
					setTimeout(function(){ window.location = 'users.php'  }, delay);
				}
			});
		});
	});
</script> -->

<?php
if (isset($_POST['save'])){
$username = $_POST['username'];

//if found reject the saving of users
	$query = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	$num_row = mysqli_num_rows($result);

if( $num_row > 0 ) {
?>
	<script>
	$.ajax({
			success: function(html){
				$.jGrowl("The username already exists.  Please try again...  ", { header: 'FAILED' });
				var delay = 6000;
				setTimeout(function(){ window.location = 'users.php'  }, delay);
			}
		});
	</script>
<?php
} else {
	$level= $_POST['level'];
	$branch= $_POST['branch'];
	
	function generatePasswd($numAlphaUPPER=2,$numAlphaLOWER=2,$numnumeric=2,$numsymbol=2){
		$AlphaUPPER = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$AlphaLOWER = 'abcdefghijklmnopqrstuvwxyz';
		$numeric = '0123456789';
		$symbol = '!@#$%^&*()-+,';
		
		return str_shuffle(
			substr(str_shuffle($AlphaUPPER),0,$numAlphaUPPER) .
			substr(str_shuffle($AlphaLOWER),0,$numAlphaLOWER) .
			substr(str_shuffle($numeric),0,$numnumeric) .
			substr(str_shuffle($symbol),0,$numsymbol)
		);
	}
	
	$password = generatePasswd();
	
	mysqli_query($conn,"insert into users (Year,branch,username,password,level,registered_date,approved,Remarks) values(YEAR(NOW()),'$branch','$username','$password','$level',NOW(),'yes','Registered by Admin')");
	//mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $uname')");
?>
	<script>
	$.ajax({
			success: function(html){
				$.jGrowl("CONGRATULATION your new user account was added successfully... ", { header: 'SUCCESS' });
				var delay = 6000;
				setTimeout(function(){ window.location = 'users.php'  }, delay);
			}
		});
	</script>
<?php
}
}
?>