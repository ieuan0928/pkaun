<?php

require_once('/ezframework/uielements/containerControl.php');
require_once("/ezframework/enum/scriptEmbedLocationOption.php");
require_once("/ezframework/common/externalScript.php");
require_once("/ezframework/common/inlineScript.php");
require_once("/ezframework/enum/styleEmbedLocationOption.php");
require_once("/ezframework/common/externalStyle.php");
require_once("/ezframework/common/inlineStyle.php");
require_once("/EZFramework/site.php");
require_once("/ezframework/enum/sliderEffects.php");

class SliderContainer extends containerControl {
	public function __construct() {
		$this->sliderHelper = new ExternalScript();
		$this->sliderHelper->Set("Source", "ezframework/js/sliderHelper.js");
		$this->sliderHelper->Set("EmbedLocation", ScriptEmbedLocationOption::Head);
		
		Site::Instance()->Helper()->Get("ScriptManager")->AddExternalScript($this->sliderHelper);
		
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$this->sliderStyle = new ExternalStyle();
		$this->sliderStyle->Set("source", "ezframework/css/sliderStyle.css");
		$this->sliderStyle->Set("embedlocation", StyleEmbedLocationOption::Head);
		
		Site::Instance()->Helper()->Get("stylemanager")->AddExternalStyle($this->sliderStyle);
	}
	
	private $linkInlineScript;
	private $uniqueId;
	private $sliderHelper;
	private $sliderStyle;
	private $effects = array();
	
	public function Get($propertyName) {
		return parent::Get($propertyName);
	}
	
	public function Set($propertyName, $value) {
		return parent::Set($propertyName, $value);
	}
	
	public function addSlide(SliderControl $slide)
	{
		array_push($this->childControls, $slide);
	}
	
	public function slide_effects()
	{
		
	}
	
	public function PreRender()  {
		$this->linkInlineScript = new InlineScript();
		$this->uniqueId = "slidercontainer_" . $this->identifier;
		$this->linkInlineScript->Set("UniqueID", $this->uniqueId);
		$script = "$('#" . $this->uniqueId . "').sliderControl({'effect':'slideUp'});";
		$this->linkInlineScript->Set("script", $script);
		parent::AddInlineReadyScript($this->linkInlineScript);
	}
	
	public function Render() {	
		$concat = "_slider_container";
		
		echo "<div id='$this->identifier$concat' class='slider_base_class'>";
		
		echo "<ul>";
		foreach($this->childControls as $slide)
		{
			echo "<li>";
			echo $slide->Render();
			echo "</li>";
		}
		echo "</ul>";
		echo "</div>";
	}
	
	public function PostRender()  {
		$concat = "_slider_container";
		
		echo "<script>
				$('#". $this->identifier . $concat ."').sliderControl({'effects':'slideUp', 'slideDuration':'3000'});
			</script>";
	}
}

?>