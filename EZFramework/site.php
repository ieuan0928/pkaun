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
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "defaulttitle":
				return $this->defaultTitle;
				break;
			default:
				die('Unable to identify Property Name.');
				break;
		}
	}
	
	public function Set($propertyName, $value) {
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
		$pageToRender->Render();
	}
	
	public function Render(UIBase &$page) {
		$page->CreateElements();
		$page->PreRender();
		
		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		echo '<html xmlns="http://www.w3.org/1999/xhtml">';
		echo '<head>';
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		echo '<meta name="viewport" content="initial-scale =1.0,maximum-scale = 1.0" />';
		
		self::Instance()->Helper()->Get("scriptmanager")->RenderExternalScript(ScriptEmbedLocationOption::Head);
		self::Instance()->Helper()->Get("stylemanager")->RenderExternalStyle(StyleEmbedLocationOption::Head);

		echo '<link rel="stylesheet" type="text/css" href="css/style.css" />';
		
		echo '<link rel="stylesheet" type="text/css" href="css/dummy.css" />';
		echo '<script type="text/javascript" src="/js/dummyanchor.js"></script>';
		
		echo '<title>Title</title>';
		echo '</head>';
		echo '<body>';
		
		$page->Render();

		echo '</body>';
		echo '</html>';
	}
}

?>