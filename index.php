<?php 

session_start();

$view = null;
$viewPage = null;
$sort = null;

require_once('/EZFramework/common/site.php');
require_once('/pages/main.php');

if (!isset($_SESSION["dbconfig"])) {
	require_once('/ezframework/databaseConfig.php');
	
	$dbConfig = new databaseConfig();
	$dbConfig->Set("server", "localhost");
	$dbConfig->Set("database", "fo_runner");
	$dbConfig->Set("username", "root");
	$dbConfig->Set("password", "");
	
	$_SESSION["dbconfig"] = serialize($dbConfig);
}

Site::Instance()->Helper()->StartSession();
$testmain = new Main();
Site::Instance()->Render($testmain);

$testmain = null;

?>
