<?php

require_once('/ezframework/common/scriptMapper.php');

class ExternalScript extends ScriptMapper {
	
	private $source;
		
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			case "source":
				return $this->source;
				break;
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "source":
				$this->source = $value;
				return true;
				break;
			default:
				return parent::Set($propertyName, $value);
				break;
		}
	}
}

?>