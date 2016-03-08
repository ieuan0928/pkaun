<?php 

require_once('/ezframework/enum/styleEmbedLocationOption.php');
require_once('/ezframework/common/externalSourceManager.php');
require_once('/ezframework/common/externalStyle.php');

class StyleManager extends ExternalSourceManager {	
	private $headExternalStyles = Array();
	private $bottomExternalStyles = Array();
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "headexternalstyles":
				return $this->headExternalStyles;
				break;
			case "bottomexternalstyles":
				return $this->bottomExternalStyles;
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
	
	public function AddExternalStyle(ExternalStyle $externalStyle) {
		switch (strtolower(trim($externalStyle->Get("EmbedLocation")))) {
			case StyleEmbedLocationOption::Head:
				$this->headExternalStyles[$externalStyle->Get("Source")] = $externalStyle;
				break;
			case StyleEmbedLocationOption::Bottom:
				$this->bottomExternalStyles[$externalStyle->Get("Source")] = $externalStyle;
				break;
		}
	}

	public function RenderExternalStyle($embedLocation) {
		$styleCollection = null;
		
		switch ($embedLocation) {
			case StyleEmbedLocationOption::Head:
				$styleCollection = $this->headExternalStyles;
				break;
			case StyleEmbedLocationOption::Bottom:
				$styleCollection = $this->bottomExternalStyles;
				break;
		}
		
		foreach ($styleCollection as $externalStyle) {
			echo '<link rel="stylesheet" type="text/css" href="' . ($this->isMainIndex ? "" : "../") . $externalStyle->Get('Source') . '"></link>';
		}
	}
}

?>