<?php


class baseDataHelper {
	
	function __construct($dbConfig) {
		$this->dbConfig = $dbConfig;
	}
	
	private $dbConfig = null;
	private $connection = null;
	
	protected function executeQuery($selectSQL) {
		$connection = new mysqli_connect(
			$this->dbConfig->Get('server'), 
			$this->dbConfig->Get('username'),
			$this->dbConfig->Get('password'),
			$this->dbConfig->Get('database'));
			
		if (!$connection) { 
			echo 'tang-ina u...';
		}
		$connection->close();
	}
}

?>