<?php include "../../platform/security/class.all.php" ?>
<?php include "../../platform/user/class.all.php" ?>
<?php include "../../platform/conn/class.all.php" ?>
<?php 
	$uid = cur_user_id();
	
	$content = $uid."|".$_POST["content"];
	$content = addslashes(htmlspecialchars($content));
	
	$str="INSERT INTO `MOODLE_feedback`(content) VALUE('$content')";	

	$result = db_query($str);

	header("location: ../../index.php");
?>