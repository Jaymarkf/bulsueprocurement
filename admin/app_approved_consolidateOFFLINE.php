<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php
$handle  =  mysql_connect("127.0.0.1", "root", "") ;
 
  mysqli_query($conn,"USE bulsuepronew",$handle);

  $query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$session_id'");
		while($row = mysqli_fetch_array($query)) {
		$Year = $row['Year'];
	}
  
  $query = "SELECT *, sum(TotalQty) as TotalQty, sum(TotalAmount) as TotalAmount FROM tbl_ppmp WHERE Year = $Year AND Status = 'Completed' GROUP BY itemdetailDesc";
  
  $result = mysqli_query($conn,$query);
  
  while ($data = mysqli_fetch_object($result)){
      $Year = $data->Year;
	  $ItemCatDesc = $data->ItemCatDesc;
	  $itemdetailDesc = $data->itemdetailDesc;
	  $UnitOfMeasurement = $data->UnitOfMeasurement;
	  $PriceCatalogue = $data->PriceCatalogue;
	  $TotalQty = $data->TotalQty;
	  $TotalAmount = $data->TotalAmount;
 
      mysqli_query($conn,"USE bulsuepronew",$handle);
      $sql = "INSERT INTO tbl_ppmp_consolidated SET
			  Year = '$Year',
              ItemCatDesc = '$ItemCatDesc',
			  itemdetailDesc = '$itemdetailDesc',
			  UnitOfMeasurement = '$UnitOfMeasurement',
			  PriceCatalogue = '$PriceCatalogue',
			  TotalQty = '$TotalQty',
			  TotalAmount = '$TotalAmount'
			  ";
			  
       if (!mysqli_query($conn,$sql)) {
       echo '<p>Error adding data into database: ' . mysql_error() . '</p>';
      }
      mysqli_query($conn,"USE bulsuepronew",$handle);
  }
  header("location: app_approved.php?id=" .$Year);
  //header("location: app_approved.php");
 ?>