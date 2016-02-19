<?php
class Anchor {
	public function __construct() {
		/*$this->top = true;
		$this->left = true;
		$this->right = false;
		$this->bottom = false;*/
	}
	
	private $top;
	private $left;
	private $right;
	private $bottom; 
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "top":
				return $this->top;
				break;
			case "left":
				return $this->left;
				break;
			case "right":
				return $this->right;
				break;
			case "bottom":
				return $this->bottom;
				break;
			default:
				die("Unable to identify Property Name.");
				return null;
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "top":
				$this->top = $value;
				return true;
				break;
			case "left":
				$this->left = $value;
				return true;
				break;
			case "right":
				$this->right = $value;
				return true;
				break;
			case "bottom":
				$this->bottom = $value;
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