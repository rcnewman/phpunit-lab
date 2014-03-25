<?php

class Input {
	public static function get($key, $value = ''){
		if($value !== ''){
			$_GET[$key] = $value;
		} 
		if(isset($_GET[$key])){
			return $_GET[$key];	
		} else {
			return null;
		}
	}
}
?>