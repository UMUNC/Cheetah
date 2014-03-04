<?php include "../../platform/security/class.all.php" ?>
<?php include "../../platform/user/class.all.php" ?>
<?php include "../../platform/conn/class.all.php" ?>
<?php 
	$uid = cur_user_id();
	
	$content = $uid."|".$_POST["content"]."|".$_POST["contact"];
	$content = addslashes($content);
	
	$str="INSERT INTO `MOODLE_feedback`(content) VALUE('$content')";	

	$result = db_query($str);

	echo "<h4>提交成功！谢谢你的反馈。</h4>";
	echo "<h4>UMUNC 2014</h4>";
?>
