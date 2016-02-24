<?php
require_once('/ezframework/uielements/contentControl.php');
require_once('/ezframework/uielements/controlBase.php');

class Label extends ControlBase {
	public function __construct() {
		$this->content = new ContentControl();
		parent::__construct();
	}
		
	private $value;
	private $header = "h1";
	private $content;
	private $anchorTop, $anchorLeft, $anchorRight, $anchorBottom, $top, $left, $right, $bottom, $marginLeft, $marginRight, $marginTop, $marginBottom;
	private $width, $height;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "value":
				$this->value = $value;
				return true;
				break;
			case "header":
				$this->header = $value;
				return true;
				break;
			case "content":
				$this->content->Set("content", $value);
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;	
		}
	}
	
	public function Render() {
		$concat = "_label_container";
		$class_append = "";
		$style_append = "";
		
		$this->anchorTop = $this->Get("anchor")->Get("anchortop");
		$this->anchorLeft = $this->Get("anchor")->Get("anchorleft");
		$this->anchorRight = $this->Get("anchor")->Get("anchorright");
		$this->anchorBottom = $this->Get("anchor")->Get("anchorbottom");
		
		$this->top = $this->Get("margin")->Get("top");
		$this->left = $this->Get("margin")->Get("left");
		$this->right = $this->Get("margin")->Get("right");
		$this->bottom = $this->Get("margin")->Get("bottom");
		
		$this->marginTop = $this->Get("margin")->Get("margintop");
		$this->marginLeft = $this->Get("margin")->Get("marginleft");
		$this->marginRight = $this->Get("margin")->Get("marginright");
		$this->marginBottom = $this->Get("margin")->Get("marginbottom");
		
		$this->width = $this->Get("size")->Get("width");
		$this->height = $this->Get("size")->Get("height");
		
		echo "<div class='$this->className$concat";
		
		if($this->anchorTop == 1)
		{
			$class_append .= " top";
		}
		if($this->anchorRight == 1)
		{
			$class_append .= " right";
		}
		if($this->anchorLeft == 1)
		{
			$class_append .= " left";
		}
		if($this->anchorBottom == 1)
		{
			$class_append .= " bottom";
		}
		
		echo $class_append;
		
		echo "' id='$this->identifier$concat'>";
		echo "<$this->header id='$this->identifier' class='$this->className'>$this->value</$this->header>"; 
		$this->content->Render(); 
		echo "</div>";
	}
}

?>