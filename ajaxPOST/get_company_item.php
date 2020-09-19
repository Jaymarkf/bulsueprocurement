<?php
include('../dbcon.php');
if(isset($_POST['id'])){
    $qry = 'select a.*,b.*,c.* from tbl_company a
            inner join tbl_rfq b on a.id = b.id_company
            inner join tbl_rfq_item_details c on b.id = c.rfq_item_id
            where YEAR(b.date_created) = YEAR(NOW()) and a.id = '.$_POST['id'];
    $res = $conn->query($qry);
    $row = $res->num_rows;
    if($row < 1 ){
        ?>
        <div class="row-fluid text-center">
            <h3 class="text-center text-warning">No Available Items</h3>
            <input type="hidden" id="flag" value="nodata"/>
        </div>
        <br>
        <?php
    }else{
        echo '<input type="hidden" id="flag" value="havedata"/>';
        while($data = $res->fetch_array()){
            ?>
            <div class="row-fluid text-left" style="position:relative;margin-left:90px;">
                <input type="checkbox" class="form-control ckbox" name="item_val[<?=$data['item_and_specification']?>]" value="<?=$data['unit_price']?>">
               <span class="text-left">&nbsp;&nbsp; <?=$data['item_and_specification']?> | Unit Price: Php <span class="unit_price" class="text-info" style="font-weight:bold"><?=$data['unit_price']?></span></span>
            </div>
            <br>
            <?php
        }
        ?>
        <div class="row-fluid text-center">
            Total Amount: <span id="total_amount" style="font-weight: bold;color:darkslateblue"></span>
        </div>
        <hr>
         <div class="row-fluid">
            <div class="text-center">
                <button id='submit' type="submit" class="btn btn-success" name="submit">Submit</button>
            </div>
        </div>
<?php
    }
}
?>

<script>

    var total = 0;
    $('.ckbox').click(function(){

        var e = $(this).next().find('span.unit_price').html();
            if($(this).prop("checked") == true){
                total += parseInt(e);
            }
            if($(this).prop("checked") == false){
                total -= parseInt(e);
            }
            console.log(total);
            $('#total_amount').html(total);
    });



</script>
