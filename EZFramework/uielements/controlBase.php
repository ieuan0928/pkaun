<?php 

require_once("/ezframework/uielements/uiBase.php");
require_once("/ezframework/uielements/containerControl.php");
require_once('/ezframework/uielements/common/anchor.php');
require_once("/ezframework/uielements/attributes/margin.php");
require_once("/ezframework/uielements/attributes/size.php");

abstract class ControlBase extends UIBase {
	public function __construct() {
		$this->anchor = new Anchor();
		$this->margin = new Margin();
		$this->size = new Size();
	}

	protected $className;
	protected $identifier;
	protected $name;
	protected $anchor = null;
	protected $margin = null;
	protected $size = null;
	
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
			case "anchor":
				//if (is_null($this->anchor)) {
					//$this->anchor = new Anchor();
				//}
				return $this->anchor;
				break;
			case "margin":
				return $this->margin;
				break;
			case "size":
				return $this->size;
				break;
			default:
				return parent::Get($propertyName);
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
				
				break;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
	
	public function PostRender() {
	}
}

?>