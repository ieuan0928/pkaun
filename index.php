<?php 

require_once('/EZFramework/site.php');

if (isset($_POST["Parameter"]) && isset($_POST["ParamValue"])) {
	ob_start();
	
	Site::Instance()->Set("IsFullPageRequest", false);
	Site::Instance()->RenderChildPageFromURLParameter($_POST["Parameter"], $_POST["ParamValue"]);
	
	$result = Array();
	$result["styles"] = Site::Instance()->Helper()->Get("StyleManager")->GenerateExternalStyles();
	$result["content"] = ob_get_clean();
	
	
	
	echo json_encode($result);
	
	//ob_end_flush();
}
else {
	
	require_once('/pages/main.php');
	Site::Instance()->Render(new Main());
}

?>
