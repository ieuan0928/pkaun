<?php

require_once('/ezframework/uielements/controlBase.php');

class Image extends ControlBase {	
	private $value;
	private $img_src;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "image_path":
				return $this->img_src;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "value":
				$this->value = $value;
				return true;
				break;
			case "image_path":	
				$this->img_src = $value;
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;	
		}
	}
	
	public function Render() {
		$concat = "_img_container";
		
		echo "<div class='$this->className$concat' id='$this->identifier$concat'>";
		echo "<img id='$this->identifier' class='$this->className' src='$this->img_src'></img>"; 
		echo "</div>";
	}
}

?>