<?php

require_once('/ezframework/uielements/pageBase.php');

class Home extends PageBase {
	public function CreateElements() {
	}
	
	public function Render() {
		echo 'igit na home...';
		
		echo "<a onclick='ajax_test();'>test ajax</a>";
	}
}

?>