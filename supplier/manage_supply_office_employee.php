<?php session_start(); ?>
<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php include('session.php'); ?>
<body >
<?php include('navbar.php'); ?>
<style>
    .modal{
        max-width:300px;
        min-width:300px;
    }
</style>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12" id="content">
            <div class="row-fluid">
                <div class="pull-left">
                    <h3><i class="icon icon-large icon-user"></i> &nbsp;&nbsp;Manage Supply Office Employee</h3>
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
                        <div class="muted pull-left"><i class="icon-plus-sign icon-large"></i> Add Supply Office Employee</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form method="post" id="add_user">
                                <div class="control-group">
                                    <div class="controls">
                                        <label>First Name</label>
                                        <input type="text" placeholder="first name" name="e_fname_supply" required/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <label>Middle Initial</label>
                                        <input type="text" placeholder="middle initial" name="e_middle_initial_supply" required/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <label>Last Name</label>
                                        <input type="text" placeholder="last name"  name="e_lname_supply" required/>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <div class="controls">
                                        <label>Position</label>
                                        <select class="form-control" name="e_position_supply" required>
                                            <option style="display:none" selected hidden disabled> Select position ...</option>
                                            <?php
                                            $qry = $conn->query("select * from tbl_supply_office_employee_position");
                                            while($data = $qry->fetch_assoc()){
                                                ?>
                                                <option value="<?=$data['id']?>"><?=$data['name']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button  data-placement="right" title="Click to Save" id="save" name="save" class="btn btn-success"><i class="icon-save icon-large"></i> Save</button>
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
                    <div class="span12" style="color:white;font-weight: bold;padding:5px;"> <i class="icon icon-large icon-user" style="color:white;"></i>&nbsp;&nbsp;Supply Office Employee</div>
                </div>
                <div class="block-content collapse in">
                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example1">
                        <thead>
                        <tr>
                            <th>First name</th>
                            <th>Middle Initial</th>
                            <th>Last name</th>
                            <th>Position name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $e = $conn->query("select * from tbl_supply_office_employee");
                        while($data = $e->fetch_assoc()){
                            //get position
                            $pqry = $conn->query("select * from tbl_supply_office_employee_position where id = ". $data['position']);
                            $f_data = $pqry->fetch_assoc();
                            ?>
                            <tr>
                                <td><?=$data['first_name']?></td>
                                <td><?=$data['middle_name']?></td>
                                <td><?=$data['last_name']?></td>
                                <td><?=$f_data['name']?></td>
                                <td>
                                    <a href="#"  class="init_btn btn btn-primary btn-small" data-toggle="modal" data-target="#exampleModal" data-id="<?=$data['id']?>"><i class="icon icon-edit"></i>  Edit</a>
                                    <button type="button"  data-id="<?=$data['id']?>" class="btn_delete btn btn-danger"><i class="icon icon-trash"></i> Delete</button>
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

<!-- Modal -->
<form method="post" id="edit_form">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Supply Office Employee</h5>
                </div>
                <div class="modal-body">
                    <div class="row-fluid">
                        <div class="span12">
                            <small>First name</small>
                            <input type="text" placeholder="first name.." name="edit_fname_supply" id="edit_fname_supply" required/>
                            <input type="hidden" name="e_id_supply" id="e_id_supply"/>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <small>Middle Initial</small>
                            <input type="text" placeholder="middle initial.."  name="edit_mname_supply" id="edit_mname_supply" required/>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <small>Last name</small>
                            <input type="text" placeholder="last name.." name="edit_lname_supply" id="edit_lname_supply" required/>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <label>Position</label>
                            <select class="form-control" name="edit_position_supply" id="edit_position_supply" required>
                                <?php

                                ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>
<script>
    $(document).ready(function(){
        $('#add_user').submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                url: '../ajaxPOST/supplier_2.php',
                type: 'post',
                data:data,
                success:function(ss){
                    // console.log(ss);
                    // console.log(data);
                    e.preventDefault();
                    $.jGrowl("New Supply Office Employee was successfully added!.", { header: 'SUCCESS' });
                    var delay = 3000;
                    setTimeout(function(){ window.location = 'manage_supply_office_employee.php'  }, delay);

                }

            });
        });

        $('#example1').on('click','.init_btn',function(){
            var xx = $(this).attr('data-id');
            console.log(xx);
            $.ajax({
                url: '../ajaxPOST/supplier_2.php',
                type: 'post',
                data:{xx:xx},
                dataType: 'json',
                success:function(e){
                    console.log(e);
                    $('#e_id_supply').val(e.e_id);
                    $('#edit_fname_supply').val(e.fname);
                    $('#edit_mname_supply').val(e.mname);
                    $('#edit_lname_supply').val(e.lname);
                    $('#edit_position_supply').html(e.positions);
                }

            });

        });


        //submit edit form
        $('#edit_form').submit(function(e){
            var data_edit = $(this).serialize();
            e.preventDefault();
            // console.log(data_edit);
            $.ajax({
                url: '../ajaxPOST/supplier_2.php',
                type: 'post',
                data:data_edit,
                success:function(){
                    // console.log(e);
                    // e.preventDefault();
                    $('.modal').hide();
                    e.preventDefault();
                    $.jGrowl("Supply Office Employee was successfully Edited!.", { header: 'SUCCESS' });
                    var delay = 3000;
                    setTimeout(function(){ window.location = 'manage_supply_office_employee.php'  }, delay);
                }
            });
        });

        $('#example1').on('click','.btn_delete',function(){
            if(confirm("are you sure you want to delete this Supply Office Employee?")){
                var delete_employee_id = $(this).attr('data-id');
                $.ajax({
                    url: '../ajaxPOST/supplier.php',
                    type: 'post',
                    data:{delete_employee_id:delete_employee_id},
                    success:function(){
                        $.jGrowl("Supply Office Employee was successfully Deleted!.", { header: 'SUCCESS' });
                        var delay = 3000;
                        setTimeout(function(){ window.location = 'manage_supply_office_employee.php'  }, delay);
                    }
                });
            }
        });


    });





</script>