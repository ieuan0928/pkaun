<?php

require_once('/ezframework/uielements/pageBase.php');
require_once('/ezframework/uielements/pageViewer.php');
require_once('/ezframework/uielements/linkButton.php');
require_once('/ezframework/common/urlParameterMapper.php');
require_once('/ezframework/common/externalStyle.php');
require_once('/ezframework/enum/styleEmbedLocationOption.php');

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
		
		$this->mainStyle = new ExternalStyle();
		$this->mainStyle->Set("Source", "css/style.css");
		$this->mainStyle->Set("EmbedLocation", StyleEmbedLocationOption::Head);
		
		Site::Instance()->Helper()->Get("StyleManager")->AddExternalStyle($this->mainStyle);
	}
	
	private $contentPageViewer;
	private $homeUrlParameter;
	private $storeUrlParameter;
	private $dieUrlParameter;
	private $linkHome;
	private $linkStores;
	
	private $mainStyle;
	
	public function CreateElements() {
		$this->homeUrlParameter->Set("URLValue", "Home");
		$this->homeUrlParameter->Set("PageTypeName", "Home");
		$this->homeUrlParameter->Set("PagePath", "/pages/home.php");
		
		$this->storeUrlParameter->Set("URLValue", "Stores");
		$this->storeUrlParameter->Set("PageTypeName", "Stores");
		$this->storeUrlParameter->Set("PagePath", "/pages/stores.php");
		
		$this->dieUrlParameter->Set("PageTypeName", "ViewError");
		$this->dieUrlParameter->Set("PagePath", "/pages/viewError.php");
		
		$this->linkHome->Set("Identifier", "linkhome");
		$this->linkHome->Set("Content", "Home");
		$this->linkHome->Set("Parent", $this);
		$this->linkHome->Set("PostVariable", "view");
		$this->linkHome->Set("URLValue", "home");
		$this->linkHome->Set("targetviewer", $this->contentPageViewer);
		
		$this->linkStores->Set("Identifier", "linkstores");
		$this->linkStores->Set("Content", "Stores");
		$this->linkStores->Set("Parent", $this);
		$this->linkStores->Set("PostVariable", "view");
		$this->linkStores->Set("URLValue", "stores");
		$this->linkStores->Set("targetviewer", $this->contentPageViewer);

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