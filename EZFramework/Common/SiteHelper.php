<?php

require_once('/ezframework/common/scriptManager.php');

final class SiteHelper {
	public function __construct() {
		$this->scriptManager = new ScriptManager();
	}
	
	private $scriptManager;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "externalscripts":
				return $this->scriptManager->Get("ExternalScripts");
				break;
			case "scriptmanager":
				return $this->scriptManager;
			default:
				die("Unable to identify Property Name.");
				return false;
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "externalscripts":
				$this->scriptManager->SetExternalScripts($value);
				return true;
				break;
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