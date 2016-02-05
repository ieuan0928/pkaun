<?php

final class SiteHelper {
	public function StartSession() {
		$phpVersion = phpversion();
		
		if (version_compare(phpversion(), '5.4.0') >= 0) {
			if (session_status() == PHP_SESSION_NONE) session_start(); 		
		}
		else { 
			if (session_id() == '')  session_start(); 
		}

	}
}

?>