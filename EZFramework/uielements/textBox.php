<?php

require_once('/ezframework/uielements/controlBase.php');

class TextBox extends ControlBase {	
	private $value;
	private $placeholder;
	
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
			case "placeholder":
				$this->placeholder = $value;
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;	
		}
	}
	
	public function Render() {
		$concat = "_textBox_container";
		
		echo "<div class='$this->className$concat' id='$this->identifier$concat'>";
		echo "<input type='text' id='$this->identifier' class='$this->className' placeholder='$this->placeholder' name='$this->name' value='$this->value'></input>"; 
		echo "</div>";
	}
}

?>