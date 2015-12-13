<?php

class authenticationbase {
	
	private $username = '';
	private $password = '';
	
	function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "username":
				return $this->username;
				break;
			case "password":
				return $this->password;
				break;
		}
		return false;
	}
	
	function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "username":
				$this->username = $value;
				return true;
				break;
			case "password":
				$this->password = $value;
				return true;
				break;
		}
		
		return false;
	} 
}

?>