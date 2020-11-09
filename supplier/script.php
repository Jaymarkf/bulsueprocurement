<!--/.fluid-container-->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../vendors/easypiechart/jquery.easy-pie-chart.js"></script>
<script src="../assets/scripts.js"></script>
<script>
    $(function() {
        // Easy pie charts
        $('.chart').easyPieChart({animate: 1000});
    });
</script>
<!-- data table -->
<!-- <script src="..//datatables/js/jquery.dataTables.min.js"></script> -->
<script src="../assets/DT_bootstrap.js"></script>
<script src="../vendors/jGrowl/jquery.jgrowl.js"></script>
<script>
    $(function() {
        $('.tooltip').tooltip();
        $('.tooltip-left').tooltip({ placement: 'left' });
        $('.tooltip-right').tooltip({ placement: 'right' });
        $('.tooltip-top').tooltip({ placement: 'top' });
        $('.tooltip-bottom').tooltip({ placement: 'bottom' });
        $('.popover-left').popover({placement: 'left', trigger: 'hover'});
        $('.popover-right').popover({placement: 'right', trigger: 'hover'});
        $('.popover-top').popover({placement: 'top', trigger: 'hover'});
        $('.popover-bottom').popover({placement: 'bottom', trigger: 'hover'});
        $('.notification').click(function() {
            var $id = $(this).attr('id');
            switch($id) {
                case 'notification-sticky':
                    $.jGrowl("Stick this!", { sticky: true });
                    break;
                case 'notification-header':
                    $.jGrowl("A message with a header", { header: 'Important' });
                    break;
                default:
                    $.jGrowl("Hello world!");
                    break;
            }
        });
    });
</script>
<link href="../vendors/datepicker.css" rel="stylesheet" media="screen">
<link href="../vendors/uniform.default.css" rel="stylesheet" media="screen">
<link href="../vendors/chosen.min.css" rel="stylesheet" media="screen">
<script src="../vendors/jquery.uniform.min.js"></script>
<script src="../vendors/chosen.jquery.min.js"></script>
<script src="../vendors/bootstrap-datepicker.js"></script>
<link href="../vendors/datepicker.css" rel="stylesheet" media="screen">
<script src="../vendors/bootstrap-datepicker.js"></script>
<script>
    $(function() {
        $(".datepicker").datepicker();
        $(".uniform_on").uniform();
        $(".chzn-select").chosen();
        $('#rootwizard .finish').click(function() {
            alert('Finished!, Starting over!');
            $('#rootwizard').find("a[href*='tab1']").trigger('click');
        });
    });
</script>
