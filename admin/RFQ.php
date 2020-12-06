<?php session_start(); ?>
<?php include('header.php'); ?>
<?php include('session.php'); ?>
<style>
    #spans{
        font-family: 'Manjari Bold';
    }
</style>
<body >
<?php include('navbar.php'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12" id="content">
            <div class="row-fluid">
                <div class="pull-left">
                    <h3><img src="../images/buttons/ppmp.png" width="5%"> Project Procurement Management Plan - Dashboard</h3>
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
<a href="quotation.php" class="btn btn-info btn-md" style="margin-top:10px;margin-left:25px;"><span class="icon icon-circle-arrow-left"></span> &nbsp;Back</a>
<hr>
<form method="POST" id="rfq_form">
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12 text-center" style="font-family: 'Manjari Bold'">
            REQUEST FOR QUOTATION FOR THE PROCUREMENT OF GOODS AND SERVICES
        </div>
    </div>
    <br>
    <div class="row-fluid">
       <div class="span12" style="font-family: 'Noto Sans CJK TC Bold';color:red">
           **Mandatory to fill in**
       </div>
    </div>
    <div class="row-fluid">
        <div class="span6 text-right">
            <span class="text-success">Company name
                <select name="post_company_name" class="form-control span8" id="select_company">
                    <option value="" style="display:none" disabled selected>Select Company name</option>
                    <?php
                    $g = "select * from tbl_company";
                    $r = $conn->query($g);
                    while($scom = $r->fetch_assoc()){
                        ?>
                        <option value="<?=$scom['id']?>"><?=$scom['name']?></option>
                    <?php
                    }
                    ?>
                </select>
            </span>
        </div>
        <div class="span6 text-right">
            <span class="text-success">Quotation No
            <input type="text" class="span8" name="post_quotation_no" placeholder="Input here..." required>
            </span>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6 text-right">
            <span class="text-success">Address
            <input id="paddress" type="text" class="span8" name="post_address" placeholder="Input here..." required readonly>
            </span>
        </div>
        <div class="span6 text-right">
            <span class="text-success">Purchase Request No
            <select id="pr_select" class="form-control span8" name="post_purchase_request_no" required>
                <option style="display:none" selected disabled>Select PR#</option>
                   <?php
                   $a = "select pr_num_merge from tbl_pr_items group by pr_num_merge";
                   $b = $conn->query($a);
                   while($c = $b->fetch_assoc()){
                       ?>
                       <option value="<?=$c['pr_num_merge']?>"><?=$c['pr_num_merge']?></option>
                    <?php
                   }
                   ?>
            </select>
            </span>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6 text-right">
            <span class="text-success">Contact No
            <input id="pcontact" type="text" class="span8" name="post_contact_no" placeholder="Input here..." required readonly>
            </span>
        </div>
        <div class="span6 text-right">
            <span class="text-success">Purpose
            <input type="text" class="span8" name="post_purpose" placeholder="Input here..." required>
            </span>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6 text-right">
            <span class="text-success">TIN No
            <input id="ptin" type="text" class="span8" name="post_TIN_no" placeholder="Input here..." required readonly>
            </span>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6 text-right">
            <span class="text-success">PHILGEPS Registration No
            <input type="text" class="span8" name="post_PHILGEPS_registration_no" placeholder="Input here..." required>
            </span>
        </div>
        <div class="span6 text-right">
            <span style="color:red;font-family:'Manjari Bold'">
              Delivery Period: 7 Calendar Days upon receipt of Purchase Order
            </span>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span6 text-right">
                <span class="text-success">Email Address
                 <input id="pemail" type="text" class="span8" name="post_email_address" placeholder="Input here..." required readonly>
                </span>
        </div>
    </div>
<hr>
    <div class="container-fluid" style="overflow-y:hidden;overflow-x:auto;">
        <table id="myTable" class="table order-list table-responsive table-bordered">
            <thead style="background-color:rgba(0,204,255,0.24);">
            <tr>
                <td>Item No.</td>
                <td>Item & Specification</td>
                <td>Quantity / Unit</td>
                <td>Brand & Model Offered</td>
                <td>Unit Price</td>
                <td>Total Price</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <input type="text" name="item_no_[]" class="form-control" placeholder="input here.."  required/>
                </td>
                <td>
                    <input id="idesc" type="text" name="item_and_spec_[]"  class="form-control" placeholder="input here.." readonly required/>
                </td>
                <td>
                    <input id='qty' type="text" name="quantity_and_unit_[]"  class="form-control" placeholder="input here.." readonly required/>
                    <input type="hidden" id="item_id" name="item_id[]" />
                </td>
                <td>
                    <input type="text" name="brand_and_model_offered_[]"  class="form-control" placeholder="input here.."  required/>
                </td>
                <td>
                    <input id='price' type="text" name="unit_price_[]"  class="form-control" placeholder="input here.."  onchange="calculate(this.value)" onkeyup="calculate(this.value)" required/>
                </td>
                <td>
                    <input id='tp' type="text" name="total_price_[]"  class="form-control" placeholder="input here.."  readonly required/>
                </td>
                <td><a class="deleteRow"></a>

                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="12" style="text-align: left;">
                    <input type="button" class="btn btn-lg btn-block btn-info" id="addrow" value="Add Row" />
                </td>
            </tr>
            <tr>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="text-left" style="margin-top:10px;margin-left:10px;">
                <button type="submit"  name="submit" class="btn btn-lg btn-success" id="submit_quotation" style="width:200px;font-size:18px;">submit</button>
            </div>
        </div>
    </div>
</div>
</form>
<?php include('footer.php'); ?>
<?php include('script.php'); ?>
</body>
</html>
<script>
$(document).ready(function () {
    $('#pr_select').change(function(){
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "../ajaxPOST/get_pr_request_items.php",
            data: {id:id},
            dataType:"json",
            success: function(html){
                console.log(html);
                var item_and_spec = html.itemdesc;
                var quantity = html.quantity;
                $('#idesc').val(item_and_spec);
                $('#qty').val(quantity);
                $('#item_id').val(html.item_id);

            }
        });
    });

    $('#select_company').change(function(){
        var idd = $(this).val();
        $.ajax({
            type: "POST",
            url: "../ajaxPOST/post_data.php",
            data: {idd:idd},
            dataType:"json",
            success:function(e){
                $('#paddress').val(e.address);
                $('#ptin').val(e.tin);
                $('#pcontact').val(e.contact);
                $('#pemail').val(e.email);
            }
        });
    });




    $('#rfq_form').submit(function(e){
        e.preventDefault();
        var formData = jQuery(this).serialize();
        $.ajax({
            type: "POST",
            url: "rfq_save.php",
            data: formData,
            success: function(html){
                // console.log(html);
                $.jGrowl("RFQ details was successfully created.", { header: 'SUCCESS' });
                var delay = 3000;
                setTimeout(function(){ window.location = 'quotation.php'  }, delay);
            }
        });
    });

var counter = 0;

$("#addrow").on("click", function () {
var newRow = $("<tr>");
    var cols = "";

    cols += '<td><input type="text" class="form-control" name="item_no_[]" placeholder="input here..." required/></td>';
    cols += '<td><input type="text" class="form-control" name="item_and_spec_[]"  placeholder="input here..." required/></td>';
    cols += '<td><input type="text" class="form-control" name="quantity_and_unit_[]"  placeholder="input here..." required/><input type="hidden" name="item_id"/></td>';
    cols += '<td><input type="text" class="form-control" name="brand_and_model_offered_[]"  placeholder="input here..." required/></td>';
    cols += '<td><input type="text" class="form-control" name="unit_price_[]"  placeholder="input here..." required/></td>';
    cols += '<td><input type="text" class="form-control" name="total_price_[]"  placeholder="input here..." required/></td>';

    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
    newRow.append(cols);
    $("table.order-list").append(newRow);
    counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
    $(this).closest("tr").remove();
    counter -= 1
    });


    });



    function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

    }
    function calculate(v){
        var price = parseInt(v);
        var qty = parseInt($('#qty').val());
        var result = price * qty;

        $('#tp').val(result);
    }

</script>