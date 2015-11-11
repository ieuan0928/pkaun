<?php 

session_start();

$view = null;
$viewPage = null;
$sort = null;

require_once('/common/site.php');

if (!isset($_SESSION["dbconfig"])) {
	require_once('/common/databaseConfig.php');
	
	$dbConfig = new databaseConfig();
	$dbConfig->Set('username', 'root');
	$dbConfig->Set('password', '');
	$dbConfig->Set('database', 'fo_runner');
	$dbConfig->Set('server', 'localhost');
	
	$_SESSION["dbconfig"] = $dbConfig;
}

if (!isset($_GET['view'])) $view = "home";
else $view = strtolower(trim($_GET['view'])); 

switch ($view) {
	case "home":
		require_once('/home/home.php');
		$viewPage = new Home();
		break;
	case "store":
		require_once('/store/stores.php');
		$viewPage = new Stores();
		break;
}

Site::Render($viewPage);

?>
