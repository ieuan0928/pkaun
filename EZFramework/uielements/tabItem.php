<?php

require_once('/ezframework/uielements/containerControl.php');

class TabItem extends ContainerControl {
	
	private $classname;
	private $status;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case 'status':
				return $this->status;
				break;
			case 'classname':
				return $this->classname;
				break;
			default:
				return parent::Get($propertyName);
				break;	
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case 'status':
				$this->status = $value;
				return true;
				break;
			case 'classname':
				$this->classname = $value;
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;	
		}
	}
	
	public function Render() {
		echo "<div id='$this->identifier' class='$this->classname $this->status tab_item'>";
		
		parent::Render();
		
		echo "</div>";
	}
}

?>