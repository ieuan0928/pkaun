<?php 

require_once('/EZFramework/site.php');

if (isset($_POST["Parameter"]) && isset($_POST["ParamValue"])) 
	Site::Instance()->RenderChildPageFromURLParameter($_POST["Parameter"], $_POST["ParamValue"]);
else {
	require_once('/pages/main.php');
	Site::Instance()->Render(new Main());
}

?>
