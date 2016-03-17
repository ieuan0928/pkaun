<?php 

require_once('/ezframework/enum/scriptEmbedLocationOption.php');
require_once('/ezframework/common/externalScript.php');
require_once('/ezframework/common/externalSourceManager.php');

class ScriptManager extends ExternalSourceManager {	
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
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
	
	public function AddExternalScript(ExternalScript $externalScript) {
		switch (strtolower(trim($externalScript->Get("EmbedLocation")))) {
			case ScriptEmbedLocationOption::Head:
				$this->headExternalScripts[$externalScript->Get("Source")] = $externalScript;	
				break;
			case ScriptEmbedLocationOption::Bottom:
				$this->bottomExternalScripts[$externalScript->Get("Source")] = $externalScript;
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
			$sourceValue = ($this->isMainIndex ? "" : "../") . $externalScript->Get('Source');
			$availableScripts = null; 
			
			if (isset($_POST["AvailableScripts"])) $availableScripts = $_POST["AvailableScripts"];
			if ((!is_null($availableScripts) && !in_array($sourceValue, $availableScripts)) || (is_null($availableScripts))) 
				echo '<script type="text/javascript" src="' . $sourceValue . '"></script>';
			
		}
	}
}

?>