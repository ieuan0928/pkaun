<?php

require_once('/ezframework/uielements/controlBase.php');
//require_once('/ezframework/uielements/panel.php');

class Tab extends ControlBase {
	public function __construct() {
		
	}
	
	private $status;
	private $status_class_header = "tab_header_inactive header_tab_click";
	private $status_class_body = "tab_content_inactive body_tab_content";
	private $headerPanel;
	private $bodyPanel;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "headerpanel":
				return $this->headerPanel;
				break;
			case "bodypanel":
				return $this->bodyPanel;
				break;
			case "status":
				return $this->status;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "headerpanel":
				if($value instanceof TabItem)
				{
					$this->headerPanel = $value;
					return true;
				}
				else 
				{
					die("It must be an object of TabItem.");
					return false;
				}
				break;
			case "bodypanel":
				if($value instanceof TabItem)
				{
					$this->bodyPanel = $value;
					return true;
				}
				else 
				{
					die("It must be an object of TabItem.");
					return false;
				}
				break;
			case "status":
				$this->status = $value;
				if(strtolower(trim($value)) == "active")
				{
					$this->status_class_header = "tab_header_active header_tab_click";
					$this->status_class_body = "tab_content_active body_tab_content";
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
	
	public function PreRender()  {
		$append_class_body = "";
		$append_class_body = $this->headerPanel->Get("identifier") . " " . $this->status_class_body;
		
		$this->headerPanel->Set("status", $this->status_class_header);
		$this->bodyPanel->Set("status", $append_class_body);
	}
}

?>