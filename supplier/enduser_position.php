<?php session_start(); ?>
<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
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
                    <h3><i class="icon icon-large icon-user-md"></i> &nbsp;&nbsp;Manage Position</h3>
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
                        <div class="muted pull-left"><i class="icon-plus-sign icon-large"></i> Add Position</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form method="post" id="add_position">

                                <div class="control-group">
                                    <div class="controls">
                                        <label>Position Name</label>
                                        <input type="text" placeholder="position" name="p_name" id="p_name" required/>
                                        <input type="hidden" id="update_id" name="update_id"/>
                                    </div>
                                </div>



                                <div class="control-group">
                                    <div class="controls">
                                        <button   title="Click to Save" id="save" name="save" class="btn btn-success"><i class="icon-save icon-large"></i> Save</button>
                                        <div   id="cancel_btn"></div>
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
                    <div class="span12" style="color:white;font-weight: bold;padding:5px;"> <i class="icon icon-large icon-user" style="color:white;"></i>&nbsp;&nbsp;Positions</div>
                </div>
                <div class="block-content collapse in">
                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example1">
                        <thead>
                        <tr>
                            <th>Position Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $q = $conn->query("select * from tbl_supplier_position");
                                while($x = $q->fetch_assoc()){
                                    ?>
                                        <tr>
                                            <td><?=$x['name']?></td>
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
                var names = $(this).serialize();
                $.ajax({
                    url: '../ajaxPOST/supplier.php',
                    type: 'POST',
                    data: names,
                    dataType:'json',
                    success:function(x){
                        e.preventDefault();
                        console.log(x.flag);
                        if(x.flag == 'false'){
                            $('#d').fadeIn(500);
                            $('#d').fadeOut(5000);
                        }else if(x.flag == 'true' && $('#save').attr('flag') != 'update'){
                            $.jGrowl("New Position was successfully added", { header: 'SUCCESS' });
                            var delay = 3000;
                            setTimeout(function(){ window.location = 'enduser_position.php'  }, delay);

                        }else if(x.flag == 'true' && $('#save').attr('flag') == 'update'){
                            $.jGrowl("Position was successfully edited", { header: 'SUCCESS' });
                            var delay = 3000;
                            setTimeout(function(){ window.location = 'enduser_position.php'  }, delay);

                        }

                    }
                });


            });

            $('#example1').on('click','.edit_id',function(){
                    $('#save').attr('flag','update');
                    $('#save').removeClass('btn-success');
                    $('#save').addClass('btn-warning');
                    $('#save').html('<i class="icon icon-save"></i> Update');
                    $('#p_name').val($(this).parent().prev().html());
                    $('#update_id').val($(this).attr('data-id'));
                    $('#cancel_btn').html('' +
                        '<a href="enduser_position.php" style="margin-top:10px;" class="btn btn-danger"><i class="icon icon-remove-circle"></i> Cancel</a>' +
                        '');
            });


        $('#example1').on('click','.delete_id',function(e){
                if(confirm('are you sure you want to delete this position?')){
                    var delete_id = $(this).attr('data-id');
                    $.ajax({
                        url: '../ajaxPOST/supplier.php',
                        type: 'post',
                        data:{delete_id:delete_id},
                        success:function(){
                            e.preventDefault();
                            $.jGrowl("Position was successfully deleted", { header: 'SUCCESS' });
                            var delay = 3000;
                            setTimeout(function(){ window.location = 'enduser_position.php'  }, delay);
                        }

                    });
                }
            });

    });
</script>