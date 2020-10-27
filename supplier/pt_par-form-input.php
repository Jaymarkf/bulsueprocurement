
<div class="block">
    <div class="container-header text-center" style="position:relative;width:100%;height:40px;background-image:linear-gradient(#bababa, #454545); ">
        <span style="color:#e9e9e9;font-weight: bold;line-height: 35px;">Transfer PAR Data</span>
    </div>
    <div class="container-fluid" style="padding:40px;">
        <table class="table" cellpadding="0" cellspacing="0" id="example1">
            <thead>
            <tr>
                <th>Select</th>
                <th>ICS No.</th>
                <th>College</th>
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
                if($res['transfer_item_id'] == null){
                    $status = '<span style="background-color:lightseagreen;padding:5px;border-radius: 10px;font-size:11px;color:white;">Item not transfered</span>';
                }else{
                    $status = '<span style="background-color:lawngreen;padding:5px;border-radius: 10px;font-size:11px;color:black;">Item is transfered</span>';
                }
                ?>
                <tr>
                    <td><button type="button" class="btn btn-small btn-success flag" data-id="<?=$res['id'];?>"><i class="icon icon-plus"></i> Add to Transfer</button></td>
                    <td><?=$ics_num?></td>
                    <td><?=$college?></td>
                    <td><?=$qty?></td>
                    <td><?=$unit?></td>
                    <td><?=$status?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
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
