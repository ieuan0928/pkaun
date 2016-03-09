<?php

require_once('/ezframework/uielements/containerControl.php');
require_once("/ezframework/enum/scriptEmbedLocationOption.php");
require_once("/ezframework/common/externalScript.php");
require_once("/ezframework/common/inlineScript.php");
require_once("/ezframework/enum/styleEmbedLocationOption.php");
require_once("/ezframework/common/externalStyle.php");
require_once("/ezframework/common/inlineStyle.php");
require_once("/EZFramework/site.php");

class SliderContainer extends containerControl {

	public function __construct() {
		
	}
	
	private $sliderHelper;
	private $sliderStyle;
	private $slides = array();
	
	public function Get($propertyName) {
		return parent::Get($propertyName);
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "add_slide":
				$this->addSlide($value);
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
		}
	}
	
	public function addSlide($slide)
	{
		array_push($this->slides, $slide);
	}
	
	public function Render() {
		$concat = "_slider_container";
		
		echo "<div id='$this->identifier$concat'>";
		
		echo "<ul>";
		foreach($this->slides as $slide)
		{
			echo "<li>";
			echo $slide->Render();
			echo "</li>";
		}
		echo "</ul>";
		echo "</div>";
	}
}

?>