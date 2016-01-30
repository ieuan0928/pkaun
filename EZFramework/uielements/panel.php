<?php

require_once('/ezframework/uielements/containerControl.php');

class Panel extends ContainerControl {
	
	private $classname;
	private $status;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case 'classname':
				return $this->classname;
				break;
			case 'status':
				return $this->classname;
				break;	
			default:
				return parent::Get($propertyName);
				break;	
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case 'classname':
				$this->classname = $value;
				return true;
				break;
			case 'status':
				$this->status = $value;
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;	
		}
	}
	
	public function Render() {
		echo "<div id='$this->identifier' class='$this->classname$this->status'>";
		
		parent::Render();
		
		echo "</div>";
	}
}

?>