<style>
    hr{
        margin-bottom:6px;
        margin-top:5px;
    }
</style>
<?php
if(isset($_GET['edit'])){
$qry_par = $conn->query("select * from tbl_par where id = ".$_GET['edit']);
$res = $qry_par->fetch_assoc();
$ics_num = explode(",",$res['ics_num']);
$p_num = explode(",",$res['purchase_order_num']);
$f_code = explode(",",$res['fundcluster_code']);
}
?>
<form id="ff" method="POST" onsubmit="this.preventDefault(); x()">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6">
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Par NO.</div>
                    </div>
                    <div class="row-fluid">
                        <div class="span4">
                            <input type="text" id="ics_num_year" name="ics_num_year" value="<?php if(isset($_GET['edit'])){ echo $ics_num[0];  } ?>" class="flag" style="display:block;margin-bottom:0;" placeholder="input year here..."/ required>
                            <div class="text-left" style="margin:0;padding:0;">
                                <small class="js_number_only" style="color:red"></small>
                            </div>
                        </div>
                        <div class="span4">
                            <input type="text" name="ics_num_month" value="<?php if(isset($_GET['edit'])){ echo $ics_num[1];  } ?>" class="flag" placeholder="input month here"  required/>
                            <div class="text-left" style="margin:0;padding:0;">
                                <small class="js_number_only" style="color:red"></small>
                            </div>
                        </div>
                        <div class="span4">
                            <input type="text" name="ics_num_series" value="<?php if(isset($_GET['edit'])){ echo $ics_num[2];  } ?>" class="flag" placeholder="input No. Series here..."  required/>
                            <div class="text-left" style="margin:0;padding:0;">
                                <small class="js_number_only" style="color:red"></small>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row-fluid">
                        <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Code</div>
                    </div>
                    <div class="row-fluid">
                        <select name="code" id="code" class="span12" required>
                           <option style="display:none" disabled selected hidden> Select Equipment Code </option>
                            <?php
                            $e_code = $conn->query("select * from equipment_code");
                            while($e_data = $e_code->fetch_assoc()){
                                ?>
                                <option value="<?=$e_data['id']?>"
                                    <?php
                                        if(isset($_GET['edit'])){
                                            if($e_data['id'] == $res['e_code']){
                                                echo 'selected';
                                            }
                                        }
                                    ?>
                                ><?=$e_data['description']?> - (<?=$e_data['code']?>)</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="row-fluid">
                        <div class="row-fluid">
                            <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Date Acquired</div>
                        </div>
                        <div class="row-fluid">
                            <input type="date" class="span12 form-control" id="date_acquired" name="date_acquired" value="<?php if(isset($_GET['edit'])){ echo $res['date_acquired'];  } ?>" required/>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="row-fluid">
                            <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Issued By</div>
                        </div>
                        <div class="row-fluid">
                            <select class="span12 form-control" name="received_from" id="sender_id" required>
                                <option style="display:none" selected hidden>Select Sender</option>
                                <?php
                                $qq = $conn->query("select * from tbl_supplier_employee");
                                while($dc = $qq->fetch_assoc()){
                                    $name = $dc['first_name']. ' ' . $dc['middle_name'] . ' ' . $dc['last_name'];

                                    ?>
                                    <option value="<?=$dc['id']?>"
                                        <?php
                                        if(isset($_GET['edit'])){
                                            if($dc['id'] == $res['received_from']){
                                                echo 'selected';
                                                $c_pos = $conn->query("select * from tbl_supplier_position where id = ". $dc['position']);
                                                $res_post = $c_pos->fetch_assoc();
                                                $sender_position = $res_post['name'];
                                            }
                                        }
                                        ?>
                                    ><?=$name?></option>
                                    <?php
                                }
                                ?>
                        </div>
                    </div>
                    <!--                automate below the code here when user pick the sender-->
                    <div class="row-fluid">
                        <div class="row-fluid">
                            <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Position</div>
                        </div>
                        <div class="row-fluid">
                            <input type="text" class="form-control span12" name="sender_position" id="sender_pisition" placeholder="" value="<?php if(isset($_GET['edit'])){ echo $sender_position; }?>" readonly required>
                        </div>
                    </div>

                </div>
            </div>
            <div class="span6">
                <div class="row-fluid">
                    <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Purchase Order No.</div>
                </div>
                <div class="row-fluid">
                    <div class="span4">
                        <input type="text" name="purchase_num_month" class="flag" value="<?php if(isset($_GET['edit'])){ echo $p_num[0]; }?>"  class="flag" placeholder="input month here..." value="<?php if(isset($_GET['edit'])){ echo $p_order[0]; }?>"required/>
                        <div class="text-left" style="margin:0;padding:0;">
                            <small class="js_number_only" style="color:red"></small>
                        </div>
                    </div>
                    <div class="span4">
                        <input type="text" class="flag" name="purchase_num_series"  placeholder="input no. Series here" value="<?php if(isset($_GET['edit'])){ echo $p_num[1]; }?>"required/>
                        <div class="text-left" style="margin:0;padding:0;">
                            <small class="js_number_only" style="color:red"></small>
                        </div>
                    </div>
                    <div class="span4">
                        <input type="text" class="flag" name="purchase_num_year" placeholder="input year here..." value="<?php if(isset($_GET['edit'])){ echo $p_num[2]; }?>" required/>
                        <div class="text-left" style="margin:0;padding:0;">
                            <small class="js_number_only" style="color:red"></small>
                        </div>
                    </div>
                </div>
                <!--            automate code below here later-->
                <div class="row-fluid">
                    <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Date Issued</div>
                </div>
                <div class="row-fluid">
                    <input  class="span12" name="date_issued" type="date" value="<?php if(isset($_GET['edit'])){ echo $res['date_issued']; }?>" required/>
                </div>
                <div class="row-fluid">
                    <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Delivered By</div>
                </div>
                <div class="row-fluid">
                    <input  class="span12" name="delivered_by" type="text" placeholder="input supplier here" value="<?php if(isset($_GET['edit'])){ echo $res['delivered_by']; }?>" required/>
                </div>
                <div class="row-fluid">
                    <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Fund Cluster</div>
                </div>
                <div class="row-fluid">
                    <div class="span3">
                        <select class="form-control text-center" name="fundcluster_name" style="width:70%;font-size:12px;" required>
                            <option style="display:none" selected hidden>select fundcluster here..</option>
                            <?php
                            $s = $conn->query("select * from tbl_fund");
                            while($dcluster = $s->fetch_assoc()){
                                ?>
                                <option value="<?=$dcluster['fund_id']?>"
                                    <?php
                                    if(isset($_GET['edit'])){
                                        if($f_code[0] == $dcluster['fund_id']){
                                            echo 'selected';
                                        }
                                    }
                                    ?>
                                ><?=$dcluster['fund_description']?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="span3">
                        <input type="text" class="text-center  flag" name="fundcluster_year" style="width:70%" placeholder="input year here..."  value="<?php if(isset($_GET['edit'])){ echo $f_code[1]; }?>" required/>
                        <div class="text-left" style="margin:0;padding:0;">
                            <small class="js_number_only" style="color:red"></small>
                        </div>
                    </div>
                    <div class="span3">
                        <input type="text" class="text-center flag" name="fundcluster_month" style="width:70%" placeholder="input month here..." value="<?php if(isset($_GET['edit'])){ echo $f_code[2]; }?>" required/>
                        <div class="text-left" style="margin:0;padding:0;">
                            <small class="js_number_only" style="color:red"></small>
                        </div>
                    </div>
                    <div class="span3 text-right">
                        <input type="text" class="text-center flag" name="fundcluster_series" style="width:70%" placeholder="No. Series"  value="<?php if(isset($_GET['edit'])){ echo $f_code[3]; }?>" required/>
                        <div class="text-left" style="margin:0;padding:0;">
                            <small class="js_number_only" style="color:red"></small>
                        </div>
                    </div>
                </div>
                <div style="margin-bottom:80px;"></div>
                <div class="row-fluid">
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="block" style="padding:30px;">
                <form>
                    <div class="row-fuid">
                        <div class="text-center">
                            <h4>Item / Equipment & Description</h4>
                        </div>
                        <label>Select Inspection and Acceptance ID</label>
                        <select class="form-control" name="iar_id" id="iar_id" required>
                            <option style="display:none;color:gray" selected hidden disabled>Select IAR ID ...</option>
                            <?php
                            $q = "select * from tbl_iar_items";
                            $x = $conn->query($q);
                            while($b = $x->fetch_assoc()){
                                ?>
                                <option value="<?=$b['id']?>"
                                    <?php
                                    if(isset($_GET['edit'])){
                                        if($res['iar_id'] == $b['id']){
                                            echo 'selected';
                                            //get last item in par_item
                                            $ds_data  = $conn->query("select * from tbl_par_items  where par_id = ".$_GET['edit']."  order by id desc limit 1");
                                            $f_data = $ds_data->fetch_assoc();

                                        }
                                    }
                                    ?>

                                ><?=$b['id']?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <select class="form-control" id="item_desc" name="item_desc">
<!--                        <option style="display:none" selected hidden disabled>select Item Description...</option>-->
                        <?php
                        if(isset($_GET['edit'])) {

                            $dd = "select * from tbl_iar_items iar
                                   inner join tbl_po po on iar.poID = po.id
                                   inner join tbl_generate_bac_report bac on po.bac_id = bac.id
                                   where iar.id = " . $res['iar_id'];
                            $ff = $conn->query($dd);
                            $ex = $ff->fetch_assoc();
                            //get item list
                            $items = explode(",", $ex['item_details_id_array']);
                            $xb = array();
                            $item_descs = '<option style="display:none" selected hidden disabled>select Item Description...</option>';

                            foreach ($items as $index => $item) {

                                $fa = "select d.*,de.* from tbl_rfq_item_details d inner join tbl_item_details de on d.item_and_specification = de.itemdetailDesc where d.id = '$item'";
                                $aa = $conn->query($fa);
                                $dat = $aa->fetch_assoc();
                                if($dat['item_and_specification'] == $f_data['item_description']){
                                    $g = 'selected';
                                }else{
                                    $g = '';
                                }
                                $item_descs = $item_descs . '<option value="' . $item . '" '.$g.'>' . $dat['item_and_specification'] . '</option>';

                            }
                            echo $item_descs;
                        }

                        ?>


                    </select>
                    <div class="block" style="display:flex;padding:10px;">
                        <label style="font-weight: bold;margin-right:5px;line-height: 30px;">Quantity</label>
                        <input type="text" class="form-control" name="quantity"   value="<?php if(isset($_GET['edit'])){ echo $f_data['quantity']; }?>"  id="quantity" placeholder="input quantity here..." readonly required>
                        <div style="margin-right:20px;"></div>
                        <label style="font-weight: bold;margin-right:5px;line-height: 30px;">Unit</label>
                        <input type="text" class="form-control" name="unit"  value="<?php if(isset($_GET['edit'])){ echo $f_data['unit']; }?>"  id="unit" placeholder="input unit here..."   readonly required>
                        <div style="margin-right:20px;"></div>
                        <label style="font-weight: bold;margin-right:5px;line-height: 30px;">Unit Cost</label>
                        <input type="text" class="form-control" name="unit_cost" value="<?php if(isset($_GET['edit'])){ echo $f_data['unit_cost']; }?>"  id="unit_cost" placeholder="input unit cost here..." readonly required>
                        <div style="margin-right:20px;"></div>
                        <label style="font-weight: bold;margin-right:5px;line-height: 30px;">Total Cost</label>
                        <input type="text" class="form-control t_cost" name="total_cost" value="<?php if(isset($_GET['edit'])){ echo $f_data['total_cost']; }?>" id="total_cost" placeholder="input total cost here..." readonly required>
                        <div style="margin-right:20px;"></div>


                    </div>
                    <div class="row-fluid">
                        <input type="button" class="btn btn-success add-row" value="Add Row">
                        <button type="button" class="btn btn-danger delete-row"><i class="icon icon-trash"></i> Delete Selected Row</button>
                    </div>

                </form>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Select</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Unit Cost</th>
                        <th>Total Cost</th>
                    </tr>
                    </thead>
                    <tbody id="body_item">
                    <?php
                        if(isset($_GET['edit'])){
                            //get all items and render
                            $dq = $conn->query("select * from tbl_par_items where par_id = " . $res['id']);
                            while($resfetch = $dq->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><input type='checkbox' name='record'></td>
                                    <td><input type="text" name="item_desc[]" value="<?=$resfetch['item_description']?>" readonly/></td>
                                    <td><input type="text" name="quantity[]" value="<?=$resfetch['quantity']?>" readonly/></td>
                                    <td><input type="text" name="unit[]" value="<?=$resfetch['unit']?>" readonly/></td>
                                    <td><input type="text" name="unit_cost[]" value="<?=$resfetch['unit_cost']?>" readonly/></td>
                                    <td><input type="text" class="td_cost" name="total_cost[]" id="tcosta" value="<?=$resfetch['total_cost']?>" readonly/></td>
                                    <td><input type="text" name="item_id_rfq_details[]" value="<?=$resfetch['id']?>" style="display:none;"/></td>

                                </tr>
                                <?php
                            }
                        }
                    ?>
                    </tbody>
                </table>
                <div class="row-fluid">
                    <div class="text-right" style="color:blue;font-weight: bold;font-size:19px;">
                        Total Amount: <span id="value_total" style="color:lightseagreen"></span>
                    </div>
                </div>
            </div>

        </div>
        <div class="row-fluid">
            <div class="block" style="padding:20px;">
                <div class="row-fluid">
                    <div class="text-center">
                        <h4>Receiver</h4>
                    </div>
                </div>

                    <div class="row-fluid">
                        <div class="row-fluid">
                            <div class="row-fluid">
                                <div class="text-center">
                                    <div class="row-fluid">
                                        <label>Received By</label>
<!--                                        <input type="text" id="rcv_id" placeholder="Received By"  class="form-control" required/>-->
                                        <select id="rcv_id" required class="form-control">
                                            <option style="display:none" selected disabled hidden>Select End User ...
                                                <?php
                                                    $s = $conn->query("select * from users where level = 'user' and branch <> 'Main Office' and branch <> 'Procurement Unit' and branch <> 'Budget Office' and first_name <> ''");
                                                    while($data = $s->fetch_assoc())    {
                                                        ?>
                                                        <option value="<?=$data['user_id']?>"><?php echo $data['first_name'] . ' '. $data['last_name']; ?></option>

                                                <?php
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="row-fluid">
                                        <label>College</label>
                                        <input type="text" id="college_id" placeholder="College"  class="form-control" readonly required/>
                                    </div>
                                    <div class="row-fluid">
                                        <label>Position</label>
                                        <input type="text" id="position_id" placeholder="Position"  class="form-control" readonly required/>
                                    </div>
                                    <div class="text-center">
                                        <input type="button" class="btn btn-success add-row-r" value="Add Row">
                                        <button type="button" class="btn btn-danger delete-row-r"><i class="icon icon-trash"></i> Delete Selected Row</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>Received By</th>
                                    <th>College</th>
                                    <th>Position</th>
                                </tr>
                                </thead>
                                <tbody id="body_received">
                               <?php
                               if(isset($_GET['edit'])){
                                   $data_id = explode(",",$res['received_by_ids']);
                                   foreach ($data_id as $index => $item) {
                                       $ix = $conn->query("select * from users where user_id = ".$item);
                                        $id_arr = $ix->fetch_assoc();
                                       ?>
                                        <tr>
                                            <td><input type='checkbox' name='info-record'></td>
                                            <td><input type="text" name="received_by[]" value="<?php echo $id_arr['first_name']. ' ' . $id_arr['last_name']?>" readonly/></td>
                                            <td><input type="text" name="college[]" value="<?=$id_arr['branch']?>" readonly/></td>
                                            <td><input type="text" name="position[]" value="<?=$id_arr['position']?>" readonly/></td>
                                            <td><input type="text" name="received_by_id_hidden[]" value="<?=$id_arr['user_id']?>" style="display:none" /></td>

                                        </tr>
                                        <?php

                                   }


                               }
                               ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

            </div>
        </div>
        <div class="text-right">
            <input type="hidden"   <?php if(isset($_GET['edit'])){ echo 'name="ics_edit" value="'.$_GET['edit'].'"'; }else{ echo 'name="ics_save" value="1"';   } ?>/>
            <button type="submit" class="btn btn-success"><i class="icon icon-save"></i> Save</button>
            <a href="dashboard.php" class="btn btn-info"><i class="icon icon-circle-arrow-left"></i> Back</a>
        </div>
    </div>
    </div>
</form>

<script>

    $(document).ready(function(){

        var err = 0;

        $('#ff').submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();
            //
            // console.log(data);
            $('.flag').each(function(){
                if($.isNumeric($(this).val())){
                    $(this).parent().find('.js_number_only').html('');
                    err = 0;
                }else{
                    e.preventDefault();
                    $(this).parent().find('.js_number_only').html('invalid input, must number only!');
                    err = 1;
                    return false;

                }
            });

            if(err == 1){
                e.preventDefault();
                console.log("errr");
            }else{
                  if(colCount < 14999){

                      e.preventDefault();
                      alert("Cannot Proceed!. Total Amount must be more than Php: 14,999");
                      return false;
                  }else{

                      <?php
                      if(isset($_GET['edit'])){
                          ?>
                      $.ajax({
                          url:'../ajaxPOST/supplier_2.php',
                          type: 'post',
                          data:data,
                          success:function(ex){
                              // console.log(ex);
                              e.preventDefault();
                              $.jGrowl("PAR was successfully Edited!", { header: 'SUCCESS' });
                              var delay = 3000;
                              setTimeout(function(){ window.location = 'dashboard.php'  }, delay);


                          }
                      });
                      <?php

                      }else{
                          ?>
                      $.ajax({
                          url:'../ajaxPOST/supplier_2.php',
                          type: 'post',
                          data:data,
                          success:function(ex){
                              // console.log(ex);
                              e.preventDefault();
                              $.jGrowl("New PAR was successfully saved!", { header: 'SUCCESS' });
                              var delay = 3000;
                              setTimeout(function(){ window.location = 'dashboard.php'  }, delay);


                          }
                      });
                      <?php
                      }
                      ?>


                  }


            }


        });
        $('#iar_id').change(function(){
            var x = $(this).val();
            $.ajax({
                url: '../ajaxPOST/supplier.php',
                type: 'post',
                data:{x:x},
                dataType: 'json',
                success:function(e){
                    // console.log(e);
                    $('#item_desc').html(e.item_desc);
                }
            });

        });


        $('#item_desc').change(function(){
            let b = $(this).val();
            // console.log(b);
            $.ajax({
                url: '../ajaxPOST/supplier.php',
                type: 'post',
                data:{b:b},
                dataType: 'json',
                success:function(x){
                    // console.log(x.value);
                    $('#quantity').val(x.quantity);
                    $('#unit_cost').val(x.unit_cost);
                    $('#total_cost').val(x.total_cost);
                    $('#unit').val(x.unit);
                }
            });
        });

        $('#sender_id').change(function(){
            var sender_id = $(this).val();
            // console.log(sender_id);
            $.ajax({
                url: '../ajaxPOST/supplier.php',
                type: 'post',
                data:{sender_id:sender_id},
                dataType: 'json',
                success:function(e){

                    $('#sender_pisition').val(e.pos);
                }
            });
        });
        <?php
        if(isset($_GET['edit'])){
            $cc = $conn->query("select SUM(total_cost) as t_c from tbl_par_items where par_id = ".$_GET['edit']);
            $fetch = $cc->fetch_assoc();
            $colcount = $fetch['t_c'];
            ?>
            var colCount = parseInt('<?php echo $colcount ?>');

            $('#value_total').html(colCount);
        <?php
        }else{
            ?>
       var  colCount = 0;
        <?php
        }
        ?>
        // console.log(colCount);
        $(".add-row").click(function(){
            var tempx = $("#item_desc").val();

            //get item shit

            $.ajax({
                url: '../ajaxPOST/supplier_2.php',
                type: 'post',
                data:{tempx:tempx},
                dataType: 'json',
                success:function(e){
                    // console.log(e.val);
                    var quantity = $("#quantity").val();
                    var unit = $("#unit").val();
                    var unit_cost = $("#unit_cost").val();
                    var total_cost = $("#total_cost").val();
                    var html_item_desc = '<input type="text" name="item_desc[]" value="' + e.val + '" readonly/>';
                    var html_quantity = '<input type="text" name="quantity[]" value="' + quantity + '" readonly/>';
                    var html_unit = '<input type="text" name="unit[]" value="' + unit + '" readonly/>';
                    var html_unit_cost = '<input type="text" name="unit_cost[]" value="' + unit_cost + '" readonly/>';
                    var html_total_cost = '<input type="text" class="td_cost" name="total_cost[]" id="tcosta" value="' + total_cost + '" readonly/>';
                    var xx = '<input type="text" name="item_id_rfq_details[]" value="'+ tempx +'" style="display:none;"/>';

                    var markup = "<tr><td><input type='checkbox' name='record'></td><td>" +  html_item_desc + "</td><td>" + html_quantity  + "</td><td>" + html_unit + "</td><td>" + html_unit_cost  + "</td><td>" + html_total_cost + xx + "</td></tr>";
                    $("table tbody#body_item").append(markup);


                    $('.t_cost').each(function(){
                        colCount += + parseInt($(this).val());
                    });
                    // console.log(colCount);
                    $('#value_total').html(colCount);
                    //
                    // $('<input>').attr({
                    //     type: 'hidden',
                    //     value: tempx,
                    //     name: 'item_id_rfq_details[]',
                    // }).appendTo('#body_item');


                }

            });



        });

        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                    var elem = $(this).parents("tr").children('td:nth-child(6)').find('input');
                    var elem_data = parseInt(elem.val());
                    colCount = colCount - elem_data;
                    // console.log(colCount);
                    $('#value_total').html(colCount);

                }
            });

        });

        $('.add-row-r').click(function(){
            var received_by = $('#rcv_id').val();
            var coll = $('#college_id').val();
            var position = $('#position_id').val();
            var name = $('#rcv_id option:selected').text();

            var html_received = '<input type="text" name="received_by[]" value="' + name + '" readonly/>';
            // var html_hidden = '<input type="hidden" name="received_by_id_hidden[]" value="' + received_by + '" readonly/>';
            var html_coll = '<input type="text" name="college[]" value="' + coll + '" readonly/>';
            var html_position = '<input type="text" name="position[]" value="' + position + '" readonly/>';
            var hidden_elem = '<input type="text" name="received_by_id_hidden[]" value="'+received_by+'" style="display:none" />';
            var markup = "<tr><td><input type='checkbox' name='info-record'></td><td>" +  html_received + "</td><td>" + html_coll  + "</td><td>" + html_position + hidden_elem + "</td><</tr>";
            // $('<input>').attr({
            //     type: 'hidden',
            //     value: received_by,
            //     name: 'received_by_id_hidden[]',
            // }).appendTo('table tbody#body_received');
            $("table tbody#body_received").append(markup);


        });

        $(".delete-row-r").click(function(){
            $("table tbody#body_received").find('input[name="info-record"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();

                }
            });

        });

        $('#rcv_id').change(function(){
          var id = $(this).val();
          $.ajax({
             url: '../ajaxPOST/supplier_2.php',
             type: 'post',
             dataType: 'json',
             data:{id:id},
             success:function(x){
              $('#college_id').val(x.collegef);
              $('#position_id').val(x.positionf);
             }
          });
        });




    });




</script>
