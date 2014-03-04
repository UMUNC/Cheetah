<?php
	function get_user_relation($userid){
		$result = db_query("SELECT * FROM `USER_relation` WHERE `userid`='$userid'");
		while($row = mysql_fetch_array($result)){
			return $row["targetid"];
		}
		return $userid;
	}
	
	function get_user_name($userid){
		$result = db_query("SELECT * FROM `USER` WHERE `userid`='$userid'");
		while($row = mysql_fetch_array($result)){
			return $row["username"];
		}
		return "";
	}	
	
	function get_user_role($userid){
		$result = db_query("SELECT * FROM `USER` WHERE `userid`='$userid'");
		while($row = mysql_fetch_array($result)){
			return $row["role"];
		}
		return "";
	}	
	
	function get_user_notation($userid){
		$result = db_query("SELECT * FROM `USER` WHERE `userid`='$userid'");
		while($row = mysql_fetch_array($result)){
			return $row["notation"];
		}
		return "";
	}
?>