<?php

require_once('/ezframework/uielements/controlBase.php');

class ContainerControl extends ControlBase {
	
	protected $childControls = Array();
	
	public function Get($propertyName) {
		return parent::Get($propertyName);
	}
	
	public function Set($propertyName, $value) {
		return parent::Set($propertyName, $value);
	}
	
	public function AddControl(controlBase &$child) {
		array_push($this->childControls, $child);
	}
	
	public function GetChildren($child) {
		$idChildren = Array();
		
		array_push($idChildren, $child->Get("identifier"));
		foreach ($this->childControls as $child) {
			array_push($idChildren, $this->GetChildren($child));
		}		
		
		var_dump($idChildren);
		return $idChildren;
	}
	
	public function GetChildrenRecursive() {
		$idChildren = Array();
		
		foreach ($this->childControls as $child) {
			array_push($idChildren, $this->GetChildren($child));
		}
		return $idChildren;
	}
	
	public function PreRender() {
		foreach ($this->childControls as $child) {
			$child->PreRender();
		}
	}
	
	public function Render() {
		foreach ($this->childControls as $child) {			 
			$child->Render();
		}
	}
	
}

?>