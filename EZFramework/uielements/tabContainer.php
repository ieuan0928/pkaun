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
		switch (strtolower(trim($propertyName))) {
			case "tabs":
				return $this->tabs;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "tabs":
				$this->AddTabs($value);
				break;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
	
	public function AddTabs(Tab $tab)  {
		array_push($this->childControls, $tab);
	}
	
	
	public function Render() {
		$concat = "_tab_container";
		$concatH = "_tab_container_header";
		$concatB = "_tab_container_body";
		
		echo "<div id='$this->identifier$concat'>";
		
		echo "<div id='$this->identifier$concatH' class='tab_container_header_outer'>";
		
		echo "<div class='tab_container_header_inner'>";
		
		foreach($this->childControls as $tab)
		{
			$tab->Get("headerpanel")->Render();
		}
		
		echo "</div>";
		
		echo "</div>";
			
		echo "<div id='$this->identifier$concatB' class='tab_container_body_outer'>";
		
		echo "<div class='tab_container_body_inner'>";
		
		foreach($this->childControls as $tab)
		{
			$tab->Get("bodypanel")->Render();
		}
			
		echo "</div>";
			
		echo "</div>";
		
		echo "</div>";
	}
}

?>