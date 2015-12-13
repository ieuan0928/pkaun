<?php

require_once('/common/authenticationBase.php');

class databaseConfig extends authenticationbase {
	
	private $server = '';
	private $database = '';
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "server":
				return $this->server;
				break;
			case "database":
				return $this->database;
				break;
			default:
				return parent::Get($propertyName);
				break;
				
		}
		return false;
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "server":
				$this->server = $value;
				return true;
			case "database":
				$this->database = $value;
				return true;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
		
		return false;
	}
}

?>