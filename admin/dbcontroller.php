<?php
class DBController {
	private $host = "23.111.143.210"; //"23.111.143.210";
	private $user = "bulsuepr_rommel"; //"bulsuepr_rommel";
	private $password = "_adZ6@A~DO1i"; //"_adZ6@A~DO1i";
	private $database = "bulsuepr_database"; //"bulsuepr_database";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>