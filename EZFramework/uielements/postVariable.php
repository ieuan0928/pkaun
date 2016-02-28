<?php

require_once('/ezframework/uielements/controlBase.php');

class PostVariable extends ControlBase {
	
	protected $postVariable;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "postvariable":
				return $this->postVariable;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "postvariable":
				$this->postVariable = $value;
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
}

?>