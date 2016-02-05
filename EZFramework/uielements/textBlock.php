<?php

require_once('/ezframework/uielements/controlBase.php');
require_once('/ezframework/enum/tagType.php');

class TextBlock extends ControlBase {
	
	public function __construct() {
		$this->tagType = Tagtype::h1;
	}
	
	private $value;
	private $tagType;
		
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "tagtype":
			    return $this->tagType;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "tagtype":
				$this->tagType = $value;
				return true;
				break;
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
		$concat = "_textBlock_container";
		
		switch($this->tagType)
		{
			case TagType::h1:
				echo "<h1 class='$this->className$concat' id='$this->identifier$concat'>" . $this->value . "</h1>";
				return true;
				break;
			case TagType::h2:
				echo "<h2 class='$this->className$concat' id='$this->identifier$concat'>" . $this->value . "</h2>";
				return true;
				break;
			case TagType::h3:
				echo "<h3 class='$this->className$concat' id='$this->identifier$concat'>" . $this->value . "</h3>";
				return true;
				break;
			case TagType::h4:
				echo "<h4 class='$this->className$concat' id='$this->identifier$concat'>" . $this->value . "</h4>";
				return true;
				break;
			case TagType::h5:
				echo "<h5 class='$this->className$concat' id='$this->identifier$concat'>" . $this->value . "</h5>";
				return true;
				break;
			case TagType::h6:
				echo "<h6 class='$this->className$concat' id='$this->identifier$concat'>" . $this->value . "</h6>";
				return true;
				break;
			case TagType::p:
				echo "<p class='$this->className$concat' id='$this->identifier$concat'>" . $this->value . "</p>";
				return true;
				break;
		}
	}
}

?>