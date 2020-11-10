<div class="block">

    <div class="row-fluid" style="margin-top:15px;background-color:#2f82b3;">
        <div class="span12" style="color:white;font-weight: bold;padding:5px;"> <img src="../images/buttons/ppmp.png" style="width:30px;height:30px;"/>&nbsp;&nbsp;Property Acknowledgement Report</div>
    </div>
    <div class="block-content collapse in">
        <table cellpadding="0" cellspacing="0" border="0"  id="example">
            <thead>
            <tr>
                <th>PAR No. :</th>
                <th>Date Acquired</th>
                <th>Received From</th>
                <th>Purchase Order No.</th>
                <th>Total Cost</th>
                <th>Fund Cluster Code</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            //get ics table data
            $qics = $conn->query("select * from tbl_par");
            while($data_ics = $qics->fetch_assoc()){
                //get full name of supplier
                $ss = $conn->query("select * from tbl_supply_office_employee where id = ". $data_ics['received_from']);
                $fetch_full_name = $ss->fetch_assoc();

                //get total price of item
                $q_total  = $conn->query('select SUM(total_cost) as total_cost from tbl_par_items where par_id = '.$data_ics['id']);
                $result = $q_total->fetch_assoc();
                if($result['total_cost'] == 0){
                   $buttons = '<span class="span12" style="color:blue;font-weight:bold;">All items is already transfered</span> <a href="par-print-preview.php?preview='.$data_ics['id'].'" class="btn btn-success"><i class="icon icon-print"></i> Print</a>';

                }else{

                    $buttons = '<a href="par.php?edit='.$data_ics['id'].'" class="btn btn-primary"><i class="icon icon-edit"></i> Edit</a>
                    <button class="delete_dashboard_btn_par btn btn-danger" data-id='.$data_ics['id'].'"> <i class="icon icon-trash"></i> Delete</button>
                    <a href="par-print-preview.php?preview='.$data_ics['id'].'" class="btn btn-success"><i class="icon icon-print"></i> Print</a>';
                }

                ?>
                <tr>
                    <td style="text-align:center;"><?php echo str_replace(",","-",$data_ics['ics_num'])?></td>
                    <td style="text-align:center;"><?=$data_ics['date_acquired']?></td>
                    <td style="text-align:center;"><?php echo $fetch_full_name['first_name']. ' ' . $fetch_full_name['last_name'] ?></td>
                    <td style="text-align:center;"><?=str_replace(",","-",$data_ics['purchase_order_num'])?></td>
                    <td style="text-align:center;">Php: <?=$result['total_cost']?></td>
                    <td style="text-align:center;"><?=str_replace(",","-",$data_ics['fundcluster_code'])?></td>
                    <td style="text-align:center;">
                       <?=$buttons?>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>