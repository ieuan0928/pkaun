<?php 

require_once('/ezframework/enum/scriptEmbedLocationOption.php');

class ScriptManager {

	private $externalScripts = Array();
	private $inlineScripts = Array();
	
	private $headExternalScripts = Array();
	private $bottomExternalScripts = Array();
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "externalscripts":
				return $this->externalScripts;
				break;
			case "internalscripts":
				return $this->inlineScripts;
				break;
			case "headexternalscripts":
				return $this->headExternalScripts;
				break;
			case "bottomexternalscripts":
				return $this->bottomExternalScripts;
				break;
			default:
				die("Unable to identify Property Name.");
				return null;
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "externalscripts":
				$this->SetExternalScripts($value);
				return true;
				break;
			case "internalscripts":
				$this->inlineScripts = $value;
				return true;
				break;
			default:
				die("Unable to identify Property Name.");
				return false;
				break;
		}
	}
	
	private function InitializeExternalScripts($value) {
		unset($this->externalScripts);
		unset($this->headExternalScripts);
		unset($this->bottomExternalScripts);
		
		$this->externalScripts = $value;
		$this->headExternalScripts = Array();
		$this->bottomExternalScripts = Array();
	}
	
	public function SetExternalScripts($value) {
		$this->InitializeExternalScripts($value);
		
		foreach ($this->externalScripts as $externalScript) {
			switch ($externalScript->Get("EmbedLocation")) {
				case ScriptEmbedLocationOption::Head:
					array_push($this->headExternalScripts, $externalScript);
					break;
				case ScriptEmbedLocationOption::Bottom:
					array_push($this->bottomExternalScripts, $externalScript);
					break;
			}
		}
	}
	
	public function RenderExternalScript($embedLocation) {
		$scriptCollection = null;
		
		switch ($embedLocation) {
			case ScriptEmbedLocationOption::Head:
				$scriptCollection = $this->headExternalScripts;
				break;
			case ScriptEmbedLocationOption::Bottom:
				$scriptCollection = $this->bottomExternalScripts;
				break;
		}
		
		foreach ($scriptCollection as $externalScript) {
			echo '<script type="text/javascript" src="' . $externalScript->Get('Source') . '"></script>';
		}
	}
}

?>