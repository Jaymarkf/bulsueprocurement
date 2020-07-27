<div class="row-fluid">
	<!-- block -->
	<div class="block">
		<div class="navbar navbar-inner block-header">
			<div class="muted pull-left"><i class="icon-plus-sign icon-large"></i> Add Item Purpose</div>
		</div>
		<div class="block-content collapse in">
			<div class="span12">
			<form method="post" id="addForm">					 
					
						<div class="control-group">
					  <div class="controls">
					  <label>Description</label>
						<input class="input focused span12"  name="icDesc" id="focusedInput" type="text" placeholder = "Description" style="text-transform:uppercase" required>
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
		$("#addForm").submit(function(e){
			e.preventDefault();
			var _this = $(e.target);
			var formData = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "item-purpose-save.php",
				data: formData,
				success: function(html){
					$.jGrowl("Class Successfully  Added", { header: 'Item Category Added' });
					var delay = 3000;
					setTimeout(function(){ window.location = 'item-purpose.php'  }, delay);
				}
			});
		});
	});
</script> -->
<?php
if (isset($_POST['save'])){
$icDesc = trim(strtoupper($_POST['icDesc']));

//if found reject the saving of users
	$query = "SELECT * FROM tbl_purpose WHERE purpose='$icDesc'";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	$num_row = mysqli_num_rows($result);

if( $num_row > 0 ) {
?>
	<script>
	$.ajax({
			success: function(html){
				$.jGrowl("The item details already exists.  Please try again...  ", { header: 'FAILED' });
				var delay = 6000;
				setTimeout(function(){ window.location = 'item-purpose.php'  }, delay);
			}
		});
	</script>
<?php
} else {
	mysqli_query($conn,"insert into tbl_purpose (purpose) values('$icDesc')");
?>
	<script>
	$.ajax({
			success: function(html){
				$.jGrowl("CONGRATULATIONS your new Item Category is successfully created", { header: 'SUCCESS' });
				var delay = 2000;
				setTimeout(function(){ window.location = 'item-purpose.php'  }, delay);
			}
		});
	</script>
<?php
}
}
?>