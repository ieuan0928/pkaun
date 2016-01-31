<?php

require_once('/ezframework/uielements/pageBase.php');
require_once('/ezframework/uielements/label.php');

class ViewError extends PageBase {
	public function __construct() {
		$this->InitializeElements();
	}
	
	private $label1;
	
	private function InitializeElements() {
		$this->label1 = new Label();
	}
	
	public function CreateElements() {
		$this->label1->Set("Parent", $this);
		$this->label1->Set("Value", "Error url parameters.");
	}
	
}

?>