<?php

require_once('/EZFramework/databaseConfig.php');

class baseDataHelper {
	
	function __construct($dbConfig) {
		$this->dbConfig = $dbConfig;
	}
	
	private $dbConfig = null;
	
	protected function executeQuery($sqlString) {
		$connection = mysqli_connect(
			$this->dbConfig->Get("server"),
			$this->dbConfig->Get("username"),
			$this->dbConfig->Get("password"),
			$this->dbConfig->Get("database")
		);
		
		$query = mysqli_query($connection, $sqlString);
		$results = mysqli_fetch_array($query);
		
		mysqli_close($connection);
		
		return $results;
	}
	
	protected function executeNonQuery($sqlString) {
		
	}
}

?>