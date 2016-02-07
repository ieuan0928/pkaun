<?php

class ScriptMapper {
	
	private $source;
	private $embedLocation;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "source":
				return $this->source;
				break;
			case "embedlocation":
				return $this->embedLocation;
				break;
			default:
				die('Unable to identify Property Name');
				return null;
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "source":
				$this->source = $value;
				return true;
				break;
			case "embedlocation":
				$this->embedLocation = $value;
				return true;
				break;
			default:
				die('Unable to identify Property Name.');
				return false;
				break;
		}
	}
}

?>