<?php

require_once('/ezframework/common/scriptManager.php');
require_once('/ezframework/common/styleManager.php');
require_once('/ezframework/common/urlParameterManager.php');

final class SiteHelper {
	public function __construct() {
		$this->scriptManager = new ScriptManager();
		$this->styleManager = new StyleManager();
		$this->urlParameterManager = new URLParameterManager();
	}
	
	private $scriptManager;
	private $styleManager;
	private $urlParameterManager;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "scriptmanager":
				return $this->scriptManager;
				break;
			case "stylemanager":
				return $this->styleManager;
				break;
			case "urlparametermanager":
				return $this->urlParameterManager;
				break;
			default:
				die("Unable to identify Property Name.");
				return false;
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			default:
				die("Unable to identify Property Name.");
				return false;
				break;
		}
	}

	
	public function StartSession() {
		$phpVersion = phpversion();
		
		if (version_compare(phpversion(), '5.4.0') >= 0) {
			if (session_status() == PHP_SESSION_NONE) session_start(); 		
		}
		else {
			if (session_id() == '')  session_start(); 
		}

	}
}

?>