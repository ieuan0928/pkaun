<?php

require_once('/ezframework/uielements/controlBase.php');
require_once('/ezframework/uielements/panel.php');

class GroupBox extends ControlBase {
	public function __construct() {
		$this->headerPanel = new Panel();
		$this->headerPanel->Set("identifier", "default_header");
		$this->bodyPanel = new Panel();
		$this->bodyPanel->Set("identifier", "default_body");
	}
	
	
	private $headerId = "DefaultHeader";
	private $bodyId = "DefaultBody";
	private $headerPanel;
	private $bodyPanel;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
        	 case "header":
				 return $this->headerPanel;
				 break;
			 case "content":
				 return $this->bodyPanel;
				 break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "identifier":
				$this->headerPanel->Set("identifier", $value . "_" . $this->headerId);
				$this->bodyPanel->Set("identifier", $value . "_" . $this->bodyId);
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
		echo "<div id='$this->identifier' class='$this->className'>";
		
		$this->headerPanel->Render();
		$this->bodyPanel->Render();
		
		echo "</div>";
	}
}

?>