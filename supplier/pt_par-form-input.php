
<div class="block">
    <div class="container-header text-center" style="position:relative;width:100%;height:40px;background-image:linear-gradient(#bababa, #454545); ">
        <span style="color:#e9e9e9;font-weight: bold;line-height: 35px;">Transfer PAR Data</span>
    </div>
    <div class="container-fluid" style="padding:40px;">
        <table class="table" cellpadding="0" cellspacing="0" id="example1">
            <thead>
            <tr>
                <th>Select</th>
                <th>PAR No.</th>
                <th>Code</th>
                <th>College</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $ff = $conn->query("select * from tbl_par");
            while($row = $ff->fetch_assoc()){
                //get the equipment code
                $aa = $conn->query("select * from equipment_code where id = ". $row['e_code']);
                $data_code = $aa->fetch_assoc();
                $e_code  = $data_code['description']. '-' . '('.$data_code['code'].')';
                //get the college
                //explode user
                $user = explode(",",$row['received_by_ids']);
                $college = array();
                foreach ($user as $item => $val) {
                    $ff = $conn->query("select emp.*,col.* from tbl_supplier_employee emp inner join tbl_branch col on emp.college = col.branchID  where emp.id = ".$val);
                    $data = $ff->fetch_assoc();
                    $college[$item] = $data['branch'];
                }

                if(count(array_unique($college)) > 1 ){
                    $datax = implode(",",$college);
                }else{
                    $temp = array_unique($college);
                    $datax = $temp[0];
                }

                ?>
            <tr>
                <td><button type="button" class="btn btn-small btn-success flag" data-id="<?=$row['id'];?>"><i class="icon icon-plus"></i> Add to Transfer</button></td>
                <td><?=$row['ics_num']?></td>
                <td><?=$e_code?></td>
                <td><?=$datax?></td>
                <td>untransfered</td>

            </tr>
            <?php

            }
            ?>
            </tbody>
        </table>
        <div class="row-fluid">
            <div class="span6" style="border-right: 1px solid gray">
                <form method="post">
                    <div style="" id="data_add">

                    </div>
            </div>
            </form>
            <form method="post" id="transfer_property_submit">
                <div class="span6 text-center" id="block_span">

                </div>
            </form>
        </div>

    </div>

</div>
