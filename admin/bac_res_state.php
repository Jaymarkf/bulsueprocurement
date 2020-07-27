<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["country_id"])) {
	$query = "SELECT * FROM tbl_quotation WHERE itemDescription = '" . $_POST["country_id"] . "'" or die(mysql_error());
	//$query ="SELECT * FROM tbl_pr_items WHERE PRno = '" . $_POST["country_id"] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value=""></option>
<?php
	foreach($results as $state) {
?>
	<option value="<?php echo $state["Company"]; ?>"><?php echo $state["Company"] . ' - &#8369;' . number_format($state["extPrice"],2); ?></option>
<?php
	}
}
?>