<?php

require_once('/ezframework/uielements/containerControl.php');
require_once('/EZFramework/Common/urlParameterMapper.php');

class PageViewer extends ContainerControl {
	function __construct() {
		$this->urlParameterCollection = Array();
	}


	private $urlParameterCollection; 
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "urlparametercollection":
				return $this->urlParameterCollection;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function AddURLParameter(URLParameterMapper $newUrlParameter) {
		array_push($this->urlParameterCollection, $newUrlParameter);
	}

	public function AddURLParameter($urlValue, $pageTypeName, $pagePath) {
		$newUrlParameter = new URLParameterMapper();
		
		$newUrlParameter->Set("URLValue", $urlValue);
		$newUrlParameter->Set("PageTypeName", $pageTypeName);
		$newUrlParameter->Set("PagePath", $pagePath);
		
		array_push($this->urlParameterCollection, $newUrlParameter);		
	}
	
	public function Set($propertyName) {
		switch (strtolower(trim($propertyName))) {
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
	
}

?>
