<?php 

set_include_path(get_include_path() . PATH_SEPARATOR . array_key_exists("CONTEXT_DOCUMENT_ROOT", $_SERVER) ? $_SERVER['CONTEXT_DOCUMENT_ROOT'] : $_SERVER['DOCUMENT_ROOT']); 

require_once('/ezframework/site.php');
require_once('/pages/main.php');

Site::Instance()->Render(new Main());

?>