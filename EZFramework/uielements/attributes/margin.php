<?php
class Margin {
	public function __construct() {
		
	}
	
	private $marginTop;
	private $marginLeft;
	private $marginRight;
	private $marginBottom;
	
	private $top;
	private $left;
	private $bottom;
	private $right; 
	
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
			case "margintop":
				return $this->marginTop;
				break;
			case "marginleft":
				return $this->marginLeft;
				break;
			case "marginright":
				return $this->marginRight;
				break;
			case "marginbottom":
				return $this->marginBottom;
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
			case "margintop":
				$this->marginTop = $value;
				return true;
				break;
			case "marginleft":
				$this->marginLeft = $value;
				return true;
				break;
			case "marginright":
				$this->marginRight = $value;
				return true;
				break;
			case "marginbottom":
				$this->marginBottom = $value;
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