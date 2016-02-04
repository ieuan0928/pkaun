<?php

require_once("/ezframework/uielements/controlBase.php");
require_once("/ezframework/uielements/contentControl.php");
require_once("/ezframework/enum/buttonLinkTarget.php");

class LinkButton extends ControlBase {
	public function __construct() {
		$this->content = new ContentControl();
		$this->linkTarget = ButtonLinkTarget::PageViewer;
		
		parent::__construct();
	}
	
	private $content;
	private $linkTarget;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "content":
				return $this->content;
				break;
			case "linktarget":
				return $this->linkTarget;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "content":
				$this->content = $value;
				return true;
				break;
			case "linktarget":
				$this->linkTarget = $value;
				return true;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Render() {
	}
}

?>