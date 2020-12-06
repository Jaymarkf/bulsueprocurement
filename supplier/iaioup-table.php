<div class="block">
    <div class="container-fluid">
        <div class="text-center">
            INVENTORY AND INSPECTION REPORT OF UNSERVICEABLE PROPERTY
        </div>
        <div style="padding:24px">
            <table class="table" id="ggg">
                <thead>
                    <tr>
                        <th>Date Acquired</th>
                        <th>Particulars</th>
                        <th>Qty</th>
                        <th>Unit Cost</th>
                        <th>Total Cost</th>
                        <th>Accumulated Depreciation</th>
                        <th>Carrying Amount</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = $conn->query("select * from disposal_request where unit_cost > '15000'");
                    while($data = $sql->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?=$data['date_acquired']?></td>
                            <td><?=$data['particulars_articles']?></td>
                            <td><?=$data['qty']?></td>
                            <td><?=$data['unit_cost']?></td>
                            <td><?=$data['total_cost']?></td>
                            <td><?=$data['accumulated_depreciation']?></td>
                            <td><?=$data['carrying_amount']?></td>
                            <td><?=$data['remarks']?></td>
                            <td><button class="btn btn-success btn-edit" data-toggle="modal" data-target=".bd-example-modal-lg" data-id="<?=$data['id']?>"><i class="icon icon-edit"></i> Edit</button></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display:none">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="text-center" style="padding:10px;">
               Edit data
           </div>
            <form id="form_edit">
            <div class="text-left" style="padding:10px;">
                <div class="row-fluid" style="display:inline-flex;">
                    <h5 style="margin-right:20px;">Accumulated Depreciation</h5>
                    <input type="text" class="form-control" placeholder="Accumulated Depreciation" name="ac" id="ac" required/>
                    <input type="hidden" name="edit_id" id="edit_id"/>
                </div>
                <div class="row-fluid" style="display:inline-flex;">
                    <h5 style="margin-right:20px;">Carrying Amount</h5>
                    <input type="text" class="form-control" placeholder="Carrying Amount" name="ca" id="ca" required/>
                </div>
                <div class="row-fluid" style="display:inline-flex;">
                    <h5 style="margin-right:20px;">Remarks</h5>
                    <input type="text" class="form-control" placeholder="Remarks" name="remarks" id="remarks" required/>
                </div>
                <div class="row-fluid">
                    <div class="text-right">
                        <button class="btn btn-success"  type="submit" id="save"><i class="icon icon-save"></i> Save</button>
                        <button class="btn btn-danger" data-dismiss="modal"><i class="icon icon-eject"></i> Close</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


<script>
    $('.btn-edit').click(function(){
        var id_edit = $(this).attr('data-id');
        $.ajax({
            url: 'form_submit/general_inventory.php',
            type: 'post',
            data:{id_edit:id_edit},
            dataType: 'json',
            success:function(res){
                $('#ac').val(res.ac);
                $('#ca').val(res.ca);
                $('#remarks').val(res.remarks);
                $('#edit_id').val(res.id);
            }
        });
    });

    $(document).ready(function(){

        $('#form_edit').submit(
            function(e){
                var edit_data = $(this).serialize();
                $('#save').text('please wait saving data...');
                $('#save').attr('disabled','disabled');
                e.preventDefault();
                $.ajax({
                    url: 'form_submit/general_inventory.php',
                    type:'post',
                    data:edit_data,
                    success:function(x){
                        $.jGrowl("SUCCESSFULLY EDITED!.", { header: 'SUCCESS' });
                        var delay = 3000;
                        setTimeout(function(){ window.location = 'general_inventory.php'  }, delay);
                    }
                });
            }
        );
    });


</script>