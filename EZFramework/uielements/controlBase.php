<?php 

require_once("/ezframework/uielements/uiBase.php");
require_once("/ezframework/uielements/containerControl.php");
require_once('/ezframework/uielements/common/anchor.php');
require_once("/ezframework/uielements/attributes/margin.php");
require_once("/ezframework/uielements/attributes/size.php");
require_once("/ezframework/enum/scriptEmbedLocationOption.php");
require_once("/ezframework/common/externalScript.php");
require_once("/ezframework/common/inlineScript.php");
require_once("/ezframework/enum/styleEmbedLocationOption.php");
require_once("/ezframework/common/externalStyle.php");
require_once("/ezframework/common/inlineStyle.php");

abstract class ControlBase extends UIBase {
	public function __construct() {
		$this->anchor = new Anchor();
		$this->margin = new Margin();
		$this->size = new Size();
		
		$this->anchorHelper = new ExternalScript();
		$this->anchorHelper->Set("Source", "ezframework/js/anchorHelper.js");
		$this->anchorHelper->Set("EmbedLocation", ScriptEmbedLocationOption::Head);
		
		Site::Instance()->Helper()->Get("ScriptManager")->AddExternalScript($this->anchorHelper);
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$this->anchorStyle = new ExternalStyle();
		$this->anchorStyle->Set("source", "ezframework/css/anchorStyle.css");
		$this->anchorStyle->Set("embedlocation", StyleEmbedLocationOption::Head);
		
		Site::Instance()->Helper()->Get("stylemanager")->AddExternalStyle($this->anchorStyle);
	}

	protected $anchorStyle;
	protected $anchorHelper;
	protected $className;
	protected $identifier;
	protected $name;
	protected $anchor = null;
	protected $margin = null;
	protected $size = null;
	
	protected $parentControl;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "classname":
				return $this->className;
				break;
			case "identifier":
				return $this->identifier;
				break;
			case "name":
				return $this->name;
				break;
			case "parent":
				return $this->parentControl;
				break;
			case "anchor":
				//if (is_null($this->anchor)) {
					//$this->anchor = new Anchor();
				//}
				return $this->anchor;
				break;
			case "margin":
				return $this->margin;
				break;
			case "size":
				return $this->size;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "classname":
				$this->className = $value;
				return true;
				break;
			case "identifier":
				$this->identifier = $value;
				return true;
				break;
			case "name":
				$this->name = $value;
				return true;
				break;
			case "parent":
				if ($value instanceof ContainerControl) {
					$this->parentControl  = &$value;
					$value->AddControl($this);
					return true;
				}
				else {
					die("Parent must be of type ContainerControl.");
					return false;
				}
				
				break;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
	
	public function PostRender() {
	}
}

?>