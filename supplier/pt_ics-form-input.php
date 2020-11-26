
<style>
    #confirm_transfer_btn:hover{
        color: #a3eee9;
    }
    .bd{
        border:1px solid red;
    }
    label{
        cursor:auto;
    }
    .span_label{
        font-size:11px;
        font-weight:bold;
        text-align:center;
    }
    .cant_find{
        font-size:64%;

    }
ul li{
    padding:5px;
    font-size:11px;
    margin:0px !important;
}
ul{
    margin:0px;
}

</style>

<div class="block">
    <div class="container-header text-center" style="position:relative;width:100%;height:40px;background-image:linear-gradient(#e877c6, #763435); ">
        <span style="color:white;font-weight: bold;line-height: 35px;">Transfer ICS Data</span>
    </div>
       <div class="container-fluid" style="padding:40px;">
           <table class="table" cellpadding="0" cellspacing="0" id="example1">
               <thead>
               <tr>
                   <th>Select</th>
                   <th>ICS No.</th>
                   <th>College</th>
                   <th>Item Description</th>
                   <th>Quantity</th>
                   <th>Unit</th>
                   <th>Status</th>
               </tr>
               </thead>
               <tbody>
                   <?php
                    $sql_ics = $conn->query("select * from tbl_ics");
                    while( $res = $sql_ics->fetch_assoc()) {
                        $ics_num = str_replace(",", "-", $res['ics_num']);
                        $college = $res['college'];
                        $qty = $res['quantity'];
                        $unit = $res['unit'];
                        if($res['transfer_item_id'] == 0){
                            $status = '<span style="background-color:lightseagreen;padding:5px;border-radius: 10px;font-size:11px;color:white;">Item not transfered</span>';
                        }else{
                            $status = '<span style="background-color:lawngreen;padding:5px;border-radius: 10px;font-size:11px;color:black;">Item is transfered</span>';
                        }
                        //get item description
                        $c = $conn->query("select * from tbl_rfq_item_details where id = ".$res['item_desc']);
                        $item = $c->fetch_assoc();
                        if($res['quantity'] == 0){
                            $btn_transfer = '<button type="button" class="btn btn-small btn-default"><i class="icon icon-ban-circle"></i> Transfered All </button>';
                        }else{
                            $btn_transfer = '<button type="button" class="btn btn-small btn-success flag" data-id="'.$res['id'].'"><i class="icon icon-plus"></i> Add to Transfer</button>';

                        }
                        ?>
                        <tr>
                            <td><?=$btn_transfer?></td>
                            <td><?=$ics_num?></td>
                            <td><?=$college?></td>
                            <td><?=$item['item_and_specification']?></td>
                            <td><?=$qty?></td>
                            <td><?=$unit?></td>
                            <td><?=$status?></td>
                        </tr>
                   <?php
                    }
                   ?>
               </tbody>
               <tfoot>
               <tr>
                   <th>Select</th>
                   <th>ICS No.</th>
                   <th>College</th>
                   <th>Item Description</th>
                   <th>Quantity</th>
                   <th>Unit</th>
                   <th>Status</th>
               </tr>
               </tfoot>
           </table>
           <div class="row-fluid">
               <div class="span6" style="border-right: 1px solid gray">
                <form method="post">
                    <div style="" id="data_add">

               </div>
                    </div>
                </form>
               <form method="post" id="transfer_property_submit">
               <div class="span6 text-center" id="block_span">

               </div>
               </form>
           </div>

       </div>

</div>

