<?php
session_start();
include('header.php'); ?>
<?php include('session.php');?>
<?php
if(isset($_POST['sub'])){
    $companies = array();
    foreach ($_POST['id_rfq_'] as $index => $item) {
        $data_id = $item;
        $ap_item_price = $_POST['a_price_'][$index];
        $qry = "update tbl_rfq_item_details set approved_by = 'approved', approved_item_price = '".$ap_item_price."',date_created = NOW() where id = ".$data_id;
        $conn->query($qry);
        $companies[] = $item;
    }
    $array_id = implode(",",$companies);
    $bq = "insert into tbl_bac_reso (`date_created`,`c_id_array`) values(NOW(),'$array_id')";
    $conn->query($bq);
    ?>
    <script>
        $.jGrowl("BAC RESOLUTION has been  successfully created", { header: 'SUCCESS' });
        var delay = 3000;
        setTimeout(function(){ window.location = 'bac-res-main.php'  }, delay);
    </script>
    <?php
}
?>
<body>
	<?php include('navbar.php'); ?>
	<h4 class="span12">BAC Resolution</h4>
	
	<div class="container-fluid">
		<div class="row-fluid">
            <form method="POST" id="forms">
			    <div class="span12" id="content">
				<hr>
                <div class="row-fluid">
                    <div class="text-left">
                        <a href="bac-res-main.php" class="btn btn-info"><i class="icon icon-circle-arrow-left"></i> &nbsp;&nbsp;Back</a>
                        <hr><hr>
                         <div class="">
                                <table cellpadding="0" cellspacing="0" border="0" id="example1" class="display" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th rowspan="1"><b>Select company</b></th>
                                        <th rowspan="1"><b>COMPANY</b></th>
                                        <th rowspan="1"><b>NAME AND DESCRIPTION OF ARTICLES BEING REQUISITIONED</b></th>
                                        <th rowspan="1"><b>Approved Unit Price per item</b></th>
                                        <th rowspan="1"><b>Quantity and Unit</b></th>
                                        <th rowspan="1"><b>Unit Price</b></th>
                                        <th rowspan="1"><b>Extended Amount</b></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $qry = "select a.id,(b.id) as item_id,a.company_name,b.item_and_specification,b.quantity_and_unit,b.unit_price,b.total_price from tbl_rfq_item_details b
                                                inner join tbl_rfq a on b.rfq_item_id = a.id where YEAR(a.date_created) = YEAR(NOW())";
                                        $res = $conn->query($qry);
                                        while($a = $res->fetch_array()){
                                            ?>
                                            <tr>
                                                <td style="text-align:center;">
                                                    <input class="flag" type="checkbox" name="id_rfq_[]" value="<?=$a['item_id']?>"/>
                                                </td>
                                                <td><?=$a['company_name']?></td>
                                                <td><?=$a['item_and_specification']?></td>
                                                <td><input type="text" name="a_price_[]" class="form-control" placeholder="input approved price.." required disabled/></td>
                                                <td><?=$a['quantity_and_unit']?></td>
                                                <td>&#8369;<?=$a['unit_price']?></td>
                                                <td>&#8369;<?=$a['total_price']?></td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="text-right">

                            <button class="btn btn-success" type="submit" name="sub">Submit Selected</button>



                    </div>
                </div>
			</div>
            </form>
		</div>
	<?php include('footer.php'); ?>
	</div>
	<?php include('script.php'); ?>
</body>
<script>
        $(document).ready(function(){
            jQuery('.flag').change(function() {
                if ($(this).prop('checked')) {
                    $(this).parent().css('background-color','#c2b2a1');
                    $(this).parent().parent().css('background-color','#c2b2a1');
                  $(this).parent().parent().children().eq(3).children().attr('required',true);

                    $(this).parent().parent().children().eq(3).children().removeAttr('disabled');
                }else {
                    $(this).parent().css('background-color','');
                    $(this).parent().parent().css('background-color','');
                    $(this).parent().parent().children().eq(3).children().removeAttr('required');
                    $(this).parent().parent().children().eq(3).children().prop('disabled',true);

                }
            });
        });
</script>