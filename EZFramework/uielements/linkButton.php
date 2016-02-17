<?php

require_once("/ezframework/uielements/controlBase.php");
require_once("/ezframework/uielements/contentControl.php");
require_once("/ezframework/enum/buttonLinkTarget.php");
require_once("/ezframework/enum/scriptEmbedLocationOption.php");
require_once("/ezframework/common/externalScript.php");
require_once("/ezframework/common/inlineScript.php");
require_once("/ezframework/site.php");

class LinkButton extends ControlBase {
	public function __construct() {
		$this->content = new ContentControl();
		$this->linkTarget = ButtonLinkTarget::PageViewer;
		
		$this->clientLinkURLHelper = new ExternalScript();
		$this->clientLinkURLHelper->Set("Source", "ezframework/js/clientLinkURLHelper.js");
		$this->clientLinkURLHelper->Set("EmbedLocation", ScriptEmbedLocationOption::Head);

		Site::Instance()->Helper()->Get("ScriptManager")->AddExternalScript($this->clientLinkURLHelper);	

		$this->linkInlineScript = new InlineScript();
	}
	
	private $content;
	private $linkTarget;
	private $clientLinkURLHelper;
	private $linkInlineScript;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "content":
				return $this->content;
				break;
			case "linktarget":
				return $this->linkTarget;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "content":
				$this->content->Set("Content", $value);
				return true;
				break;
			case "linktarget":
				$this->linkTarget = $value;
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
	
	public function Render() {
		echo "<div id='igit'>"; 
		
		$this->content->Render();
		
		echo "</div>";
	}
}

?>