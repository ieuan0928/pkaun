<?php 

require_once('/ezframework/common/siteHelper.php');
require_once('/ezframework/uielements/uiBase.php');
require_once('/ezframework/enum/scriptEmbedLocationOption.php');
require_once('/ezframework/enum/styleEmbedLocationOption.php');

final class Site {
	private function __construct() {
		session_start();
		$this->helper = new SiteHelper();
	}
	private $helper = null;
	public function Helper() {
		return $this->helper;
	}
	
	private static $instance = null;
	public static function Instance() {
		
		if (is_null(Site::$instance)) 
		{
			Site::$instance = new Site();
		}
		
		return Site::$instance;
	}

	private $defaultTitle = null;
	private $isMainIndex = true;
	private $isFullPageRequest = true;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "defaulttitle":
				return $this->defaultTitle;
				break;
			case "ismainindex":
				return $this->isMainIndex;
				break;
			case "isfullpagerequest":
				return $this->isFullPageRequest;
				break;
			default:
				die('Unable to identify Property Name.');
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "ismainindex":
				$this->isMainIndex = $value;			
				$this->helper->Get("ScriptManager")->Set("IsMainIndex", $value);
				$this->helper->Get("StyleManager")->Set("IsMainIndex", $value);
				return true;
				break;
			case "isfullpagerequest":
				$this->isFullPageRequest = $value;
				return true;
				break;
			default:
				die('Unable to identify Property Name.');
				break;
		}
	}
	
	public function RenderChildPageFromURLParameter($parameter, $paramValue ) {
		require_once('/ezframework/enum/urlParameterKeys.php');

		$urlParameterManager = Site::Instance()->Helper()->Get("URLParameterManager");
		$urlParameterMapper = $urlParameterManager->GetURLParameter($_POST["Parameter"], $_POST["ParamValue"]);

		$PageTypeName = $urlParameterMapper[URLParameterKeys::PageTypeName];
		$PagePath = $urlParameterMapper[URLParameterKeys::PagePath];

		require_once($PagePath);
		$pageToRender = new $PageTypeName;

		$pageToRender->CreateElements();
		$pageToRender->PreRender();
		
		$this->helper->Get("scriptmanager")->RenderExternalScript(ScriptEmbedLocationOption::Head);
		$this->helper->Get("stylemanager")->RenderExternalStyle(StyleEmbedLocationOption::Head);
		
		$pageToRender->Render();
	}
	
	public function Render(UIBase &$page) {
		$page->CreateElements();
		$page->PreRender();
		
		echo '<!DOCTYPE html>';
		echo '<html>';
		echo '<head>';
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		echo '<meta name="viewport" content="initial-scale =1.0,maximum-scale = 1.0" />';
		
		echo '<title>Title</title>';
		echo '</head>';
		echo '<body>';
		
		$this->helper->Get("scriptmanager")->RenderExternalScript(ScriptEmbedLocationOption::Head);
		$this->helper->Get("stylemanager")->RenderExternalStyle(StyleEmbedLocationOption::Head);
		
		$page->Render();

		echo '</body>';
		echo '</html>';
	}
}

?>