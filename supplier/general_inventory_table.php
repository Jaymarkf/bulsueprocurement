<div class="block">
    <div class="container-fluid">
        <div style="padding:24px;">
            <div class="text-center" style="margin-bottom:30px;">
                PROPERTY ACKNOWLEDGEMENT RECEIPT <strong>(PAR)</strong>
            </div>
            <div class="text-left" style="display:inline-flex;">
                <form id="par_report">
                    <span style="line-height:30px;">select enduser you want to generate PAR reports:&nbsp;&nbsp;&nbsp;</span>
                    <select class="form-control" id="end_users_par" name="end_users_par" style="top:5px;position:relative;margin-right:5px;" required>
                        <option value="" selected hidden disabled>select enduser here..</option>
                        <?php
                        $sql = $conn->query("select * from item_owner where transaction_type = 'PAR'");
                        while($row = $sql->fetch_assoc()){
                            if($row['owner_id'] != null){
                                $idd = $row['owner_id'];
                                $sql_name = $conn->query("select * from tbl_supplier_employee where id = ".$idd);
                                $name = $sql_name->fetch_assoc();
                                $name_info = $name['first_name']. ' '. $name['middle_name']. ' ' .$name['last_name'];
                                $id_info = $name['id'];
                                echo '<option value="'.$id_info.'">'.$name_info.'</option>';
                            }elseif($row['par_owner_id'] != null){
                                $idd = $row['par_owner_id'];
                                if(strpos($idd,',') !== false){
                                 $arr_id = explode(",",$idd);
                                    foreach ($arr_id as $index) {
                                        $sql_name = $conn->query("select * from tbl_supplier_employee where id like '%$index%' ");
                                        $name = $sql_name->fetch_assoc();
                                        $name_info = $name['first_name']. ' '. $name['middle_name']. ' ' .$name['last_name'];
                                        $id_info = $name['id'];
                                        echo '<option value="'.$id_info.'">'.$name_info.'</option>';
                                    }
                                }else{
                                    $sql_name = $conn->query("select * from tbl_supplier_employee where id = '$idd'");
                                    $name = $sql_name->fetch_assoc();
                                    $name_info = $name['first_name']. ' '. $name['middle_name']. ' ' .$name['last_name'];
                                    $id_info = $name['id'];
                                    echo '<option value="'.$id_info.'">'.$name_info.'</option>';
                                }

                            }

                        }
                        ?>

                    </select>
                    <button type="submit" class="btn btn-success btn-small"> Generate Report</button>
                </form>
            </div>
            <table class="table" id="gg">
                <thead>
                <tr>
                    <th>End User</th>
                    <th>College / Campus</th>
                    <th>Date Generated</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $ss = $conn->query("select par.id as id_par,par.*,emp.* from par_summary_report par inner join tbl_supplier_employee emp on par.end_user = emp.id where par.transaction_type = 'PAR'");
                    while($data = $ss->fetch_assoc()){
                        //get college info
                        $col = $conn->query("select * from tbl_branch where branchID = ".$data['college']);
                        $col_data = $col->fetch_assoc();
                        ?>
                        <tr>
                            <td><?=$data['first_name']. ' '. $data['middle_name'] . ' '. $data['last_name']?></td>
                            <td><?=$col_data['branch']?></td>
                            <td><?=$data['date_generated']?></td>
                            <td><a class="btn btn-success btn-small btn-print-par" href="general_inventory_par_pdf.php?id=<?=$data['id_par']?>"><i class="icon icon-print"></i> Print</a>
                                <button class="btn btn-danger btn-small btn-delete-par"  data-id="<?=$data['id_par']?>"><i class="icon icon-trash"></i> Delete</button>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
                </tbody>
            </table>
        </div>




        <div style="padding:24px;">
            <div class="text-center" style="margin-bottom:30px;">
                INVENTORY CUSTODIAN RECEIPT <strong>(ICS)</strong>
            </div>
            <div class="text-left" style="display:inline-flex;">
                <form id="ics_report">
                    <span style="line-height:30px;">select enduser you want to generate PAR reports:&nbsp;&nbsp;&nbsp;</span>
                    <select class="form-control" id="end_users_ics" name="end_users_ics" style="top:5px;position:relative;margin-right:5px;" required>
                        <option value="" selected hidden disabled>select enduser here..</option>
                        <?php
                        $sql = $conn->query("select * from item_owner where transaction_type = 'ICS'");
                        while($row = $sql->fetch_assoc()){
                            if($row['owner_id'] != null){
                                $idd = $row['owner_id'];
                                $sql_name = $conn->query("select * from tbl_supplier_employee where id = ".$idd);
                                $name = $sql_name->fetch_assoc();
                                $name_info = $name['first_name']. ' '. $name['middle_name']. ' ' .$name['last_name'];
                                $id_info = $name['id'];
                                echo '<option value="'.$id_info.'">'.$name_info.'</option>';
                            }elseif($row['par_owner_id'] != null){
                                $idd = $row['par_owner_id'];
                                if(strpos($idd,',') !== false){
                                    $arr_id = explode(",",$idd);
                                    foreach ($arr_id as $index) {
                                        $sql_name = $conn->query("select * from tbl_supplier_employee where id like '%$index%' ");
                                        $name = $sql_name->fetch_assoc();
                                        $name_info = $name['first_name']. ' '. $name['middle_name']. ' ' .$name['last_name'];
                                        $id_info = $name['id'];
                                        echo '<option value="'.$id_info.'">'.$name_info.'</option>';
                                    }
                                }else{
                                    $sql_name = $conn->query("select * from tbl_supplier_employee where id = '$idd'");
                                    $name = $sql_name->fetch_assoc();
                                    $name_info = $name['first_name']. ' '. $name['middle_name']. ' ' .$name['last_name'];
                                    $id_info = $name['id'];
                                    echo '<option value="'.$id_info.'">'.$name_info.'</option>';
                                }

                            }

                        }
                        ?>

                    </select>
                    <button type="submit" class="btn btn-success btn-small"> Generate Report</button>
                </form>
            </div>
            <table class="table" id="ggg">
                <thead>
                <tr>
                    <th>End User</th>
                    <th>College / Campus</th>
                    <th>Date Generated</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $ss = $conn->query("select par.id as id_par,par.*,emp.* from par_summary_report par inner join tbl_supplier_employee emp on par.end_user = emp.id where par.transaction_type = 'ICS'");
                while($data = $ss->fetch_assoc()){
                    //get college info
                    $col = $conn->query("select * from tbl_branch where branchID = ".$data['college']);
                    $col_data = $col->fetch_assoc();
                    ?>
                    <tr>
                        <td><?=$data['first_name']. ' '. $data['middle_name'] . ' '. $data['last_name']?></td>
                        <td><?=$col_data['branch']?></td>
                        <td><?=$data['date_generated']?></td>
                        <td><a class="btn btn-success btn-small btn-print-par" href="general_inventory_par_pdf.php?id_ics=<?=$data['id_par']?>"><i class="icon icon-print"></i> Print</a>
                            <button class="btn btn-danger btn-small btn-delete-par"  data-id="<?=$data['id_par']?>"><i class="icon icon-trash"></i> Delete</button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="block">
    <div class="container-fluid">
        <div style="padding:24px">
            <div class="text-center">
                <h4>INVENTORY AND INSPECTION REPORT OF UNSERVICEABLE PROPERTY</h4>
            </div>
            <div class="text-center">
                <a href="iaioup.php" class="btn btn-primary"><i class="icon icon-eye-open"></i> View and Edit Data</a>
                <a href="inventory_and_inspection_of_unserviceable_property_pdf.php" class="btn btn-success btn-small"><i class="icon icon-print"></i> View Print</a>
            </div>
        </div>
    </div>
</div>

<div class="block">
    <div class="container-fluid" style="padding:24px;">
        <div class="text-center">
            <h4>INVENTORY OF FURNITURE AND FIXTURES</h4>
        </div>
        <br>
        <div class="row-fluid">
            <form id="form_furniture">
            <div class="text-center" style="display:flex">
                <strong style="line-height:30px;margin-right:25px;">Select available equipment code</strong>
                <select name="furniture" required class="form-control" style="margin-right:30px;">
                    <option value="" selected disabled hidden>equipment code</option>
                    <?php
                        $sf = $conn->query("select * from item_owner where par_owner_id <> '' group by equipment_code_id");
                        while($id_f = $sf->fetch_assoc()){
                            $sql_furniture = $conn->query("select * from equipment_code where id = ".$id_f['equipment_code_id']);
                            $data_furniture = $sql_furniture->fetch_assoc();
                            $code = $data_furniture['code'];
                            $code_desc = $data_furniture['description'];
                            ?>
                            <option value="<?=$data_furniture['id']?>"><?=$code_desc?> - (<?=$code?>)</option>
                        <?php
                        }
                    ?>
                </select>
                <button class="btn btn-success  btn-small btn-furniture" type="submit" style="max-height:30px;"><i class="icon icon-book"> Generate Report</i></button>
            </div>
            </form>
        </div>
        <br>
        <table class="table" id="gggg">
            <thead>
                <tr>
                    <th>Date Generate</th>
                    <th>Equipment Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $ssql = $conn->query("select * from furniture");
                while($row_furniture = $ssql->fetch_assoc()){
                    $ecode_sql = $conn->query("select * from equipment_code where id = ". $row_furniture['equipment_code']);
                    $data_code = $ecode_sql->fetch_assoc();
                    $ecode = $data_code['description'];
                    ?>
                    <tr>
                        <td><?=$row_furniture['date_generated']?></td>
                        <td><?=$ecode?></td>
                        <td><a href="furniture_pdf.php?ecode=<?=$row_furniture['equipment_code']?>" class="btn btn-success btn-small"><i class="icon icon-print"></i> Print Preview</a>
                            <button type="button" class="btn btn-danger btn-delete-furniture" data-id="<?=$row_furniture['id']?>"><i class="icon icon-trash"></i> Delete</button>
                        </td>
                    </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    //removing duplicate option values in PAR
    var optionValues =[];
    $('#end_users_par option').each(function(){
        if($.inArray(this.value, optionValues) >-1){
            $(this).remove()
        }else{
            optionValues.push(this.value);
        }
    });

    $(document).ready(function(){
        //save PAR reports
        $('#par_report').submit(
            function(e){
                e.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                   url:'form_submit/general_inventory.php',
                   type: 'post',
                   data:data,
                   success:function(){
                       $.jGrowl("New Property Acknowledgement Receipt was successfully generated!", { header: 'SUCCESS' });
                       var delay = 3000;
                       setTimeout(function(){ window.location = 'general_inventory.php'  }, delay);

                   }
                });
            }
        );
        //save ics reports
        $('#ics_report').submit(
            function(e){
                e.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                    url:'form_submit/general_inventory.php',
                    type: 'post',
                    data:data,
                    success:function(b){
                        $.jGrowl("New Inventory Custodian Receipt was successfully generated!", { header: 'SUCCESS' });
                        var delay = 3000;
                        setTimeout(function(){ window.location = 'general_inventory.php'  }, delay);

                    }
                });
            }
        );

        //delete par reports
        $('.btn-delete-par').click(
            function(){
                var delete_par = $(this).attr('data-id');

                $.ajax({
                   url : 'form_submit/general_inventory.php',
                    type: 'post',
                    data:{delete_par:delete_par},
                    success:function(){
                        $.jGrowl("Property Acknowledgement Receipt was successfully deleted!", { header: 'SUCCESS' });
                        var delay = 3000;
                        setTimeout(function(){ window.location = 'general_inventory.php'  }, delay);
                    }
                });
            }
        );
        //delete ics reports
        $('.btn-delete-ics').click(
            function(){
                var delete_ics = $(this).attr('data-id');
                $.ajax({
                    url : 'form_submit/general_inventory.php',
                    type: 'post',
                    data:{delete_ics:delete_ics},
                    success:function(){
                        $.jGrowl("Inventory Custodian Receipt was successfully deleted!", { header: 'SUCCESS' });
                        var delay = 3000;
                        setTimeout(function(){ window.location = 'general_inventory.php'  }, delay);
                    }
                });
            }
        );

        //furniture generate reports submit
        $('#form_furniture').submit(
            function(e){
                var id_ecode = $(this).serialize();
                e.preventDefault();
                $.ajax({
                   url: 'form_submit/general_inventory.php',
                   type: 'post',
                   data:id_ecode,
                   success:function(){
                       $.jGrowl("Inventory of Furnitures and Fixtures report was successfully generated", { header: 'SUCCESS' });
                       var delay = 3000;
                       setTimeout(function(){ window.location = 'general_inventory.php'  }, delay);
                   }
                });
            }
        );

        //delete furniture data
        $('.btn-delete-furniture').click(function(){
            var id_delete_furniture = $(this).attr("data-id");
            if(confirm("are you sure you want to delete this data")){
                $.ajax({
                    url: 'form_submit/general_inventory.php',
                    type: 'post',
                    data: {id_delete_furniture:id_delete_furniture},
                    success:function(){
                        $.jGrowl("Inventory of Furnitures and Fixtures report was successfully deleted!", { header: 'SUCCESS' });
                        var delay = 3000;
                        setTimeout(function(){ window.location = 'general_inventory.php'  }, delay);
                    }
                });
            }
        });

    });
</script>