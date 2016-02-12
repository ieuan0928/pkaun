<?php

require_once('/ezframework/uielements/containerControl.php');

class TabContainer extends ContainerControl {
	
	public function Get($propertyName) {
		return parent::Get($propertyName);
	}
	
	public function Set($propertyName, $value) {
		return parent::Set($propertyName, $value);
	}
	
	public function Render() {
		$concat = "_tab_container";
		
		echo "<div id='$this->identifier$concat'>";
		
		parent::Render();
		
		echo "</div>";
	}
}

?>