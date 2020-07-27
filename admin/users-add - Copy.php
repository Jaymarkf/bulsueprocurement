<div class="row-fluid">
	<!-- block -->
	<div class="block">
		<div class="navbar navbar-inner block-header">
			<div class="muted pull-left"><i class="icon-plus-sign icon-large"></i> Add User</div>
		</div>
		<div class="block-content collapse in">
			<div class="span12">
			<form method="post" id="add_user">
					<div class="control-group">
					  <div class="controls">
						<label>Access Level</label>
						<select name="status" placeholder = "Status" class="span12" required>
							<option></option>
							<option value ="administrator">Administrator</option>
							<option value ="normal">Normal</option>
						</select>
					  </div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
						<label>College/Department</label>
						<select name="branch" placeholder = "Branch" class="span12" required>
							<option></option>
							<?php
								$query = mysqli_query($conn,"select * from tbl_branch ORDER BY branch ASC");
								while($row = mysqli_fetch_array($query)){
								$id = $row['branchID'];
							
								echo "<option>".$row['branch']."</option>";
								}
							?>
						</select>
					  </div>
					</div>
					 
					<div class="control-group">
					  <div class="controls">
					  <label>First Name</label>
					   <input class="input focused span12"  name="fname" id="focusedInput" type="text" placeholder = "First Name" required>
					  </div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
					  <label>Last Name</label>
						<input class="input focused span12"  name="lname" id="focusedInput" type="text" placeholder = "Last Name" required>
					  </div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
					  <label>E-mail</label>
						<input class="input focused span12"  name="email" id="focusedInput" type="email" placeholder = "E-mail" required>
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
<script>
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
</script>	