<?php

require_once('/ezframework/uielements/containerControl.php');

abstract class UIBase {	
	abstract function Render();
	
	private $parent;
	
	public function Get($propertyName) {
		die("Unable to allocate Property Name.");
		return null;
	}
	
	public function Set($propertyName, $value) {
		die("Unable to allocated Property Name.");
		return false;
	}
}

?>