<?php

require_once("/ezframework/uielements/controlBase.php");
require_once("/ezframework/uielements/contentControl.php");

class LinkButton extends ControlBase {
	public function __construct() {
		$this->content = new ContentControl();
	}
	
	private $content;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "content":
				return $this->content;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
		}
	}
	
}

?>