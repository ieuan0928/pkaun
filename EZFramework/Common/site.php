<?php 

require_once('/ezframework/uielements/uiBase.php');

class Site {
	
	public static function Render(UIBase &$page) {
		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		echo '<html xmlns="http://www.w3.org/1999/xhtml">';
		echo '<head>';
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		echo '<meta name="viewport" content="initial-scale =1.0,maximum-scale = 1.0" />';
		echo '<script type="text/javascript" src="/ezwap_admin/js/jquery-1.11.0.min.js"></script>';
		echo '<link rel="stylesheet" type="text/css" href="css/style.css" />';
		echo '<title>Title</title>';
		echo '</head>';
		echo '<body>';
		echo '<div id="header">';
		echo '<div id="header_content" class="center_content">';
		echo '<div id="logo_container">Logo ug ngalan... </div>';
		echo '<div id="menu_container">';
		echo '<a href="#">Help</a>';
		echo '<a href="#">Login or Sign-up</a>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
		$page->CreateElements();
		$page->Render();
		
		echo '</body>';
		echo '</html>';
	}
}

?>