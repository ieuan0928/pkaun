<?php

require_once("/ezframework/uielements/controlBase.php");
require_once("/ezframework/uielements/contentControl.php");
require_once("/ezframework/enum/buttonLinkTarget.php");
require_once("/ezframework/enum/scriptEmbedLocationOption.php");
require_once("/ezframework/common/externalScript.php");
require_once("/ezframework/common/inlineScript.php");

class LinkButton extends ControlBase {
	public function __construct() {
		$this->content = new ContentControl();
		$this->linkTarget = ButtonLinkTarget::PageViewer;
		
		parent::__construct();
	}
	
	private $content;
	private $linkTarget;
	private $clientLinkURLHelper;
	
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
				$this->content = $value;
				return true;
				break;
			case "linktarget":
				$this->linkTarget = $value;
				return true;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function OnPrepareRender() {
		$this->clientLinkURLHelper = new ExternalScript();
		$this->clientLinkURLHelper->Set("Source", "ezframework/js/clientLinkURLHelper.js");
		$this->clientLinkURLHelper->Set("EmbedLocation", ScriptEmbedLocationOption::Head);
		
		$this->AddExternalScript($this->clientLinkURLHelper);
		return true;
	}
	
	public function Render() {
		$this->OnPrepareRender();
	}
}

?>