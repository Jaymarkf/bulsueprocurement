<?php
session_start();
?>
<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php trim($filter = isset($_GET['filter']) ? $_GET['filter'] : '');?>
<!--php starts here PART1-->
    <body >
		<?php include('navbar.php');
	
        ?>
      
        <div class="container-fluid" id="">
            <div class="row-fluid">
			<?php
				//$query = mysqli_query($conn,"SELECT * FROM tbl_year");
				$query = mysqli_query($conn,"SELECT * FROM users WHERE user_id='$session_id'");
				while($row = mysqli_fetch_array($query)) {
					$Year = $row['Year'];
				}
				$YearToday=date('Y');
				if ($Year < $YearToday) {
					echo "Set the procurement year first before making a transactions...";
				}
				//$query1= mysqli_query($conn,"select * from tbl_ppmp WHERE Year = '$Year' AND user_id='$session_id' AND Status = 'Pending' GROUP BY YEAR");
				$query1= mysqli_query($conn,"select * from tbl_ppmp WHERE Year = '$Year' AND user_id='$session_id' AND Status = 'Pending'");
				$count1 = mysqli_num_rows($query1);
				?>
			<div class="span12" id="content">
				<div class="span3" id="content">
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
				<div class="span9" id="">
					<?php if ($count1 == "0") { ?>
						<div class="row-fluid">
							<a href="#" class="btn btn-default pull-right"><i class="icon-shopping-cart icon-large"></i> PPMP Cart<br/><span class="badge badge-info"><?php  echo $count1;  ?></span></a>
						</div>
					<?php }else{ ?>
						<div class="row-fluid">
							<a href="ppmp.php" class="btn btn-default pull-right"><i class="icon-shopping-cart icon-large"></i> PPMP Cart<br/><span class="badge badge-info"><?php  echo $count1;  ?></span></a>
						</div>
					<?php } ?>
				</div>
			</div>
				<div class="span12" id="content">
					<div class="span3" id="content">						
						<div class="row-fluid">
							<?php include('side-navbar.php') ?>
						</div>
					</div>
					<div class="span9" id="content">						
						<div class="row-fluid">
							<!-- block -->
							<div id="block_bg" class="block">
								<div class="navbar navbar-inner block-header">
									<div class="muted pull-left"><i class="icon-tags icon-large"></i><a href="dashboard.php" class="muted"> ALL ITEMS</a></div>
									<?php
										$filter = isset($_POST['filter']) ? $_POST['filter'] : '';
										if(isset($_POST['filter'])) {
											//$title = '<h2 class="title text-center">Searched Items</h2>';
											$filter = $_POST['filter'];
											$result = mysqli_query($conn,"SELECT * FROM tbl_item_details WHERE itemcategoryID LIKE '%".$filter."%' OR itemdetailDesc LIKE '%".$filter."%' OR UnitOfMeasurement LIKE '%".$filter."%' or PriceCatalogue like '%$filter%'");

										} else {
											//$title = '<h2 class="title text-center">All Items</h2>';
											$result = mysqli_query($conn,"SELECT * FROM tbl_item_details");
										}
										$count = mysqli_num_rows($result);
									?>
									<div class="muted pull-right">
										Number of Items Found: <span class="badge badge-info"><?php echo $count; ?></span>
									</div>
								</div>
									<div class="block-content collapse in">
										<div class="span12">
											<div class="span12">
												<!-- start of search items -->
												<div class="span12">
													<form name="search" action="dashboard.php" method="POST">
														<i class="icon-search icon-large"> </i><input type="text" placeholder="Item Name" name="filter" required/>
													</form>
												</div>
												<!-- end of search items -->
												<!-- <h2 class="title text-center">All Items</h2> -->
												<?php
													//echo $title;
												?>
												<form name="search1" action="dashboard.php" method="POST">
													<!--php starts here PART2-->
													<?php
													if($result){				
														while($row1=mysqli_fetch_array($result)){
														$itemcategoryID = $row1['itemcategoryID'];
													
													$query2 = mysqli_query($conn,"select * from tbl_item_category where itemcategoryID='$itemcategoryID'");
													while($row2= mysqli_fetch_array($query2)) {
                                                        $itemCatDesc = $row2['ItemCatDesc'];
                                                    }
													$prodID = $row1["itemdetailID"];
														//echo '<div class="content-item>';
														echo '<div class="content-item span4" id="content">';
														echo '<ul>';
														echo '<div class="product-image-wrapper">
															  <div class="single-products">
																<div class="productinfo text-center">
																<h5>'.$row1['itemdetailDesc'].'</h5>
																<h2>&#8369;'. number_format($row1['PriceCatalogue'],2, '.', ',') .' / '.$row1['UnitOfMeasurement'].'</h2>
																<p>'.$itemCatDesc.'</p>';
														$searchUserYear = mysqli_query($conn,"SELECT * FROM users WHERE user_id='$session_id'");
														$foundUserYear = mysqli_fetch_array($searchUserYear);
														$resultUserYear = $foundUserYear['Year'];
														$searchItemDesc = mysqli_query($conn,"select * from tbl_item_details where itemdetailID = '$prodID'") ;
														$foundItemDesc = mysqli_fetch_array($searchItemDesc);
														$resultItemDesc = $foundItemDesc['itemdetailDesc'];

														$searchExistItem = mysqli_query($conn,"select * from tbl_ppmp where itemdetailDesc = '$resultItemDesc' AND Year ='$resultUserYear' AND user_id='$session_id' OR Status <> 'Pending' AND Year ='$resultUserYear' AND user_id = '$session_id'") ;
														$foundExistItem = mysqli_fetch_array($searchExistItem);
														
														if(!empty($foundExistItem)) {
														//	echo '<a class="btn btn-default"><i class="icon-shopping-cart icon-large"></i> Item on Cart </a>';
                                                            echo '<a href="product-details.php?prodid='.$prodID.'" class="btn btn-success"><i class="icon-shopping-cart icon-large"></i> Item Details </a>';
                                                        } else {
															echo '<a href="product-details.php?prodid='.$prodID.'" class="btn btn-success"><i class="icon-shopping-cart icon-large"></i> Item Details </a>';
														}
														echo '</ul>';			
														echo '</div>';
														}
													}
												?>
												<!--php ends here-->
																</div>
															</div>
														</div>
												</form>
											</div>
										</div>						
									</div>
								</center>
								<!-- /block -->
							</div>
						</div>
					</div>
				</div>
         <?php include('footer.php'); ?>
			</div>
		</div>
	<?php include('script.php'); ?>
    </body>
</html>