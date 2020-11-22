<div class="block">
    <div class="container-fluid" style="padding:24px;">
        <table class="table" cellpadding="0" cellspacing="0" id="t">
            <thead>
                    <tr>
                        <th>PTR NO.</th>
                        <th>PTR DATE</th>
                        <th>ITEM DESCRIPTION</th>
                        <th>QUANTITY</th>
                        <th>UNIT</th>
                        <th>UNIT COST</th>
                        <th>RELEASED / ISSUED BY</th>
                        <th>RECEIVED BY</th>
                        <th>COLLEGE</th>
                        <th>REASON FOR TRANSFER</th>
                        <th>ACTION</th>

                    </tr>
            </thead>
            <tbody>
            <?php
                $sql = $conn->query("select * from summary_report");
                while($row = $sql->fetch_assoc()){
                    //get name of issuer
                    $query_name = $conn->query("select * from tbl_supplier_employee where id = ".$row['issued_by']);
                    $data1 = $query_name->fetch_assoc();
                    //get receiver name
                    $query_name2 = $conn->query("select * from tbl_supplier_employee where id = ".$row['issued_to']);
                    $data2 = $query_name2->fetch_assoc();
                    ?>
                        <tr>
                            <td><?=$row['ptr_no']?></td>
                            <td><?=$row['ptr_date']?></td>
                            <td><?=$row['item_description']?></td>
                            <td><?=$row['quantity']?></td>
                            <td><?=$row['unit']?></td>
                            <td><?=$row['unit_cost']?></td>
                            <td><?=$data1['first_name']. ' '. $data1['middle_name'] . ' '. $data1['last_name']?></td>
                            <td><?=$data2['first_name']. ' '. $data2['middle_name'] . ' '. $data2['last_name']?></td>
                            <td><?=$row['college']?></td>
                            <td><?=$row['reason_for_transfer']?></td>
                            <td><a href="pdf-summary-report.php?id=<?=$row['id']?>" class="btn btn-success btn-small" title="print this row"><i class="icon icon-print"></i></a></td>
                        </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>
    </div>
</div>