<?php 

require_once("/ezframework/uielements/uiBase.php");

abstract class ControlBase extends UIBase {

	protected $className;
	protected $identifier;
	protected $width;
	protected $height;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "classname":
				return $this->className;
				break;
			case "identifider":
				return $this->identifier;
				break;
			case "width":
				return $this->width;
				break;
			case "height":
				return $this->height;
				break;
			default:
				return parent::Get($popertyName);
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "classname":
				$this->className = $value;
				return true;
				break;
			case "identifier":
				$this->identifier = $value;
				return true;
				break;
			case "width":
				$this->width = $value;
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
}

?>