<?php 

require_once("/ezframework/uielements/containerControl.php");

abstract class PageBase extends ContainerControl {
	public abstract function CreateElements(); 
}
   
?>