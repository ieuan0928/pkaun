<?php


abstract class UIBase {
	abstract function Render();
	
	public function Get($propertyName) {
		die("Unable to allocate Property Name.");
	}
	
	public function Set($propertyName, $value) {
		return true;
	}
}

?>