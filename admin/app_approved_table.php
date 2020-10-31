<style>
    #closebtnspan:hover{
    background-color:red !important;
        cursor:pointer;
    }
    #bell:hover{
        color:red !important;
    }
</style>
<div class="">

    <form method="get">
	<div class="">
		<a href="dashboard.php" title="Back to PPMP-Dashboard" id="back" data-placement="right" class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>

		<!-- CHECK IF ALREADY CONSOLIDATE THE PPMP YEAR -->	
		<?php
			//$query = mysqli_query($conn,"SELECT * FROM tbl_year");
			$query = mysqli_query($conn,"SELECT * FROM users WHERE user_id='$session_id'");
			while($row = mysqli_fetch_array($query)) {
				$Year = $row['Year'];
			}
			$query1= mysqli_query($conn,"select * from tbl_ppmp_consolidated WHERE Year = '$Year'");
			$count1 = mysqli_num_rows($query1);
		?>	
		
		<?php if ($count1 == "z" /* 0 instead of z */) { ?>
            <button type="submit" name="consolidate" value="true" title="Consolidate PPMP " id="back" data-placement="right" class="btn btn-success"><i class="icon-inbox icon-large"></i> Consolidate </button>
		<?php }else{ ?>
<!--			<a href="#" title="Consolidate not possible..." id="back" data-placement="right" class="btn btn-default"><i class="icon-inbox icon-large"></i> Consolidate </a>-->
<!--			<script type="text/javascript">-->
<!--				$(document).ready(function(){-->
<!--					$('#back').tooltip('show');-->
<!--					$('#back').tooltip('hide');-->
<!--				});-->
<!--			</script>-->


<!--            /* modified code */-->


            <button type="submit" name="consolidate" value="true" title="Consolidate PPMP " id="back" data-placement="right" class="btn btn-success"><i class="icon-inbox icon-large"></i> Consolidate </button>
<!--            end of code-->


		<?php } ?>
		<!-- CHECK IF ALREADY CONSOLIDATE THE PPMP YEAR -->
		<!-- RESET THE CONSOLIDATE PPMP YEAR -->
		<?php
			//$query = mysqli_query($conn,"SELECT * FROM tbl_year");
			$query = mysqli_query($conn,"SELECT * FROM users WHERE user_id='$session_id'");
			while($row = mysqli_fetch_array($query)) {
				$Year = $row['Year'];
			}
			
			$query2= mysqli_query($conn,"select * from tbl_ppmp_consolidated WHERE Year = '$Year'");
			$count2 = mysqli_num_rows($query2);
		?>	
		
		<?php if ($count2 == "z" /* 0 instead of z */) { ?>
			<a title="Reset not possible..." id="back" data-placement="right" class="btn btn-alert"><i class="icon-undo icon-large"></i> Reset </a>
		<?php }else{ ?>
			<a type="submit" href="reset_app_approved_consolidate.php<?php echo '?id='.$Year; ?>" title="Reset the Consolidated PPMP Year" id="back" data-placement="right" class="btn btn-danger"><i class="icon-undo icon-large"></i> Reset </a>

		<?php } ?>	
		<!-- RESET THE CONSOLIDATE PPMP YEAR -->

<!--        notification unfinished-->
	</div>

