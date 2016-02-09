<?php

require_once('/ezframework/common/scriptMapper.php');

class InlineScript extends ScriptMapper {
	
	private $script;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "script":
				return $this->script;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName, $value))) {
			case "script":
				$this->script = $value;
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
}

?>