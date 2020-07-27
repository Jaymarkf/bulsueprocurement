<div class="row-fluid">
	<!-- block -->
	<div class="block">
		<div class="navbar navbar-inner block-header">
			<div class="muted pull-left"><i class="icon-plus-sign icon-large"></i> Add Item Details</div>
		</div>
		<div class="block-content collapse in">
			<div class="span12">
			<form method="post" id="addForm">
					<div class="control-group">
					  <div class="controls">
						<label>Category</label>
						<select name="idCat" placeholder = "Category" class="span12" required>
							<option></option>
							<?php
								//Create query
								$query = "select * from tbl_item_category";
								$result=mysql_query($query) or die ("Query Failed: ".mysql_error());
								while ($row=mysql_fetch_array($result)) {
									$icitemcategoryID=$row['itemcategoryID'];
									$icCatDesc=$row['ItemCatDesc'];
									echo "<option value=". $icitemcategoryID .">". $icCatDesc ."</option>";
								}
							?>
						</select>
					  </div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
					  <label>Code</label>
					   <input class="input focused span12"  name="idCode" id="focusedInput" type="text" placeholder = "Code" required>
					  </div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
					  <label>Description</label>
						<input class="input focused span12"  name="idDesc" id="focusedInput" type="text" placeholder = "Description" required>
					  </div>
					</div>
					
					<div class="control-group">
					  <div class="controls">
					  <label>Price Catalogue</label>
						<input class="input focused span12"  name="idPrice" id="focusedInput" type="text" placeholder = "Price" required>
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
		$("#addForm").submit(function(e){
			e.preventDefault();
			var _this = $(e.target);
			var formData = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "item-details-save.php",
				data: formData,
				success: function(html){
					$.jGrowl("Item Details Successfully  Added", { header: 'Item Details Added' });
					var delay = 3000;
					setTimeout(function(){ window.location = 'item-details.php'  }, delay);
				}
			});
		});
	});
</script>