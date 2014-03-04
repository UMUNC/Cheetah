<?php
	function db_query($str){
		$con = mysql_connect("localhost","root","BabyBibo1117");
		if (!$con)
		{
		die('Could not connect: ' . mysql_error());
		}
		

		mysql_query("set names 'utf8';");
		mysql_select_db("UMUNC_CHEETAH", $con);
		$result = mysql_query($str);
		mysql_close($con);
		
		return $result;
	}
?>
