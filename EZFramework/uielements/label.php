<?php
require_once('/ezframework/uielements/contentControl.php');
require_once('/ezframework/uielements/controlBase.php');

class Label extends ControlBase {
	public function __construct() {
		$this->content = new ContentControl();
	}
		
	private $value;
	private $header = "h1";
	private $content;
	
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
			case "header":
				$this->header = $value;
				return true;
				break;
			case "content":
				$this->content->Set("content", $value);
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;	
		}
	}
	
	public function Render() {
		$concat = "_label_container";
		
		echo "<div class='$this->className$concat' id='$this->identifier$concat'>";
		echo "<$this->header id='$this->identifier' class='$this->className'>$this->value</$this->header>"; 
		$this->content->Render(); 
		echo "</div>";
	}
}

?>