<div class="row-fluid">
    <div class="span12">
        <div class="block" style="padding:25px;">
            <div class="container-header text-center" style="position:relative;width:100%;height:40px;background-image:linear-gradient(#87c6a8, #6c94ae); ">
                <span style="color:white;font-weight: bold;line-height: 35px;">Property Transfer Record of ICS</span>
            </div>
            <hr>
            <div class="container-fluid">
                <table class="table table-striped table-responsive table-bordered" id="example" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>Transfer ID</th>
                            <th>PTR No. </th>
                            <th>RELEASED / ISSUED BY</th>
                            <th>RECEIVED BY</th>
                            <th>REASON FOR TRANSFER</th>
                            <th>PTR DATE</th>
                            <th>ITEM DESC</th>
                            <th>QTY</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $ss = $conn->query("select * from transfer_item");
                        while($aa = $ss->fetch_assoc()){
                            $ff = $conn->query("select * from tbl_supplier_employee where id = ". $aa['issued_by']);
                            $issued_by = $ff->fetch_assoc();
                            $gg = $conn->query("select * from tbl_supplier_employee where id = ". $aa['issued_to']);
                            $issued_to = $gg->fetch_assoc();
                            $by = $issued_by['first_name']. ' '. $issued_by['middle_name']. ' '. $issued_by['last_name'];
                            $to = $issued_to['first_name']. ' '. $issued_to['middle_name']. ' '. $issued_to['last_name'];
                            ?>
                                <tr>
                                    <td><?=$aa['id']?></td>
                                    <td><?=$aa['ptr_no']?></td>
                                    <td><?=$by?></td>
                                    <td><?=$to?></td>
                                    <td><?=$aa['reason_for_transfer']?></td>
                                    <td><?=$aa['ptr_date']?></td>
                                    <td><?=$aa['item_desc']?></td>
                                    <td><?=$aa['quantity']?></td>
                                    <td><button type="button" class="view_ptr btn btn-success btn-small" data-toggle="modal" data-target=".bd-example-modal-lg" data-id="<?=$aa['id']?>"><i class="icon icon-eye-open" ></i> View</button></td>
                                </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding:15px;">
            <div class="row-fluid">
                <div class="span6" style="left:0;">
                    <ul style="list-style: none;">
                        <li style="border:1px solid black;" id="missued_by"></li>
                        <li style="border:1px solid black;" id="mfrom_fundcluster"></li>
                        <li style="border:1px solid black;" id="mptr_no"></li>
                        <li style="border:1px solid black;" id="mics_no"></li>
                        <li style="border:1px solid black;" id="mitem_desc"></li>
                        <li style="border:1px solid black;" id="mquantity"></li>
                        <li style="border:1px solid black;" id="munit_cost"></li>
                    </ul>
                </div>
                <div class="span6">
                    <ul style="list-style:none">
                        <li style="border:1px solid black;" id="missued_to"></li>
                        <li style="border:1px solid black;" id="mto_fundcluster"></li>
                        <li style="border:1px solid black;" id="mptr_date"></li>
                        <li style="border:1px solid black;" id="mdate_acquired"></li>
                        <li style="border:1px solid black;" id="mcollege"></li>
                        <li style="border:1px solid black;" id="munit"></li>
                        <li style="border:1px solid black;" id="mtotal_cost"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $('.view_ptr').click(function(){
            //get the ptr info and render to modal
            var id_view  = $(this).attr('data-id');
            // console.log(id_view);
            $.ajax({
                url: '../ajaxPOST/property_transfer.php',
                data: {id_view:id_view},
                type:'post',
                dataType: 'json',
                success:function(dx){
                $('#missued_by').html("ISSUED BY:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + dx.issued_by );
                $('#missued_to').html("ISSUED TO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + dx.issued_to );
                $('#mfrom_fundcluster').html("FROM FUNDCLUSTER:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + dx.from_fundcluster );
                $('#mptr_no').html("PTR NO.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + dx.ptr_no );
                $('#mics_no').html("ICS NO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + dx.ics_no );
                $('#mitem_desc').html("ITEM DESCRIPTION:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + dx.item_desc );
                $('#mquantity').html("QUANTITY:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + dx.quantity );
                $('#munit_cost').html("UNIT COST:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + dx.unit_cost );
                $('#mto_fundcluster').html("TO FUNDCLUSTER:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + dx.to_fundcluster );
                $('#mptr_date').html("PTR DATE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + dx.ptr_date );
                $('#mdate_acquired').html("DATE ACQUIRED:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + dx.date_acquired );
                $('#mcollege').html("COLLEGE:&nbsp;&nbsp;" + dx.college );
                $('#munit').html("UNIT:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + dx.unit );
                $('#mtotal_cost').html("TOTAL COST:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + dx.total_cost );
                }
            });
        });


        //submit transfer property
        $('#transfer_property_submit').submit(function(e){
            var data_transfer = $(this).serialize();
            // console.log(data_transfer);
            e.preventDefault();
            $.ajax({
                url: '../ajaxPOST/property_transfer.php',
                type:'post',
                data:data_transfer,
                //check if exist yung ics kapag na trasfer na make the ics table into status == transfer
                success:function(result){
                    // console.log(result);
                    // return false;
                    $.jGrowl("New Item was successfully Transfered!.", { header: 'SUCCESS' });
                    var delay = 3000;
                    setTimeout(function(){ window.location = 'pt_ics.php'  }, delay);
                }
            });
        });



        $('.flag').click(function(){
            var f_id_pt = $(this).attr('data-id');
            $.ajax({
                url: '../ajaxPOST/supplier_2.php',
                type: 'post',
                data: {f_id_pt:f_id_pt},
                dataType: 'json',
                success:function(result){
                    // console.log(result);
                var ics_num  = result.ics_num;
                var college = result.college;
                var quantity = result.quantity;
                var unit = result.unitz;
                var fund = result.fund_name;
                var fund_all = result.fund_all;
                var date_acquired = result.date_acquired;
                var item_and_specification = result.item_description;
                var unit_cost = result.unit_cost;
                var total_cost = result.total_cost;
                var btn_id = result.transfer_check;
                var is_transfer = result.is_transfer;
                var transfer = f_id_pt;
                // if(is_transfer == '1'){
                //     transfer = result.transfer_check;



                // }else if(is_transfer == '0'){
                //     transfer = f_id_pt;
                // }
                var d = new Date();
                    $('#data_add').html("" +
                        "<div class='row-fluid text-warning' style='font-weight: bolder'>Data to be Transfer <span style='font-weight: bold;' class='text-success'>(Confirmation)</span></div><div class='row-fluid'><span style='font-weight: bold'>ICS No. </span> <input class='' type='text' name='ics_num' id='ics_num' value='"+ics_num+"' readonly/></div>" +
                        "<div class='row-fluid'><span style='font-weight: bold'>College </span><input class='span8' type='text' name='college' id='college' value='"+college+"' readonly/></div>" +
                        "<div class='row-fluid'><span style='font-weight: bold'>Quantity </span><input class='form-control' type='number' name='quantity' id='quantity' value='"+quantity+"'/></div>" +
                        "<div class='row-fluid'><span style='font-weight: bold'>Unit </span> <input class='' type='text' name='unit' id='unit' value='"+unit+"' readonly/></div>" +
                        "<div class='row-fluid'><span style='font-weight: bold'>From - FundCluster </span> <input class='' type='text' name='fund' id='fund' value='"+fund+"' readonly/></div>" +
                        "<div class='row-fluid'><span style='font-weight: bold'>To - FundCluster </span><select class = '' name='to_fund' id='to_fund' required>"+fund_all+"</select></div>" +
                        "<div class='row-fluid'><span style='font-weight: bold'>PTR No.</span> <input class='' type='text' name='ptr_no' id='ptr_no'  placeholder='input ptr no.' required/></div>" +
                        "<div class='row-fluid'><span style='font-weight: bold'>PTR Date </span> <input class='' type='text' name='ptr_date' id='ptr_date'  value='" + d.getFullYear() + "-" + (d.getUTCMonth()+1) + "-" + d.getDate() + "' readonly/></div>" +
                        "<div class='row-fluid'><span style='font-weight: bold'>Date Acquired</span> <input class='' type='text' name='date_acquired' id='date_acquired'  value='"+ date_acquired +"' readonly/></div>" +
                        "<div class='row-fluid'><span style='font-weight: bold'>Item Description</span> <input class='' type='text' name='item_desc' id='item_desc'  value='"+ item_and_specification +"' readonly/></div>" +
                        "<div class='row-fluid'><span style='font-weight: bold'>Unit Cost</span> <input class='' type='text' name='unit_cost' id='unit_cost'  value='"+ unit_cost +"' readonly/></div>" +
                        "<div class='row-fluid'><span style='font-weight: bold'>Total Cost</span> <input class='' type='text' name='total_cost' id='total_cost'  value='"+ total_cost +"' readonly/></div>" +
                        "<div class='row'><button class='btn btn-danger btn-small ' style='margin-left:20px;' id='btn_undo'><i class='icon icon-undo'></i> Undo Transfer</button><span class='btn btn-small btn-success' style='margin-left:24px;' id='confirm_transfer_btn' data-id='" + transfer + "' is-transfer='"+is_transfer+"' >Confirm Transfer <i class='icon icon-caret-right'></i></span><div>");
                    // console.log(result);


                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("error in server");
                }


            });

    });

        //all cancel btn-danger
        $('#data_add').on('click','#btn_undo',function(){
              $('#data_add').html("");
              $('#block_span').html("");
        });
        $('#block_span').on('click','#cancel_pt',function(){
            $('#block_span').html("");
            $('#data_add').html("");
            $('#data_add').css('opacity','1');
        });
        $('#block_span').on('click','.btn_undo_selected',function(){
            $('#issue_to').val('default').change();
        });

        $('#data_add').on('click','#confirm_transfer_btn',function(){
            if($('#ptr_no').val().length > 0) {

                var id_transfer = $(this).attr('data-id');
                var is_transfer = $(this).attr('is-transfer');
                // console.log(id_transfer);
                // console.log(is_transfer);
                $.ajax({
                    url: '../ajaxPOST/supplier_2.php',
                    type: 'post',
                    dataType:'json',
                    data:{id_transfer:id_transfer,is_transfer:is_transfer},
                    success:function(qwe){
                        // console.log(qwe);
                        let pt_from_fund = $('#fund').val();
                        let pt_to_fund = $('#to_fund option:selected').text();
                        let pt_to_fund_id = $('#to_fund option:selected').val();
                        let pt_ptr_no = $('#ptr_no').val();
                        let pt_ptr_date = $('#ptr_date').val();
                        let pt_ics_no = $('#ics_num').val();
                        let pt_date_acquired = $('#date_acquired').val();
                        let pt_item_description = $('#item_desc').val();
                        let pt_college = $('#college').val();
                        let pt_quantity = $('#quantity').val();
                        let pt_unit = $('#unit').val();
                        let pt_unit_cost = $('#unit_cost').val();
                        let pt_total_cost = $('#total_cost').val();
                        $('#data_add').css('opacity','0.6');
                        $('#ptr_no').attr('disabled','disabled');
                        $('#to_fund').attr('disabled','disabled');
                        $('#confirm_transfer_btn').attr('disabled','disabled');
                        $('#btn_undo').attr('disabled','disabled');

                        let data = '<input type="hidden" name="ics_transfer_id" value="'+id_transfer+'"><div class="block" style="padding:25px;position:relative;">\n' +
                            '                       <div style="position:absolute;width:100%;height:30px;top:0;left:0;background-color:#8181c6;">\n' +
                            '                           <label class="text-center" style="color:white;line-height:32px;font-weight: bolder">Property Transfer Report</label>\n' +
                            '                       </div>\n' +
                            '                       <div style="margin-bottom:10px;"></div>\n' +
                            '                        <div class="row-fluid">\n' +
                            '                            <div class="span5 ">\n' +
                            '                                <div class="span12 text-center"><span class="span_label">Released / Issued by</span></div>\n' +
                            '                                <div class="span12">\n' +
                            '                                    <input type="hidden" name="issued_by_id" value="'+qwe.current_receiver_id+'">' +
                            '                                    <input type="hidden" name="is_transfer" value="'+is_transfer+'">' +
                            '                                    <input type="text" name="issued_by" id="issued_by" value="'+qwe.current_receiver+'" style="position:relative;width:100%;font-size:11px" readonly/>\n' +
                            '                                </div>\n' +
                            '                            </div>\n' +
                            '                            <div class="span2 text-center" style="padding-top:5px;">\n' +
                            '                                <i class="icon icon-exchange"></i>\n' +
                            '                            </div>\n' +
                            '                            <div class="span5">\n' +
                            '                                <div class="span12 text-center"><span class="span_label">Release / Issue to</span></div>\n' +
                            '                                <div class="span12">\n' +
                            '                                    <select style="position:relative;width:100%;font-size:11px;margin:0" name="issue_to" id="issue_to">\n' +
                            '                                        ' + qwe.all_employee +
                            '                                    </select>\n' +
                            '                                </div>\n' +
                            '                                 <div class="span12" style="max-height:40px;">' +
                            '                                   <div class="span6">' +
                            '                                       <div class="span12" style="height:15px !important;position:relative;min-height:15px !important;">' +
                            '                                         <small class="text-success cant_find">cant find enduser? </small>' +
                            '                                       </div>' +
                            '                                       <div class="span12">' +
                            '                                           <a href="manage_enduser.php" class="cant_find" style="height:15px !important;position:relative;min-height:15px !important;">click here to add</a>' +
                            '                                       </div>' +
                            '                                   </div>' +
                            '                                   <div class="span6">' +
                            '                                        <span class="btn_undo_selected btn btn-info btn-small cant_find" style="margin-top:8px;"><i class="icon icon-undo"></i> Undo selected</span>' +
                            '                                   </div>'+
                            '                                 </div>\n'+
                            '                            </div>\n' +
                            '                        </div>\n' +
                            '                       <div class="row-fluid">\n' +
                            '                           <div class="text-center">\n' +
                            '                               <span class="span12">Reason for transfer</span>\n' +
                            '                           </div>\n' +
                            '                           <div class="text-center">\n' +
                            '                               <textarea name="reason_for_transfer" style="width:100%;font-size:12px;" required></textarea>\n' +
                            '                           </div>\n' +
                            '                       </div>\n' +
                            '                       <div class="row-fluid">\n' +
                            '                            <div class="span6">\n' +
                            '                                <div class="text-center">\n' +
                            '                                    <span class="span_label">From - FundCluster</span>\n' +
                            '                                    <input type="text" name="pt_from_fundcluster" id="pt_from_fundcluster" value="'+pt_from_fund+'" readonly/>\n' +
                            '                                </div>\n' +
                            '                                <div class="text-center">\n' +
                            '                                    <span class="span_label">PTR No.</span>\n' +
                            '                                    <input type="text" name="pt_ptr_no" id="pt_ptr_no" value="'+pt_ptr_no+'" readonly/>\n' +
                            '                                </div>\n' +
                            '                                <div class="text-center">\n' +
                            '                                    <span class="span_label">ICS No.</span>\n' +
                            '                                    <input type="text" name="pt_ics_no" id="pt_ics_no" value="'+pt_ics_no+'" readonly/>\n' +
                            '                                </div>\n' +
                            '                                <div class="text-center">\n' +
                            '                                    <span class="span_label">Item description.</span>\n' +
                            '                                    <input type="text" name="pt_item_description" id="pt_item_description" value="'+pt_item_description+'" readonly/>\n' +
                            '                                </div>\n' +
                            '                                <div class="text-center">\n' +
                            '                                    <span class="span_label">Qty</span>\n' +
                            '                                    <input type="text" name="pt_quantity" id="pt_quantity" value="'+pt_quantity+'" readonly/>\n' +
                            '                                </div>\n' +
                            '                                <div class="text-center">\n' +
                            '                                    <span class="span_label">Unit cost</span>\n' +
                            '                                    <input type="text" name="pt_unit_cost" id="pt_unit_cost" value="'+pt_unit_cost+'" readonly/>\n' +
                            '                                </div>\n' +
                            '                            </div>\n' +
                            '                            <div class="span6">\n' +
                            '                                <div class="text-center">\n' +
                            '                                    <span class="span_label">To - FundCluster</span>\n' +
                            '                                    <input type="text" name="pt_to_fundcluster" id="pt_to_fundcluster" value="'+pt_to_fund+'" readonly/>\n' +
                            '                                </div>\n' +
                            '                                <div class="text-center">\n' +
                            '                                    <span class="span_label">PTR Date.</span>\n' +
                            '                                    <input type="text" name="pt_ptr_date" id="pt_ptr_date" value="'+pt_ptr_date+'" readonly/>\n' +
                            '                                </div>\n' +
                            '                                <div class="text-center">\n' +
                            '                                    <span class="span_label">Date acquired</span>\n' +
                            '                                    <input type="text" name="pt_date_acquired" id="pt_date_acquired" value="'+pt_date_acquired+'" readonly/>\n' +
                            '                                </div>\n' +
                            '                                <div class="text-center">\n' +
                            '                                    <span class="span_label">College</span>\n' +
                            '                                    <input type="text" name="pt_college" id="pt_college" value="'+pt_college+'" readonly/>\n' +
                            '                                </div>\n' +
                            '                                <div class="text-center">\n' +
                            '                                    <span class="span_label">Unit</span>\n' +
                            '                                    <input type="text" name="pt_unit" id="pt-unit" value="'+pt_unit+'" readonly/>\n' +
                            '                                </div>\n' +
                            '                                <div class="text-center">\n' +
                            '                                    <span class="span_label">Total cost</span>\n' +
                            '                                    <input type="text" name="pt_total_cost" id="pt_total_cost" value="'+pt_total_cost+'" readonly/>\n' +
                            '                                </div>\n' +
                            '                                <div class="text-right">\n' +
                            '                                    <button type="button" id="cancel_pt" class="btn btn-danger btn-small"><i class="icon icon-remove-circle"></i> Cancel</button>\n' +
                            '                                    <button type="submit" class="btn btn-success btn-small" name="transfer_ics_property" value="1"><i class="icon icon-save"></i> Transfer Property</button>\n' +
                            '                                </div>\n' +
                            '                            </div>\n' +
                            '                       </div>\n' +
                            '                   </div>';


                        $('#block_span').html(data);
                    }

                });


            }else{
                alert("please input PTR No.");
            }

        });
    });

    $('#data_add').on('change','#quantity',
        function(){
          
           var cur_val = this.defaultValue;
            if(parseInt($(this).val()) > parseInt(cur_val)){
                $(this).val(cur_val);
            }else if(parseInt($(this).val()) < 0 ){
                $(this).val(0);
            
            }
        }
    );

    $('#example1 tfoot th').each( function () {
        var title = $(this).text();
        var btn ='';
        if(title == 'Select'){
            var text = 'text';
             btn = 'placeholder="" style="border:none;background-color:white" readonly';
        }else{
            var text = 'text';
            btn = 'placeholder="Search '+title+'"';
        }
        $(this).html( '<input type="'+text+'"' +btn+'/>' );
    });


    $('#example1').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
        ,"scrollX": true,
        "scrollY": 200
    });

</script>