<?php 

require_once("/ezframework/uielements/containerControl.php");

abstract class PageBase extends ContainerControl {
	public abstract function CreateElements(); 
	
	protected $title = null;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "title":
				return $this->title; 
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "title":
				$this->title = value;
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
	
	public function Render() {
		parent::Render();
	}
}
   
?>