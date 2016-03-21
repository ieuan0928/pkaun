<?php
require_once('/ezframework/uielements/contentControl.php');
require_once('/ezframework/uielements/panel.php');

require_once("/ezframework/enum/scriptEmbedLocationOption.php");
require_once("/ezframework/common/externalScript.php");
require_once("/ezframework/common/inlineScript.php");
require_once("/ezframework/enum/styleEmbedLocationOption.php");
require_once("/ezframework/common/externalStyle.php");
require_once("/ezframework/common/inlineStyle.php");
require_once("/EZFramework/site.php");

class SliderControl extends controlBase {

	public function __construct() {
		$this->content = new ContentControl();
	}
	
	private $slideHelper;
	private $slideStyle;
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
		$concat = "_slide_container";
		
		echo "<div id='$this->identifier$concat' class='slide_base_class $this->className'>";
		
		$this->content->Render(); 
		
		echo "</div>";
	}
}

?>
