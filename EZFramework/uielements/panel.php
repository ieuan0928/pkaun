<?php

require_once('/ezframework/uielements/controlBase.php');

class Panel extends ControlBase {
	public function __construct() {
		$this->childControls = Array();
	}
	private $childControls;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			 case "childcontrols":
			 	return $this->childcontrols;
			 	break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			default:
				return parent::Set($propertyName, $value);
				break;	
		}
	}
	
	public function AddControl(controlBase $child) {
		array_push(	$this->childControls, $child);
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
	
	public function Render() {
		echo "<div id='$this->identifier'>";
		
		foreach ($this->childControls as $child) {
			$child->Render();
		}
		
		echo "</div>";
	}
}

?>