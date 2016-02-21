<?php

require_once('/ezframework/uielements/pageBase.php');
require_once('/ezframework/uielements/pageViewer.php');
require_once('/ezframework/uielements/linkButton.php');
require_once('/ezframework/common/urlParameterMapper.php');

class Main extends PageBase {
	public function __construct() {
		parent::__construct();
		$this->InitializeElements();
	}
	
	private function InitializeElements() {
		$this->contentPageViewer = new PageViewer();
		$this->homeUrlParameter = new URLParameterMapper();
		$this->storeUrlParameter = new URLParameterMapper();
		$this->dieUrlParameter = new URLParameterMapper();
		$this->linkHome = new LinkButton();
		$this->linkStores = new LinkButton();
	}
	
	private $contentPageViewer;
	private $homeUrlParameter;
	private $storeUrlParameter;
	private $dieUrlParameter;
	private $linkHome;
	private $linkStores;
	
	public function CreateElements() {
		$this->homeUrlParameter->Set("URLValue", "Home");
		$this->homeUrlParameter->Set("PageTypeName", "Home");
		$this->homeUrlParameter->Set("PagePath", "/pages/home.php");
		
		$this->storeUrlParameter->Set("URLValue", "Stores");
		$this->storeUrlParameter->Set("PageTypeName", "Stores");
		$this->storeUrlParameter->Set("PagePath", "/pages/stores.php");
		
		$this->dieUrlParameter->Set("PageTypeName", "ViewError");
		$this->dieUrlParameter->Set("PagePath", "/pages/viewError.php");
		
		$this->linkHome->Set("Content", "Home");
		$this->linkHome->Set("Parent", $this);
		$this->linkHome->Set("HyperLink", "?view=home");
		
		$this->linkStores->Set("Content", "Stores");
		$this->linkStores->Set("Parent", $this);
		$this->linkStores->Set("HyperLink", "?view=stores");

		$this->contentPageViewer->Set("Parent", $this);
		$this->contentPageViewer->Set("Identifier", "mainContentViewer");
		$this->contentPageViewer->Set("PostVariable", "view");
		$this->contentPageViewer->Set("DefaultUrlParameter", $this->homeUrlParameter);
		$this->contentPageViewer->Set("DieUrlParameter", $this->dieUrlParameter);
		$this->contentPageViewer->AddURLParameter($this->homeUrlParameter);
		$this->contentPageViewer->AddURLParameter($this->storeUrlParameter);
	}	
}

?>