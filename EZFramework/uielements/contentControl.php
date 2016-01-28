<?php

require_once('/ezframework/uielements/controlBase.php');
require_once('/ezframework/uielements/panel.php');

abstract class ContentControl extends ControlBase {
	private $panelId = 'DefaultContent';
	private $content = null;
	private $panel = null;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "content":
				if (is_null($this->panel)) return $this->content; 
				else return $this->panel;
				break;
			default: 
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "content":
				if (gettype($value) == "object") {
					
					$this->content = null;
					$this->panel = new Panel();
					$this->panel->Set("identifier", $this->identifier . "_" . $this->panelId);
					$this->panel->AddControl($value);
				}
				else {
					$this->panel = null;
					$this->content = $value;
				}
				
				return true;
				
				break;
			case "identifier":
				if (!is_null($this->panel)) $this->panel->Set("identifier", $value . "_" . $this->panelId);
				return parent::Set($propertyName, $value);
				break;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
	
	public function Render() {
		if (is_null($this->panel)) echo $this->content;
		else $this->panel->Render();
	}
}

?>