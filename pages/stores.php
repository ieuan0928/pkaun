<?php

require_once('/ezframework/uielements/pageBase.php');
require_once('/ezframework/uielements/panel.php');
require_once('/ezframework/uielements/groupBox.php');
require_once('/ezframework/uielements/checkBox.php');
require_once('/ezframework/uielements/radioButton.php');
require_once('/ezframework/uielements/textBox.php');
require_once('/ezframework/uielements/label.php');
require_once('/ezframework/uielements/comboBox.php');
require_once('/ezframework/uielements/image.php');
require_once('/ezframework/uielements/file.php');
require_once('/ezframework/uielements/tabControl.php');
require_once('/ezframework/uielements/tabContainer.php');
require_once('/datahelper/group.php');
require_once('/ezframework/uielements/contentControl.php');
require_once('/ezframework/enum/tagType.php');
require_once('/ezframework/uielements/textBlock.php');

class Stores extends PageBase {
	public function __construct() {
		parent::__construct();
		
		$this->InitializeElements();
	}
	
	private function InitializeElements() {
		$this->panel1 = new Panel();
		$this->panel2 = new Panel();
		$this->panel3 = new Panel();
		$this->panel4 = new Panel();
		$this->panel5 = new Panel();
		$this->panel6 = new Panel();
		$this->panel7 = new Panel();
		$this->panel8 = new Panel();
		$this->panel9 = new Panel();
		$this->panel10 = new Panel();
		$this->panel11 = new Panel();
		
		$this->groupBox1 = new GroupBox();
		$this->checkBox1 = new CheckBox();
		$this->radioButton1 = new RadioButton();
		$this->textBox1 = new TextBox();
		$this->label_1 = new Label();
		$this->textarea_1 = new TextBox();
		$this->comboBox_1 = new ComboBox();
		$this->comboBox_2 = new ComboBox();
		$this->image_1 = new Image();
		$this->file_input = new File();
		$this->label_with_Content_1 = new Label();
		$this->label_with_Content_2 = new Label();
		$this->label_with_Content_3 = new Label();
		$this->label_with_Content_4 = new Label();
		$this->label_with_Content_5 = new Label();
		
		$this->logo = new Image();
		$this->tab1 = new Tab();
		$this->tab2 = new Tab();
		$this->tab3 = new Tab();
		$this->tab4 = new Tab();
		$this->tab_container_1 = new TabContainer();
		$this->tab_container = new TabContainer();
		$this->text_block_1 = new TextBlock();
	}
	
