<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php include('session.php'); ?>
    <body >
		<?php include('navbar.php'); ?>					
        <div class="container-fluid">




            <div class="row-fluid">
				<div class="span12" id="content">
					<div class="span6" id="content">
						<div class="row-fluid">
							<a href="year.php" class="pull-left" data-placement="right" title="Click to Change the year" id="yearbtn"><div class="pull-left"><h3 style="color:#ffa500;background-color:rgba(295,235,215,0.8);padding:3px 20px;border-radius:50px;"> Year: <?php echo $Year; ?></h3></div></a>
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

            <h2>History Logs of PPMP Procurement</h2>
            <div class="row-fluid">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>History</th>
                                        <th>Date Changed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = $conn->query("select * from users where user_id = ".$session_id);
                                    $rescampus = $sql->fetch_assoc();
                                    $campus = $rescampus['branch'];
                                    $_sql = $conn->query("select * from procurement_ppmp_history where branch = '$campus'");
                                    while($row = $_sql->fetch_assoc()){
                                    ?>
                                       <tr>
                                           <td><?=$row['description']?></td>
                                           <td><?=$row['date_change']?></td>
                                       </tr> 
                                       <?php 
                                    }
                                    ?>   
                                </tbody>
                            </table>
                <div class="row-fluid">
                    <a  href="printable_ppmp_logs_pdf.php" class="btn btn-small btn-info"><i class="icon icon-print"></i>&nbsp;&nbsp;Print Report</a>
                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>	
</html>