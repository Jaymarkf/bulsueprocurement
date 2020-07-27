<div class="row-fluid">
	<!-- block -->
	<div class="block">
		<div class="navbar navbar-inner block-header">
			<div class="muted pull-left"><i class="icon-plus-sign icon-large"></i> PPMP Request Information</div>
		</div>
		<div class="block-content collapse in">
			<div class="span12">
				<h4 class="span12 pull-center">Step 1</h4>
			</div>
			<form method="post" id="addForm">
				<div class="row-fluid">
					<div class="span12">
						<div class="control-group span6">
						  <div class="controls">
							<label>Date:</label>
							<input type="date" name="fdate" placeholder = "Date" class="span12" required>
						  </div>
						</div>
						
						<div class="control-group span6">
						  <div class="controls">
						  <label>Reference No.:</label>
						   <input class="input focused span12"  name="fRefNo" id="focusedInput" type="text" placeholder = "Reference No" required>
						  </div>
						</div>
					</div>
				</div>
				<div class="row-fluid">	
					<div class="span12">				
						<div class="control-group span6">
							<div class="controls">
								<label>Office In-Charge:</label>
								<select class="span12" name="fOIC" placeholder = "Office In-Charge" required>
									<option value ="Procurement Office">Procurement Office</option>
									<option value ="Supplies Office">Supplies Office</option>
								</select>
							</div>
						</div>
											
						<div class="control-group span6">
						  <div class="controls">
							<label>Branch:</label>
							<input class="input focused span12"  name="fBranch" id="focusedInput" type="text" placeholder = "Branch" value="<?php echo $row['branch'];  ?>" required>
						  </div>
						</div>
					</div>
				</div>
					
				<div class="row-fluid">
					<div class="control-group span12">
					  <div class="controls">
						<label>Created by:</label>
						<input class="input focused span6"  name="fCreatedBy" id="focusedInput" type="text" placeholder = "Created by" value="<?php echo $row['firstname']." ".$row['lastname'];  ?>" required>
					  </div>
					</div>
				</div>
				
					<div class="control-group">
					  <div class="controls">
							<button  data-placement="left" title="Next Step" id="save" name="save" class="btn btn-success pull-right">Next <i class="icon-arrow-right icon-large"></i></button>
								<script type="text/javascript">
								$(document).ready(function(){
									$('#save').tooltip('show');
									$('#save').tooltip('hide');
								});
								</script>
							
							<a href="ppmp.php" data-placement="right" title="Click to Cancel" id="cancel" name="cancel" class="btn btn-danger pull-left"><i class="icon-arrow-left icon-large"></i> Cancel</a>
								<script type="text/javascript">
								$(document).ready(function(){
									$('#cancel').tooltip('show');
									$('#cancel').tooltip('hide');
								});
							</script>
					  </div>
					</div>
			</form>
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