<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php
	$prodID = $_GET['id'];
	$branchID = $_GET['branchid'];
	if(!empty($prodID)){
		$sqlSelectSpecProd = mysql_query("SELECT * FROM tbl_ppmp where ppmpID = '$prodID'") or die(mysql_error());
		$getProdInfo = mysql_fetch_array($sqlSelectSpecProd);
		$prodcat = $getProdInfo["ItemCatDesc"];
		$prodprice = $getProdInfo["PriceCatalogue"];
		$produom = $getProdInfo["UnitOfMeasurement"];
		$proddesc = $getProdInfo["itemdetailDesc"];
		$prodSOF = $getProdInfo["SourceOfFund"];
		$prodPurpose = $getProdInfo["purpose"];
		$prodJan = $getProdInfo["Jan"];
		$prodFeb = $getProdInfo["Feb"];
		$prodMar = $getProdInfo["Mar"];
		$prodApr = $getProdInfo["Apr"];
		$prodMay = $getProdInfo["May"];
		$prodJun = $getProdInfo["Jun"];
		$prodJul = $getProdInfo["Jul"];
		$prodAug = $getProdInfo["Aug"];
		$prodSep = $getProdInfo["Sep"];
		$prodOct = $getProdInfo["Oct"];
		$prodNov = $getProdInfo["Nov"];
		$prodDec = $getProdInfo["Dec"];
		$prodPrio = $getProdInfo["Priority"];
		$prodRem = $getProdInfo["Remarks"];
	} else{
		header('location:dashboard.php'); 
	}
