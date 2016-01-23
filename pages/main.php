<?php

require_once('/ezframework/uielements/pageBase.php');
require_once('/ezframework/uielements/pageViewer.php');
require_once('/ezframework/common/urlParameterMapper.php');

class Main extends PageBase {
	public function __construct() {
		$this->InitializeElements();
	}
	
	private function InitializeElements() {
		$this->contentPageViewer = new PageViewer();
		$this->homeUrlParameter = new URLParameterMapper();
		$this->storeUrlParameter = new URLParameterMapper();
	}
	
	private $contentPageViewer;
	private $homeUrlParameter;
	private $storeUrlParameter;
	
		
	public function CreateElements() {
		$this->homeUrlParameter->Set("URLValue", "Home");
		$this->homeUrlParameter->Set("PageTypeName", "Home");
		$this->homeUrlParameter->Set("PagePath", "/pages/home.php");
		
		$this->storeUrlParameter->Set("URLValue", "Stores");
		$this->storeUrlParameter->Set("pagetypename", "Stores");
		$this->storeUrlParameter->Set("PagePath", "/pages/stores.php");
		
		$this->contentPageViewer->Set("Parent", $this);
		$this->contentPageViewer->Set("Identifier", "mainContentViewer");
		$this->contentPageViewer->Set("PostVariable", "view");
		$this->contentPageViewer->Set("DefaultUrlParameter", $this->homeUrlParameter);
		$this->contentPageViewer->AddURLParameter($this->homeUrlParameter);
		$this->contentPageViewer->AddURLParameter($this->storeUrlParameter);
		
	}
	
	
}

?>