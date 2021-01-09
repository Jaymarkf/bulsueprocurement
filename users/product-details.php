<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php include('session.php'); ?>
<?php
	$prodID = $_GET['prodid'];
	if(!empty($prodID)){
		$sqlSelectSpecProd = mysqli_query($conn,"select * from tbl_item_details where itemdetailID = '$prodID'") ;
		$getProdInfo = mysqli_fetch_array($sqlSelectSpecProd);
		
		$prodprice = $getProdInfo["PriceCatalogue"];
		$produom = $getProdInfo["UnitOfMeasurement"];
		$proddesc = $getProdInfo["itemdetailDesc"];
	} else{
		header('location:dashboard.php'); 
	}
?>

    <body >
    <?php include('navbar.php');
    ?>
        <div class="container-fluid" id="">
            <div class="row-fluid">
			<div class="span12" id="content">
				<div class="span12" id="content">
				<div class="row-fluid">
				
				<?php
					//$query = mysqli_query($conn,"SELECT * FROM tbl_year");
					$query = mysqli_query($conn,"SELECT * FROM users WHERE user_id='$session_id'");
					while($row = mysqli_fetch_array($query)) {
					$Year = $row['Year'];
					}
					$query1= mysqli_query($conn,"select * from tbl_ppmp WHERE Year = $Year AND user_id='$session_id' AND Status = 'Pending'");
					$count1 = mysqli_num_rows($query1);
				?>
				<div class="span12" id="content">
					<div class="span5" id="content">
					<div class="row-fluid">
						<a href="year.php" class="pull-left" data-placement="right" title="Click to Change the year" id="yearbtn"><div class="pull-left"><h3 style="color:#ffa500;background-color:rgba(295,235,215,0.8);padding:3px 20px;border-radius:50px;"> PPMP Year: <?php echo $Year; ?></h3></div></a>
							<script type="text/javascript">
								$(document).ready(function(){
									$('#yearbtn').tooltip('show');
									$('#yearbtn').tooltip('hide');
								});
							</script>
					</div>
				</div>
					<div class="span7" id="">
						<?php if ($count1 == "0") { ?>
							<div class="row-fluid">
								<a href="#" class="btn btn-default pull-right"><i class="icon-shopping-cart icon-large"></i> PPMP Cart<br/><span class="badge badge-info"><?php  echo $count1;  ?></span></a>
							</div>
						<?php }else{ ?>
							<div class="row-fluid">
								<a href="ppmp.php" class="btn btn-default pull-right"><i class="icon-shopping-cart icon-large"></i> PPMP Cart<br/><span class="badge badge-info"><?php  echo $count1;  ?></span></a>
							</div>
						<?php } ?>
					</div>
				</div>
				</div>
				</div>
			</div>
			<div class="span12" id="content">
				<div class="span3" id="content">						
                    <div class="row-fluid">
						<?php include('side-navbar.php') ?>
					</div>
				</div>
                <div class="span9" id="content">						
                    <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-tags icon-large"></i>Order Item Details</div>
                            </div>						

							<div class="block-content collapse in">
								
								<form id="add_item_to_cart" method="POST">
									<div class="control-group">
										<div class="controls">
										<h2>Order Item Details</h2>
										</div>
									</div>
									
									<div class="control-group">
										<div class="controls">
										<div class="span6">
											<?php
												$session_id = $_SESSION['member_id'];
												//$result = mysqli_query($conn,"select * from tbl_year") ;
												$result = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'") ;
												$row = mysqli_fetch_array($result);
												$year = $row["Year"];
											?>
											<div class="span12">
											<label><b>Year: </b></label>
											<input class="span12" type="text" name="ciYear" value="<?php echo $year; ?>" placeholder = "Year" disabled>
											<input class="span12" type="hidden" name="ciYear" value="<?php echo $year; ?>" placeholder = "Year">
											</div>
											
											<label><b>Description: </b></label>
											<input class="span12" type="text" name="ciDesc" value="<?php echo $proddesc; ?>" placeholder = "Code" disabled>
											<input class="span12" type="hidden" name="ciDesc" value="<?php echo $proddesc; ?>" placeholder = "Code">
																							
											<label><b>Price: </b></label>
											<input class="span12" type="text" name="ciPrice" value="<?php echo $prodprice; ?>" placeholder = "Code" disabled>
											<input class="span12" type="hidden" name="ciPrice" value="<?php echo $prodprice; ?>" placeholder = "Code">
											
											<label><b>Unit of Measurement: </b></label>
											<input class="span12" type="text" name="ciUOM" value="<?php echo $produom; ?>" placeholder = "Code" disabled>
											<input class="span12" type="hidden" name="ciUOM" value="<?php echo $produom; ?>" placeholder = "Code">
											
											
											<?php
												$sqlSelectSpecProd = mysqli_query($conn,"select * from tbl_item_details where itemdetailID = '$prodID'") ;
												if($sqlSelectSpecProd){				
													while($row=mysqli_fetch_array($sqlSelectSpecProd)){
													$itemcategoryID = $row['itemcategoryID'];
													
													$query2 = mysqli_query($conn,"select * from tbl_item_category where itemcategoryID='$itemcategoryID'");
													while($row1= mysqli_fetch_array($query2)){
														$itemCatDesc = $row1['ItemCatDesc'];
														}
													}		
											?>
											
											<label><b>Category: </b></label>
											<input class="span12" type="text" name="ciCategory" value="<?php echo $itemCatDesc; ?>" placeholder = "Code" disabled>
											<input class="span12" type="hidden" name="ciCategory" value="<?php echo $itemCatDesc; ?>" placeholder = "Code">

											<?php
												}
											?>												
										</div><!--/product-information-->
										
										<div class="span6">
											<div class="span12" id="content">
												<div class="span4">
												<label><b>Source of Fund: </b></label>
												<select class="span12" name="ciSOF" required>
													<option>GAA</option>
													<option>Income</option>
													<option>Fiduciary Fund</option>
												</select>
												</div>
												<div class="span8">
												<label><b>Purpose: </b></label>
												<select class="span12" name="ciPurpose" required>
													<option value="" disabled selected>Select your option</option>
													<?php
														//Create query
														$query = "select * from tbl_purpose ORDER BY purpose ASC";
														$result=mysqli_query($conn,$query) or die ("Query Failed: ".mysql_error());
														while ($row=mysqli_fetch_array($result)) {
															$icPurpose=$row['purpose'];
															//echo "<option value=". $icPurpose .">". $icPurpose ."</option>";
															echo "<option>". $icPurpose ."</option>";
														}
													?>											
												</select>
												</div>
											</div>
											
											<div class="span12" id="content">
											<label><b>Schedule/Milestones of Activities: </b></label>
											<div class="span12" id="content">
												<div class="span4">
												<label class="pull-right"><b>Jan: </b><input class="span8 pull-right" name="ciJanQty" placeholder = "0" type="number" min="0" value="0"></label>
												<label class="pull-right"><b>Feb: </b><input class="span8 pull-right" name="ciFebQty" placeholder = "0" type="number" min="0" value="0"></label>
												<label class="pull-right"><b>Mar: </b><input class="span8 pull-right" name="ciMarQty" placeholder = "0" type="number" min="0" value="0"></label>
												<label class="pull-right"><b>Apr: </b><input class="span8 pull-right" name="ciAprQty" placeholder = "0" type="number" min="0" value="0"></label>
												</div>
												<div class="span4">
												<label class="pull-right"><b>May: </b><input class="span8 pull-right" name="ciMayQty" placeholder = "0" type="number" min="0" value="0"></label>
												<label class="pull-right"><b>Jun: </b><input class="span8 pull-right" name="ciJunQty" placeholder = "0" type="number" min="0" value="0"></label>
												<label class="pull-right"><b>Jul: </b><input class="span8 pull-right" name="ciJulQty" placeholder = "0" type="number" min="0" value="0"></label>
												<label class="pull-right"><b>Aug: </b><input class="span8 pull-right" name="ciAugQty" placeholder = "0" type="number" min="0" value="0"></label>
												</div>
												<div class="span4">
												<label class="pull-right"><b>Sep: </b><input class="span8 pull-right" name="ciSepQty" placeholder = "0" type="number" min="0" value="0"></label>
												<label class="pull-right"><b>Oct: </b><input class="span8 pull-right" name="ciOctQty" placeholder = "0" type="number" min="0" value="0"></label>
												<label class="pull-right"><b>Nov: </b><input class="span8 pull-right" name="ciNovQty" placeholder = "0" type="number" min="0" value="0"></label>
												<label class="pull-right"><b>Dec: </b><input class="span8 pull-right" name="ciDecQty" placeholder = "0" type="number" min="0" value="0"></label>
												</div>
											</div>
											</div>
											<div class="span12" id="content">
                                                <label><b>Estimated Budget: </b></label>
                                                <input class="span12" type="text" name="ebudget" placeholder="0" required>
                                            </div>
											<div class="span12" id="content">
												<div class="span2">
												<label><b>Priority: </b></label>
												<select class="span12" name="ciPriority" required>
													<option>No</option>
													<option>Yes</option>
												</select>
												</div>
												<div class="span10">
													<label><b>Remarks: </b></label>
													<input class="span12" type="text" name="ciRemarks">
												</div>
											</div>
										</div><!--/product-information-->
									</div>

									<div class="span12"  id="content">
										<button  data-placement="right" title="Click to Add Item in PPMP Cart Lists" id="save" name="save" class="btn btn-success"><i class="icon-shopping-cart icon-large"></i> Add to PPMP Cart Lists </button>
											<script type="text/javascript">
											$(document).ready(function(){
												$('#save').tooltip('show');
												$('#save').tooltip('hide');
											});
											</script>
										<a href="dashboard.php" data-placement="right" title="Click to cancel adding item" id="cancel" name="cancel" class="btn btn-danger"><i class="icon-undo icon-large"></i> Cancel </a>
											<script type="text/javascript">
											$(document).ready(function(){
												$('#cancel').tooltip('show');
												$('#cancel').tooltip('hide');
											});
											</script>
									</div>
									</div>
									</div>
								</form>
								
							</div>
					
                        <!-- /block -->
						<script>
							jQuery(document).ready(function($){
								$("#add_item_to_cart").submit(function(e){
									e.preventDefault();
									var _this = $(e.target);
									var formData = $(this).serialize();
									$.ajax({
										type: "POST",
										url: "product-details-save.php<?php if(isset($_GET['prodid'])){ echo '?prodid='. $_GET['prodid']; }?>",
										data: formData,
										success: function(b){
										  //  console.log(b);
											$.jGrowl("Item successfully added to cart!", { header: 'SUCCESS' });
											var delay = 1000;
                                            setTimeout(function(){ window.location = 'dashboard.php'  }, delay);
										
										    
										}
									});
								});
							});
						</script>
						
                    </div>
                    </div>
                
                </div>
            </div>
			</div>
    
         <?php include('footer.php'); ?>
		 
        </div>
	<?php include('script.php'); ?>
    </body>
</html>