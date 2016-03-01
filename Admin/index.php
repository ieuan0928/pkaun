<?php 

var_dump($_SERVER);
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['CONTEXT_DOCUMENT_ROOT']); 

require_once('/ezframework/site.php');
require_once('/pages/main.php');

Site::Instance()->Render(new Main());

?>