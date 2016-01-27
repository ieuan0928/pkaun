<?php

require_once('/ezframework/uielements/controlBase.php');

class ComboBox extends ControlBase {	
	private $type;
	private $options = array();
	
	public function Get($propertyName) {
		switch (strtolower(trim($propertyName))) {
			default:
				return parent::Get($propertyName);
				break;
		}
	}
	
	public function Set($propertyName, $value) {
		switch (strtolower(trim($propertyName))) {
			case "type":
				
				if(strtolower(trim($value)) == "dropdown")
				{
					$this->type = "";
				}
				else 
				{
					$this->type = $value;
				}
				
				return true;
				break;
			case "option":
				array_push($this->options, $value);
				return true;
				break; 
			default:
				return parent::Set($propertyName, $value);
				break;	
		}
	}
	
	public function AddOptions()
	{
		$default_option = "<option value=''> -- Select an option -- </option>"; 
		echo $default_option;
			
		foreach($this->options as $opt)
		{
			echo "<option value='$opt'>$opt</option>";
		}
	}
	
	public function Render() {
		$concat = "_comboBOx_container";
		
		echo "<div class='$this->className$concat' id='$this->identifier$concat'>";
		echo "<select id='$this->identifier' class='$this->className' name='$this->name' $this->type>";
		$this->AddOptions();
		echo "</select>"; 
		echo "</div>";
	}
}

?>