<?php

require_once('/ezframework/common/scriptManager.php');
require_once('/ezframework/common/styleManager.php');

final class SiteHelper {
	public function __construct() {
		$this->scriptManager = new ScriptManager();
		$this->styleManager = new StyleManager();
	}
	
	private $scriptManager;
	private $styleManager;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "scriptmanager":
				return $this->scriptManager;
			case "stylemanager":
				return $this->styleManager;
			default:
				die("Unable to identify Property Name.");
				return false;
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			default:
				die("Unble to identify Property Name.");
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