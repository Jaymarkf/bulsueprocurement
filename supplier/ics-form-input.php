<style>
    hr{
        margin-bottom:6px;
        margin-top:5px;
    }
</style>
<?php

    if(isset($_GET['edit'])){
        $qry = $conn->query("select * from tbl_ics where id = ".$_GET['edit']);
        $d = $qry->fetch_assoc();
        $ics_num = explode(",",$d['ics_num']);
        $date_acquired = $d['date_acquired'];
        $iar_id = $d['iar_id'];
        $item_desc = $d['item_desc'];
        //find item array description
        $query_large = "select iar.id as iar_id,iar.*,po.*,bac.* from tbl_iar_items iar
                        inner join tbl_po po on iar.poID = po.id
                        inner join tbl_generate_bac_report bac on po.bac_id = bac.id where iar.id = ". $iar_id;
        $ff = $conn->query($query_large);
        $ff_fetch = $ff->fetch_assoc();
        //get all items and explode the item and render to html
        $list_items = explode(",",$ff_fetch['item_details_id_array']); //item list
        $html = '';
        foreach ($list_items as $index => $val) {
            //get the item description
            $z = $conn->query("select * from tbl_rfq_item_details where id =".$val);
            $fetch_desc = $z->fetch_assoc();
                if($item_desc == $val){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
            //check if edit and select the selected data indatabase

            if($fetch_desc['unit_price'] < 15000){
                $html = $html . '<option value="'.$val.'" '.$selected.'>'.$fetch_desc['item_and_specification'].'</option>';
            }


        }

//        print_r($ics_num);
//        die();
        //get position and college of employee
        $emp = $conn->query("select emp.*,pos.* from tbl_supply_office_employee emp 
                                    inner join tbl_supply_office_employee_position pos on emp.position = pos.id                              
                                    where emp.id=".$d['received_from']);

        $emp_ex = $emp->fetch_assoc();
        $sender_position = $emp_ex['name'];
        $p_order = explode(",",$d['purchase_order_num']);
        $fundcluster = explode(",",$d['fundcluster_code']);
        //get first select in fund cluster code
        $f_cluster_qry = $conn->query("select * from tbl_fund where fund_id = ". $fundcluster[0]);
        $fcluster = $f_cluster_qry->fetch_assoc();




    }


?>



<form id="ff" method="POST" onsubmit="this.preventDefault(); x()">
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span6">
            <div class="row-fluid">
                <div class="row-fluid">
                    <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">ICS NO.</div>
                </div>
                <div class="row-fluid">
                    <div class="span4">
                        <input type="text" id="ics_num_year" name="ics_num_year" value="<?php if(isset($_GET['edit'])){ echo $ics_num[0]; }?>"
                               maxlength="4"
                               class="flag" style="display:block;margin-bottom:0;"placeholder="input year here..."   required/>
                        <div class="text-left" style="margin:0;padding:0;">
                            <small class="js_number_only" style="color:red"></small>
                        </div>
                    </div>
                    <div class="span4">
                        <input type="text" name="ics_num_month" class="flag" placeholder="input month here" value="<?php if(isset($_GET['edit'])){ echo $ics_num[1]; }?>" required/>
                        <div class="text-left" style="margin:0;padding:0;">
                            <small class="js_number_only" style="color:red"></small>
                        </div>
                    </div>
                    <div class="span4">
                        <input type="text" name="ics_num_series" class="flag" placeholder="input No. Series here..." value="<?php if(isset($_GET['edit'])){ echo $ics_num[2]; }?>" maxlength="3" required/>
                        <div class="text-left" style="margin:0;padding:0;">
                            <small class="js_number_only" style="color:red"></small>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row-fluid">
                    <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Date Acquired</div>
                </div>
                <div class="row-fluid">
                    <input type="date"  name="date_acquired" class="span12 form-control" value="<?php if(isset($_GET['edit'])){ echo $d['date_acquired']; }?>" required/>
                </div>
                <div class="row-fluid">
                    <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Inspection and Acceptance ID</div>
                </div>
                <div class="row-fluid">
                    <select class="form-control span12" name="iar_id" id="iar_id" required>
                        <option style="display:none" selected hidden disabled>select IAR ID here...</option>
                        <?php
                        $q = "select * from tbl_iar_items";
                        $x = $conn->query($q);
                        while($b = $x->fetch_assoc()){
                            ?>
                            <option value="<?=$b['id']?>" <?php
                            if(isset($_GET['edit'])) {
                                if ($iar_id == $b['id']) {
                                    echo 'selected';
                                } else {
                                    echo '';
                                }
                            }
                            ?>><?=$b['id']?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Item Description</div>
                    </div>
                    <div class="row-fluid">
                        <select class="form-control span12" id="item_desc" name="item_desc" required>
                            <option style="display:none" selected hidden disabled>select Item Description...</option>
                            <?php if(isset($_GET['edit'])){ echo $html; }?>
                        </select>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Quantity</div>
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="form-control span12" name="quantity" value="<?php if(isseft($_GET['edit'])){ echo $d['quantity']; }?>" id="quantity" placeholder="input quantity here..." readonly required>

                    </div>
                </div>
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Unit</div>
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="form-control span12" name="unit"  id="unit" placeholder="input unit here..." value="<?php if(isset($_GET['edit'])){ echo $d['unit']; }?>"  readonly required>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Unit Cost</div>
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="form-control span12" name="unit_cost" id="unit_cost" placeholder="input unit cost here..."value="<?php if(isset($_GET['edit'])){ echo $d['unit_cost']; }?>" readonly required>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Total Cost</div>
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="form-control span12" name="total_cost" id="total_cost" placeholder="input total cost here..." value="<?php if(isset($_GET['edit'])){ echo $d['total']; }?>" readonly required>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Received From</div>
                    </div>
                    <div class="row-fluid">
                        <select class="span12 form-control" name="received_from" id="sender_id" required>
                            <option style="display:none" selected hidden>Select Sender</option>
                            <?php
                                $qq = $conn->query("select * from tbl_supply_office_employee");
                                while($dc = $qq->fetch_assoc()){
                                    $name = $dc['first_name']. ' ' . $dc['middle_name'] . ' ' . $dc['last_name'];

                                    ?>
                                    <option value="<?=$dc['id']?>"
                                        <?php
                                            if(isset($_GET['edit'])){
                                                if($dc['id'] == $d['received_from']){
                                                    echo 'selected';
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
                    <input type="text" name="purchase_num_month" class="flag"  class="flag" placeholder="input month here..." value="<?php if(isset($_GET['edit'])){ echo $p_order[0]; }?>"required/>
                    <div class="text-left" style="margin:0;padding:0;">
                        <small class="js_number_only" style="color:red"></small>
                    </div>
                </div>
                <div class="span4">
                    <input type="text" class="flag" name="purchase_num_series" placeholder="input no. Series here" value="<?php if(isset($_GET['edit'])){ echo $p_order[1]; }?>"maxlength="3" required/>
                    <div class="text-left" style="margin:0;padding:0;">
                        <small class="js_number_only" style="color:red"></small>
                    </div>
                </div>
                <div class="span4">
                    <input type="text" class="flag" name="purchase_num_year" placeholder="input year here..." value="<?php if(isset($_GET['edit'])){ echo $p_order[2]; }?>" maxlength="4" required/>
                    <div class="text-left" style="margin:0;padding:0;">
                        <small class="js_number_only" style="color:red"></small>
                    </div>
                </div>
            </div>
<!--            automate code below here later-->
            <div class="row-fluid">
                <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Received By</div>
            </div>
            <div class="row-fluid">
<!--                <input  class="span12" name="received_by" type="text"  placeholder="input your name and last name here.." value="--><?php //if(isset($_GET['edit'])){ echo $d['received_by']; }?><!--"/>-->
                <select name="received_by" class="form-control span12" id="id_received_by" required>
                    <option style="display:none" selected hidden disabled>Select Received By</option>
                    <?php

                        $cc = $conn->query("select * from tbl_supplier_employee");
                        while($dd = $cc->fetch_assoc()){
                            ?>
                            <option value="<?=$dd['id']?>"
                                <?php
                                    if(isset($_GET['edit'])){
                                        $get_id = $conn->query("select * from tbl_ics where id = ".$_GET['edit']);
                                        $df = $get_id->fetch_assoc();
                                        if($dd['id'] == $df['received_by']){
                                            echo 'selected';
                                        }
                                    }
                                ?>

                            ><?php echo $dd['first_name']. ' ' . $dd['last_name']?></option>
                    <?php

                        }

                    ?>
                </select>
            </div>
            <div class="row-fluid">
                <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">College</div>
            </div>
            <div class="row-fluid">
                <input  class="span12" type="text" name="college" id="id_college" placeholder="input college here.." value="<?php if(isset($_GET['edit'])){ echo $d['college']; }?>" readonly required/>
            </div>
<!--            automate end-->
            <div class="row-fluid">
                <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Position</div>
            </div>
            <div class="row-fluid">
                <input  class="span12"  name="received_position" id="id_received_position" type="text" placeholder="input position here.." value="<?php if(isset($_GET['edit'])){ echo $d['position']; }?>" readonly required/>
            </div>
            <div class="row-fluid">
                <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Date Issued</div>
            </div>
            <div class="row-fluid">
                <input  class="span12" name="date_issued" type="date" value="<?php if(isset($_GET['edit'])){ echo $d['date_issued']; }?>" required/>
            </div>
            <div class="row-fluid">
                <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Delivered By</div>
            </div>
            <div class="row-fluid">
                <input  class="span12" name="delivered_by" type="text" placeholder="input supplier here" value="<?php if(isset($_GET['edit'])){ echo $d['delivered_by']; }?>" required/>
            </div>
            <div class="row-fluid">
                <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Fund Cluster</div>
            </div>
            <div class="row-fluid">
                <div class="span3">
                    <select class="form-control text-center" name="fundcluster_name" style="width:70%;font-size:12px;" required>
                        <option value="" style="display:none" selected hidden>select fundcluster here..</option>
                        <?php
                            $s = $conn->query("select * from tbl_fund");
                            while($dcluster = $s->fetch_assoc()){
                                ?>
                                <option value="<?=$dcluster['fund_id']?>"
                                    <?php
                                    if(isset($_GET['edit'])){
                                        if($fcluster['fund_id'] == $dcluster['fund_id']){
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
                    <input type="text" class="text-center  flag" name="fundcluster_year" style="width:70%" placeholder="input year here..."  value="<?php if(isset($_GET['edit'])){ echo $fundcluster[1]; }?>" maxlength="4" required/>
                    <div class="text-left" style="margin:0;padding:0;">
                        <small class="js_number_only" style="color:red"></small>
                    </div>
                </div>
                <div class="span3">
                    <input type="text" class="text-center flag" name="fundcluster_month" style="width:70%" placeholder="input month here..." value="<?php if(isset($_GET['edit'])){ echo $fundcluster[2]; }?>" required/>
                    <div class="text-left" style="margin:0;padding:0;">
                        <small class="js_number_only" style="color:red"></small>
                    </div>
                </div>
                <div class="span3 text-right">
                    <input type="text" class="text-center flag" name="fundcluster_series" style="width:70%" placeholder="No. Series"  value="<?php if(isset($_GET['edit'])){ echo $fundcluster[3]; }?>"maxlength="3" required/>
                    <div class="text-left" style="margin:0;padding:0;">
                        <small class="js_number_only" style="color:red"></small>
                    </div>
                </div>
            </div>
            <div style="margin-bottom:80px;"></div>
            <div class="row-fluid">
                <div class="span6">
                </div>
                <div class="span6 text-right">
                    <input type="hidden"   <?php if(isset($_GET['edit'])){ echo 'name="ics_edit" value="'.$_GET['edit'].'"'; }else{ echo 'name="ics_save" value="1"';   } ?>/>
                    <button type="submit" class="btn btn-success"
                        <?php
                        if(isset($_GET['edit'])){
                            $sql_ics = $conn->query("select * from tbl_ics where id = ".$_GET['edit']);
                            $ics = $sql_ics->fetch_assoc();
                            if($ics['transfer_item_id'] != null){
                                echo 'disabled  title="item cannot be edit,item was transfered"';
                            }
                        }
                        ?>
                    ><i class="icon icon-save"></i> Save</button>
                    <a href="dashboard.php" class="btn btn-info"><i class="icon icon-circle-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</form>
<script>

    $(document).ready(function(){
        var err = 0;

        <?php
        if(isset($_GET['edit'])){
            ?>

        $('#ff').submit(function(e){
            e.preventDefault();
            var edit_data = $(this).serialize();
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
                $.ajax({
                    url:'../ajaxPOST/supplier.php',
                    type: 'POST',
                    data:edit_data,
                    success:function(ex){
                        // console.log(ex);
                        e.preventDefault();
                        $.jGrowl("ICS was successfully Edited!", { header: 'SUCCESS' });
                        var delay = 3000;
                        setTimeout(function(){ window.location = 'dashboard.php'  }, delay);


                    }
                });

            }


        });


        <?php
        }else{
        ?>
        $('#ff').submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();
           //
            console.log(data);
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
               $.ajax({
                   url:'../ajaxPOST/supplier.php',
                   type: 'POST',
                   data:data,
                   success:function(ex){
                       // console.log(ex);
                       e.preventDefault();
                       $.jGrowl("New ICS was successfully saved!", { header: 'SUCCESS' });
                       var delay = 3000;
                       setTimeout(function(){ window.location = 'dashboard.php'  }, delay);


                   }
               });

           }


        });
        <?php
        }
        ?>

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
            console.log(b);
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
            console.log(sender_id);
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
        $('#id_received_by').change(function(){
            var idd_received_by = $(this).val();
            $.ajax({
                url: '../ajaxPOST/supplier.php',
                type: 'post',
                data: {idd_received_by:idd_received_by},
                dataType: 'json',
                success:function(data){
                    $('#id_college').val(data.college);
                    $('#id_received_position').val(data.position);

                }
            });



        });




    });



</script>
