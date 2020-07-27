<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
		<h4 class="span12">Manage Quotation</h4>
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="span12" id="">
				<?php include('quotation-form-edit.php'); ?>		   			
				</div>
            </div>

		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>