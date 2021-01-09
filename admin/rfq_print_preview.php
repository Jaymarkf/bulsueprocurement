<?php session_start();
   if(!isset($_SESSION)){ session_start(); }  include('header.php');
include('session.php');
?>
<style>
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 5mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }


    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
    .ww{
        padding:10px;
        text-align:center;
        font-size:11px;
    }
    .hed{
        padding:10px;
        font-family: 'Courier New', Monospace;
        border-bottom:1pt solid #ddd;
    }
    #datatext{
        font-weight:bolder;
        font-size:10pt;
    }
</style>
<div class="row-fluid">
    <div class="span12">
        <div class="text-right" style="margin-top:25px;margin-right:25px;">
            <a href="quotation.php" class="btn btn-info btn-large"><i class="icon-backward icon-large"></i>Back</a>
            <button id="wew" type="button" class="btn btn-large btn-success"><i class="icon-print icon-large"></i>Print</button>
        </div>
    </div>
</div>
<div id="paper">
<div class="paper">
    <div class="page">
        <div class="row-fluid">
            <div class="text-center" style="font-size:10pt">Republic of the Philippines</div>
        </div>
        <div class="row-fluid">
            <div class="text-center">
            <img src="../images/printlogo.png" width="50%" height="4%" style="top:-20px;position:relative;">
            </div>
        </div>
        <div class="row-fluid">
            <div class="text-center" id="malolos" style="top:-35px;position:relative;">City of Malolos Bulacan</div>
        </div>
        <div class="row-fluid">
            <div class="text-center">
                REQUEST FOR QUOTATION FOR THE PROCUREMENT OF GOODS AND SERVICES
            </div>
        </div>
        <hr>
        <div class="row-fluid">
            <div class="text-left" id="mandatory" style="color:red;padding-bottom:5px;">
                **Mandatory to fill in**
            </div>
        </div>
        <?php
        $query = "select * from tbl_rfq where id = ". $_GET['id'];
        $temp = $conn->query($query);
        $data = $temp->fetch_assoc();
        ?>
        <div class="row-fluid">
            <div class="span6">
                <div class="text-left">COMPANY NAME: <span id="datatext"><?=$data['company_name']?></span></div>
            </div>
            <div class="span6">
                <div class="text-left">Quotation No.  <span id="datatext"><?=$data['quotation_no'];?></span></div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class="text-left">ADDRESS:  <span id="datatext"><?=$data['address']?></span></div>
            </div>
            <div class="span6">
                <div class="text-left">Purchase Request No.  <span id="datatext"><?=$data['purchase_request_no']?></span></div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class="text-left">CONTACT NO.  <span id="datatext"><?=$data['contact_no']?></span></div>
            </div>
            <div class="span6">
                <div class="text-left">PURPOSE:  <span id="datatext"><?=$data['purpose']?></span></div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class="text-left">TIN NO.  <span id="datatext"><?=$data['TIN']?></span></div>
            </div>
            <div class="span6">
                <div class="text-left">ABC:  <span id="datatext"><?=$data['ABC']?></span></div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class="text-left">PhilGEPS Registration No.  <span id="datatext"><?=$data['philgeps']?></span></div>
            </div>
            <div class="span6">
                <div class="text-left">Delivery Period: <span id="datatext"> 7 Calendar Days upon receipt of Purchase Order</span></div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="text-left">EMAIL ADDRESS:  <span id="datatext"><?=$data['email']?></span></div>
            </div>
        </div>
        <hr>
        <table style="font-size:15px;" class="table-bordered table-striped">
            <thead>
                <tr>
                    <th class="hed">ITEM NO.</th>
                    <th class="hed">ITEM & SPECIFICATION</th>
                    <th class="hed">QTY/UNIT</th>
                    <th class="hed">BRAND AND MODEL OFFERED</th>
                    <th class="hed">UNIT PRICE</th>
                    <th class="hed">TOTAL PRICE</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $qry = "select * from tbl_rfq_item_details where rfq_item_id = ". $_GET['id'];
            $res = $conn->query($qry);
            while($row = $res->fetch_array()){
                ?>
                <tr>
                    <td class="ww"><?=$row['item_no']?></td>
                    <td class="ww"><?=$row['item_and_specification']?></td>
                    <td class="ww"><?=$row['quantity_and_unit'];?></td>
                    <td class="ww"><?=$row['brand_and_model_offered']?></td>
                    <td class="ww"><?=$row['unit_price'];?></td>
                    <td class="ww"><?=$row['total_price']?></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <?php
                $q = "select SUM(total_price) as p from tbl_rfq_item_details where rfq_item_id = ". $_GET['id'];
                $r = $conn->query($q);
                $result = $r->fetch_assoc();
                ?>
                <td colspan="5" align="right" style="font-size:12px;font-weight:bold">TOTAL PRICE</td>
                <td colspan="1" style="padding:5px;font-size:12px;text-align:right;padding-right:40px;">&#x20B1;&nbsp;<?=$result['p']?></td>
            </tr>
            </tbody>
        </table>
        <hr>
        <div class="row-fluid">
            <div class="span6">
                <div class="text-center">
                    <span id="datatext">Accomplish by: _________________________</span>
                </div>
            </div>
            <div class="span6">
                <div class="text-center">
                     <span style='position:relative;top:25px;'>By the authority of the University President.</span>
                </div>
            </div>
        </div>
        <div style="margin-bottom:40px;position:relative;"></div>
        <div class="row-fluid">
            <div class="span6">
                <div class="text-center">
                    <span id="datatext">
                         <span style="display:block;font-size:8pt" class="text-center">______________________________________</span>
                        Supplier's Representative
                        <span style="display:block;font-size:8pt">(Print name and Signature)</span>
                    </span>
                </div>
            </div>
            <div class="span6">
                <div class="row-fluid">
                    <div class="text-center">
                    <span id="datatext">
                         <span style="display:block;font-size:8pt" class="text-center">______________________________________</span>
                        Assoc. Prof. JOSEPH ROY F. CELESTINO
                        <span style="display:block;font-size:8pt">BAC Chairman</span>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-bottom:40px;position:relative;"></div>
        <hr>
        <div class="row-fluid">
            <div class="span6">
                <div class="text-center">
                    <span id="datatext" style="font-size:12px !important;">Date Accomplished: ____________</span>
                </div>
            </div>
            <div class="span6">
                <div class="text-center">
                    <span id="datatext" style="font-size:12px !important;">Canvassed by: __________________</span>
                    <span style="display:block;font-size:10px;" class="text-center">(Name and Signature)</span>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<script>

$(document).ready(function(){
    $('#wew').click(function(){
            var divToPrint=document.getElementById('paper');
            var newWin=window.open('','Print-Window');
            newWin.document.open();
            newWin.document.write('<html><head>' +
                '<style>' +
                '.ww{\n' +
                '    padding:10px;\n' +
                '    text-align:left;\n' +
                '    font-size:10px;\n' +
                '}\n' +
                '.hed{\n' +
                '    padding:12px;\n' +
                '    border-bottom:1pt solid #ddd;\n' +
                '    font-size:13px;' +
                '}' +
                '  #datatext{\n' +
                '        font-weight:bolder;\n' +
                '        font-size:12pt;\n' +
                '    }' +
                '</style>' +
                '<link rel=stylesheet href="/print_quotation.css" type="text/css"/>' +
                '<link rel=stylesheet href="../vendors/bootstrap-wysihtml5/lib/css/bootstrap.css" type="text/css"/>' +
                '<link rel=stylesheet href="../bootstrap/css/bootstrap.min.css" type="text/css"/>' +
                '</head><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
            newWin.document.close();
            setTimeout(function(){newWin.close();},10);
    });
});
</script>
