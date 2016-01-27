<?php

require_once('/ezframework/uielements/controlBase.php');

class TextArea extends ControlBase {	
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
			default:
				return parent::Set($propertyName, $value);
				break;	
		}
	}
	
	public function Render() {
		$concat = "_textArea_container";
		
		echo "<div class='$this->className$concat' id='$this->identifier$concat'>";
		echo "<textarea id='$this->identifier' class='$this->className' name='$this->name'></textarea>"; 
		echo "</div>";
	}
}

?>