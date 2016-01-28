<?php

require_once('/EZFramework/uielements/controlBase.php');
require_once('/EZFramework/Common/urlParameterMapper.php');

class PageViewer extends ControlBase {
	
	private $urlParameterCollection = Array();
	private $defaultUrlParameter;
	private $postVariable;
	
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
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
	
	public function Render() {
		echo "<div id='$this->identifier'>";
		
		$urlLocation = null;
		
		if(isset($_GET[$this->postVariable])) { $urlLocation = $this->urlParameterCollection[strtolower($_GET[$this->postVariable])]; }
		else { $urlLocation = $this->defaultUrlParameter; }

		require_once($urlLocation->Get("PagePath"));
		$pageTypeName = $urlLocation->Get("PageTypeName");
		$pageToRender = new $pageTypeName();
		$pageToRender->CreateElements()->Render();
		
		echo "</div>";
	}
	
}

?>