?>

    <body >
		<?php include('navbar.php') ?>
        <div class="container-fluid" id="">
            <div class="row-fluid">
			<div class="span12" id="content">
				<div class="span12" id="content">
				<div class="row-fluid">
				
				<?php
					$query = mysql_query("SELECT * FROM users WHERE user_id='$session_id'")or die(mysql_error());
					while($row = mysql_fetch_array($query)) {
					$Year = $row['Year'];
					}
				?>
				<div class="span12" id="content">
					<div class="span5" id="content">
						<div class="row-fluid">
							<h3 class="pull-left" style="color:#ffa500;background-color:rgba(295,235,215,0.8);padding:3px 20px;border-radius:50px;"> PPMP Year: <?php echo $Year; ?></h3>
						</div>
					</div>
				</div>
				</div>
				</div>
			</div>
			<div class="span12" id="content">

                <div class="span12" id="content">						
                    <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-tags icon-large"></i><a href="dashboard.php" class="muted"> UPDATE Item Details</a></div>
                            </div>						

							<div class="block-content collapse in">
								<form id="save_update" method="POST" name="saveUPDATE">
									<div class="control-group">
										<div class="controls">
											<div class="span6" id="content">
												<div >
													<h2>UPDATE Item Details</h2>
												</div>
											</div>
											<div class="span6">
												<div >
												<h2>EndUser/Unit: <?php echo $branchID; ?></h2>
												</div>
											</div>
										</div>
									</div>

									<div class="control-group">
										<div class="controls">
										<div class="span6">
											<?php
												$result = mysql_query("SELECT * FROM users WHERE user_id = '$session_id'") or die(mysql_error());
												$row = mysql_fetch_array($result);
												$year = $row["Year"];
											?>
											<label><b>Year: </b></label>
											<input class="span12" type="text" name="ciYear" value="<?php echo $year; ?>" placeholder = "Year" type="text" disabled>
											
											<label><b>Description: </b></label>
											<input class="span12" type="text" name="ciDesc" value="<?php echo $proddesc; ?>" placeholder = "Code" type="text" disabled>
																							
											<label><b>Price: </b></label>
											<input class="span12" type="text" name="ciPrice" value="<?php echo $prodprice; ?>" placeholder = "Code" type="text" disabled>
											<!-- <input class="span12" type="hidden" name="ciPrice" value="<?php echo $prodprice; ?>" placeholder = "Code" type="text"> -->
											
											<label><b>Unit of Measurement: </b></label>
											<input class="span12" type="text" name="ciUOM" value="<?php echo $produom; ?>" placeholder = "Code" type="text" disabled>
																						
											<label><b>Category: </b></label>
											<input class="span12" type="text" name="ciCategory" value="<?php echo $prodcat; ?>" placeholder = "Category" type="text" disabled>
										
										</div><!--/product-information-->
										
										<div class="span6">											
											<div class="span12" id="content">
												<div class="span4">
													<label><b>Source of Fund: </b></label>
														<select class="span12" name="ciSOF" required>
															<option><?php echo $prodSOF; ?></option>
															<option>GAA</option>
															<option>Income</option>
															<option>Fiduciary Fund</option>
														</select>
												</div>
												<div class="span8">
												<label><b>Purpose: </b></label>
												<select class="span12" name="ciPurpose" required>
													<option><?php echo $prodPurpose; ?></option>
													<?php
														//Create query
														$query = "select * from tbl_purpose";
														$result=mysql_query($query) or die ("Query Failed: ".mysql_error());
														while ($row=mysql_fetch_array($result)) {
															$icPurpose=$row['purpose'];
															echo "<option>". $icPurpose ."</option>";
														}
													?>											
												</select>
												</div>
											</div>
																						
											<label><b>Schedule/Milestones of Activities: </b></label>
											<div class="span12" id="content">
												<div class="span4">
												<label class="pull-right"><b>Jan: </b><input class="span8 pull-right" name="ciJanQty" placeholder = "0" type="number" min="0" value="<?php echo $prodJan; ?>" required></label>
												<label class="pull-right"><b>Feb: </b><input class="span8 pull-right" name="ciFebQty" placeholder = "0" type="number" min="0" value="<?php echo $prodFeb; ?>" required></label>
												<label class="pull-right"><b>Mar: </b><input class="span8 pull-right" name="ciMarQty" placeholder = "0" type="number" min="0" value="<?php echo $prodMar; ?>" required></label>
												<label class="pull-right"><b>Apr: </b><input class="span8 pull-right" name="ciAprQty" placeholder = "0" type="number" min="0" value="<?php echo $prodApr; ?>" required></label>
												</div>
												<div class="span4">
												<label class="pull-right"><b>May: </b><input class="span8 pull-right" name="ciMayQty" placeholder = "0" type="number" min="0" value="<?php echo $prodMay; ?>" required></label>
												<label class="pull-right"><b>Jun: </b><input class="span8 pull-right" name="ciJunQty" placeholder = "0" type="number" min="0" value="<?php echo $prodJun; ?>" required></label>
												<label class="pull-right"><b>Jul: </b><input class="span8 pull-right" name="ciJulQty" placeholder = "0" type="number" min="0" value="<?php echo $prodJul; ?>" required></label>
												<label class="pull-right"><b>Aug: </b><input class="span8 pull-right" name="ciAugQty" placeholder = "0" type="number" min="0" value="<?php echo $prodAug; ?>" required></label>
												</div>
												<div class="span4">
												<label class="pull-right"><b>Sep: </b><input class="span8 pull-right" name="ciSepQty" placeholder = "0" type="number" min="0" value="<?php echo $prodSep; ?>" required></label>
												<label class="pull-right"><b>Oct: </b><input class="span8 pull-right" name="ciOctQty" placeholder = "0" type="number" min="0" value="<?php echo $prodOct; ?>" required></label>
												<label class="pull-right"><b>Nov: </b><input class="span8 pull-right" name="ciNovQty" placeholder = "0" type="number" min="0" value="<?php echo $prodNov; ?>" required></label>
												<label class="pull-right"><b>Dec: </b><input class="span8 pull-right" name="ciDecQty" placeholder = "0" type="number" min="0" value="<?php echo $prodDec; ?>" required></label>
												</div>
												
											<div class="span12" id="content">
												<div class="span2">
													<label><b>Priority: </b></label>
													<select class="span12" name="ciPriority" required>
														<option><?php echo $prodPrio; ?></option>
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
												<div class="span10">
													<label><b>Remarks: </b></label>
													<input class="span12" type="text" name="ciRemarks" value="<?php echo $prodRem; ?>">
												</div>
											</div>
											</div>
										</div><!--/product-information-->
									</div>

									<div class="span12"  id="content">
										<button data-placement="right" title="SAVE update item details" id="save" name="saveUPDATE" class="btn btn-success"><i class="icon-save icon-large"></i> UPDATE item details </button>
											<script type="text/javascript">
											$(document).ready(function(){
												$('#save').tooltip('show');
												$('#save').tooltip('hide');
											});
											</script>
										
										<a href="ppmp_requested.php<?php echo '?id='.$branchID; ?>" data-placement="right" title="Cancel item details UPDATE" id="cancel" name="cancel" class="btn btn-danger"><i class="icon-undo icon-large"></i> CANCEL </a>
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
                    </div>
                    </div>
                
                </div>
            </div>
			</div>
    
         <?php include('footer.php'); ?>
		 
        </div>
	<?php include('script.php'); ?>
    </body>