	public function CreateElements() {	
		$this->panel1->Set("identifier", "groupbox1_header");
		$this->panel1->Set("Parent", $this->groupBox1->Get("Header"));
			
		$this->panel2->Set("Parent",  $this->groupBox1->Get("Content"));
		$this->panel2->Set("identifier", "groupbox1_body");
		
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
		
		$this->image_1->Set("identifier", "id_image_1");
		$this->image_1->Set("classname", "class_image_1");
		$this->image_1->Set("image_path", "/pkaun/pkaun/resources/Numbuh_1.jpg");
		
		$this->logo->Set("identifier", "id_logo");
		$this->logo->Set("classname", "class_logo");
		$this->logo->Set("image_path", "/pkaun/pkaun/resources/arrow-down.png");
		
		$this->file_input->Set("identifier", "id_file_input");
		$this->file_input->Set("classname", "class_file_input");
		$this->file_input->Set("name", "name_file_input");
		
		$this->label_with_Content_1->Set("identifier", "id_label_with_content_1");
		$this->label_with_Content_1->Set("classname", "class_label_with_content_1");
		$this->label_with_Content_1->Set("value", "Tab Test");
		$this->label_with_Content_1->Set("header", "h3");
		$this->label_with_Content_1->Set("content", $this->logo);
		
		$this->label_with_Content_2->Set("identifier", "id_label_with_content_2");
		$this->label_with_Content_2->Set("classname", "class_label_with_content_2");
		$this->label_with_Content_2->Set("value", "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
		$this->label_with_Content_2->Set("header", "h5");
		
		$this->label_with_Content_3->Set("identifier", "id_label_with_content_3");
		$this->label_with_Content_3->Set("classname", "class_label_with_content_3");
		$this->label_with_Content_3->Set("value", "bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb");
		$this->label_with_Content_3->Set("header", "h5");
		
		$this->label_with_Content_4->Set("identifier", "id_label_with_content_4");
		$this->label_with_Content_4->Set("classname", "class_label_with_content_4");
		$this->label_with_Content_4->Set("value", "ccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc");
		$this->label_with_Content_4->Set("header", "h5");
		
		
		$this->label_with_Content_5->Set("identifier", "id_label_with_content_5");
		$this->label_with_Content_5->Set("classname", "class_label_with_content_5");
		$this->label_with_Content_5->Set("value", "ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd");
		$this->label_with_Content_5->Set("header", "h5");
		
		$this->checkBox1->Set("Parent", $this->panel2);
		$this->radioButton1->Set("Parent", $this->panel2);
		$this->label_1->Set("parent", $this);
		$this->textBox1->Set("parent", $this);
		$this->comboBox_1->Set("parent", $this);
		$this->comboBox_2->Set("parent", $this);
		$this->image_1->Set("parent", $this);
		$this->file_input->Set("parent", $this);
		
		$this->tab_container->Set("identifier", "tab_cont_id");
		$this->tab_container->Set("classname", "tab_cont_class");
		$this->tab_container->Set("parent", $this);
		
		$this->tab1->Set("identifier", "id_tab_1");
		$this->tab1->Set("classname", "class_tab_1");
		$this->tab1->Set("status", "active");
		$this->tab1->Set("parent", $this->tab_container);
		
		$this->panel3->Set("identifier", "label_panel_id_1");
		$this->panel3->Set("classname", "label_panel_class_1");
		$this->panel5->Set("identifier", "label_panel_id_2");
		$this->panel5->Set("classname", "label_panel_class_2");
		$this->panel6->Set("identifier", "label_panel_id_3");
		$this->panel6->Set("classname", "label_panel_class_3");
		$this->panel7->Set("identifier", "label_panel_id_7");
		$this->panel7->Set("classname", "label_panel_class_7");
		$this->panel8->Set("identifier", "label_panel_id_8");
		$this->panel8->Set("classname", "label_panel_class_8");
		$this->panel9->Set("identifier", "label_panel_id_9");
		$this->panel9->Set("classname", "label_panel_class_9");
		$this->panel10->Set("identifier", "label_panel_id_10");
		$this->panel10->Set("classname", "label_panel_class_10");
		$this->panel11->Set("identifier", "label_panel_id_11");
		$this->panel11->Set("classname", "label_panel_class_11");
		
		$this->tab2->Set("identifier", "id_tab_2");
		$this->tab2->Set("classname", "class_tab_2");
		$this->tab2->Set("status", "inactive");
		$this->tab2->Set("parent", $this->tab_container);
	
		$this->tab3->Set("identifier", "id_tab_3");
		$this->tab3->Set("classname", "class_tab_3");
		$this->tab3->Set("status", "inactive");
		$this->tab3->Set("parent", $this->tab_container);
		
		$this->tab4->Set("identifier", "id_tab_4");
		$this->tab4->Set("classname", "class_tab_4");
		$this->tab4->Set("status", "inactive");
		
		$this->label_with_Content_1->Set("parent", $this->panel3);
		$this->label_with_Content_1->Set("parent", $this->panel5);
		$this->label_with_Content_1->Set("parent", $this->panel6);
		$this->label_with_Content_1->Set("parent", $this->panel10);
		
		$this->label_with_Content_2->Set("parent", $this->panel7);
		$this->label_with_Content_3->Set("parent", $this->panel8);
		$this->label_with_Content_4->Set("parent", $this->panel9);
		$this->label_with_Content_5->Set("parent", $this->panel11);
		
		$this->panel3->Set("parent", $this->tab1->Get("Header"));
		$this->panel5->Set("parent", $this->tab2->Get("Header"));
		$this->panel6->Set("parent", $this->tab3->Get("Header"));
		$this->panel10->Set("parent", $this->tab4->Get("Header"));
		
		$this->panel7->Set("parent", $this->tab1->Get("content"));
		$this->panel8->Set("parent", $this->tab2->Get("content"));
		$this->panel9->Set("parent", $this->tab3->Get("content"));
		$this->panel11->Set("parent", $this->tab4->Get("content"));
		
		$this->text_block_type_1 = TagType::h3;
		$this->text_block_1->Set("identifier", "id_text_block_1");
		$this->text_block_1->Set("classname", "class_text_block_1");
		$this->text_block_1->Set("value", "text block string sample");
		$this->text_block_1->Set("tagtype", $this->text_block_type_1);
		$this->text_block_1->Set("parent", $this); 
		
		$this->textarea_1->Set("identifier", "id_textarea_1");
		$this->textarea_1->Set("classname", "class_textarea_1");
		$this->textarea_1->Set("name", "name_textarea_1");
		$this->textarea_1->Set("value", "Hello, I am a sample text area");
		$this->textarea_1->Set("ismultiline", true);
		$this->textarea_1->Set("parent", $this);
		
		$this->tab_container_1->Set("identifier", "tab_cont_id_1");
		$this->tab_container_1->Set("classname", "tab_cont_class_1");
		$this->tab_container_1->Set("parent", $this);
		$this->tab1->Set("parent", $this->tab_container_1);
		$this->tab2->Set("parent", $this->tab_container_1);
		$this->tab3->Set("parent", $this->tab_container_1);
		$this->tab4->Set("parent", $this->tab_container_1);
		
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
	private $panel5;
	private $panel6;
	private $panel7;
	private $panel8;
	private $panel9;
	private $panel10;
	private $panel11;
	private $checkBox1;
	private $radioButton1;
	private $textBox1;
	private $label_1;
	private $groupBox1;
	private $comboBox_1;
	private $comboBox_2;
	private $image_1;
	private $file_input;
	private $label_with_Content_1;
	private $label_with_Content_2;
	private $label_with_Content_3;
	private $label_with_Content_4;
	private $label_with_Content_5;
	private $logo;
	private $tab_container;
	private $tab_container_1;
	private $tab1;
	private $tab2;
	private $tab3;
	private $tab4;
	private $text_block_1;
	private $text_block_type_1;
	private $textarea_1;
}

?>
