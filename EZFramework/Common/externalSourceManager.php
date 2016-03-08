<?php

class ExternalSourceManager {
	
	protected $isMainIndex = true;
	
	public function Get($propertyName) {
		switch(strtolower(trim($propertyName))) {
			case "ismainindex":
				return $this->isMainIndex;
				break;
			default:
				die("Unable to identify Property Name.");
				return null;
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "ismainindex":
				$this->isMainIndex = $value;
				return true;
				break;
			default:
				die("Unable to identify Property Name.");
				return false;
				break;	
		}
	}
}
?>