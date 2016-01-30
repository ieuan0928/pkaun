<?php

require_once('/ezframework/uielements/controlBase.php');

class File extends ControlBase {	
	private $value;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
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
			default:
				return parent::Set($propertyName, $value);
				break;	
		}
	}
	
	public function Render() {
		$concat = "_fileInput_container";
		
		echo "<div class='$this->className$concat' id='$this->identifier$concat'>";
		echo "<input type='file' id='$this->identifier' class='$this->className' name='$this->name'></input>"; 
		echo "</div>";
	}
}

?>