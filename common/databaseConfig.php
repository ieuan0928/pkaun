<?php

require_once('/common/authenticationBase.php');

class databaseConfig extends authenticationbase {
	
	private $server = '';
	
	function Get ($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "server":
				return $this->server;
				break;
			default:
				return parent::Get($propertyName);
				break;
				
		}
		return false;
	}
	
	function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "server":
				$this->server = $value;
				return true;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
		
		return false;
	}
}

?>