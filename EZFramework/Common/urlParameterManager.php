<?php

require_once('/ezframework/common/urlParameterMapper.php');
require_once('/ezframework/enum/urlParameterKeys.php');

class URLParameterManager {
	
	public function __construct() {
		if (!isset($_SESSION["urlparameter"])) 
			$_SESSION["urlparameter"] = &$this->urlParameterArray; 
		else
			$this->urlParameterArray = &$_SESSION["urlparameter"];
	}
	
	private $urlParameterArray = Array();

	public function SumbitURLParameter(string $urlParameter, URLParameterMapper $urlParameterMapper) {
		if (!isset($this->urlParameterArray[$urlParameter]) || is_null($this->urlParameterArray)) 
			$this->urlParameterArray[$urlParameter] = Array();
		
		$urlParameter = &$this->urlParameterArray[$urlParameter];
		$urlValue = $urlParameterMapper->Get("URLValue");
		if (!isset($urlParameter[$urlValue]) || is_null($urlParameter[$urlValue])) 
			$urlParameter[$urlValue] = Array();
			
		$urlParameterValueMapper = &$urlParameter[$urlValue];
		
		$urlParameterValueMapper[URLParameterKeys::URLValue] = $urlParameterMapper->Get("URLValue");
		$urlParameterValueMapper[URLParameterKeys::PageTypeName] = $urlParameterMapper->Get("PageTypeName");
		$urlParameterValueMapper[URLParameterKeys::PagePath] = $urlParameterMapper->Get("PagePath");
	}
	
}

?>