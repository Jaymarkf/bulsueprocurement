<?php    if(!isset($_SESSION)){ session_start(); }  include('header.php'); ?>
<?php include('session.php'); ?>

<?php
	$item = $_GET['item'];
	$coA = $_GET['coA'];
	$coB = $_GET['coB'];
	$coC = $_GET['coC'];
?>

<body>
	<?php include('navbar.php'); ?>
	<h4 class="span12">UPDATE BAC Resolution</h4>
	
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12" id="content">
				<?php  include('inspection-edit-data.php');  ?>		   			
			</div>
		</div>
	<?php include('footer.php'); ?>
	</div>
	<?php include('script.php'); ?>
</body>