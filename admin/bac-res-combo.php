<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["country_id"])) 
	//$query ="SELECT * FROM tbl_pr_items WHERE PRno = '" . $_POST["country_id"] . "'";
	$query ="SELECT * FROM tbl_quotation WHERE Year = $Year AND extPrice <> 0 AND itemDescription = '". $_POST["country_id"] . "' GROUP BY itemDescription");
	$results = $db_handle->runQuery($query);
?>
	<option value="">Select Item</option>
<?php
	foreach($results as $state) {
?>
	<option value="<?php echo $state["ItemDescription"]; ?>"><?php echo $state["ItemDescription"]; ?></option>
<?php
	}
}
?>