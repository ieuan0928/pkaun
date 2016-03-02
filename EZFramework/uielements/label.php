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
	private $anchorTop, $anchorLeft, $anchorRight, $anchorBottom, $top, $left, $right, $bottom, $marginLeft, $marginRight, $marginTop, $marginBottom, $width, $height;
	
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
		$anchor_active = 0;
		$anchor_base_class = "anchored_element";
		$class_append = "";
		$style_append = "";
		
		$this->anchorTop = $this->Get("anchor")->Get("anchortop");
		$this->anchorLeft = $this->Get("anchor")->Get("anchorleft");
		$this->anchorRight = $this->Get("anchor")->Get("anchorright");
		$this->anchorBottom = $this->Get("anchor")->Get("anchorbottom");
		
		if($this->anchorTop == 1)
		{
			$anchor_active = 1;
			$class_append .= " anchorTop";
		}
		if($this->anchorRight == 1)
		{
			$anchor_active = 1;
			$class_append .= " anchorRight";
		}
		if($this->anchorLeft == 1)
		{
			$anchor_active = 1;
			$class_append .= " anchorLeft";
		}
		if($this->anchorBottom == 1)
		{
			$anchor_active = 1;
			$class_append .= " anchorBottom";
		}

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
		
		$style_append .= "style='";
		
		if(!empty($this->top))
		{
			$style_append .= " top:" . $this->top . ";";
		}
		if(!empty($this->left))
		{
			$style_append .= " left:" . $this->left . ";";
		}
		if(!empty($this->right))
		{
			$style_append .= " right:" . $this->right . ";";
		}
		if(!empty($this->bottom))
		{
			$style_append .= " bottom:" . $this->bottom . ";";
		}
		
		if(!empty($this->marginTop))
		{
			$style_append .= " margin-top:" . $this->marginTop . ";";
		}
		if(!empty($this->marginLeft))
		{
			$style_append .= " margin-left:" . $this->marginLeft . ";";
		}
		if(!empty($this->marginRight))
		{
			$style_append .= " margin-right:" . $this->marginRight . ";";
		}
		if(!empty($this->marginBottom))
		{
			$style_append .= " margin-bottom:" . $this->marginBottom . ";";
		}
							
		if(!empty($this->width))
		{
			$style_append .= " width:" . $this->width . ";";
		}
		if(!empty($this->height))
		{
			$style_append .= " height:" . $this->height . ";";
		}		
							
		$style_append .= " '";
		
		echo "<div class='$this->className$concat";
		echo $class_append;
		
		if($anchor_active == 1)
		{
			echo " " . $anchor_base_class;
		}
		
		echo "' ";
		echo $style_append;
		echo "id='$this->identifier$concat'>";
		echo "<$this->header id='$this->identifier' class='$this->className'>$this->value</$this->header>"; 
		$this->content->Render(); 
		echo "</div>";
	}
}

?>