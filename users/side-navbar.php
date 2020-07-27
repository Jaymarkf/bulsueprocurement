<?php date_default_timezone_set('Asia/Manila'); ?>
<?php
    $jim = new Data();    
    $cat = $jim->getcategory();
    class Data {
        function getcategory(){
            $result = mysqli_query($conn,"SELECT * FROM tbl_item_category ORDER BY itemCatDesc ASC");
            return $result;
        }
    }
?>

<div class="span12" id="sidebar">
	<center>
	<div class="block-header">
		<h4><i class="icon-tags icon-large"></i> PRICE CATALOGUE</h4>
	</div>
		<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
			<li>
				<a tabindex="-1" href="dashboard.php" class="jkl"><i class="icon-tags icon-large"></i> ALL ITEMS </a>
			</li>
				<?php
					$cat = $jim->getcategory();
					while($row = mysqli_fetch_array($cat)){
						echo '<li><a tabindex="-1" class="jkl" href="category.php?filter='.trim($row['itemcategoryID']).'"><i class="icon-tags icon-large"></i> '.$row['ItemCatDesc'].'</a></li>';
					}
				?>
		</ul>
	</center>
</div>