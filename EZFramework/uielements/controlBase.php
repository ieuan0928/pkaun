<?php 

require_once("/ezframework/uielements/uiBase.php");
require_once("/ezframework/uielements/containerControl.php");

abstract class ControlBase extends UIBase {

	protected $className;
	protected $identifier;
	protected $width;
	protected $height;
	protected $name;
	
	protected $parentControl;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "classname":
				return $this->className;
				break;
			case "identifier":
				return $this->identifier;
				break;
			case "name":
				return $this->name;
				break;
			case "parent":
				return $this->parentControl;
				break;
			default:
				return parent::Get($popertyName);
				break;
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
			case "name":
				$this->name = $value;
				return true;
				break;
			case "parent":
				if ($value instanceof ContainerControl) {
					$this->parentControl  = &$value;
					$value->AddControl($this);
					return true;
				}
				else {
					die("Parent must be of type ContainerControl.");
					return false;
				}
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
}

?>