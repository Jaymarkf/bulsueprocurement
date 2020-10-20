<div class="block">
    <div class="container-header text-center" style="position:relative;width:100%;height:40px;background-image:linear-gradient(#e877c6, #763435); ">
        <span style="color:white;font-weight: bold;line-height: 35px;">Inventory Custodian Slip Data</span>
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
                        ?>
                        <tr>
                            <td><button type="button" class="btn btn-small btn-success flag"><i class="icon icon-plus"></i> Add to Transfer</button></td>
                            <td><?=$ics_num?></td>
                            <td><?=$college?></td>
                            <td><?=$qty?></td>
                            <td><?=$unit?></td>
                        </tr>
                   <?php
                    }
                   ?>
               </tbody>
           </table>
           <div class="row-fluid">
               <div class="span6">


               <div style="" id="data_add">

               </div>
               </div>
               <div class="span6">
                  <div class="block">
                  </div>
               </div>
           </div>
       </div>
</div>
<script>
    $(document).ready(function(){
        $('.flag').click(function(){
            var ics_num   = $(this).parent().next().html().toString();
            var college   = $(this).parent().next().next().html().toString();
            var quantity  = $(this).parent().next().next().next().html().toString();
            var unit      = $(this).parent().next().next().next().next().html().toString();
            $('#data_add').html("" +
                "<div class='row-fluid text-warning' style='font-weight: bolder'>Data to be Transfer</div><div class='row-fluid'><span style='font-weight: bold'>ICS No. </span> <input class='' type='text' name='ics_num' id='ics_num' value='"+ics_num+"' readonly/></div>" +
                "<div class='row-fluid'><span style='font-weight: bold'>College </span><input class='span8' type='text' name='college' id='college' value='"+college+"' readonly/></div>" +
                "<div class='row-fluid'><span style='font-weight: bold'>Quantity </span><input class='form-control' type='text' name='quantity' id='quantity' value='"+quantity+"' readonly/></div>" +
                "<div class='row-fluid'><span style='font-weight: bold'>Unit </span> <input class='' type='text' name='unit' id='unit' value='"+unit+"' readonly/></div>" +
                "<div class='row'><button class='btn btn-danger btn-small ' style='margin-left:20px;' id='btn_undo'><i class='icon icon-undo'></i> Undo Transfer</button><div>");
        });
        $('#data_add').on('click','#btn_undo',function(){
              $('#data_add').html("");
        });
    });
</script>