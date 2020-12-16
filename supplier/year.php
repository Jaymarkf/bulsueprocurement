<?php session_start(); ?>
<?php include('header.php'); ?>
<?php include('session.php'); ?>
<!--php starts here PART1-->

    <body >
		<?php include('navbar.php') ?>
        <div class="container-fluid" id="">
            <div class="row-fluid">
				
                <div class="span12" id="content">						
                    <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-calendar icon-large"></i><a href="dashboard.php" class="muted"> Set Project Procurement Management Plan Year</a></div>
                            </div>

							<?php include('year-form.php'); ?>

						</div>
                </div>
            </div>
    
         <?php include('footer.php'); ?>
		 
        </div>
	<?php include('script.php'); ?>
    </body>
</html>