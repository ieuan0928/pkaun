<?php

require_once('/ezframework/uielements/containerControl.php');
require_once('/ezframework/Common/scriptMapper.php');

abstract class UIBase {	
	abstract function Render();
	
	private $parent;
	private $scriptCollection = Array();
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "scriptcollection":
				return $this->scriptCollection;
				break;
			default:
				die("Unable to idenfity the Property.");
				return null;
				break;
		}
	}
	
	public function AddScript($script) {
	}
	
	public function Set($propertyName, $value) {
		die("Unable to idenfity the Property.");
		return false;
	}
}

?>