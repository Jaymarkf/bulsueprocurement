<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i> Activity Log List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									
									<!-- <div class="pull-right">
									<a href="#" onclick="window.print()" class="btn btn-info" data-placement="left" title="Click to Print" id="print"><i class="icon-print icon-large"></i> Print List</a> 
									 <script type="text/javascript">
										$(document).ready(function(){
											$('#print').tooltip('show');
											$('#print').tooltip('hide');
										});
									</script>
									</div><br><br>  -->
										<thead>
										        <tr>
												<th>Date</th>
												<th>User</th>
												<th>Action</th>
												</tr>											
										</thead>
										<tbody>
											
                              		<?php
										$query = mysqli_query($conn,"SELECT * FROM  activity_log ORDER BY 	activity_log_id DESC");
										while($row = mysqli_fetch_array($query)){
									?>
									<tr>
                                         <td><?php  echo $row['date']; ?></td>
                                         <td><?php echo $row['username']; ?></td>
                                         <td><?php echo $row['action']; ?></td> 
									</tr>
                         
						 <?php } ?>
										</tbody>
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
    </body>
</html>