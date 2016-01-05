<?php

require_once('/ezframework/uielements/pageBase.php');
require_once('/ezframework/uielements/panel.php');
require_once('/datahelper/group.php');

class Stores extends PageBase {
	public function __construct() {
		$this->panel1 = new Panel();
		
		$this->InitializeComponent();	
	}
	
	private function InitializeComponent() {
		$this->panel1->Set("identifier", "idkuno");
		$this->panel1->Set("classname", "classkuno");
	}
	
	private $panel1;
	
	
	public function Render() {
		/* $group = new GroupHelper(unserialize($_SESSION["dbconfig"]));
		$group->GetList(); */
		
		$this->panel1->Render();
	}
}

?>