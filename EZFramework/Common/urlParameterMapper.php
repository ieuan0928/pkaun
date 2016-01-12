<?php 

class URLParameterMapper {
	

	private $urlParameter;
	private $urlValue;
	private $pageTypeName;
	private $pagePath;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "urlparameter":
				return $this->urlParameter;
				break;
			case "urlvalue":
				return $this->urlValue;
				break;
			case "pagetypename":
				return $this->pageTypeName;
				break;
			case "pagepath":	
				return $this->pagePath;
				break;
			default:
				die('Unable to locate Property Name.');
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "urlparameter":
				$this->urlParameter = $value;
				return true;
				break;
			case "urlvalue":	
				$this->urlValue = $value;
				return true;
				break;
			case "pagetypename":
				$this->pageTypeName = $value;
				return true;
				break;
			case "pagepath":
				$this->pagePath = $value;
				return true;
				break;
			default:
				die('Unable to locate Property Name.');
				return false;
				break;
		}
	}
}

?>