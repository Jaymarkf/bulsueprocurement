<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php

	if(isset($_POST['btn-save-item'])){
		if(isset($_POST['itemDesc'])){
			$item = $_POST['itemDesc'];
			$year = $_POST['Year'];
			$PR = $_POST['PR'];
			
				$count = sizeof($item);
				for ($i=0;$i<$count;$i++){
					$in_item = $item[$i];

					//$qry = mysqli_query($conn,"SELECT * FROM tbl_ppmp_consolidated WHERE itemdetailDesc='$in_item'");
					$qry = mysqli_query($conn,"SELECT * FROM tbl_ppmp WHERE itemdetailDesc='$in_item' AND user_id = '$session_id'");
					while($row = mysqli_fetch_array($qry)){
						$euu = $row['EndUserUnit']; //para sa particular na user lang ang hahanapin nya
						$in_UOM = $row['UnitOfMeasurement'];
						$in_STQty = $row['TotalQty'];
						$in_PriceCat = $row['PriceCatalogue'];
						$in_TAmt = $row['TotalAmount'];
					}	 
						mysqli_query($conn,"INSERT INTO tbl_pr_items (Year,PRno,Unit,ItemDescription,Quantity,UnitCost,TotalCost)
						values('$year','$PR','$in_UOM','$in_item','$in_STQty','$in_PriceCat','$in_TAmt')");
					//}
					//mysqli_query($conn,"UPDATE tbl_ppmp_consolidated SET Requested = 'Yes' WHERE itemdetailDesc = '$in_item' ");
				}
		}
	}
?>
    <body >
		<?php include('navdisabled.php'); ?>					
        <div class="container-fluid">
            <div class="row-fluid">
				
				<!-- top content -->
				<div class="span12" id="content">
					<div class="row-fluid">
						<div class="pull-left">
							<h3>NEW PURCHASE REQUEST</h3>
							<i class="icon-calendar icon-large"></i>
							<?php
								$Today=date('y:m:d');
								$new=date('l, F d, Y',strtotime($Today));
								echo $new;
							?>
						</div>

						<?php
							$query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
								while($row = mysqli_fetch_array($query)) {
								$Year = $row['Year'];
								//$uname = $fname.'.'.$lname;
								$username = $row['username'] ;
							}
						?>
						<div class="pull-right" style="color:#ffa500;background-color:rgba(295,235,215,0.8);padding:3px 20px;border-radius:50px;"><h3><?php echo 'Year: '.$Year; ?></h3></div>
							<script type="text/javascript">
								$(document).ready(function(){
									$('#yearbtn').tooltip('show');
									$('#yearbtn').tooltip('hide');
								});
							</script>
					</div>
					<br/>			
				</div>
				<!-- top content -->

				<?php					
					$query1 = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
					while($row1 = mysqli_fetch_array($query1)) {
					$Year1 = $row1['Year'];
					$EntityName1 = $row1['branch'];
					
						//$query2 = mysqli_query($conn,"SELECT * FROM tbl_pr WHERE Year = $Year1");
						$query2 = mysqli_query($conn,"SELECT * FROM tbl_pr");
						while($row2 = mysqli_fetch_array($query2)){
						$id2 = $row2['prID'];
						$PRno = $row2['PRno'];
						
						date_default_timezone_set("Asia/Manila");
						$now=date('Y-m-d');
						
						$queryMax = mysqli_query($conn,"SELECT Max(PRno) as PR FROM tbl_pr WHERE (PRno != '' OR PRno IS NOT NULL)");
						$rowMax = mysqli_fetch_array($queryMax);
						
						//if( $result['total']==0)
						if ($rowMax['PR'] != ''  OR $rowMax['PR'] != NULL){
							$temPR = $rowMax['PR']+1;
							$PR = sprintf("%04d", $temPR);
						//	break;
						//}else{
						//	$PR = 0001;
						//	//$PR = sprintf("%04d", $temPR);
						//	break;
						}
			
						}
					}
				?>
				<!-- PR DETAILS -->
				<form name="prform" method="POST" id="savePR">
					<div class="span12" id="content" style="background-color: #f9f9f9; padding:10px; border:5px solid #f1f1f1; box-shadow: 0px 0px 10px #000">
						<div class="row-fluid">
							<div class="span4">
								<label class="span4"><b>P.R. No.:</b></label><input class="span8" type="text" name="ciPRno" value="<?php echo $PR; ?>" Required />
							</div>
								
							<div class="span4">
								<input type="hidden" name="ciYear" value="<?php echo $Year1;?>"/>
							</div>
							
							<div class="span4">
								<label class="span4"><b>Date:</b></label><input class="span8" type="date" name="ciPRDate" value="<?php echo $now; ?>" Required />
							</div>
						</div>
						
						<div class="row-fluid">
							<div class="span4">
								<label class="span4"><b>Entity Name:</b></label><input class="span8" type="text" name="ciEntityName" value="<?php echo $EntityName1; ?>" Required />
							</div>
							
							<div class="span4">
								<!-- <label class="span4"><b>Office/Section:</b></label><input class="span8" type="text" name="ciOfficeSection" value="Budget Office" Required /> -->
							</div>
												
							<div class="span4">
								<label class="span4"><b>Requested by:</b></label><input class="span8" type="text" name="ciRequestBy" value="<?php echo $username; ?>" Required />
							</div>
						</div>

						<div class="row-fluid">
							<div class="pull-left">
								<!-- BUTTON SAVE AND CANCEL HERE-->
								<?php
									$hanap = mysqli_query($conn,"SELECT * FROM tbl_pr_items WHERE Year = '$Year' AND PRno = '$PR'");
									$bilang = mysqli_num_rows($hanap);
									if ($bilang > 0 ){
								?>
									<button  data-placement="top" title="Click to Save" id="save" name="save" class="btn btn-success"><i class="icon-save icon-large"></i> Save</button>
											<script type="text/javascript">
											$(document).ready(function(){
												$('#save').tooltip('show');
												$('#save').tooltip('hide');
											});
											</script>
									<?php }else{ ?>
									<a  data-placement="top" title="Disabled" id="save" name="save" class="btn btn-default"><i class="icon-save icon-large"></i> Save</a>
											<script type="text/javascript">
											$(document).ready(function(){
												$('#save').tooltip('show');
												$('#save').tooltip('hide');
											});
											</script>
								<?php } ?>
								
								<a href="pr_approved-cancel.php<?php echo '?id='.$PR; ?>" name="cancel" title="Cancel new purchase request" id="cancel" data-placement="top" class="btn btn-danger"><i class="icon-save icon-large"></i> Cancel </a>
									<script type="text/javascript">
										$(document).ready(function(){
											$('#cancel').tooltip('show');
											$('#cancel').tooltip('hide');
										});
									</script>
							</div>
														
							<div class="pull-right">
								<button class="btn btn-info" data-toggle="modal" data-target="#additems"><i class="icon-plus-sign icon-large"></i> Add New Record</button>
							</div>
						</div>
					</div>
				</form>
				<!-- PR DETAILS -->	
				
				<!-- PR ITEMS MODAL ADD -->
				<?php //include('app_pr_approved-modal-add-item.php'); ?>
				<?php include('pr_modal-add-item.php'); ?>
				<!-- PR ITEMS MODAL ADD -->
				
                <div class="span12" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
						
						<?php
							if(isset($_GET['year'])){
								$year = $_GET['year'];
							}
							
							$query1 = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
							while($row1 = mysqli_fetch_array($query1)) {
								$Year1 = $row1['Year'];
								$user_id1 = $row1['user_id'];
							}
							
							$query2 = mysqli_query($conn,"SELECT * FROM tbl_pr_items WHERE Year = '$Year' AND PRno = '$PR'");
							$count2 = mysqli_num_rows($query2);
						?>
						
                            <div class="navbar navbar-inner block-header">
								<div class="muted pull-left"><i class="icon-save icon-large"></i> ITEMS </div>
                                <div class="muted pull-right">
									Total Items(s): <span class="badge badge-info"><?php  echo $count2;  ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
								<div class="span12" id="studentTableDiv">
									
									<?php //include('app_pr_approved-add_table.php'); ?>
									<?php include('pr_approved-add_table.php'); ?>

                                </div>
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

<script>
	jQuery(document).ready(function($){
		$("#savePR").submit(function(e){
			e.preventDefault();
			var _this = $(e.target);
			var formData = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "pr_approved-save.php",
				data: formData,
				success: function(html){
					$.jGrowl("New purchase request is successfully added", { header: 'SUCCESS' });
					var delay = 3000;
					setTimeout(function(){ window.location = 'pr.php'  }, delay);
				}
			});
		});
	});
</script>
	
</html>