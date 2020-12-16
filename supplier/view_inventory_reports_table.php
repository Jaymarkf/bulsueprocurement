<div class="block">
    <div class="container-fluid">
        <div class="text-center">
            <h4 style="font-family:Tahoma;font-weight: 800">ICS REPORTS - VIEW</h4>
            <br>
            <table class="table table-reponsive table-striped table-bordered" style="font-family: Calibri;">
                <thead>
                    <tr>
                        <th>Item Description</th>
                        <th>Quantity</th>
                        <th>Owner</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql_ics = $conn->query("select * from item_owner where transaction_type = 'ICS'");
                        while($data_ics = $sql_ics->fetch_assoc()){
                            //get owner name
                            $sql_owner_ics = $conn->query("select * from tbl_supplier_employee where id = ".$data_ics['owner_id']);
                            $data_owner_ics = $sql_owner_ics->fetch_assoc();
                            ?>
                                <tr>
                                    <td><?=$data_ics['item_id']?>  -  ( SN: <?=$data_ics['serial_number']?> )</td>
                                    <td><?=$data_ics['quantity']?></td>
                                    <td><?=$data_owner_ics['first_name'] . ' ' . $data_owner_ics['middle_name']. ' ' . $data_owner_ics['last_name']?></td>
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
        <div class="text-center">
            <h4 style="font-family:Tahoma;font-weight: 800">PAR REPORTS - VIEW</h4>
            <br>
            <table class="table table-reponsive table-striped table-bordered" style="font-family: Calibri;">
                <thead>
                <tr>
                    <th>Item Description</th>
                    <th>Quantity</th>
                    <th>Owner</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT item_id,serial_number,
                    group_concat(case when par_owner_id not like '%,%' then par_owner_id
                    end) as par_owner_id,
                    sum(case when par_owner_id not like '%,%' then quantity end) as qty
                    FROM item_owner
                    where transaction_type = 'PAR'
                    GROUP BY item_id
                    union
                    select item_id,serial_number,par_owner_id,sum(quantity) from item_owner where transaction_type = 'PAR'
                    group by par_owner_id having par_owner_id like '%,%'";
                $qry = $conn->query($query);
                $name = '';
                while($data_par = $qry->fetch_assoc()){

                    if(strpos($data_par['par_owner_id'],',') !== false){
                        //comma found!
                        //explode if item_owner is separated by commas
                        //then extract its data
                        $data_owner = explode(',',$data_par['par_owner_id']);
                        //return values in single variable of the owner items
                        foreach ($data_owner as $id) {
                            $temp_sql = $conn->query("select * from tbl_supplier_employee where id = " . $id);
                            $res = $temp_sql->fetch_assoc();
                            $name .= $res['first_name'] . ' ' . $res['middle_name'] . ' ' . $res['last_name'] . " & ";
                        }
                        $name = rtrim($name,'& ');

                    }else{
                        //data is only one owner
                        $temp_sql_row = $conn->query("select * from tbl_supplier_employee where id = ".$data_par['par_owner_id']);
                        $f = $temp_sql_row->fetch_assoc();
                        $name = $f['first_name']. ' '. $f['middle_name']. ' ' .$f['last_name'];

                    }


                    ?>
                    <tr>
                        <td><?=$data_par['item_id']?> - ( SN: <?=$data_par['serial_number']?> )</td>
                        <td><?=$data_par['qty']?></td>
                        <td><?=$name?></td>
                    </tr>
                    <?php
                    $name = '';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>