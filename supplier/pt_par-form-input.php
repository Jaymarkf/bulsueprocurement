<style>
    .highlight{
        background-color: #b3c2a1;
    }
</style>
<div class="block">
    <div class="container-header text-center" style="position:relative;width:100%;height:40px;background-image:linear-gradient(#bababa, #454545); ">
        <span style="color:#e9e9e9;font-weight: bold;line-height: 35px;">Transfer PAR Data</span>
    </div>
    <div class="container-fluid" style="padding:40px;">
        <table class="table" cellpadding="0" cellspacing="0" id="example1">
            <thead>
            <tr>
                <th>Select</th>
                <th>PAR No.</th>
                <th>Code</th>
                <th>College</th>
                <th>Owner</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $ff = $conn->query("select * from tbl_par");
            while($row = $ff->fetch_assoc()){
                //get the equipment code
                $aa = $conn->query("select * from equipment_code where id = ". $row['e_code']);
                $data_code = $aa->fetch_assoc();
                $e_code  = $data_code['description']. '-' . '('.$data_code['code'].')';
                //get the college
                //explode user
                $user = explode(",",$row['received_by_ids']);
                $college = array();
                $receiver = array();
                foreach ($user as $item => $val) {
                    $ff = $conn->query("select emp.*,col.* from tbl_supplier_employee emp inner join tbl_branch col on emp.college = col.branchID  where emp.id = ".$val);
                    $data = $ff->fetch_assoc();
                    $college[$item] = $data['branch'];
                    $receiver[$item] = $data['first_name'] .' '.  $data['middle_name']. ' '. $data['last_name'];
                }
                if(count(array_unique($college)) > 1 ){
                    $datax = implode(",",$college);

                }else{
                    $temp = array_unique($college);
                    $datax = $temp[0];
                }

                if(count($receiver) > 1){
                    $receiver_name = implode(" and ", $receiver);
                }else{
                    $receiver_name = $receiver[0];
                }
                                        $btn = '<a href="?pt='.$row['id'].'" class="btn btn-small btn-success flag"> <i class="icon icon-plus"></i> Add to Transfer</a>';
                    //select if quantity = 0;
                  $r = $conn->query("select * from tbl_par_items where par_id = " .$row['id']);
                  $quantityz = array();
                                          $btn = '<a href="?pt='.$row['id'].'" class="btn btn-small btn-success flag"> <i class="icon icon-plus"></i> Add to Transfer</a>';
                  while($res = $r->fetch_assoc()){
                   
                    $quantityz[] = $res['quantity'];
                    $temp = array_filter($quantityz, function($value){
                        return $value > 0;
                    });
                    
                    if(count($temp) == 0){
                        $btn = '<button class="btn btn-small btn-default flag"> <i class="icon icon-ban-circle"></i> Already Transfered</button>';
                    }else{
                        $btn = '<a href="?pt='.$row['id'].'" class="btn btn-small btn-success flag"> <i class="icon icon-plus"></i> Add to Transfer</a>';
                    }
                 }
                ?>
            <tr>
                <td><?=$btn?></td>
                <td><?=$row['ics_num']?></td>
                <td><?=$e_code?></td>
                <td><?=$datax?></td>
                <td><?=$receiver_name?></td>

            </tr>
            <?php

            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php
if(isset($_GET['pt'])){
    $id = $_GET['pt'];
    $cc = $conn->query('select * from tbl_par_items where par_id = '.$id);
?>
<form method="post" id="form-desc">
<div class="block">
    <div class="container-header text-center" style="position:relative;width:100%;height:40px;background-image:linear-gradient(#db9898, #d06868); ">
        <span style="color:#e9e9e9;font-weight: bold;line-height: 35px;">Selected Data</span>
    </div>
    <div class="container-fluid">
        <table class="table" cellpadding="0" cellspacing="0" id="tbl_id">
            <thead>
            <tr>
                <th>Select</th>
                <th>Item Description</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Unit Cost</th>
                <th>Total Cost</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while($rows = $cc->fetch_assoc()){
             ?>
                <tr>
                    <td><input type="radio" name="ck" class="ck" value="<?=$rows['id']?>"/></td>
                    <td><?=$rows['item_description']?></td>
                    <td><input type="number" name="quantity" value="<?=$rows['quantity']?>" class="num" fixnum="<?=$rows['quantity']?>" readonly/></td>
                    <td><?=$rows['unit']?></td>
                    <td><?=$rows['unit_cost']?></td>
                    <td><?=$rows['total_cost']?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="block">
    <div class="container-fluid" style="padding:24px;">
        <div class="row">

        </div>
        <div class="row">
        <div class="span3">
           <label style="display:block"> Released / Issued By:</label>
            <select class="form-control" name="issued_by" id="issued_by">
                <option style="display:none" selected hidden disabled>select enduser</option>
                <?php
                    $ffz = $conn->query("select * from tbl_par where id = ".$_GET['pt']);
                    $dataz = $ffz->fetch_assoc();
                    $idz = explode(",",$dataz['received_by_ids']);
                foreach ($idz as $index) {
                    $d = $conn->query("select * from tbl_supplier_employee where id = ".$index);
                    $name = $d->fetch_assoc();
                    ?>
                    <option value="<?=$name['id']?>"><?php echo $name['first_name']. ' '. $name['middle_name']. ' '. $name['last_name']?></option>
                <?php
                  }
                ?>
            </select>
        </div>


        <div class="span3">
            <label style="display:block">Received By</label>
            <select class="form-control" name="received_by" id="received_by">
                <option style="display:none" selected hidden disabled>select enduser</option>
                <?php
                    $sc = $conn->query("select * from tbl_supplier_employee");
                    $loop = 0;
            
                    while($data_emp = $sc->fetch_assoc()){
                            if(!(in_array($data_emp['id'],$idz))){
                        ?>
                            <option value="<?=$data_emp['id']?>"><?=$data_emp['first_name'].' '. $data_emp['middle_name'] . ' '. $data_emp['last_name']?></option>
                        <?php
                            }
                            
                    }
                    $loop = 0;
                ?>
            </select>
        </div>
        <div class="span3">
            <label style="display:block">Reason for transfer</label>
            <textarea name="reason" id="reason"></textarea>
        </div>
        <div class="span3">
            <button type="submit" name="submit" value="submit" class="btn btn-success"><i class="icon icon-indent-right"></i> Transfer Property</button>
            <a href="pt_par.php" class="btn btn-danger"><i class="icon icon-remove-circle"></i> Cancel</a>
        </div>
        </div>
    </div>
</div>

</form>
<div class="block">
    <div class="container-fluid" style="padding:24px;">
    <div class="text-center" style="padding:24px;">
    Transfer Item Data Logs</div>
        <table class="table table-responsive table-stripped table-bordered example" cellpadding="0" cellspacing="0">
            <thead>
                    <tr>
                        <td>transfer par id</td>
                        <td>quantity</td>
                        <td>issued by</td>
                        <td>received by</td>
                        <td>reason for transfer</td>
                        <td>action</td>
                    </tr>
            </thead>
                <tbody>
                        <?php
                            $cc = $conn->query("select * from tbl_pt_par_items");
                            while($row_data = $cc->fetch_assoc()){
                                //get name
                                $n = $conn->query("select * from tbl_supplier_employee where id = ".$row_data['issued_by']);
                                $f = $n->fetch_assoc();
                                $issued_by = $f['first_name']. ' ' .$f['middle_name'] . ' ' . $f['last_name'];

                                $m = $conn->query("select * from tbl_supplier_employee where id = ". $row_data['received_by']);
                                $x = $m->fetch_assoc();
                                $received_by = $x['first_name']. ' '. $x['middle_name'] . ' '. $x['last_name'];
                                ?>
                                <tr>
                                    <td><?=$row_data['par_items_id']?></td>
                                    <td><?=$row_data['quantity']?></td>
                                    <td><?=$issued_by?></td>
                                    <td><?=$received_by?></td>
                                    <td><?=$row_data['reason_for_transfer']?></td>
                                    <td><button class="btn-pt-transfer btn btn-success btn-small" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?=$row_data['id']?>"><i class="icon icon-plus"></i> Re Transfer Item</button></td>
                                </tr>
                                <?php
                            }
                        ?>
                </tbody>
        </table>                    
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display:none">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom-left-radius:0px;border-bottom-right-radius:0px;">
        <h5 class="modal-title" id="exampleModalLongTitle">Re Transfer Item</h5>
      </div>
      <div class="modal-body">
        <div class="row-fluid span12">
            <div class="row">
                            <div class="text-center">Transfer to</div>
                            <div class="text-center"><i class="icon icon-exchange"></i></div>
            </div>
               
            <div class="span6" style="margin:0px;">
                <div class="row-fluid">
                        <label>par id</label>
                        <input type="text" name="mpar_id" id="mpar_id"  class="span8" readonly/>
                </div>
                <div class="row-fluid">
                        <label>quantity</label>
                        <input type="number" name="mquantity" id="mquantity"  class="span8" />
                </div>
                <div class="row-fluid">
                        <label>issued by</label>
                        <input type="text" name="missued_by" id="missued_by"  class="span8" readonly/>
                </div>
                <div class="row-fluid">
                        <label>received by</label>
                        <input type="text" name="mreceived_by" id="mreceived_by"  class="span8" readonly/>
                </div>
                <div class="row-fluid">
                        <label>reason for transfer </label>
                        <input type="text" name="mreason_for_transfer" id="mreason_for_transfer" class="span8"  readonly/>
                </div>
            </div>
            <div class="span6" style="margin:0px;">
                <div class="row-fluid">
                        <label>Transfer To</label>
                        <input type="text" name="mpar_id" id="mpar_id" class="span10" readonly/>
                </div>
            
            </div>
        

                            
              
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Proceed Transfer</button>
      </div>
    </div>
  </div>
</div>
<?php
}
?>
<script>
    $(document).ready(function(){

        $('.btn-pt-transfer').click(function(){
            var id_modal = $(this).attr("data-id");
            $.ajax({
                url: 'form_submit/pt_par.php',
                data:{id_modal:id_modal},
                dataType:'json',
                type: 'post',
                success:function(e){
                   $('#mpar_id').val(e.par_id);
                   $('#mquantity').val(e.quantity);
                   $('#mquantity').attr('default-val',e.quantity);
                   $('#missued_by').val(e.issued_by);
                   $('#mreceived_by').val(e.received_by);
                   $('#mreason_for_transfer').val(e.reason_for_transfer);
                }
            });
        });

       $('#exampleModalCenter').on('change','#mquantity',function(){
             var cur_val = $(this).attr('default-val');
            if(parseInt($(this).val()) > parseInt(cur_val)){
                $(this).val(cur_val);
            }else if(parseInt($(this).val()) < 0 ){
                $(this).val(0);
            }
        
       });

        function getRadioVal(form, name) {
            var val;
            // get list of radio buttons with specified name
            var radios = form.elements[name];

            // loop through list of radio buttons
            for (var i=0, len=radios.length; i<len; i++) {
                if ( radios[i].checked ) { // radio checked?
                    val = radios[i].value; // if so, hold its value in val
                    break; // and break out of for loop
                }
            }
            return val; // return value of checked radio or undefined if none checked
        }
        function getquantity(){
            var f = 0;
            $('#tbl_id tr').each(
              function(){
                  if($(this).find('td input:radio').is(':checked')){
                     f =  $(this).find("td input[type='radio']:checked").parents('tr').children(':eq(2)').find('input').val();
                  }
              }
            );

            return f;
        }
        $('#form-desc').submit(
              function(e){
              e.preventDefault();
              var radio_id    =  getRadioVal(document.getElementById('form-desc'),'ck');
              var quantity    = getquantity();
              var str_reason  = $('#reason').val();
              var issued_by   = $('#issued_by').val();
              var received_by = $('#received_by').val();
              $.ajax({
                  url:'form_submit/pt_par.php',
                  type:'post',
                  data:{radio_id:radio_id,quantity:quantity,str_reason:str_reason,issued_by:issued_by,received_by:received_by},
                  success:function(x){  
                      console.log(x);
                    $.jGrowl("ACCESS GRANTED! Wait for a moment while preparing the system for you... ", { header: 'LOGIN SUCCESS' });
					var delay = 3000;
					setTimeout(function(){ window.location = 'pt_par.php'; }, delay);
                  }
              });

            }
        );

       $('.num').change(function(){
           var cur_val = this.defaultValue;
            if(parseInt($(this).val()) > parseInt(cur_val)){
                $(this).val(cur_val);
            }else if(parseInt($(this).val()) < 0 ){
                $(this).val(0);
            }
       });

        $('#tbl_id tr').click(function () {
            $(this).find('td input:radio').prop('checked', true);
            $('.num').attr('readonly',true);
            $(this).find('td input[type="number"]').attr('readonly',false);
            $('#tbl_id tr').removeClass("highlight");
            $(this).addClass("highlight");
        });



    });
</script>