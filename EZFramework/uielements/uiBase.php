<?php

require_once('/ezframework/uielements/containerControl.php');
require_once('/ezframework/common/scriptMapper.php');
require_once('/ezframework/common/externalScript.php');
require_once('/ezframework/common/inlineScript.php');

abstract class UIBase {	
	public function Render() {}
	
	private $parent;

	private $inlineScripts = Array();
	private $externalScripts = Array();
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "inlinescripts":
				return $this->inlineScripts;
				break;
			case "externalscripts":
				return $this->externalScripts;
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
		
		$this->externalScripts[$externalScript->Get("Source")] = $externalScript;
		return true;
	}
	
	public function AddExternalScripts($externalScriptCollection) {
		
		foreach ($externalScriptCollection as $externalScript) {
			$this->AddExternalScript($externalScript);
		}

		return true;
	}
	
	public function Set($propertyName, $value) {
		die("Unable to idenfity the Property.");
		return false;
	}
}

?>