<?php

require_once('/ezframework/uielements/containerControl.php');
require_once("/ezframework/enum/scriptEmbedLocationOption.php");
require_once("/ezframework/common/externalScript.php");
require_once("/ezframework/common/inlineScript.php");
require_once("/EZFramework/site.php");

class TabContainer extends ContainerControl {
	public function __construct() {
		$this->tabHelper = new ExternalScript();
		$this->tabHelper->Set("Source", "ezframework/js/tabHelper.js");
		$this->tabHelper->Set("EmbedLocation", ScriptEmbedLocationOption::Head);
		
		Site::Instance()->Helper()->Get("ScriptManager")->AddExternalScript($this->tabHelper);

		$this->linkInlineScript = new InlineScript();
	}
	
	private $tabHelper;
	private $linkInlineScript;
	
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