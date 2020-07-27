<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<!-- <?php include('dashboard_sidebar.php'); ?> -->
                <div class="span12" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">
									<i class="icon-plus-sign icon-large"></i> Add Project Procurement Management Plan
								</div>
						    </div>
                            <div class="block-content collapse in">		
								<form id="save_form" class="form-signin" method="post">
									<div class="">
										<a id="return" data-placement="left" title="Click to Return" href="ppmp.php" class="btn btn-inverse"><i class="icon-arrow-left icon-large"></i> Back </a>
										<button class="btn btn-success pull-right" name="save"><i class="icon-save icon-large"></i> Save </button>
									</div>
									<hr/>
									<div class="">
										<label>END-USER/UNIT:</label>
										<select name="fEndUserUnit" class="span4" required>
											<option></option>
											<option value="BSU Baliuag">BSU Baliuag</option>
											<option value ="BSU Bustos">BSU Bustos</option>
											<option value="BSU Malolos">BSU Malolos</option>
										</select>
									</div>
									<br/>
									<!-- span 4 -->	
									<div class="span4">
										<label>CODE:</label>
										<input type="text" class="input-block-level" name="fCode" placeholder="Code" required>
										<label>GENERAL DESCRIPTION:</label>
										<input type="text" class="input-block-level" name="fGenDesc" placeholder="General Description" required>
										<label>QUANTITY|SIZE:</label>
										<input type="text" class="input-block-level" name="fQtySize" placeholder="Quantity or Size" required>
										<label>ESTIMATED BUDGET:</label>
										<input type="text" class="input-block-level" name="fEstBud" placeholder="Estimated Budget" required>
										<label>MODE OF PROCUREMENT:</label>
										<input type="text" class="input-block-level" name="fModProcure" placeholder="Mode of Procurement" required>
									</div>
									<!-- span 4 -->				
									<!-- span 4 -->				
									<div class="span2">
										<label>January:</label>
										<input type="text" class="input-block-level" Placeholder="Quantity" name="fJan" class="my_message" required>
										<label>February:</label>
										<input type="text" class="input-block-level" Placeholder="Quantity" name="fFeb" class="my_message" required>
										<label>March:</label>	
										<input type="text" class="input-block-level" Placeholder="Quantity" name="fMar" class="my_message" required>
									</div>
									<div class="span2">
										<label>April:</label>	
										<input type="text" class="input-block-level" Placeholder="Quantity" name="fApr" class="my_message" required>
										<label>May:</label>	
										<input type="text" class="input-block-level" Placeholder="Quantity" name="fMay" class="my_message" required>
										<label>June:</label>	
										<input type="text" class="input-block-level" Placeholder="Quantity" name="fJun" class="my_message" required>
									</div>
									
									<div class="span2">
										<label>July:</label>	
										<input type="text" class="input-block-level" Placeholder="Quantity" name="fJul" class="my_message" required>
										<label>August:</label>	
										<input type="text" class="input-block-level" Placeholder="Quantity" name="fAug" class="my_message" required>
										<label>September:</label>	
										<input type="text" class="input-block-level" Placeholder="Quantity" name="fSep" class="my_message" required>
									</div>
									<div class="span2">
										<label>October:</label>	
										<input type="text" class="input-block-level" Placeholder="Quantity" name="fOct" class="my_message" required>
										<label>November:</label>	
										<input type="text" class="input-block-level" Placeholder="Quantity" name="fNov" class="my_message" required>
										<label>December:</label>
										<input type="text" class="input-block-level" Placeholder="Quantity" name="fDec" class="my_message" required>
									</div>
								</form>
						
								<script>
								jQuery(document).ready(function($){
									$("#save_form").submit(function(e){
										e.preventDefault();
										var _this = $(e.target);
										var formData = $(this).serialize();
										$.ajax({
											type: "POST",
											url: "ppmp_save.php",
											data: formData,
											success: function(html){
												$.jGrowl("Project Procurement Management Plan Successfully  Added", { header: 'Project Procurement Management Plan Added' });
												window.location = 'ppmp.php';  
											}
										});
									});
								});
								</script>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
			<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>	
</html>