<?php
session_start();
include('header.php'); ?>
<?php include('session.php'); ?>
<body>
<?php include('navbar.php'); ?>
<?php
//add new record
if(isset($_POST['add_submit'])){
    $name = $_POST['company_name'];
    $address = $_POST['address'];
    $tin = $_POST['tin'];
    $contact = $_POST['contact_no'];
    $email = $_POST['email'];

     if($conn->query("insert into tbl_company (`name`,`address`,`tin`,`contact`,`email`) values('$name','$address','$tin','$contact','$email');")){
        ?>
         <script>
             $.ajax({
                 success: function(html){
                     $.jGrowl("New Company is successfully added", { header: 'SUCCESS' });
                     var delay = 3000;
                     setTimeout(function(){ window.location = 'add_company.php'  }, delay);
                 }
             });
         </script>
         <?php
     }

}
if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $aa = "delete from tbl_company where id = ".$id;
    $conn->query($aa);
    ?>
    <script>
        $.ajax({
            success: function(){
                $.jGrowl("New Company is successfully deleted", { header: 'SUCCESS' });
                var delay = 3000;
                setTimeout(function(){ window.location = 'add_company.php'  }, delay);
            }
        });
    </script>
    <?php

}
if(isset($_POST['edit_submit'])){
    $eid = $_POST['eid'];
    $ename = $_POST['ecompany'];
    $eaddress = $_POST['eaddress'];
    $etin = $_POST['etin'];
    $econtact = $_POST['econtact'];
    $eemail = $_POST['eemail'];

    $ff = "update tbl_company set name = '$ename',address = '$eaddress',tin = '$etin', contact = '$econtact', email = '$eemail' where id = ".$eid;
    $conn->query($ff);
    ?>
    <script>
        $.ajax({
            success: function(){
                $.jGrowl("New Company is successfully Edited", { header: 'SUCCESS' });
                var delay = 3000;
                setTimeout(function(){ window.location = 'add_company.php'  }, delay);
            }
        });
    </script>
    <?php


}

