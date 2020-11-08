<div class="block">


    <div class="row-fluid" style="margin-top:15px;background-color:#7d5c5c;">
        <div class="span12" style="color:white;font-weight: bold;padding:5px;"> <img src="../images/buttons/app.png" style="width:30px;height:30px;"/>&nbsp;&nbsp;Inventory Custodian Report</div>
    </div>
    <div class="block-content collapse in">
        <table cellpadding="0" cellspacing="0" border="0" class="" id="example1">
            <thead>
            <tr>
                <th>ICS No. :</th>
                <th>Item Description </th>
                <th>Quantity</th>
                <th>Unit Cost</th>
                <th>Total Cost</th>
                <th>Fund Cluster Code</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            //get ics table data
            $qics = $conn->query("select * from tbl_ics");
            while($data_ics = $qics->fetch_assoc()){
                //get item
                $item_query = $conn->query("select * from tbl_rfq_item_details where id =" . $data_ics['item_desc']);
                //fetch
                $f_item  = $item_query->fetch_assoc();
                ?>
                <tr>
                    <td style="text-align:center;"><?php echo str_replace(",","-",$data_ics['ics_num'])?></td>
                    <td style="text-align:center;"><?=$f_item['item_and_specification']?></td>
                    <td style="text-align:center;"><?=$f_item['quantity_and_unit']?></td>
                    <td style="text-align:center;"><?=$f_item['unit_price']?></td>
                    <td style="text-align:center;"><?=$f_item['total_price']?></td>
                    <td style="text-align:center;"><?=str_replace(",","-",$data_ics['fundcluster_code'])?></td>
                    <td style="text-align:center;display:flex">
                        <a href="ics.php?edit=<?=$data_ics['id']?>" class="btn btn-primary"><i class="icon icon-edit"></i> Edit</a>
                        <button class="delete_dashboard_btn btn btn-danger" data-id="<?=$data_ics['id']?>"><i class="icon icon-trash"></i> Delete</button>
                        <a href="ics-print-preview.php?preview=<?=$data_ics['id']?>" class="btn btn-success soab"><i class="icon icon-print"></i> Print</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ICS No. :</th>
                    <th>Item Description </th>
                    <th>Quantity</th>
                    <th>Unit Cost</th>
                    <th>Total Cost</th>
                    <th>Fund Cluster Code</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<script>

$('#example1 tfoot th').each( function () {
        var title = $(this).text();
        if(title == 'Action'){
            var text = 'hidden';
        }else{
            var text = 'text';
        }
        $(this).html( '<input type="'+text+'" placeholder="Search '+title+'" />' );
    } );


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