<?php
date_default_timezone_set('Asia/Manila');
if (isset($_POST['saveUPDATE'])){
	
	$PriceCatalogue = $prodprice;
	
	$purpose = $_POST['ciPurpose'];

	$SOF = $_POST['ciSOF'];
	$Jan = $_POST['ciJanQty'];
	$Feb = $_POST['ciFebQty'];
	$Mar = $_POST['ciMarQty'];
	$Apr = $_POST['ciAprQty'];
	$May = $_POST['ciMayQty'];
	$Jun = $_POST['ciJunQty'];
	$Jul = $_POST['ciJulQty'];
	$Aug = $_POST['ciAugQty'];
	$Sep = $_POST['ciSepQty'];
	$Oct = $_POST['ciOctQty'];
	$Nov = $_POST['ciNovQty'];
	$Dec = $_POST['ciDecQty'];
	$Prio = $_POST['ciPriority'];
	$Rem = $_POST['ciRemarks'];

	$TQtyMonth = ($Jan+$Feb+$Mar+$Apr+$May+$Jun+$Jul+$Aug+$Sep+$Oct+$Nov+$Dec);
	$TotalAmount = ($PriceCatalogue * $TQtyMonth);
	
	mysql_query("UPDATE tbl_ppmp SET `SourceOfFund`='$SOF',`purpose`='$purpose',`Jan`='$Jan',`Feb`='$Feb',`Mar`='$Mar',
	`Apr`='$Apr',`May`='$May',`Jun`='$Jun',`Jul`='$Jul',`Aug`='$Aug',`Sep`='$Sep',`Oct`='$Oct',
	`Nov`='$Nov',`Dec`='$Dec',`TotalQty`='$TQtyMonth',`TotalAmount`='$TotalAmount',`Priority`='$Prio',`Remarks`='$Rem' WHERE ppmpID = '$prodID'")or die(mysql_error());

	$query= mysql_query("SELECT * FROM users WHERE user_id = '$session_id'")or die(mysql_error());
	$row = mysql_fetch_array($query);
	$fname = $row['firstname'];
	$lname = $row['lastname'];
	$user_username = $fname.' '.$lname;
	$itemDetails = $prodcode.' '.$proddesc;
	
//	mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Update item details $itemDetails')")or die(mysql_error());
?>
<script>
	$.ajax({
		success: function(html){
			$.jGrowl("Item details successfully UPDATED!", { header: 'SUCCESS' });
			var delay = 1500;
			setTimeout(function(){ window.location = 'ppmp_requested.php<?php echo '?id='.$branchID; ?>'  }, delay);
		}
	});
</script>
<?php
	}
?>
</html>