<?php

require_once('/ezframework/common/styleMapper.php');

class InlineStyle extends StyleMapper {
	
	private $style;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "style":
				return $this->style;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName, $value))) {
			case "style":
				$this->style = $value;
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
}

?>