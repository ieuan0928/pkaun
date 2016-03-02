<?php 

$include_path;

if(array_key_exists("CONTEXT_DOCUMENT_ROOT", $_SERVER)) {
	$include_path = $_SERVER['CONTEXT_DOCUMENT_ROOT'];
}
else {
	$include_path = $_SERVER['DOCUMENT_ROOT'];
}
	
set_include_path(get_include_path() . PATH_SEPARATOR . $include_path); 

require_once('/ezframework/site.php');
Site::Instance()->Set("IsSubPage", true);

if (isset($_POST["Parameter"]) && isset($_POST["ParamValue"])) 
	Site::Instance()->RenderChildPageFromURLParameter($_POST["Parameter"], $_POST["ParamValue"]);
else {
	require_once('/pages/main.php');
	
	Site::Instance()->Render(new Main());
}

?>