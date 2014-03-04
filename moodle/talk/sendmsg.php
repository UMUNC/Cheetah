<?php include "../../platform/security/class.all.php" ?>
<?php include "../../platform/user/class.all.php" ?>
<?php include "../../platform/conn/class.conn.php" ?>
<?php 
	date_default_timezone_set("Asia/Shanghai");
	$fromid = cur_user_id();
	if (!check_login()) {echo ""; exit();}
	$toid = $_POST["toid"];
	
	$content = $_POST["content"];
	$content = addslashes(htmlspecialchars($content)) . " <span class='msgtime'>" . date("H:i:s") . "</span>" ;
	$content = addslashes($content) ;
	
	$str="INSERT INTO `MOODLE_talk_msg`(fromid, toid, content) VALUES ($fromid,$toid,'$content')";	

	$result = db_query($str);
	
?> 