<?php include('header.php'); ?>
<?php include('session.php'); ?>
<style>
    #container-bottom{
        width:calc(100% - 10px);
        margin:0px auto;
        position:relative;
        border:1px solid red;

    }
    #header{
        width:100%;
        position:relative;
        height:40px;
        background-color: darkslateblue;
        color:white;
        line-height:40px;
        font-weight: bold;
        font-size:20px;
        font-family: "Courier New", Courier, monospace;
    }
    .fonts{
        font-size:19px;
        font-family:   'Microsoft Sans Serif', Tahoma, Arial, Verdana, Sans-Serif;
        font-weight: bold;
        color: #898888;
    }
    .pads{
        padding:10px;
        padding-left:20px;
    }
</style>
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
    <body>
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
                <div class="row-fluid">
                    <a  href="app_po_approved.php" class="btn btn-medium btn-info"><i class="icon icon-circle-arrow-left"></i> Back</a>
                </div>
				<form method="POST" id="savePO">
                    <hr>
                    <hr>
                    <hr>
                    <div class="row-fluid">
                        <div style="position:relative;padding:10px;width:350px;margin:10px auto;background-color: #f9f9f9;border:5px solid #f1f1f1; box-shadow: 0px 0px 10px #000">
                            <div class="row-fluid">
                                <label style="float:left;line-height:40px;"><b>P.O. No.: &nbsp;&nbsp;</b></label>
                                <select class="span8 text-left form-control"  name="purchase_request_no" id="ipurchase_request_no" required>
                                    <option style="display:none" hidden selected>Select  Purchase No#</option>
                                    <?php
                                    $qq  = "select pr_num_merge as g from tbl_pr_items group by pr_num_merge";
                                    $d = $conn->query($qq);
                                    while($row = $d->fetch_assoc()){
                                        ?>
                                        <option class="options" value="<?=$row['g']?>"><?=$row['g']?></option>
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
                            <input type="hidden" name="year" value="<?php echo $Year;?>"/>
                        </div>
                    </div>
                    <hr>
                    <div class="row-fluid">
                        <div class="container-fluid">
                            <div id="container-bottom">
                                <div id="header" class="text-center row-fluid">
                                   Information of Orders
                                </div>
                                <div class="row-fluid">
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <div class="pads">
                                                <label class="fonts" >Supplier Name: </label>
                                                <input id="isupplier_name" type="text"  class="form-control" name="supplier_name" readonly required>
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="pads">
                                                <label class="fonts" >Address : </label>
                                                <input type="text"   class="form-control" name="address" id="iaddress" readonly required>
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="pads">
                                                <label class="fonts" >Email: </label>
                                                <input type="text" class="form-control" name="email" id="iemail" readonly required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <div class="pads">
                                                <label class="fonts" >Stock Property No: </label>
                                                <input type="text"  class="form-control" name="stock_property_no" id="istock_property_no" readonly required>
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="pads">
                                                <label class="fonts" >Unit: </label>
                                                <input type="text"   class="form-control" name="unit" id="iunit" readonly required>
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="pads">
                                                <label class="fonts" >Item Description: </label>
                                                <input type="text" class="form-control" name="item_description" id="iitem_description" readonly required >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <div class="pads">
                                                <label class="fonts" >Quantity: </label>
                                                <input type="text"  class="form-control" name="quantity" id="iquantity" readonly required>
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="pads">
                                                <label class="fonts" >Unit Cost: </label>
                                                <input type="text"   class="form-control" name="unit_cost" id="iunit_cost" readonly required>
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="pads">
                                                <label class="fonts" >Total Cost: </label>
                                                <input type="text" class="form-control" name="total_cost" id="itotal_cost" readonly required >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="text-right">
                                <input type="hidden" id="hcompany_id" name="hcompany_id"/>
                                <button type="submit" name="submit" class="btn btn-success" style="margin-right:20px;margin-top:20px;"><i class="icon icon-save text-info"></i>&nbsp; Submit</button>
                            </div>
                        </div>
                    </div>
                </form>

		<?php include('footer.php'); ?>
        </div>
<!--            end of container fluid-->
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
				//     console.log(html);
					$.jGrowl("New purchase order is successfully added", { header: 'SUCCESS' });
					var delay = 3000;
					setTimeout(function(){ window.location = 'app_po_approved.php'  }, delay);
				}
			});
		});
	});
	$(document).on("click","#ipurchase_request_no",function(){
            var data = $(this).val();
           $.ajax({
               type: "POST",
               url: "../ajaxPOST/post_data.php",
               data: {data:data},
               dataType: 'json',
               success:function(e){
                   $('#isupplier_name').val(e.company_name);
                   $('#iaddress').val(e.address);
                   $('#iemail').val(e.email);
                   $('#iunit').val(e.unit);
                   $('#iitem_description').val(e.item_description);
                   $('#iquantity').val(e.quantity);
                   $('#iunit_cost').val(e.unit_cost);
                   $('#itotal_cost').val(e.total_cost);
                   var stock_property_no = generateRandomString(5);
                   $('#istock_property_no').val(stock_property_no);
                   $('#hcompany_id').val(e.company_id);
               }
           });
    });
    function generateRandomString(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }
</script>
</html>