?>
<div class="container-fluid">
    <div class="row-fluid">
        <!-- <div class="span3" id="content">
				<?php  //include('quotation-add.php');  ?>
			</div> -->
        <div class="span12" id="content">
            <div class="row-fluid">
                <div class="pull-left">
                    <h3><img src="../images/buttons/app.png" width="8%"> Company Information</h3>
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
                <a href="year.php" class="pull-right" data-placement="left" title="Click to Change the year" id="yearbtn"><div class="pull-right" style="color:#ffa500;background-color:rgba(295,235,215,0.8);padding:3px 20px;border-radius:50px;"><h3><?php echo 'Year: '.$Year; ?></h3></div></a>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#yearbtn').tooltip('show');
                        $('#yearbtn').tooltip('hide');
                    });
                </script>
            </div>
        </div>

        <div class="span12" id="content">
            <div class="row-fluid">
                <br/>
                <div class="pull-left">
                    <a href="quotation.php" title="Back to PPMP-Dashboard" id="back" data-placement="right" class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#back').tooltip('show');
                            $('#back').tooltip('hide');
                        });
                    </script>
                </div>
            </div>
        </div>
        <?php
        $query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
        while($row = mysqli_fetch_array($query)) {
            $Year = $row['Year'];
        }
        ?>

        <div class="span12" id="content">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <?php
                        //$query = mysqli_query($conn,"SELECT * FROM tbl_quotation");
                        $query = mysqli_query($conn,"SELECT * FROM tbl_pr_items WHERE Year = $Year GROUP BY ItemDescription");
                        $count = mysqli_num_rows($query);

                        ?>
                        <div class="muted pull-left"><img src="../images/buttons/app.png" width="10%"> Add new Company Profile</div>
                    </div>

                    <div class="block-content collapse in">
                        <div class="span12"><!-- <form action="quotation-delete.php" method="post" id="deleteForm"> -->
                        <div class="container-fluid" style="1px solid #ccbfbf;box-shadow: inset -1px -1px 6px 1px #d66868; padding:20px;padding-bottom:0px !important;">
                            <form method="POST">
                             <div class="row-fluid">
                                <div class="span6" style="padding:5px;">
                                    <input type="text" class="form-control span12" placeholder="Company name" name="company_name" required/>
                                    <input type="text" class="form-control span12" placeholder="Address" name="address" required/>
                                    <input type="text" class="form-control span12" placeholder="TIN" name="tin" required/>
                                </div>
                                <div class="span6" style="padding:5px;">
                                  <input type="text" class="form-control span12" placeholder="Contact No." name="contact_no" required/>
                                  <input type="email" class="form-control span12" placeholder="Email" name="email" required/>
                                  <button type="submit" name="add_submit" class="btn btn-success btn-lg pull-right"><i class="icon icon-check"></i> Submit</button>
                                </div>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <?php
                                $qry = "select * from tbl_company";
                                $count = $conn->query($qry);
                                $n  = $count->num_rows;
                            ?>
                            <span class="pull-right text-primary">Number of Companies&nbsp;- <label class="label label-info" style="border-radius: 50%"><?=$n?></label></span>
                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="container-fluid" style="padding:20px;">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align:center">Company Name</th>
                                    <th style="text-align:center">Address</th>
                                    <th style="text-align:center">TIN No.</th>
                                    <th style="text-align:center">Contact No.</th>
                                    <th style="text-align:center">Email</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $qq = "select * from tbl_company";
                                $res = $conn->query($qq);
                                $num = $res->num_rows;
                                if($num < 1 ){
                                   ?>
                                    <tr>
                                        <td colspan="6" style="text-align:center">
                                            <span class="text-primary">No company data.. please add new company</span>
                                        </td>
                                    </tr>
                                    <?php
                                }else{
                                    while($data = $res->fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?=$data['name']?></td>
                                        <td style="text-align: center;"><?=$data['address']?></td>
                                        <td style="text-align: center;"><?=$data['tin']?></td>
                                        <td style="text-align: center;"><?=$data['contact']?></td>
                                        <td style="text-align: center;"><?=$data['email']?></td>
                                        <td style="text-align: center;">
                                            <button type="button" class="edit_company btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg" data-id="<?=$data['id']?>" ><i class="icon icon-edit"></i> Edit</button>
                                            <a href="?delete_id=<?=$data['id']?>"class="btn btn-danger"><i class="icon icon-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                     <?php
                                    }
                                }
                            ?>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>

                    </div>
                    </div>
                </div>
                <!-- /block -->
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="block-content collapse in">
                <form method="POST">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <h4 class="text-primary navbar-inner" style="line-height:50px;text-align:center;color:ghostwhite" > Edit Company</h4>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span6">
                            <input id="eidd" type="hidden" name="eid" value=""/>
                            <label for="editname">Company Name</label>
                            <input id="editname" type="text" class="form-control" placeholder="Company Name" name="ecompany" required/>
                            <label for="editaddress">Address</label>
                            <input id="editaddress" type="text" class="form-control" placeholder="Address" name="eaddress" required/>
                            <label for="edittin">TIN</label>
                            <input id="edittin" type="text" class="form-control" placeholder="TIN" name="etin" required/>
                        </div>
                        <div class="span6">
                            <label for="editcontact">Contact</label>
                            <input id="editcontact" type="text" class="form-control" placeholder="Contact No" name="econtact" required/>
                            <label for="editemail">Email</label>
                            <input id="editemail" type="email" class="form-control" placeholder="Email" name="eemail" required/>
                            <div style="margin:25px 0px"></div>
                            <button type="submit" name="edit_submit" class="btn btn-success" style="margin-right:70px;"><i class="icon icon-save"></i> Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon icon-eject"></i>Close</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script>
$(document).on("click",'.edit_company',function(){

        var id = $(this).data('id');
    $.ajax({
        type: "POST",
        url: "../ajaxPOST/edit_company.php",
        data: {id:id},
        dataType:'json',
        success:function(e){
        var name = e.name,
            address = e.address,
            tin = e.tin,
            contact = e.contact,
            email = e.email;


            $('#editname').val(name);
            $('#editaddress').val(address);
            $('#edittin').val(tin);
            $('#editcontact').val(contact);
            $('#editemail').val(email);
            $('#eidd').val(id);
        }
     });


});
</script>
