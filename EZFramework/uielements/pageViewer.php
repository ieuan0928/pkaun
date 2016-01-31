<?php

require_once('/EZFramework/uielements/controlBase.php');
require_once('/EZFramework/Common/urlParameterMapper.php');

class PageViewer extends ControlBase {
	
	private $urlParameterCollection = Array();
	private $defaultUrlParameter;
	private $postVariable;
	private $dieUrlParameter;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "urlparametercollection":
				return $this->urlParameterCollection;
				break;
			case "defaulturlparameter":
				return $this->defaultUrlParameter;
				break;
			case "postvariable":
				return $this->postVariable;
				break;
			case "dieurlparameter":
				return $this->dieUrlParameter;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function AddURLParameter(URLParameterMapper $newUrlParameter) {
		$this->urlParameterCollection[strtolower($newUrlParameter->Get("urlValue"))] = $newUrlParameter;
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "defaulturlparameter":
				if ($value instanceof URLParameterMapper) {
					$this->defaultUrlParameter = &$value;
					return true;
				}
				else {
					die("Type does not match on ActiveURLParameter property.");
					return false;
				}
  
				break;
			case "postvariable":
				$this->postVariable = $value;
				return true;
			case "dieurlparameter":
				if ($value instanceof URLParameterMapper) {
					$this->dieUrlParameter = &$value;
					return true;
				}
				else {
					die("Type does not match on ActiveURLParameter property.");
					return false;
				}
				break;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
	
	public function Render() {
		echo "<div id='$this->identifier'>";
		
		$urlLocation = null;
		
		if(isset($_GET[$this->postVariable])) {
			$urlKey = strtolower($_GET[$this->postVariable]);
			
			if (array_key_exists($urlKey, $this->urlParameterCollection)) {
				$urlLocation = $this->urlParameterCollection[$urlKey]; 
			}
			else {
				$urlLocation = $this->dieUrlParameter;
			}
		}
		else { $urlLocation = $this->defaultUrlParameter; }
		
		require_once($urlLocation->Get("PagePath"));
		$pageTypeName = $urlLocation->Get("PageTypeName");
		$pageToRender = new $pageTypeName();

		$pageToRender->CreateElements();
		$pageToRender->Render();

		echo "</div>";
	}
	
}

?>
