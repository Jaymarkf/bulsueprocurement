<?php 
class Database {
	//private $host = "127.0.0.1";
	//private $user = "root";
	//private $password = "";
//	private $database = "bulsuepronew";
	
	private $host = "23.111.143.210"; //"23.111.143.210";
	private $user = "bulsuepr_rommel"; //"bulsuepr_rommel";
	private $password = "_adZ6@A~DO1i"; //"_adZ6@A~DO1i";
	private $database = "bulsuepr_database"; //"bulsuepr_database";
	private $conn;	
	
	function runQuery($sql) {
		$conn = new mysqli($this->host,$this->user,$this->password,$this->database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $resultset[] = $row;
      }
    }
    $conn->close();

		if(!empty($resultset))
			return $resultset;
	}
}
?>