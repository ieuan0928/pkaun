<?php

require_once('/ezframework/uielements/containerControl.php');
require_once("/ezframework/enum/scriptEmbedLocationOption.php");
require_once("/ezframework/common/externalScript.php");
require_once("/ezframework/common/inlineScript.php");
require_once("/ezframework/enum/styleEmbedLocationOption.php");
require_once("/ezframework/common/externalStyle.php");
require_once("/ezframework/common/inlineStyle.php");
require_once("/EZFramework/site.php");

class TabContainer extends ContainerControl {
	public function __construct() {
		$this->tabHelper = new ExternalScript();
		$this->tabHelper->Set("Source", "ezframework/js/tabHelper.js");
		$this->tabHelper->Set("EmbedLocation", ScriptEmbedLocationOption::Head);
		
		Site::Instance()->Helper()->Get("ScriptManager")->AddExternalScript($this->tabHelper);

		$this->linkInlineScript = new InlineScript();
		
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$this->tabStyle = new ExternalStyle();
		$this->tabStyle->Set("source", "ezframework/css/tabBehaviorStyle.css");
		$this->tabStyle->Set("embedlocation", StyleEmbedLocationOption::Head);
		
		Site::Instance()->Helper()->Get("stylemanager")->AddExternalStyle($this->tabStyle);
	}
	
	private $tabHelper;
	private $linkInlineScript;
	private $tabStyle;
	
	public function Get($propertyName) {
		return parent::Get($propertyName);
	}
	
	public function Set($propertyName, $value) {
		return parent::Set($propertyName, $value);
	}
	
	public function Render() {
		$concat = "_tab_container";
		
		echo "<div id='$this->identifier$concat'>";
		
		parent::Render();
		
		echo "</div>";
	}
}

?>