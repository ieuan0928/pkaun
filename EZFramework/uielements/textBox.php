<?php

require_once('/ezframework/uielements/controlBase.php');

class TextBox extends ControlBase {	
	private $value;
	private $placeholder;
	private $ismultiline = false;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "ismultiline":
				return $this->ismultiline;
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
			case "ismultiline":
				$this->ismultiline = $value;
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
		
		switch($this->ismultiline)
		{
			case true:
				$concat = "_textArea_container";
				echo "<div class='$this->className$concat' id='$this->identifier$concat'>";
				echo "<textarea id='$this->identifier' class='$this->className' name='$this->name'>" . $this->value . "</textarea>"; 
				echo "</div>";
				return true;
				break;
			case false:
				$concat = "_textBox_container";
				echo "<div class='$this->className$concat' id='$this->identifier$concat'>";
				echo "<input type='text' id='$this->identifier' class='$this->className' placeholder='$this->placeholder' name='$this->name' value='$this->value'></input>"; 
				echo "</div>";
				return true;
				break;
			default:
				return true;
				break;
		}
	}
}

?>