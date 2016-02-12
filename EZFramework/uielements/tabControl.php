<?php

require_once('/ezframework/uielements/controlBase.php');
require_once('/ezframework/uielements/panel.php');

class Tab extends ControlBase {
	public function __construct() {
		$this->headerPanel = new Panel();
		$this->headerPanel->Set("identifier", "default_header");
		$this->bodyPanel = new Panel();
		$this->bodyPanel->Set("identifier", "default_body");
	}
	
	private $headerId = "DefaultHeader";
	private $bodyId = "DefaultBody";
	private $headerClass = "header_tab_click";
	private $bodyClass = "body_tab_content";
	private $headerPanel;
	private $bodyPanel;
	private $status_active = " tab_active";
	private $status_inactive = " tab_inactive";
	
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
			case "classname":
				$this->headerPanel->Set("classname",  $this->headerClass);
				$this->bodyPanel->Set("classname",  $this->bodyClass);
				return parent::Set($propertyName, $value);
				break;
			case "status":
				if(strtolower(trim($value)) == "active")
				{
					$value = $this->status_active;
					$this->bodyPanel->Set("status",  $value);
				}
				else 
				{
					$value = $this->status_inactive;
					$this->bodyPanel->Set("status",  $value);
				}
				return true;
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
		
		//echo "<a href='https://www.google.com' class='tempa'>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</a>";
		echo "<div id='$this->identifier' class='$this->className'>";
		
		$this->headerPanel->Render();
		$this->bodyPanel->Render();
		
		echo "</div>";
	}
}

?>