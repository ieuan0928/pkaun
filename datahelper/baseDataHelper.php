<?php

require_once('/common/databaseConfig.php');

class baseDataHelper {
	
	function __construct(databaseConfig &$dbConfig) {
		$this->dbConfig =& $dbConfig;
	}
	
	private $dbConfig = null;
	
	protected function executeQuery($sqlString) {
		$connection = mysqli_connect(
			$this->dbConfig->Get("server"),
			$this->dbConfig->Get("username"),
			$this->dbConfig->Get("password"),
			$this->dbConfig->Get("database")
		);
		
		
			
	}
	
	protected function executeNonQuery($sqlString) {
	}
}

?>