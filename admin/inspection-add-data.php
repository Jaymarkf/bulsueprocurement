<?php
	$query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
		while($row = mysqli_fetch_array($query)) {
			$Year = $row['Year'];
		}
?>

<div class="row-fluid">
	<!-- block -->
	<div class="block">
		<div class="navbar navbar-inner block-header">
			<div class="muted pull-left"><i class="icon-plus-sign icon-large"></i> Create New Inspection and Acceptance Report</div>
		</div>
		<div class="block-content collapse in">
			<div class="span12" id="content">
			
			<!-- <form method="post" id="add_iar_data"> -->
                    <form method="POST" action="inspection-data-save.php">
                            <div class="span12">
                                <div class="span4">
                                    <div class="control-group">
                                      <div class="controls">
                                        <label>I.A.R. No.: </label>
                                        <input class="span12" type="text" name="ciIARno" placeholder="Input Inspection and Acceptance Report No. here..." Required />
                                      </div>
                                    </div>
                                </div>

                                <div class="span4">
                                    <div class="control-group">
                                      <div class="controls">

                                      </div>
                                    </div>
                                </div>

                                <div class="span4">
                                    <div class="control-group">
                                      <div class="controls">
                                        <?php
                                            date_default_timezone_set("Asia/Manila");
                                            $now=date('Y-m-j');
                                        ?>
                                        <label>I.A.R. Date:</label>
                                        <input class="span12" type="date" value="<?php echo $now; ?>" name="ciIARDate" Required />
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="span12" id="content">
                            <hr/>
                            <div class="span12" id="content">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="controls">
                                            <label>P.O. / Stock Property No. :</label>
                                            <select  name="ciPO" placeholder = "Branch" class="span12" required>
                                                <option style="display:none" disabled selected></option>
                                                <?php
                                                    $qry = mysqli_query($conn,"select po.id as idd,po.*,com.* from tbl_po po inner join tbl_company com on po.company_id = com.id");
                                                    while($rows = $qry->fetch_assoc()){
                                                            echo "<option value='".$rows['idd']."'> ".$rows['po_number']." / Stock Property : " .$rows['stock_property_no']. "</option>";
                                                        }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="span4">
                                    <div class="control-group">
                                      <div class="controls">
                                        <label>Requesitioning Office/Dept.:</label>
                                        <input class="span12" type="text" name="ciROD" Required />

                                      </div>
                                    </div>
                                </div>

                                <div class="span4">
                                    <div class="control-group">
                                      <div class="controls">
                                        <label>Responsibility Center Code:</label>
                                        <input class="span12" type="text" name="ciRCC" Required />

                                      </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="control-group">
                                        <div class="controls">
                                            <button  data-placement="top" title="Click to Save" id="save" name="save" class="btn btn-success"><i class="icon-save icon-large"></i> Save</button>
                                                    <script type="text/javascript">
                                                    $(document).ready(function(){
                                                        $('#save').tooltip('show');
                                                        $('#save').tooltip('hide');
                                                    });
                                                    </script>

                                            <a href="inspection-main.php" title="Click to Cancel" id="cancel" data-placement="top" name="cancel" class="btn btn-danger"><i class="icon-undo icon-large"></i> Cancel </a>
                                                    <script type="text/javascript">
                                                    $(document).ready(function(){
                                                        $('#cancel').tooltip('show');
                                                        $('#cancel').tooltip('hide');
                                                    });
                                                    </script>
                                        </div>
                                    </div>
                    </form>
			</div>
			</div>
		</div>
	</div>
	<!-- /block -->
</div>

<script>
//	jQuery(document).ready(function($){
//		$("#add_iar_data").submit(function(e){
//			e.preventDefault();
//			var _this = $(e.target);
//			var formData = $(this).serialize();			
//			$.ajax({
//				type: "POST",
//				url: "inspection-data-save.php",
//				dataType:"json",
//				//data: dataString,
//				data: formData,
//				success: function (response) {
//					if(response.status === "success") {
//						$.jGrowl("New Inspection and Acceptance Report is successfully created", { header: 'SUCCESS' });
//							var delay = 3000;
//							setTimeout(function(){ window.location = 'inspection-main.php'  }, delay);
//					} else if(response.status === "error") {
//						$.jGrowl("New Inspection and Acceptance Report failed to create", { header: 'FAILED' });
//							var delay = 3000;
//							setTimeout(function(){ window.location = 'inspection-add.php'  }, delay);
//					}
//				}
//			})
//			return false;
//		});
//	});

</script>