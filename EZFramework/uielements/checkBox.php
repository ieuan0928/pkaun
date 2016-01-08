<?php

require_once('/ezframework/uielements/controlBase.php');

class CheckBox extends ControlBase {
	public function __construct() {
		
	}
	
	private $value;
	private $text = "checkbox";
	
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
			case "text":
				$this->text = $value;
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;	
		}
	}
	
	public function AddControl(controlBase $child) {
		array_push(	$this->childControls, $child);
	}
	
	public function Render() {
		echo "<input type='checkbox' id='$this->identifier' class='$this->className' name='$this->name' value='$this->value'>" . $this->text ."</input>";
	}
}

?>