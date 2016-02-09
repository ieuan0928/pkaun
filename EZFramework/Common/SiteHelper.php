<?php

final class SiteHelper {
	
	private $externalScripts = Array();
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "externalscripts":
				return $this->externalScripts;
				break;
			default:
				die("Unable to identify Property Name.");
				return false;
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "externalScripts":
				$this->externalScripts = $value;
				return $this->SegragateExternalScripts();
				break;
			default:
				die("Unble to identify Property Name.");
				return false;
				break;
		}
	}
	
	private function SegragateExternalScripts() {
		foreach ($this->externalScripts as $externalScript) {
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