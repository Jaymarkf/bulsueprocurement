<!DOCTYPE html>
<html class="no-js">
<head>
    <title>BULSU e-PROCUREMENT v1.0</title>

    <!-- Bootstrap -->
    <link href="../images/logo.png" rel="icon" type="image">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="../bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
    <link href="../bootstrap/css/my_style.css" rel="stylesheet" media="screen">
    <link href="../bootstrap/css/print.css" rel="stylesheet" media="print">
    <link href="../vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
    <link href="../assets/styles.css" rel="stylesheet" media="screen">
    <script src="../vendors/jquery-1.9.1.min.js"></script>
    <!-- data table -->
    <link href="../assets/DT_bootstrap.css" rel="stylesheet" media="screen">
    <!-- notification  -->
    <link href="../vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
    <script src="../vendors/jGrowl/jquery.jgrowl.js"></script>
    <!-- <script src="../vendor/easy-pie-chart-master/src/easypiechart.js"></script> -->
    <link href="../vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
    <script src="../vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- wysiwug  -->
    <link rel="stylesheet" type="text/css" href="../vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>
    <!-- slider  -->
    <script src="../assets/responsiveslides.min.js" rel="stylesheet" media="screen"></script>
    <script src="../assets/responsiveslides-call.js" rel="stylesheet" media="screen"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/js/datatables/media/css/jquery.dataTables.css">
    <!-- <script type="text/javascript" language="javascript" src="../bootstrap/js/datatables/media/js/jquery.dataTables.js"></script> -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" class="init">

        $(document).ready(function() {

            $('#pt_ics').click(function(){
            window.location = 'pt_ics.php';

        });
        $('#pt_par').click(function(){
           window.location = 'pt_par.php';
        });
        
        $('#summary_report').click(function(){
            window.location = 'summary_report.php';
        });
    
            $('.example').dataTable( {
                "scrollY": 200,
                "scrollX": true
            });
            $('#t').dataTable({
                "sScrollX": "100%",
                "sScrollXInner": "110%",
                "bScrollCollapse": true,
                "fixedColumns":   {
                    "leftColumns": 1
                }
            });
        });
    </script>

    <script type="text/javascript">
        //Disable Mouse Right Click, Cut, Copy & Paste
        $(document).ready(function () {
            //Disable cut copy paste
            $('body').bind('cut copy paste', function (e) {
                e.preventDefault();
            });

            //Disable mouse right click
            $("body").on("contextmenu",function(e){
                return false;
            });
        });

        //when press print screen
        $(document).ready(function() {
            $(window).keyup(function(e){
                if(e.keyCode == 44){
                    //$("body").hide();
                    return false;
                }
            });
        });
    </script>

    <script type='text/javascript'>
        //disable CTRL+U,CTRL+C and right click
        var isCtrl = false;
        document.onkeyup=function(e)
        {
            if(e.which == 17)
                isCtrl=false;
        }
        document.onkeydown=function(e)
        {
            if(e.which == 17)
                isCtrl=true;

        }
        var isNS = (navigator.appName == "Netscape") ? 1 : 0;
        if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
        function mischandler(){
            return false;
        }
        function mousehandler(e){
            var myevent = (isNS) ? e : event;
            var eventbutton = (isNS) ? myevent.which : myevent.button;
            if((eventbutton==2)||(eventbutton==3)) return false;
        }
        document.oncontextmenu = mischandler;
        document.onmousedown = mousehandler;
        document.onmouseup = mousehandler;
    </script>

</head>
<?php include('../dbcon.php'); ?>