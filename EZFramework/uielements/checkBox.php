<?php

require_once('/ezframework/uielements/controlBase.php');
require_once('/ezframework/uielements/contentControl.php');

class CheckBox extends ControlBase {
	public function __construct() {
		$this->content = new ContentControl();
	}
	
	private $contentId = "DefaultContent";
	private $value;
	private $content;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "value":
				$this->value = $value;
				return true;
				break;
			case "content":
				$this->content->Set("content", $value);
				return true;
				break;
			case "identifier":
				$this->content->Set("identifier", $value . "_" . $this->contentId);
				return parent::Set($propertyName, $value);
				break;
			default:
				return parent::Set($propertyName, $value);
				break;	
		}
	}
	
	public function AddControl(controlBase $child) {
		array_push(	$this->childControls, $child);
	}
	
	public function Render() {
		
	//	<div >
	//<input type='checkbox' />adfasdf
	//</div>
		echo "<input type='checkbox' id='$this->identifier' class='$this->className' name='$this->name' value='$this->value'>";
		$this->content->Render(); 
		echo "</input>";
	}
}

?>