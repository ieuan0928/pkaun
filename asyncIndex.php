<?php
//TODO : Proper Design... Transfer this file (asyncIndex.php) inside ezframework folder...

var_dump(ini_get_all());
session_start();
require_once('/ezframework/site.php');
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
	
?>