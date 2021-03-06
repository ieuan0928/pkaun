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
require_once('/ezframework/uielements/tabItem.php');
require_once('/ezframework/uielements/tabControl.php');
require_once('/ezframework/uielements/tabContainer.php');
require_once('/datahelper/group.php');
require_once('/ezframework/uielements/contentControl.php');
require_once('/ezframework/enum/tagType.php');
require_once('/ezframework/uielements/textBlock.php');
require_once('/ezframework/uielements/sliderContainer.php');
require_once('/ezframework/uielements/sliderControl.php');

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
		$this->panel12 = new Panel();
		$this->tab_panel = new TabItem();
		$this->tab_panel_1 = new TabItem();
		$this->tab_panel_2 = new TabItem();
		$this->tab_panel_3 = new TabItem();
		$this->tab_panel_4 = new TabItem();
		$this->tab_panel_5 = new TabItem();
		
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
		
		$this->slider_1 = new SliderContainer();
		$this->slide_1 = new SliderControl();
		$this->slide_2 = new SliderControl();
		$this->slide_3 = new SliderControl();
		
		$this->panel_for_slide_1 = new Panel();
		$this->label_for_slide_1 = new Label();
		$this->img_for_slide_1 = new Image();
		
		$this->panel_for_slide_2 = new Panel();
		$this->label_for_slide_2 = new Label();
		$this->img_for_slide_2 = new Image();
		
		$this->panel_for_slide_3 = new Panel();
		$this->label_for_slide_3 = new Label();
		$this->img_for_slide_3 = new Image();
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
		
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$this->label_1->Get("anchor")->Set("anchortop", false);
		$this->label_1->Get("anchor")->Set("anchorleft", true);
		$this->label_1->Get("anchor")->Set("anchorright", false);
		$this->label_1->Get("anchor")->Set("anchorbottom", false);
		
		$this->label_1->Get("margin")->Set("marginleft", "200px");
		$this->label_1->Get("margin")->Set("margintop", "50px");
		
		$this->label_1->Get("size")->Set("height", "50px");
		$this->label_1->Get("size")->Set("width", "200px");
		
		$this->label_1->Set("identifier", "id_label_1");
		$this->label_1->Set("classname", "class_labael_1");
		$this->label_1->Set("value", "header 1 test");
		$this->label_1->Set("header", "h1");
		
		$this->panel12->Set("identifier", "panel_12_id");
		$this->panel12->Set("classname", "panel_12_class");
		
		$this->label_1->Set("parent", $this->panel12);
		$this->panel12->Set("parent", $this);
		
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
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
		$this->textBox1->Set("parent", $this);
		$this->comboBox_1->Set("parent", $this);
		$this->comboBox_2->Set("parent", $this);
		$this->image_1->Set("parent", $this);
		$this->file_input->Set("parent", $this);
		
		//////////////////////////////////////////////////////////TABS/////////////////////////////////////////////////////////////////////////
		
		$this->tab_container->Set("identifier", "tab_cont_id");
		$this->tab_container->Set("classname", "tab_cont_class");
		
		$this->tab_panel->Set("identifier", "tab_panel_id");
		$this->tab_panel->Set("classname", "tab_panel_class");
		$this->label_with_Content_1->Set("parent", $this->tab_panel);
		
		$this->tab_panel_1->Set("identifier", "tab_panel_1_id");
		$this->tab_panel_1->Set("classname", "tab_panel_1_class");
		$this->label_with_Content_2->Set("parent", $this->tab_panel_1);
		
		$this->tab_panel_2->Set("identifier", "tab_panel_2_id");
		$this->tab_panel_2->Set("classname", "tab_panel_2_class");
		$this->label_with_Content_1->Set("parent", $this->tab_panel_2);
		
		$this->tab_panel_3->Set("identifier", "tab_panel_3_id");
		$this->tab_panel_3->Set("classname", "tab_panel_3_class");
		$this->label_with_Content_3->Set("parent", $this->tab_panel_3);
		
		$this->tab_panel_4->Set("identifier", "tab_panel_4_id");
		$this->tab_panel_4->Set("classname", "tab_panel_4_class");
		$this->label_with_Content_1->Set("parent", $this->tab_panel_4);
		
		$this->tab_panel_5->Set("identifier", "tab_panel_5_id");
		$this->tab_panel_5->Set("classname", "tab_panel_5_class");
		$this->label_with_Content_4->Set("parent", $this->tab_panel_5);
		
		$this->tab1->Set("identifier", "id_tab_1");
		$this->tab1->Set("classname", "class_tab_1");
		$this->tab1->Set("status", "active");
		$this->tab1->Set("headerpanel", $this->tab_panel);
		$this->tab1->Set("bodypanel", $this->tab_panel_1);
		
		$this->tab2->Set("identifier", "id_tab_2");
		$this->tab2->Set("classname", "class_tab_2");
		$this->tab2->Set("status", "inactive");
		$this->tab2->Set("headerpanel", $this->tab_panel_2);
		$this->tab2->Set("bodypanel", $this->tab_panel_3);
	
		$this->tab3->Set("identifier", "id_tab_3");
		$this->tab3->Set("classname", "class_tab_3");
		$this->tab3->Set("status", "inactive");
		$this->tab3->Set("headerpanel", $this->tab_panel_4);
		$this->tab3->Set("bodypanel", $this->tab_panel_5);
		
		$this->tab_container->Set("tabs", $this->tab1);
		$this->tab_container->Set("tabs", $this->tab2);
		$this->tab_container->Set("tabs", $this->tab3);
		$this->tab_container->Set("parent", $this);
		
		$this->tab_container_1->Set("identifier", "tab_cont_id_1");
		$this->tab_container_1->Set("classname", "tab_cont_class_1");
		
		$this->tab_container_1->Set("tabs", $this->tab1);
		$this->tab_container_1->Set("tabs", $this->tab2);
		$this->tab_container_1->Set("tabs", $this->tab3);
		$this->tab_container_1->Set("parent", $this);
		
		//////////////////////////////////////////////////////////TAB END//////////////////////////////////////////////////////////////////////////////////////
		
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
		
		/*$this->tab_container_1->Set("identifier", "tab_cont_id_1");
		$this->tab_container_1->Set("classname", "tab_cont_class_1");
		$this->tab_container_1->Set("parent", $this);*/

		////////////////////////////////////////////////SLIDER//////////////////////////////////////////////////////////////////
		
		$this->slider_1->Set("identifier", "slider_id_1");
		$this->slider_1->Set("classname", "slider_class_1");
		$this->slider_1->Set("parent", $this);
		
		$this->slide_1->Set("identifier", "slide_1_id");
		$this->slide_1->Set("classname", "slide_1_class");
		$this->slide_1->Set("content", $this->panel_for_slide_1);
		$this->slide_1->Set("parent", $this->slider_1);
		
		$this->panel_for_slide_1->Set("identifier", "panel_for_slide_1_id");
		$this->panel_for_slide_1->Set("classname", "panel_for_slide_1_class");
		
		$this->label_for_slide_1->Set("identifier", "label_for_slide_1_id");
		$this->label_for_slide_1->Set("classname", "label_for_slide_1_class");
		$this->label_for_slide_1->Set("value", "SLIDE ONE");
		$this->label_for_slide_1->Set("header", "h6");
		$this->label_for_slide_1->Set("parent", $this->panel_for_slide_1);
		
		$this->img_for_slide_1->Set("identifier", "img_for_slide_1_id");
		$this->img_for_slide_1->Set("classname", "img_for_slide_1_class");
		$this->img_for_slide_1->Set("image_path", "resources/Numbuh_1.jpg");
		$this->img_for_slide_1->Set("parent", $this->panel_for_slide_1);
		
		/////////////////////////////////////////////////////////////////////////////////////////////////
		
		$this->slide_2->Set("identifier", "slide_2_id");
		$this->slide_2->Set("classname", "slide_2_class");
		$this->slide_2->Set("content", $this->panel_for_slide_2);
		$this->slide_2->Set("parent", $this->slider_1);
		
		$this->panel_for_slide_2->Set("identifier", "panel_for_slide_2_id");
		$this->panel_for_slide_2->Set("classname", "panel_for_slide_2_class");
		
		$this->label_for_slide_2->Set("identifier", "label_for_slide_2_id");
		$this->label_for_slide_2->Set("classname", "label_for_slide_2_class");
		$this->label_for_slide_2->Set("value", "SLIDE TWO");
		$this->label_for_slide_2->Set("header", "h6");
		$this->label_for_slide_2->Set("parent", $this->panel_for_slide_2);
		
		$this->img_for_slide_2->Set("identifier", "img_for_slide_2_id");
		$this->img_for_slide_2->Set("classname", "img_for_slide_2_class");
		$this->img_for_slide_2->Set("image_path", "resources/Numbuh_1.jpg");
		$this->img_for_slide_2->Set("parent", $this->panel_for_slide_2);
		
		/////////////////////////////////////////////////////////////////////////////////////////////////
		
		$this->slide_3->Set("identifier", "slide_3_id");
		$this->slide_3->Set("classname", "slide_3_class");
		$this->slide_3->Set("content", $this->panel_for_slide_3);
		$this->slide_3->Set("parent", $this->slider_1);
		
		$this->panel_for_slide_3->Set("identifier", "panel_for_slide_3_id");
		$this->panel_for_slide_3->Set("classname", "panel_for_slide_3_class");
		
		$this->label_for_slide_3->Set("identifier", "label_for_slide_3_id");
		$this->label_for_slide_3->Set("classname", "label_for_slide_3_class");
		$this->label_for_slide_3->Set("value", "SLIDE THREE");
		$this->label_for_slide_3->Set("header", "h6");
		$this->label_for_slide_3->Set("parent", $this->panel_for_slide_3);
		
		$this->img_for_slide_3->Set("identifier", "img_for_slide_3_id");
		$this->img_for_slide_3->Set("classname", "img_for_slide_3_class");
		$this->img_for_slide_3->Set("image_path", "resources/Numbuh_1.jpg");
		$this->img_for_slide_3->Set("parent", $this->panel_for_slide_3);
		
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
	private $panel12;
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
	private $tab_panel;
	private $tab_panel_1;
	private $tab_panel_2;
	private $tab_panel_3;
	private $tab_panel_4;
	private $tab_panel_5;
	
	private $text_block_1;
	private $text_block_type_1;
	private $textarea_1;
	
	private $slider_1;
	private $slide_1;
	private $panel_for_slide_1;
	private $label_for_slide_1;
	private $img_for_slide_1;
	private $slide_2;
	private $panel_for_slide_2;
	private $label_for_slide_2;
	private $img_for_slide_2;
	private $slide_3;
	private $panel_for_slide_3;
	private $label_for_slide_3;
	private $img_for_slide_3;
}

?>
