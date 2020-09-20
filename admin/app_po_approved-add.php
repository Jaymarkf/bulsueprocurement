<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php
//	if(isset($_POST['btn-save-item'])){
//		$item = $_POST['itemDesc'];
//		$year = $_POST['Year'];
//		$PO = $_POST['PO'];
//
//		$count = sizeof($item);
//		for ($i=0;$i<$count;$i++){
//			$in_item = $item[$i];
//			//$in_UOM = $UOM[$i];
//			//$in_STQty = $STQty[$i];
//			//$in_PriceCat = $PriceCat[$i];
//			//$in_TAmt = $TAmt[$i];
////			$qry = mysqli_query($conn,"SELECT * FROM tbl_ppmp_consolidated WHERE itemdetailDesc='$in_item'");
//
//            $qry = mysqli_query($conn,"select sum(".Date('M').") as TotalQty,Status,ItemCatDesc,itemdetailDesc
//                                                ,UnitOfMeasurement,
//                                                PriceCatalogue,(sum(".Date('M').") * PriceCatalogue) as TotalAmount
//                                                from tbl_ppmp
//                                                where itemdetailDesc = '$in_item' and Status = 'Completed'
//                                                group by Status,ItemCatDesc,itemdetailDesc,PriceCatalogue,UnitOfMeasurement");
//			while($row = mysqli_fetch_array($qry)){
//				$in_UOM = $row['UnitOfMeasurement'];
//				$in_STQty = $row['TotalQty'];
//				$in_PriceCat = $row['PriceCatalogue'];
//				$in_TAmt = $row['TotalAmount'];
//
//				 mysqli_query($conn,"INSERT INTO tbl_po_items (Year,POno,Unit,ItemDescription,Quantity,UnitCost,TotalCost)
//				 values('$year','$PO','$in_UOM','$in_item','$in_STQty','$in_PriceCat','$in_TAmt')");
//			}
//			 //mysqli_query($conn,"UPDATE tbl_ppmp_consolidated SET Requested = 'Yes' WHERE itemdetailDesc = '$in_item' ");
//		}
//	}


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
				<!-- PR DETAILS -->
				<form name="prform" method="POST" id="savePO">
<!--				<div class="span12" id="content" style="background-color: #f9f9f9; padding:10px; border:5px solid #f1f1f1; box-shadow: 0px 0px 10px #000;position:relative;width:300px;margin:0px auto;">-->
<!--						<div class="row-fluid span4">-->
<!--							<div>-->
<!--                                <label class="span4"><b>P.O. No.:</b></label>-->
<!--                                <select class="span6 form-control"  name="ciPOno">-->
<!--                                    <option style="display:none" hidden selected>Select  Purchase No#</option>-->
<!--                                    --><?php
//                                        $qq  = "select pr_num_merge as g from tbl_pr_items group by pr_num_merge";
//                                        $d = $conn->query($qq);
//                                        while($row = $d->fetch_assoc()){
//                                            ?>
<!--                                            <option value="--><?//=$row['g']?><!--">--><?//=$row['g']?><!--</option>-->
<!--                                            --><?php
//                                        }
//                                    ?>
<!--                                </select>-->
<!--							</div>-->
<!--							-->
<!--							<div>-->
<!--							--><?php
//								date_default_timezone_set("Asia/Manila");
//								$now=date('Y-m-d');
//							?>
<!--								<label class="span4"><b>Date:</b></label><input class="span6" type="date" name="ciPODate" value="--><?php //echo $now; ?><!--" Required />-->
<!--							</div>-->
<!---->
<!--							<div>-->
<!--								<label class="span4"><b>Mode of Payment:</b></label>-->
<!--								<!-- <input class="span8" type="text" name="ciMOP" Required /> -->-->
<!--								<select name="ciMOP" placeholder = "Select Mode of Payment" class="span6" required>-->
<!--									<option value="" disabled selected>Select your option</option>-->
<!--									<option value="Check and Carry">Check and Carry</option>-->
<!--									<option value="Government Terms">Government Terms</option>-->
<!--								</select>-->
<!--							</div>-->
<!--							<div class="span4">-->
<!--
<!--							</div>							-->
<!--						</div>-->
<!---->
<!--					</div>-->
<!--				</form>-->
                    <div class="row-fluid">
                        <div style="position:relative;padding:10px;width:350px;margin:10px auto;background-color: #f9f9f9;border:5px solid #f1f1f1; box-shadow: 0px 0px 10px #000">
                            <div class="row-fluid">
                                <label style="float:left;line-height:40px;"><b>P.O. No.: &nbsp;&nbsp;</b></label>
                                <select class="span8 text-left form-control"  name="ciPOno">-->
                                    <option style="display:none" hidden selected>Select  Purchase No#</option>
                                    <?php
                                    $qq  = "select pr_num_merge as g from tbl_pr_items group by pr_num_merge";
                                    $d = $conn->query($qq);
                                    while($row = $d->fetch_assoc()){
                                        ?>
                                        <option value="<?=$row['g']?>"><?=$row['g']?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="row-fluid">
                                <label style="float:left;line-height:35px;margin-left:21px;"><b>Date: &nbsp;&nbsp;</b></label>
                                <?php
                                date_default_timezone_set("Asia/Manila");
                                $now=date('Y-m-d');
                             	?>
                                <input class="span6 form-control" style="max-width: 225px;width:100%;" type="date" name="ciPODate" value="<?php echo $now; ?>" Required />
                            </div>
                            <div class="row-fluid">
                                <div>
                                    <label style="float:left;line-height:35px;"><b>Mode of Payment: &nbsp;&nbsp;</b></label>
                                    <select name="ciMOP" placeholder = "Select Mode of Payment" class="span6 form-control;" required>
                                        <option value="" disabled selected>Select your option</option>
                                        <option value="Check and Carry">Check and Carry</option>
                                        <option value="Government Terms">Government Terms</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="ciYear" value="<?php echo $Year1;?>"/>
                            

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

		//automate supplier info
        $('#selsupplier').change(function(){
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: '../ajaxPOST/post_data.php',
                data: {id:id},
                dataType:'json',
                success:function(e){
                    $('#iaddress').val(e.address);
                    $('#iemail').val(e.email);
                    $('#icontact').val(e.contact);
                    $('#itin').val(e.tin);
                }
            });


        });

	});
</script>
	
</html>