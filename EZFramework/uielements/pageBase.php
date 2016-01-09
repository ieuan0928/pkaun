<?php 

require_once("/ezframework/uielements/containerControl.php");

abstract class PageBase extends ContainerControl {
	private function PrepareChildren() {
		foreach (parent::$childControls as $child) {
			if (is_null($child->Get("Parent"))) $child->Set("Parent", $this);
		}
	}
	
	public function Render() {
		$this->PrepareChildren();
		
		parent::Render();
	}
}
   
?>