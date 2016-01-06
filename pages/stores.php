<?php

require_once('/ezframework/uielements/pageBase.php');
require_once('/ezframework/uielements/panel.php');
require_once('/datahelper/group.php');

class Stores extends PageBase {
	public function __construct() {
		$this->panel1 = new Panel();
		$this->panel2 = new Panel();
		$this->panel3 = new Panel();
		$this->panel4 = new Panel();
		
		$this->InitializeComponent();	
	}
	
	private function InitializeComponent() {
		$this->panel2->AddControl($this->panel1);
		$this->panel2->AddControl($this->panel3);
		$this->panel1->AddControl($this->panel4);
		
		$this->panel1->Set("identifier", "idkuno");
		$this->panel1->Set("classname", "classkuno");
		
		$this->panel2->Set("identifier", "anakanak");
		$this->panel3->Set("identifier", "igsuunniidkuno");
		$this->panel4->Set("identifier", "bilatniidkuno");
		

	}
	
	private $panel1;
	private $panel2;
	private $panel3;
	private $panel4;
	
	public function Render() {
		/* $group = new GroupHelper(unserialize($_SESSION["dbconfig"]));
		$group->GetList(); */
		
		$this->panel2->Render();
		
		var_dump($this->panel2->GetChildrenRecursive());
	}
}

?>