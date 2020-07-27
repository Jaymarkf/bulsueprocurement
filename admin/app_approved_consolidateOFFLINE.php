<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php
$handle  =  mysql_connect("127.0.0.1", "root", "") or die(mysql_error());
 
  mysql_query("USE bulsuepronew",$handle);

  $query = mysql_query("SELECT * FROM users WHERE user_id = '$session_id'")or die(mysql_error());
		while($row = mysql_fetch_array($query)) {
		$Year = $row['Year'];
	}
  
  $query = "SELECT *, sum(TotalQty) as TotalQty, sum(TotalAmount) as TotalAmount FROM tbl_ppmp WHERE Year = $Year AND Status = 'Completed' GROUP BY itemdetailDesc";
  
  $result = mysql_query($query);
  
  while ($data = mysql_fetch_object($result)){
      $Year = $data->Year;
	  $ItemCatDesc = $data->ItemCatDesc;
	  $itemdetailDesc = $data->itemdetailDesc;
	  $UnitOfMeasurement = $data->UnitOfMeasurement;
	  $PriceCatalogue = $data->PriceCatalogue;
	  $TotalQty = $data->TotalQty;
	  $TotalAmount = $data->TotalAmount;
 
      mysql_query("USE bulsuepronew",$handle);
      $sql = "INSERT INTO tbl_ppmp_consolidated SET
			  Year = '$Year',
              ItemCatDesc = '$ItemCatDesc',
			  itemdetailDesc = '$itemdetailDesc',
			  UnitOfMeasurement = '$UnitOfMeasurement',
			  PriceCatalogue = '$PriceCatalogue',
			  TotalQty = '$TotalQty',
			  TotalAmount = '$TotalAmount'
			  ";
			  
       if (!mysql_query($sql)) {
       echo '<p>Error adding data into database: ' . mysql_error() . '</p>';
      }
      mysql_query("USE bulsuepronew",$handle);
  }
  header("location: app_approved.php?id=" .$Year);
  //header("location: app_approved.php");
 ?>