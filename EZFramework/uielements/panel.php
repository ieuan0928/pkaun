<?php

require_once('/ezframework/uielements/controlBase.php');

class Panel extends ControlBase {
	
	private $childControls;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			 case "childcontrols":
			 	return $this->childcontrols;
			 	break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			default:
				return parent::Set($propertyName, $value);
				break;	
		}
	}
	
	public function AddControl() {
	}
	
	public function Render() {
		echo "<div id='$this->identifier'></div>";
	}
}

?>