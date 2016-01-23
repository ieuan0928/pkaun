

<?php 

/*testing commit*/

session_start();

$view = null;
$viewPage = null;
$sort = null;

require_once('/ezframework/common/site.php');
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

if (!isset($_GET['view'])) $view = "home";
else $view = strtolower(trim($_GET['view'])); 


Site::Instance()->Render(new Main());

?>
