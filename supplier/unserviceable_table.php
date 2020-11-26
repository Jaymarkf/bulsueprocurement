<div class="block">
    <div class="container-fluid" style="padding:24px">
        <div class="text-center">
            Data Table
        </div>
        <div class="row-fluid" style="display:flex">
            <label style="line-height:30px">End User</label>&nbsp;&nbsp;
            <select name="facult_name" id="facult_name" onchange="location = this.value">
                <option value="" selected disabled hidden>Please select user</option>
                <?php
                    $sql = $conn->query("select * from tbl_supplier_employee order by first_name asc");
                    while($row = $sql->fetch_assoc()){
                        ?>
                            <option value="?ref_id=<?=$row['id']?>"
                                <?php
                                    if(isset($_GET['ref_id'])){
                                        if($row['id'] == $_GET['ref_id']){
                                            echo 'selected';
                                        }
                                    }
                                ?>
                            ><?=$row['first_name'] . ' '. $row['middle_name']. ' '. $row['last_name']?></option>
                        <?php
                    }
               ?>
            </select>
        </div>
        <form id="table_form" method="POST">
        <div>
            <table class="table" cellpadding="0" cellspacing="0" id="gg">
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Transaction Type</th>
                        <th>Item Description</th>
                        <th>Quantity</th>
                        <th>Date Acquired</th>
                    </tr>
                </thead>
                <tbody id="body_data">
                <?php
                    if(isset($_GET['ref_id'])){
                        $id_owner = $_GET['ref_id'];
                        $cc = $conn->query("select * from item_owner where owner_id = '$id_owner' or par_owner_id like '%$id_owner%'");
                        $html  = '';
                        if($cc->num_rows > 0 ) {


                            while ($data_item = $cc->fetch_assoc()) {

                               echo '<tr> 
                                      <td><input type="radio" name="rdx" value="' . $data_item['id'] . '" required></td>
                                      <td>' . $data_item['transaction_type'] . '</td>
                                      <td>' . $data_item['item_id'] . '</td>
                                      <td>' . $data_item['quantity'] . '</td>
                                      <td>' . $data_item['date_acquired'] . '</td>
                                    </tr>';
                            }
                        }else{
                           echo '';
                        }

                    }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Select</th>
                    <th>Transaction Type</th>
                    <th>Item Description</th>
                    <th>Quantity</th>
                    <th>Date Acquired</th>
                </tr>
                </tfoot>
            </table>
            <div class="text-right" style="margin-top:24px;">
                <button type="submit" class="btn btn-success btn-small"><i class="icon icon-certificate"></i> Show form</button>
            </div>
        </div>
        </form>
        <?php
        if(isset($_GET['item_id'])){
        $bb = $conn->query("select * from item_owner where id = ".$_GET['item_id']);
        $fs = $bb->fetch_assoc();
        if($fs['transaction_type'] == 'PAR'){
            $nm =  $fs['par_owner_id'];
        }else{
           $nm =  $fs['owner_id'];
        }
        $d_a = $fs['date_acquired'];
        $total = $fs['unit_price'] * $fs['quantity'];
        ?>
       <form id="dispose_submit">
            <div class="block">
                <div class="row-fluid" style="padding:20px; display:flex">
                    <label style="line-height:34px;">Name: &nbsp;&nbsp;</label>
                    <input type="text" name="d_name" id="d_name" value="" data-id="<?=$nm?>" readonly/>
                    <div style="margin-left:5px;margin-right:5px;"></div>
                    <label style="line-height:34px;">Date Acquired: &nbsp;&nbsp;</label>
                    <input type="text" name="d_acquired" id="d_acquired" value="<?=$d_a?>" readonly/>
                    <div style="margin-left:5px;margin-right:5px;"></div>
                    <label style="line-height:34px;">Description: &nbsp;&nbsp;</label>
                    <input type="text" name="description" id="description" value="<?=$fs['item_id']?>" readonly/>
                </div>
                <div class="row-fluid" style="padding:20px; display:flex">
                    <label style="line-height:34px;">Quantity: &nbsp;&nbsp;</label>
                    <input class="num" type="number" name="quantity" id="quantity" value="<?=$fs['quantity']?>" required/>
                    <div style="margin-left:5px;margin-right:5px;"></div>
                    <label style="line-height:34px;">Amount: &nbsp;&nbsp;</label>
                    <input type="text" name="amount" id="amount" value="<?=$total?>" def-val="<?=$fs['unit_price']?>" readonly/>
                    <div style="margin-left:5px;margin-right:5px;"></div>
                    <button type="submit" class="btn btn-success btn-small">Dispose</button>
                </div>
            </div>
        </form>

        <?php
        }
        ?>
        <div class="block">
            <div class="text-center" style="padding:20px;">
                <h5>Request Form Data</h5>
            </div>
            <div class="container-fluid">
                <table class="table table-striped table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>Date Acquired</th>
                        <th>Description</th>
                        <th>Name of Employee</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql_req = $conn->query("select * from disposal_request");
                        while($row_request = $sql_req->fetch_assoc()){
                            //get the name of employee
                            $sql_emp = $conn->query("select * from tbl_supplier_employee where id = ".$row_request['name_of_employee']);
                            $emp_info = $sql_emp->fetch_assoc();
                            ?>
                                <tr>
                                    <td><?=$row_request['date_acquired']?></td>
                                    <td><?=$row_request['particulars_articles']?></td>
                                    <td><?=$emp_info['first_name']. ' '. $emp_info['middle_name'] . ' '. $emp_info['last_name']?></td>
                                    <td><a href="print_disposal_request.php?id=<?=$row_request['id']?>" class="btn btn-success btn-small"><i class="icon icon-print"></i> Print Preview</a></td>
                                </tr>
                            <?php
                        }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="block">
            <div class="text-center" style="padding:20px;">
                <h5>SUMMARY OF UNSERVICEABLE PROPERTY</h5>
            </div>
            <table class="table table-striped table-bordered table-responsive">
                <thead>
                <tr>
                    <th>Date Acquired</th>
                    <th>Description</th>
                    <th>Name of Employee</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql_req = $conn->query("select * from disposal_request");
                while($row_request = $sql_req->fetch_assoc()){
                    //get the name of employee
                    $sql_emp = $conn->query("select * from tbl_supplier_employee where id = ".$row_request['name_of_employee']);
                    $emp_info = $sql_emp->fetch_assoc();
                    ?>
                    <tr>
                        <td><?=$row_request['date_acquired']?></td>
                        <td><?=$row_request['particulars_articles']?></td>
                        <td><?=$emp_info['first_name']. ' '. $emp_info['middle_name'] . ' '. $emp_info['last_name']?></td>
                        <td><a href="print_disposal_request.php?id=<?=$row_request['id']?>" class="btn btn-success btn-small"><i class="icon icon-print"></i> Print Preview</a></td>
                    </tr>
                    <?php
                }

                ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
   $(document).ready(function(){
       <?php
        if(isset($_GET['item_id'])){
            ?>
                $('#d_name').val($( "#facult_name option:selected" ).text());
            <?php
        }
       ?>
       $('#table_form').submit(
           function(e){
               e.preventDefault();
               var radioValue = $("input[name='rdx']:checked").val();
               if(radioValue){
                   window.location = "unserviceable_property.php?ref_id=<?=$_GET['ref_id']?>&item_id=" + radioValue;
               }
           }
       );

       $('.num').change(function(){
           var cur_val = this.defaultValue;
           if(parseInt($(this).val()) > parseInt(cur_val)){
               $(this).val(cur_val);
           }else if(parseInt($(this).val()) < 0 ){
               $(this).val(0);
           }
           var def = $('#amount').attr('def-val');
           var total = parseInt($(this).val()) * parseInt(def);
           $('#amount').val(total);

       });
    $('#dispose_submit').submit(
        function(e){
            var data  = $(this).serialize();
            e.preventDefault();
            $.ajax({
                url: '../ajaxPOST/unserviceable.php',
                type: 'post',
                data:data,
                success:function(x){
                    $.jGrowl("New Unserviceable data has been added", { header: 'UNSERVICEABLE PROPERTY SUCCESS' });
                    var delay = 3000;
                    setTimeout(function(){ window.location = 'unserviceable_property.php'; }, delay);
                }
            });
        }
    );


   });
</script>
