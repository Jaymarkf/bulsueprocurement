<?php
session_start();
   if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php include('session.php');?>
<?php
if(isset($_POST['submit'])){
    $company_id = $_POST['company_name'];
    $unit_price = $_POST['item_val'];
    foreach ($unit_price as $index => $item) {
        $qry = "update tbl_company a
            inner join tbl_rfq b on a.id = b.id_company
            inner join tbl_rfq_item_details c on b.id = c.rfq_item_id
            set approved_by = 'approved'
            where YEAR(b.date_created) = YEAR(NOW()) and a.id = ".$company_id." and item_and_specification = '$index' and unit_price = '".$item."'";
        $conn->query($qry);


    }
}
?>
<style>
    #iprice{
        width:500px;
        position:relative;
        margin:10px auto;
        border:1px solid #c2bebe;
        box-shadow: 2px 1px 4px 1px #988f8f;
    }
    #iheader{
        height:40px;
        postion:relative;
        width:100%;
        background-color: #873f31;
        text-align:center;
        line-height:40px;
        color:white;
        font-weight: bold;
        font-family: "Courier New", Courier, monospace;

    }
    #ibody{
        padding:40px;
    }
</style>
<body>
	<?php include('navbar.php'); ?>
	<h4 class="span12">BAC Resolution</h4>
	<div class="span12">
        <div class="text-left">
            <a href="bac-res-main.php" class="btn btn-info"><i class="icon icon-circle-arrow-left"></i> Back</a>
        </div>
    </div>
    <form method="POST">
	    <div class="container-fluid">
            <div class="row-fluid">
                     <div class="text-center">
                    <div class="span5">
                        <h5 class="pull-right">Select Supplier/Company name</h5>
                    </div>
                    <div class="span7">
                        <select name="company_name" id="id_company_name" class="form-control text-success pull-left">
                            <option value="" style="display:none" selected disabled>Select Company</option>
                            <?php
                                $qry ="select * from tbl_company";
                                $res = $conn->query($qry);
                                while($data = $res->fetch_assoc()){
                                    ?>
                                    <option value="<?=$data['id']?>"><?=$data['name']?></option>
                                 <?php
                                }
                            ?>

                        </select>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div id="iprice">
                    <div id="iheader">
                        Company Item List
                    </div>
                   <div id="ibody">
                      <div class="row-fluid text-center">
                          <span class="text-center text-info" style="font-weight: bold">Available Item</span>
                      </div>
                           <div id="ajax-container">

                           </div>
                   </div>
               </div>

            </div>
        </div>
    </form>

	<?php include('footer.php'); ?>


	<?php include('script.php'); ?>
</body>
<script>
    $(document).ready(function(){
        $('#id_company_name').change(function(){
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                url: '../ajaxPOST/get_company_item.php',
                data: {id:id},
                success: function(e){
                    $('#ajax-container').html(e);

                }
            });


        });
    });
</script>