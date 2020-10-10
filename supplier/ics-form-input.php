<style>
    hr{
        margin-bottom:6px;
        margin-top:5px;
    }
</style>
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
                        <input type="text" id="ics_num_year" name="ics_num_year" class="flag" style="display:block;margin-bottom:0;"placeholder="input year here..."/ required>
                        <div class="text-left" style="margin:0;padding:0;">
                            <small class="js_number_only" style="color:red"></small>
                        </div>
                    </div>
                    <div class="span4">
                        <input type="text" name="ics_num_month" class="flag" placeholder="input month here"  required/>
                        <div class="text-left" style="margin:0;padding:0;">
                            <small class="js_number_only" style="color:red"></small>
                        </div>
                    </div>
                    <div class="span4">
                        <input type="text" name="ics_num_series" class="flag"placeholder="input No. Series here..." required/>
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
                    <input type="date"  name="date_acquired" class="span12 form-control"/ required>
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
                            <option value="<?=$b['id']?>"><?=$b['id']?></option>
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
                        </select>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Quantity</div>
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="form-control span12" name="quantity" id="quantity" placeholder="input quantity here..." readonly required>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Unit</div>
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="form-control span12" name="unit" id="unit" placeholder="input unit here..." required>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Unit Cost</div>
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="form-control span12" name="unit_cost" id="unit_cost" placeholder="input unit cost here..." readonly required>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Total Cost</div>
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="form-control span12" name="total_cost" id="total_cost" placeholder="input total cost here..." readonly required>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Received From</div>
                    </div>
                    <div class="row-fluid">
                        <select class="span12 form-control" name="received_from" required>
                            <option style="display:none" selected hidden>Select Sender</option>
                            <option value="">JUAN1</option>
                            <option value="">JUAN2</option>
                            <option value="">JUAN3</option>
                    </div>
                </div>
<!--                automate below the code here when user pick the sender-->
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Position</div>
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="form-control span12" name="sender_position" placeholder="" required>
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
                    <input type="text" name="purchase_num_month" class="flag"  class="flag"placeholder="input month here..."required/>
                    <div class="text-left" style="margin:0;padding:0;">
                        <small class="js_number_only" style="color:red"></small>
                    </div>
                </div>
                <div class="span4">
                    <input type="text" class="flag" name="purchase_num_series" placeholder="input no. Series here"required/>
                    <div class="text-left" style="margin:0;padding:0;">
                        <small class="js_number_only" style="color:red"></small>
                    </div>
                </div>
                <div class="span4">
                    <input type="text" class="flag" name="purchase_num_year" placeholder="input year here..."required/>
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
                <input  class="span12" name="received_by" type="text" placeholder="input your name and last name here.."/>
            </div>
            <div class="row-fluid">
                <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">College</div>
            </div>
            <div class="row-fluid">
                <input  class="span12" type="text" name="college" placeholder="input college here.."/>
            </div>
<!--            automate end-->
            <div class="row-fluid">
                <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Position</div>
            </div>
            <div class="row-fluid">
                <input  class="span12"  name="received_position" type="text" placeholder="input position here.."/>
            </div>
            <div class="row-fluid">
                <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Date Issued</div>
            </div>
            <div class="row-fluid">
                <input  class="span12" name="date_issued" type="date"/>
            </div>
            <div class="row-fluid">
                <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Delivered By</div>
            </div>
            <div class="row-fluid">
                <input  class="span12" name="delivered_by" type="text" placeholder="input supplier here"/>
            </div>
            <div class="row-fluid">
                <div class="text-center padd-bottom" style="font-weight: bold;color:gray;font-family: 'Courier New', Courier, monospace">Fund Cluster</div>
            </div>
            <div class="row-fluid">
                <div class="span3">
                    <select class="form-control text-center" name="fundcluster_name" style="width:70%;font-size:12px;" required>
                        <option style="display:none" selected hidden>select fundcluster here..</option>
                        <option value="aa">test</option>
                        <option value="aa">test</option>
                        <option value="aa">test</option>
                    </select>
                </div>
                <div class="span3">
                    <input type="text" class="text-center  flag" name="fundcluster_year" style="width:70%" placeholder="input year here..." />
                    <div class="text-left" style="margin:0;padding:0;">
                        <small class="js_number_only" style="color:red"></small>
                    </div>
                </div>
                <div class="span3">
                    <input type="text" class="text-center flag" name="fundcluster_month" style="width:70%" placeholder="input month here..."/>
                    <div class="text-left" style="margin:0;padding:0;">
                        <small class="js_number_only" style="color:red"></small>
                    </div>
                </div>
                <div class="span3 text-right">
                    <input type="text" class="text-center flag" name="fundcluster_series" style="width:70%" placeholder="No. Series" />
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
                    <button type="submit" class="btn btn-success"><i class="icon icon-save"></i> Save</button>
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
        $('#ff').submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();
           //
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
                       e.preventDefault();


                   }
               });

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






    });



</script>
