<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>
	<?php include('navbar.php'); ?>
	<h4 class="span12">BAC Resolution</h4>
	
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12" id="content">
				<hr>
                <div class="row-fluid">
                    <div class="text-left">
                        <a href="bac-res-main.php" class="btn btn-info"><i class="icon icon-circle-arrow-left"></i> &nbsp;&nbsp;Back</a>
                        <hr><hr>

                        <div class="">
                            <form method="POST">
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
                                                <td><input type="text" name="a_price_[]" class="form-control" placeholder="input approved price.."/></td>
                                                <td><?=$a['quantity_and_unit']?></td>
                                                <td>&#8369;<?=$a['unit_price']?></td>
                                                <td>&#8369;<?=$a['total_price']?></td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                    </tbody>

                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="text-right">
                        <button class="btn btn-success">Submit Selected</button>
                    </div>
                </div>
			</div>
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
                }else {
                    $(this).parent().css('background-color','');
                    $(this).parent().parent().css('background-color','');
                }
            });
        });
</script>