<?php

require_once('/ezframework/uielements/controlBase.php');
require_once('/ezframework/uielements/panel.php');

class Tab extends ControlBase {
	public function __construct() {
		//$this->PreRender();
	}
	private $status;
	private $status_active = " tab_active";
	private $status_inactive = " tab_inactive";
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
				$this->headerPanel = $value;
				
				return true;
				break;
			case "bodypanel":
				$this->bodyPanel = $value;
				return true;
				break;
			case "status":
				$this->status = $value;
			
				if(strtolower(trim($value)) == "active")
				{
					$value = $this->status_active;
				}
				else 
				{
					$value = $this->status_inactive;
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
		echo "igit igit";
		$this->headerPanel->Set("status", $this->status);
	}
	
	public function Render() {
		
		echo "awtsssssssssssss";
	}
}

?>