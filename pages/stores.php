<?php

require_once('/ezframework/uielements/pageBase.php');
require_once('/ezframework/uielements/panel.php');
require_once('/ezframework/uielements/groupBox.php');
require_once('/ezframework/uielements/checkBox.php');
require_once('/datahelper/group.php');

class Stores extends PageBase {
	public function __construct() {	
		$this->InitializeComponent();	
	}
	
	private function InitializeComponent() {
		$this->panel1 = new Panel();
		$this->panel2 = new Panel();
		$this->groupBox1 = new GroupBox();
		$this->checkBox1 = new CheckBox();
		
		$this->panel1->Set("identifier", "groupbox1_header");
		
		$this->panel2->Set("identifier", "groupbox1_body");
		
		$this->groupBox1->Get("Header")->AddControl($this->panel1);
		$this->groupBox1->Get("Content")->AddControl($this->panel2);
		
		$this->groupBox1->Set("identifier", "group_box_id");
		$this->groupBox1->Set("classname", "group_box_class");
		
		$this->checkBox1->Set("identifier", "checkbox_id");
		$this->checkBox1->Set("name", "checkbox_name");
		$this->checkBox1->Set("classname", "checkbox_class");
		$this->checkBox1->Set("text", "i am a car");
		$this->checkBox1->Set("value", "car");
		
		$this->panel2->AddControl($this->checkBox1);
		// $this->panel2->AddControl($this->panel1);
		// $this->panel2->AddControl($this->panel3);
		// $this->panel1->AddControl($this->panel4);
// 		
		// $this->panel1->Set("identifier", "idkuno");
		// $this->panel1->Set("classname", "classkuno");
// 		
		// $this->panel2->Set("identifier", "anakanak");
		// $this->panel3->Set("identifier", "igsuunniidkuno");
		// $this->panel4->Set("identifier", "bilatniidkuno"); 
		

	}
	
	private $panel1;
	private $panel2;
	private $panel3;
	private $panel4;
	private $checkBox1;
	
	private $groupBox1;
	
	public function Render() {
		/* $group = new GroupHelper(unserialize($_SESSION["dbconfig"]));
		$group->GetList(); */
		
		$this->groupBox1->Render();
		
		//var_dump($this->panel2->GetChildrenRecursive());
	}
}

?>