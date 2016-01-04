<?php 

require_once("/ezframework/uielements/uiBase.php");

abstract class ControlBase extends UIBase {

	protected $className;
	protected $identifier;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "classname":
				return $this->className;
				break;
			case "identifider":
				return $this->identifier;
				break;
			default:
				return parent::Get($popertyName);
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "classname":
				return true;
				break;
			case "identifier":
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
}

?>