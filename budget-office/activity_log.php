<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
    <style>
        td {
            white-space: normal !important;
            word-wrap: break-word;
        }
        table {
            table-layout: fixed;
        }
    </style>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i> Activity Logs List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
										<thead>
                                            <tr>
                                                <th>Activity</th>
                                                <th>Date and Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $c = $conn->query("select * from tbl_activity_log where user_id = ". $_GET['id']);
                                        while($d = $c->fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td><?=$d['activity']?></td>
                                                <td><?=$d['date_time']?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
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