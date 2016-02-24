<?php
class Size {
	public function __construct() {
		
	}
	
	private $width;
	private $height;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "width":
				return $this->width;
				break;
			case "height":
				return $this->height;
				break;
			default:
				die("Unable to identify Property Name.");
				return null;
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "height":
				$this->height = $value;
				return true;
				break;
			case "width":
				$this->width = $value;
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