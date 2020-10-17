<?php session_start(); ?>
<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body >
<?php include('navbar.php'); ?>

<div class="container-fluid">
    <div style="position:absolute;right:15px;top:50px;display:none" id="d">
        <div style="width:200px;height:80px;border-radius: 15px;z-index:11111;border:1px solid red;background-color:#d9d0d0;opacity: 0.9;position:relative;vertical-align: middle;">
            <div style="position:relative;display:block;width:120px; margin:15px auto">
                <smal style="color:red;font-size:12px;">Failed to add position, position already exist!</smal>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12" id="content">
            <div class="row-fluid">
                <div class="pull-left">
                    <h3><i class="icon icon-large icon-cog"></i> &nbsp;&nbsp;Manage Equipment Code</h3>
                    <i class="icon-calendar icon-large"></i>
                    <?php
                    $Today=date('y:m:d');
                    $new=date('l, F d, Y',strtotime($Today));
                    echo $new;
                    ?>
                </div>

                <?php
                $query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
                while($row = mysqli_fetch_array($query)) {
                    $Year = $row['Year'];
                }
                ?>
                <a href="year.php" class="pull-right" data-placement="left" title="Click to Change the year" id="yearbtn"><div class="pull-right" style="color:#ffa500;background-color:rgba(295,235,215,0.8);padding:3px 20px;border-radius:50px;"><h3> <?php echo 'Year: '.$Year; ?></h3></div></a>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#yearbtn').tooltip('show');
                        $('#yearbtn').tooltip('hide');
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container-fluid">
    <div class="row">
        <div class="span3">
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left"><i class="icon-plus-sign icon-large"></i> Add Equipment Code / Description</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form method="post" id="add_position">

                                <div class="control-group">
                                    <div class="controls">
                                        <label style="font-weight: bold">Equipment Code</label>
                                        <input type="text" placeholder="equipment code" name="e_code" id="e_code" title="Must Number Only!" required/>
                                        <input type="hidden" id="update_id" name="update_id"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label style="font-weight: bold">Equipment Description</label>
                                        <input type="text" placeholder="equipment description" name="e_desc" id="e_desc"  required/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <button   title="Click to Save" id="save" name="save" class="btn btn-success"><i class="icon-save icon-large"></i> Save</button>
                                        <div  id="cancel_btn"></div>
                                        <script type="text/javascript">
                                            $(document).ready(function(){
                                                $('#save').tooltip('show');
                                                $('#save').tooltip('hide');
                                            });
                                        </script>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>
        </div>
        <div class="span9">
            <div class="block">
                <div class="row-fluid" style="margin-top:15px;background-color:#7d5c5c;">
                    <div class="span12" style="color:white;font-weight: bold;padding:5px;"> <i class="icon icon-large icon-user" style="color:white;"></i>&nbsp;&nbsp;Equipment</div>
                </div>
                <div class="block-content collapse in">
                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example1">
                        <thead>
                        <tr>
                            <th>Equipment Code</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $q = $conn->query("select * from equipment_code");
                        while($x = $q->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?=$x['code']?></td>
                                <td><?=$x['description']?></td>
                                <td>
                                    <button class="edit_id btn btn-info" data-id="<?=$x['id']?>"> Edit</button>
                                    <button class="delete_id btn btn-danger" data-id="<?=$x['id']?>"> Delete</button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>



    <?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>
</body>
</html>
<script>
    $(document).ready(function(){

        $('#add_position').submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                url: '../ajaxPOST/supplier_2.php',
                type: 'POST',
                data: data,
                dataType:'json',
                success:function(x){
                    e.preventDefault();
                    console.log(x.flag);
                    if(x.flag == 'false'){
                        $('#d').fadeIn(500);
                        $('#d').fadeOut(5000);
                    }else if(x.flag == 'true' && $('#save').attr('flag') != 'update'){
                        $.jGrowl("New Equipment was successfully added", { header: 'SUCCESS' });
                        var delay = 3000;
                        setTimeout(function(){ window.location = 'equipment_code.php'  }, delay);

                    }else if(x.flag == 'true' && $('#save').attr('flag') == 'update'){
                        $.jGrowl("Equipment was successfully edited", { header: 'SUCCESS' });
                        var delay = 3000;
                        setTimeout(function(){ window.location = 'equipment_code.php'  }, delay);

                    }

                }
            });


        });

        $('#example1').on('click','.edit_id',function(){
            $('#save').attr('flag','update');
            $('#save').removeClass('btn-success');
            $('#save').addClass('btn-warning');
            $('#save').html('<i class="icon icon-save"></i> Update');
            $('#e_code').val($(this).parent().prev().prev().html());
            $('#e_desc').val($(this).parent().prev().html());
            $('#update_id').val($(this).attr('data-id'));
            $('#cancel_btn').html('' +
                '<a href="equipment_code.php" style="margin-top:10px;" class="btn btn-danger"><i class="icon icon-remove-circle"></i> Cancel</a>' +
                '');
        });

        $("#example1").on("click", ".delete_id", function(){
            if(confirm('are you sure you want to delete this equipment?')){
                var delete_id = $(this).attr('data-id');
                $.ajax({
                    url: '../ajaxPOST/supplier_2.php',
                    type: 'post',
                    data:{delete_id:delete_id},
                    success:function(){
                        $.jGrowl("Equipment was successfully deleted", { header: 'SUCCESS' });
                        var delay = 3000;
                        setTimeout(function(){ window.location = 'equipment_code.php'  }, delay);
                    }

                });
            }
        });



    });



</script>