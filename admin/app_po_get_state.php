<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["quotation_id"])) {
	$query ="SELECT * FROM tbl_quotation WHERE quotation_id = '" . $_POST["quotation_id"] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="">Select Supplier</option>
<?php
	foreach($results as $state) {
?>
	<option value="<?php echo $state["Company"]; ?>"><?php echo $state["Company"]; ?></option>
<?php
	}
}
?>