<?php
	include('../dbcon.php');
	include('session.php');
	
	$EndUserUnit = $_POST['fEndUserUnit'];
	$Code = $_POST['fCode'];
	$GenDesc = $_POST['fGenDesc'];
	$QtySize = $_POST['fQtySize'];
	$EstBud = $_POST['fEstBud'];
	$ModProcure = $_POST['fModProcure'];
	$Jan = $_POST['fJan'];
	$Feb = $_POST['fFeb'];
	$Mar = $_POST['fMar'];
	$Apr = $_POST['fApr'];
	$May = $_POST['fMay'];
	$Jun = $_POST['fJun'];
	$Jul = $_POST['fJul'];
	$Aug = $_POST['fAug'];
	$Sep = $_POST['fSep'];
	$Oct = $_POST['fOct'];
	$Nov = $_POST['fNov'];
	$Dec = $_POST['fDec'];

	mysqli_query($conn,"insert into tbl_ppmp(EndUserUnit,Code,General_Description,Qty_Size,Estimated_Budget,Mode_of_Procurement,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec) values ('$EndUserUnit','$Code','$GenDesc','$QtySize','$EstBud','$ModProcure','$Jan','$Feb','$Mar','$Apr','$May','$Jun','$July','$Aug','$Sep','$Oct','$Nov','$Dec')");		
//	mysqli_query($conn,"insert into activity_log (username,date,action) values('$user_username',NOW(),'Add Student $Code $GenDesc')")or die (mysql_error());
?>