<?php

require_once('/ezframework/uielements/containerControl.php');

class Panel extends ContainerControl {
	
	public function Get($propertyName) {
		return parent::Get($propertyName);
	}
	
	public function Set($propertyName, $value) {
		return parent::Set($propertyName, $value);
	}
	
	public function Render() {
		echo "<div id='$this->identifier'>";
		
		parent::Render();
		
		echo "</div>";
	}
}

?>