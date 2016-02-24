<?php
class Anchor {
	public function __construct() {
		
	}
	
	private $anchorTop;
	private $anchorLeft;
	private $anchorRight;
	private $anchorBottom; 
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "anchortop":
				return $this->anchorTop;
				break;
			case "anchorleft":
				return $this->anchorLeft;
				break;
			case "anchorright":
				return $this->anchorRight;
				break;
			case "anchorbottom":
				return $this->anchorBottom;
				break;
			default:
				die("Unable to identify Property Name.");
				return null;
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "anchortop":
				$this->anchorTop = $value;
				return true;
				break;
			case "anchorleft":
				$this->anchorLeft = $value;
				return true;
				break;
			case "anchorright":
				$this->anchorRight = $value;
				return true;
				break;
			case "anchorbottom":
				$this->anchorBottom = $value;
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