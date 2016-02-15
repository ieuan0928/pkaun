<?php 

require_once("/ezframework/uielements/containerControl.php");
require_once("/ezframework/common/externalScript.php");
require_once("/ezframework/enum/scriptEmbedLocationOption.php");

abstract class PageBase extends ContainerControl {
	
	public function __construct() {
		$this->jqueryScript = new ExternalScript();
		$this->jqueryScript->Set("Source", "js/1.12.0-jquery.min.js");
		$this->jqueryScript->Set("EmbedLocation", ScriptEmbedLocationOption::Head);

		//$this->AddExternalScript($this->jqueryScript);
	}
	
	public abstract function CreateElements(); 
	
	protected $jqueryScript;
	protected $title = null;
	protected $metaData = Array();
	
	public function AddMetaData($metaData) {
		array_push($this->metaData, $metaData);
	}

	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "title":
				return $this->title; 
				break;
			case "metadata":
				return $this->metadata;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "title":
				$this->title = value;
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
	
	public function Render() {
		parent::Render();
	}
}
   
?>