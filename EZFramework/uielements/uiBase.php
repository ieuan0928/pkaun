<?php

require_once('/ezframework/uielements/containerControl.php');
require_once('/ezframework/common/scriptMapper.php');
require_once('/ezframework/common/externalScript.php');
require_once('/ezframework/common/inlineScript.php');

abstract class UIBase {	
	public function Render() {}
	public function OnPreparingRender() {}
	
	private $parent;

	private $inlineScripts = Array();
	private $externalScripts = Array();
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "inlinescripts":
				return $this->inlineScripts;
				break;
			case "externalscripts":
				return $this->externalscripts;
				break;
			default:
				die("Unable to idenfity the Property.");
				return null;
				break;
		}
	}
	
	public function AddInlineScript($inlineScript) {
		if (!($inlineScript instanceof InlineScript)) return false;
		
		array_push($this->inlineScripts, $inlineScript);
		return true;
	}
	
	public function AddExternalScript($externalScript) {
		if (!($externalScript instanceof ExternalScript)) return false;
		
		array_push($this->externalScripts, $externalScript);
		return true;
	}
	
	public function Set($propertyName, $value) {
		die("Unable to idenfity the Property.");
		return false;
	}
}

?>