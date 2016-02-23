<?php

require_once('/ezframework/uielements/containerControl.php');
require_once('/ezframework/common/scriptMapper.php');
require_once('/ezframework/common/externalScript.php');
require_once('/ezframework/common/inlineScript.php');

abstract class UIBase {	
	public function Render() {}
	public function PreRender() {}
	public function PostRender() {}
	
	private $parentControl;
	protected $inlineReadyScripts = Array();
	
	public function AddInlineReadyScript(InlineScript $inlineScript) {
		$this->inlineReadyScripts[$inlineScript->Get("UniqueId")] = $inlineScript;
		
		return true;
	}
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "parent":
				return $this->parentControl;
				break;
			case "inlinereadyscripts":
				return $this->inlineReadyScripts;
				break;
			default:
				die("Unable to idenfity the Property.");
				return null;
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "inlinereadyscripts":
				$this->inlineReadyScripts = $value;
				return true;
				break;
			default:
				die("Unable to idenfity the Property.");
				break;
		}
		
		return false;
	}
}

?>