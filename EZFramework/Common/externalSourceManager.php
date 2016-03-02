<?php

class ExternalSourceManager {
	
	protected $isSubPage = false;
	
	public function Get($propertyName) {
		switch(strtolower(trim($propertyName))) {
			case "issubpage":
				return $this->isSubPage;
				break;
			default:
				die("Unable to identify Property Name.");
				return null;
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "issubpage":
				$this->isSubPage = $value;
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