<?php

require_once('/ezframework/uielements/pageBase.php');
require_once('/ezframework/uielements/panel.php');
require_once('/ezframework/uielements/groupBox.php');
require_once('/ezframework/uielements/checkBox.php');
require_once('/ezframework/uielements/radioButton.php');
require_once('/ezframework/uielements/textBox.php');
require_once('/ezframework/uielements/label.php');
require_once('/ezframework/uielements/textArea.php');
require_once('/ezframework/uielements/comboBox.php');
require_once('/datahelper/group.php');
require_once('/ezframework/uielements/contentControl.php');

class Stores extends PageBase {
	
	public function CreateElements() {
		$this->panel1 = new Panel();
		$this->panel2 = new Panel();
		$this->panel3 = new Panel();
		$this->panel4 = new Panel();
		$this->groupBox1 = new GroupBox();
		$this->checkBox1 = new CheckBox();
		$this->radioButton1 = new RadioButton();
		$this->textBox1 = new TextBox();
		$this->label_1 = new Label();
		$this->textarea_1 = new TextArea();
		$this->comboBox_1 = new ComboBox();
		$this->comboBox_2 = new ComboBox();
		
		$this->panel1->Set("identifier", "groupbox1_header");
		
		$this->panel2->Set("identifier", "groupbox1_body");
		
		$this->panel1->Set("Parent", $this->groupBox1->Get("Header"));
		$this->panel2->Set("Parent",  $this->groupBox1->Get("Content"));
		
		$this->groupBox1->Set("identifier", "group_box_id");
		$this->groupBox1->Set("classname", "group_box_class");
		$this->groupBox1->Set("Parent", $this);
		$this->panel4->Set("identifier", "panel4_div");
		
		$this->checkBox1->Set("identifier", "checkbox_id");
		$this->checkBox1->Set("name", "checkbox_name");
		$this->checkBox1->Set("classname", "checkbox_class");
		$this->checkBox1->Set("content", $this->panel4);
		$this->checkBox1->Set("value", "car");
		
		$this->radioButton1->Set("identifier", "radio_button_id1");
		$this->radioButton1->Set("className", "radio_button_class1");
		$this->radioButton1->Set("name", "radio_button_name1");
		$this->radioButton1->Set("value", "bike");
		$this->radioButton1->Set("content", "bike");
		
		$this->textBox1->Set("identifier", "id_textbox_1");
		$this->textBox1->Set("classname", "class_textbox_1");
		$this->textBox1->Set("name", "name_textbox_1");
		$this->textBox1->Set("placeholder", "placeholder test");
		
		$this->label_1->Set("identifier", "id_label_1");
		$this->label_1->Set("classname", "class_labael_1");
		$this->label_1->Set("value", "header 1 test");
		$this->label_1->Set("header", "h1");
		
		$this->textarea_1->Set("identifier", "id_textarea_1");
		$this->textarea_1->Set("classname", "class_textarea_1");
		$this->textarea_1->Set("name", "name_textarea_1");
		
		$this->comboBox_1->Set("identifier", "id_comboBox_1");
		$this->comboBox_1->Set("classname", "class_comboBox_1");
		$this->comboBox_1->Set("name", "name_comboBox_1");
		$this->comboBox_1->Set("type", "multiple");
		$this->comboBox_1->Set("option", "one");
		$this->comboBox_1->Set("option", "two");
		$this->comboBox_1->Set("option", "three");
		$this->comboBox_1->Set("option", "four");
		
		$this->comboBox_2->Set("identifier", "id_comboBox_2");
		$this->comboBox_2->Set("classname", "class_comboBox_2");
		$this->comboBox_2->Set("name", "name_comboBox_2");
		$this->comboBox_2->Set("type", "dropdown");
		$this->comboBox_2->Set("option", "one");
		$this->comboBox_2->Set("option", "two");
		$this->comboBox_2->Set("option", "three");
		$this->comboBox_2->Set("option", "four");
		
		$this->checkBox1->Set("Parent", $this->panel2);
		$this->radioButton1->Set("Parent", $this->panel2);
		$this->label_1->Set("parent", $this);
		$this->textBox1->Set("parent", $this);
		$this->textarea_1->Set("parent", $this);
		$this->comboBox_1->Set("parent", $this);
		$this->comboBox_2->Set("parent", $this);
		
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
		
		return $this;
	}
	
	private $panel1;
	private $panel2;
	private $panel3;
	private $panel4;
	private $checkBox1;
	private $radioButton1;
	private $textBox1;
	private $label_1;
	private $groupBox1;
	private $textarea_1;
	private $comboBox_1;
	private $comboBox_2;
}

?>