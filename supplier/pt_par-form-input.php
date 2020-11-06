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

                ?>
            <tr>
                <td><a href="?pt=<?=$row['id']?>" class="btn btn-small btn-success flag"><i class="icon icon-plus"></i> Add to Transfer</a></td>
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
                    while($data_emp = $sc->fetch_assoc()){
                        ?>
                            <option value="<?=$data_emp['id']?>"><?=$data_emp['first_name'] . ' '. $data_emp['middle_name'] . ' '. $data_emp['last_name']?></option>
                        <?php
                    }
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



<?php
}
?>
<script>
    $(document).ready(function(){
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