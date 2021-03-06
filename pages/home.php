<?php

require_once('/ezframework/uielements/pageBase.php');
require_once('/ezframework/uielements/label.php');
require_once('/ezframework/uielements/pageViewer.php');
require_once('/ezframework/common/urlParameterMapper.php');

class Home extends PageBase {
	public function __construct() {
		parent::__construct();
		
		$this->InitializeElements();
	}
	
	private $contentPageViewer;
	private $labeltest;
	private $linkStores;
	private $linkError;
	private $storeURLParameter;
	private $errorURLParameter;
	
	private function InitializeElements() {
		$this->labeltest = new Label();
		$this->contentPageViewer = new PageViewer();
		$this->storeURLParameter = new URLParameterMapper();
	}
	
	public function CreateElements() {
		$this->labeltest->Set("identifier", "label_test");
		$this->labeltest->Set("Content", "label test lang!!");
		$this->labeltest->Set("Parent", $this);
		
		$this->storeURLParameter->Set("URLValue", "Stores");
		$this->storeURLParameter->Set("PageTypeName", "Stores");
		$this->storeURLParameter->Set("PagePath", "/pages/stores.php");
		
		$this->contentPageViewer->Set("Parent", $this);
		$this->contentPageViewer->Set("Identifier", "homePageViewer");
		$this->contentPageViewer->Set("PostVariable", "HomePage");
		
	}
}

?>