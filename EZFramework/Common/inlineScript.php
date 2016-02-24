<?php

require_once('/ezframework/common/scriptMapper.php');

class InlineScript extends ScriptMapper {
	
	private $script;
	private $uniqueId;
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "script":
				return $this->script;
				break;
			case "uniqueid":
				return $this->uniqueId;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "script":
				$this->script = $value;
				return true;
				break;
			case "uniqueid":
				$this->uniqueId = $value;
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
}

?>