<?php

require_once("/ezframework/uielements/contentControl.php");
require_once("/ezframework/enum/buttonLinkTarget.php");
require_once("/ezframework/enum/scriptEmbedLocationOption.php");
require_once("/ezframework/common/externalScript.php");
require_once("/ezframework/common/inlineScript.php");
require_once("/ezframework/uielements/pageViewer.php");
require_once("/ezframework/uielements/postVariable.php");
require_once("/ezframework/site.php");


class LinkButton extends PostVariable {
	public function __construct() {
		$this->content = new ContentControl();
		$this->linkTarget = ButtonLinkTarget::PageViewer;
		
		$this->clientLinkURLHelper = new ExternalScript();
		$this->clientLinkURLHelper->Set("Source", "ezframework/js/clientLinkURLHelper.js");
		$this->clientLinkURLHelper->Set("EmbedLocation", ScriptEmbedLocationOption::Head);

		Site::Instance()->Helper()->Get("ScriptManager")->AddExternalScript($this->clientLinkURLHelper);	
	}
	
	private $content;
	private $linkTarget;
	private $clientLinkURLHelper;
	private $linkInlineScript;
	private $uniqueId;
	private $targetViewer;
	private $urlValue;

	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "content":
				return $this->content;
				break;
			case "linktarget":
				return $this->linkTarget;
				break;
			case "targetviewer":
				return $this->targetViewer;
				break;
			case "urlvalue":
				return $this->urlValue;
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
			case "targetviewer":
				if (!$value instanceof PageViewer) {
					die("Value must be of type PageViewer.");
					return false;
				}
				$this->targetViewer = &$value;
				return true;
				break;
			case "urlvalue":
				$this->urlValue = $value;
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
	
	private function createHyperLink($postVariable, $urlValue) {
		
		$result = '';
		
		$parameters = $_GET;
		
		$parameters[$postVariable] = $urlValue;
		
		return "?" . http_build_query($parameters);
	}
	
	public function PreRender() {
		$this->linkInlineScript = new InlineScript();
		$this->uniqueId = "linkButton_" . $this->identifier;
		$this->linkInlineScript->Set("UniqueID", $this->uniqueId);
		$script = "$('#" . $this->uniqueId . "').EZAsyncLink();";
		$this->linkInlineScript->Set("script", $script);
		parent::AddInlineReadyScript($this->linkInlineScript);
	}
	
	public function Render() {
		$hyperLink = $this->createHyperLink($this->postVariable, $this->urlValue);
		echo "<a href='$hyperLink' id='$this->uniqueId'>"; 
	
		$this->content->Render();
		
		echo "</a>";
	}
	
	public function PostRender() {
		echo "<script>";
		echo "$('#" . $this->uniqueId . "').ready(function() {";
		echo "$('#" . $this->uniqueId . "').EZAsyncLink({";
		echo '"PageViewerId":"' . $this->targetViewer->Get('identifier') . '"';
		echo ', "Parameter": "' . $this->postVariable . '"';
		echo ', "ParamValue": "' . $this->urlValue . '"';
		echo "});";
		echo "});";
		echo "</script>";
	}
}

?>