</form>
	<br/>
	<form method="POST">
		<table cellpadding="0" cellspacing="0" border="0" id="example1" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th rowspan="2"><b>Item Description</b></th>
					<th rowspan="2"><b>Unit of Measurement</b></th>
					<th rowspan="2"><b>Total Qty</b></th>
					<th rowspan="2"><b>Price Catalogue</b></th>
					<th rowspan="2"><b>Total Amount</b></th>
				</tr>
			</thead>
			<tbody>
				<?php					
					$query3 = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
					while($row3 = mysqli_fetch_array($query3)) {
					$Year3 = $row3['Year'];

                    if(isset($_GET['consolidate'])){
                        if($_GET['consolidate'] == 'true'){

                            $arr['key'][] = "`consolidate_id`";
                            $arr['key'][] = "`Year`";
                            $arr['key'][] = "`ItemCatDesc`";
                            $arr['key'][] = "`itemdetailDesc`";
                            $arr['key'][] = "`UnitOfMeasurement`";
                            $arr['key'][] = "`PriceCatalogue`";
                            $arr['key'][] = "`TotalAmount`";
                            $key = implode(",",$arr['key']);
                            //if consolidate then insert consolidated information
                            $qryc = $conn->query("select * from tbl_ppmp where Status = 'Completed'");
                            $conn->query('delete from tbl_ppmp_consolidated');
                            while($dataq = $qryc->fetch_assoc()){
                            //arr values
                                $arr['values'][] = "'".$dataq['ppmpID']."'";
                                $arr['values'][] = "'".$dataq['Year']."'";
                                $arr['values'][] = "'".$dataq['ItemCatDesc']."'";
                                $arr['values'][] = "'".$dataq['itemdetailDesc']."'";
                                $arr['values'][] = "'".$dataq['UnitOfMeasurement']."'";
                                $arr['values'][] = "'".$dataq['PriceCatalogue']."'";
                                $arr['values'][] = "'".$dataq['TotalAmount']."'";
                                $values = implode(",",$arr['values']);
                                $conn->query("insert into tbl_ppmp_consolidated(".$key.")VALUES(".$values.")");
                                unset($arr['values']);
                                unset($arr['key']);
                            }
                            $qry = mysqli_query($conn,"select itemCatDesc,itemdetailDesc,UnitOfMeasurement,
                                                            PriceCatalogue,SUM(TotalQty) as TotalQty,SUM(TotalAmount) as TotalAmount
                                                            from tbl_ppmp_consolidated where Year = '$Year3'
                                                            GROUP BY itemCatDesc,itemdetailDesc,UnitOfMeasurement,PriceCatalogue");

                        }else{
                            $qry = mysqli_query($conn,"select itemdetailDesc,
                                                        UnitOfMeasurement,SUM(TotalQty) as TotalQty,PriceCatalogue,(COUNT(id) * TotalAmount) as TotalAmount
                                                        from tbl_ppmp_consolidated WHERE Year = '$Year3'
                                                        GROUP BY itemdetailDesc,
                                                        UnitOfMeasurement,PriceCatalogue,TotalAmount");

                        }
                    }else{
                        $dss = $conn->query("select * from tbl_ppmp_consolidated");
                        if($dss->num_rows > 0){
                            $qry = mysqli_query($conn,"select itemCatDesc,itemdetailDesc,UnitOfMeasurement,
                                                            PriceCatalogue,SUM(TotalQty) as TotalQty,SUM(TotalAmount) as TotalAmount
                                                            from tbl_ppmp_consolidated where Year = '$Year3'
                                                            GROUP BY itemCatDesc,itemdetailDesc,UnitOfMeasurement,PriceCatalogue");

                        }else {
                            $qry = mysqli_query($conn, "select itemdetailDesc,
                                                        UnitOfMeasurement,SUM(TotalQty) as TotalQty,PriceCatalogue,(COUNT(ppmpID) * TotalAmount) as TotalAmount
                                                        from tbl_ppmp WHERE Year = '$Year3' and Status = 'Completed'
                                                        GROUP BY itemdetailDesc,
                                                        UnitOfMeasurement,PriceCatalogue,TotalAmount");
                        }

                    }
	    while($row4 = mysqli_fetch_array($qry)){
				?>
				<tr>
					<td width="500" style="text-align:center;"><?php echo $row4['itemdetailDesc']; ?></td> 
					<td width="50" style="text-align:center;"><?php echo $row4['UnitOfMeasurement']; ?></td>
					<td width="100" style="text-align:center;"><?php echo $row4['TotalQty']; ?></td>
					<td width="150" style="text-align:right;">&#8369;<?php echo number_format($row4['PriceCatalogue'],2, '.', ','); ?></td>
					<td width="150" style="text-align:right;">&#8369;<?php echo number_format($row4['TotalAmount'],2, '.', ','); ?></td>
				</tr>
				<?php 
					}
				}
				?>    		
			</tbody>
			<tfooter>
				<tr>
					<th colspan="4" align="right"><h4>TOTAL AMOUNT: </h4></th>
					
					<?php
						//$row = mysqli_query($conn,"SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp WHERE Year=$Year3 AND user_id='$session_id'  AND Status = 'Requested'") ;
						$row5 = mysqli_query($conn,"SELECT SUM(TotalAmount) as Totalx FROM tbl_ppmp_consolidated WHERE Year=$Year3") ;
						while($result5 = mysqli_fetch_array($row5)){
							echo "<th style='text-align:right;'><h4>&#8369;" . number_format($result5['Totalx'],2, '.', ',') . "</h4></th>";
						}
					?>
				</tr>
			</tfooter>
		</table>
	</form>
	<div class="">
		<a href="dashboard.php" title="Back to PPMP-Dashboard" id="back" data-placement="right" class="btn btn-inverse"><i class="icon-undo icon-large"></i> Back </a>

	</div>
</div>