<?php

require_once('/ezframework/uielements/pageBase.php');
require_once('/ezframework/uielements/label.php');

class Home extends PageBase {
	public function __construct() {
		parent::__construct();
		
		$this->InitializeElements();
	}
	
	private $contentPageViewer;
	private $labeltest;
	
	private function InitializeElements() {
		$this->labeltest = new Label();
	}
	
	public function CreateElements() {
		$this->labeltest->Set("identifier", "label_test");
		$this->labeltest->Set("Content", "label test lang!!");
		$this->labeltest->Set("Parent", $this);
		
	}
}

?>