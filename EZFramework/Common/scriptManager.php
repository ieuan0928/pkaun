<?php 

require_once('/ezframework/enum/scriptEmbedLocationOption.php');
require_once('/ezframework/common/externalScript.php');

class ScriptManager {	
	private $headExternalScripts = Array();
	private $bottomExternalScripts = Array();
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
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
			default:
				die("Unable to identify Property Name.");
				return false;
				break;
		}
	}
	
	public function AddExternalScript(ExternalScript $externalScript) {
		$externalScriptSource = $externalScript->Get("Source");
		switch (strtolower(trim($externalScript->Get("EmbedLocation")))) {
			case ScriptEmbedLocationOption::Head:
				$this->headExternalScripts[$externalScript->Get("Source")] = $script;	
				break;
			case ScriptEmbedLocationOption::Bottom:
			
				break;
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