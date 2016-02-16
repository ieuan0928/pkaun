<?php

require_once('/ezframework/uielements/containerControl.php');
require_once('/ezframework/common/scriptMapper.php');
require_once('/ezframework/common/externalScript.php');
require_once('/ezframework/common/inlineScript.php');

abstract class UIBase {	
	public function Render() {}
	public function PreRender() {}
	
	private $parentControl;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "parent":
				return $this->parentControl;
				break;
			default:
				die("Unable to idenfity the Property.");
				return null;
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		die("Unable to idenfity the Property.");
		return false;
	}
}

?>