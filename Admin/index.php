<?php 

set_include_path(get_include_path() . PATH_SEPARATOR . isset($_SERVER['CONTEXT_DOCUMENT_ROOT']) ? $_SERVER['CONTEXT_DOCUMENT_ROOT'] : $_SERVER['DOCUMENT_ROOT']); 

require_once('/ezframework/site.php');
require_once('/pages/main.php');

Site::Instance()->Render(new Main());

?>