<?php include "../../platform/security/class.all.php" ?>
<?php include "../../platform/user/class.all.php" ?>
<?php include "../../platform/conn/class.conn.php" ?>
<?php 
	date_default_timezone_set("Asia/Shanghai");
	$cur_time = time();
	
	$str="INSERT INTO `MOODLE_time`(time) VALUES ($cur_time)";	

	$result = db_query($str);
	
?>