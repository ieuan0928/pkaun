<?php

require_once('/ezframework/uielements/pageBase.php');
require_once('/datahelper/group.php');

class Stores extends PageBase {
	
	public function Render() {
		$group = new GroupHelper(unserialize($_SESSION["dbconfig"]));
		$group->GetList();
	}
}

?>