<?php

require_once('/EZFramework/uielements/postVariable.php');
require_once('/EZFramework/common/urlParameterMapper.php');
require_once('/EZFramework/site.php');

class PageViewer extends PostVariable {
	
	private $urlParameterCollection = Array();
	private $defaultUrlParameter;
	private $dieUrlParameter;
	
	private $pageToRender;
	private $urlParameterToRender;
	
	private $urlKey;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "urlparametercollection":
				return $this->urlParameterCollection;
				break;
			case "defaulturlparameter":
				return $this->defaultUrlParameter;
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
	
	private function ManageURLParameters() {
		foreach ($this->urlParameterCollection as $urlParameter) {
			Site::Instance()->Helper()->Get("URLParameterManager")->SumbitURLParameter((string)$this->postVariable, $urlParameter);
		}
	}
	
	public function PreRender() {
		$this->ManageURLParameters();
		
		unset($this->urlParameterToRender);
		
		$this->urlKey = '';
		if (isset($_GET[$this->postVariable])) {
			$this->urlKey = strtolower($_GET[$this->postVariable]);
			
			if (array_key_exists($this->urlKey, $this->urlParameterCollection)) {
				$this->urlParameterToRender = $this->urlParameterCollection[$this->urlKey];
				
			}
			
			else if (isset($this->dieUrlParameter)) 
				$this->urlParameterToRender = $this->dieUrlParameter;
			
		}
		else $this->urlParameterToRender = $this->defaultUrlParameter;
		
		if (!is_null($this->urlParameterToRender)) {
			require_once($this->urlParameterToRender->Get("PagePath"));
			
			$pageTypeName = $this->urlParameterToRender->Get("PageTypeName");
			
			$this->pageToRender = new $pageTypeName;
			$this->pageToRender->CreateElements();
			$this->pageToRender->PreRender();
		}
	}
	
	public function Render() {
		echo "<div id='$this->identifier'>";
			
		if (is_null($this->urlParameterToRender)) echo "Undefined Page for '$this->postVariable=$this->urlKey'."; 
		else $this->pageToRender->Render();

		echo "</div>";
	}
	
}

?>
