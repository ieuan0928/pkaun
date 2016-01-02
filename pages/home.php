<?php

require_once('/EZFramework/Common/pageBase.php');

class Home extends PageBase {
	
	public function Render() {
		echo 'igit na home...';
		
		echo "<a onclick='ajax_test();'>test ajax</a>";
	}
}

?>