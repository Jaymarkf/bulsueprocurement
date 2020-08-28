<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php
	if(isset($_POST['btn-save-item'])){
		$item = $_POST['itemDesc'];
		$year = $_POST['Year'];
		$PO = $_POST['PO'];
		
		$count = sizeof($item);
		for ($i=0;$i<$count;$i++){
			$in_item = $item[$i];
			//$in_UOM = $UOM[$i];
			//$in_STQty = $STQty[$i];
			//$in_PriceCat = $PriceCat[$i];
			//$in_TAmt = $TAmt[$i];
//			$qry = mysqli_query($conn,"SELECT * FROM tbl_ppmp_consolidated WHERE itemdetailDesc='$in_item'");

            $qry = mysqli_query($conn,"select sum(".Date('M').") as TotalQty,Status,ItemCatDesc,itemdetailDesc
                                                ,UnitOfMeasurement,
                                                PriceCatalogue,(sum(".Date('M').") * PriceCatalogue) as TotalAmount
                                                from tbl_ppmp
                                                where itemdetailDesc = '$in_item' and Status = 'Completed'
                                                group by Status,ItemCatDesc,itemdetailDesc,PriceCatalogue,UnitOfMeasurement");
			while($row = mysqli_fetch_array($qry)){
				$in_UOM = $row['UnitOfMeasurement'];
				$in_STQty = $row['TotalQty'];
				$in_PriceCat = $row['PriceCatalogue'];
				$in_TAmt = $row['TotalAmount'];
				 
				 mysqli_query($conn,"INSERT INTO tbl_po_items (Year,POno,Unit,ItemDescription,Quantity,UnitCost,TotalCost)
				 values('$year','$PO','$in_UOM','$in_item','$in_STQty','$in_PriceCat','$in_TAmt')");
			} 
			 //mysqli_query($conn,"UPDATE tbl_ppmp_consolidated SET Requested = 'Yes' WHERE itemdetailDesc = '$in_item' ");
		}
	}
?>
    <body >
		<?php include('navbar.php'); ?>					
        <div class="container-fluid">
            <div class="row-fluid">
				
				<!-- top content -->
				<div class="span12" id="content">
					<div class="row-fluid">
						<div class="pull-left">
							<h3>NEW PURCHASE ORDER</h3>
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
								//$username = $row['firstname'].' '.$row['lastname'] ;
								$username = $row['username'] ;
							}
						?>
						<a href="year.php" class="pull-right" data-placement="left" title="Click to Change the year" id="yearbtn"><div style="color:#ffa500;background-color:rgba(295,235,215,0.8);padding:3px 20px;border-radius:50px;"><h3><?php echo 'Year: '.$Year; ?></h3></div></a>
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
					
						//$query2 = mysqli_query($conn,"SELECT * FROM tbl_po WHERE Year = $Year1");
						$query2 = mysqli_query($conn,"SELECT * FROM tbl_po");
						while($row2 = mysqli_fetch_array($query2)){
						$id2 = $row2['poID'];
						$POno = $row2['POno'];
						//$now=date('m/d/Y');
						
						$queryMax = mysqli_query($conn,"SELECT Max(POno) as PO FROM tbl_po WHERE (POno != '' OR POno IS NOT NULL)");
						$rowMax = mysqli_fetch_array($queryMax);
						
						//if( $result['total']==0)
						if ($rowMax['PO'] != ''  OR $rowMax['PO'] != NULL){
							$temPO = $rowMax['PO']+1;
							$PO = sprintf("%04d", $temPO);
						//	break;
						//}else{
						//	$PO = 0001;
						//	//$PO = sprintf("%04d", $temPR);
						//	break;
						}
			
						}
					}
				?>
				<!-- PR DETAILS -->
				<form name="prform" method="POST" id="savePO">
					<div class="span12" id="content" style="background-color: #f9f9f9; padding:10px; border:5px solid #f1f1f1; box-shadow: 0px 0px 10px #000">
						<div class="row-fluid span4">
							<h4 class="badge-warning" style="padding:5px;">Add an item first before filling up this portion...</h4>
							<div>
								<label class="span4"><b>P.O. No.:</b></label><input class="span6" type="text" name="ciPOno" value="<?php echo $PO; ?>" Required />
							</div>
							
							<div>
							<?php
								date_default_timezone_set("Asia/Manila");						
								$now=date('Y-m-d');
							?>
								<label class="span4"><b>Date:</b></label><input class="span6" type="date" name="ciPODate" value="<?php echo $now; ?>" Required />
							</div>

							<div>
								<label class="span4"><b>Mode of Payment:</b></label>
								<!-- <input class="span8" type="text" name="ciMOP" Required /> -->
								<select name="ciMOP" placeholder = "Select Mode of Payment" class="span6" required>
									<option value="" disabled selected>Select your option</option>
									<option value="Check and Carry">Check and Carry</option>
									<option value="Government Terms">Government Terms</option>
								</select>
							</div>
							
							<div class="span4">
								<input type="hidden" name="ciYear" value="<?php echo $Year1;?>"/>
							</div>							
						</div>
						
						<div class="row-fluid span8">
							<div>
								<label class="span2"><b>Supplier:</b></label>
								<!-- <input class="span10" type="text" name="ciPRno" value="<?php echo $PO; ?>" Required /> -->
								<input class="span10" type="text" name="ciSupplier" Required />
							</div>
							
							<div>
								<label class="span2"><b>Address:</b></label>
								<input class="span10" type="text" name="ciAddress" Required />
							</div>

							<div>
								<label class="span2"><b>E-Mail:</b></label>
								<input class="span10" type="text" name="ciEmail" Required />
							</div>
							
							<div>
								<label class="span2"><b>Tel/Cell No.:</b></label>
								<input class="span10" type="text" name="ciContactNo" Required />
							</div>
							
							<div>
								<label class="span2"><b>TIN:</b></label>
								<input class="span10" type="text" name="ciTIN" Required />
							</div>
						</div>
						
						<div class="row-fluid span12" id="content">
							<div class="pull-left">
								<button  data-placement="top" title="Click to Save" id="save" name="save" class="btn btn-success"><i class="icon-save icon-large"></i> Save</button>
										<script type="text/javascript">
										$(document).ready(function(){
											$('#save').tooltip('show');
											$('#save').tooltip('hide');
										});
										</script>
								
								<a href="app_po_approved-cancel.php<?php echo '?id='.$PO; ?>" name="cancel" title="Cancel new purchase request" id="cancel" data-placement="top" class="btn btn-danger"><i class="icon-cancel-save icon-large"></i> Cancel </a>
									<script type="text/javascript">
										$(document).ready(function(){
											$('#cancel').tooltip('show');
											$('#cancel').tooltip('hide');
										});
									</script>
							</div>
														
							<div class="pull-right">
								<button class="btn btn-info" data-toggle="modal" data-target="#additems"><i class="icon-plus-sign icon-large"></i> Add Item</button>
							</div>
						</div>
					</div>
				</form>
				<!-- PR DETAILS -->	
				
				<!-- PR ITEMS MODAL ADD -->
				<?php include('app_po_approved-modal-add-item.php'); ?>
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
							
							$query2 = mysqli_query($conn,"SELECT * FROM tbl_pr_items WHERE Year = '$Year' AND PRno = '$PO'");
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
									
									<?php include('app_po_approved-add_table.php'); ?>

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
		$("#savePO").submit(function(e){
			e.preventDefault();
			var _this = $(e.target);
			var formData = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "app_po_approved-save.php",
				data: formData,
				success: function(html){
					$.jGrowl("New purchase request is successfully added", { header: 'SUCCESS' });
					var delay = 3000;
					setTimeout(function(){ window.location = 'app_po_approved.php'  }, delay);
				}
			});
		});
	});
</script>
	
</html>