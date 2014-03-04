<?php
	$url = ".ourbears.cn";
	$md5_code = "AndyXu Cheetah @UMUNC 2013 day 2";

	function set_safe_cookie($name, $value, $duration){ 
		setcookie($name, $value, time() + $duration, "/", $GLOBALS["url"]); 
		$value = md5($value.$GLOBALS["md5_code"]);
		setcookie($name."_md5", $value, time() + $duration, "/", $GLOBALS["url"]);
	}
	
	function get_safe_cookie($name){
		if (!isset($_COOKIE[$name])) return "";
		$value = md5($_COOKIE[$name].$GLOBALS["md5_code"]);
		if ($value == $_COOKIE[$name."_md5"]) 
			return $_COOKIE[$name];
		return "";
	}	

?>
