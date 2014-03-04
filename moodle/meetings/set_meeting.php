<?php include "../../platform/security/class.all.php" ?>
<?php include "../../platform/user/class.all.php" ?>
<?php include "../../platform/conn/class.all.php" ?>
<?php 
	$type = $_POST["meetingType"];
	$role1 = cur_user_id();
	$role2 = $_POST["target"];
	$location =  addslashes(htmlspecialchars($_POST["location"]));
	$time = addslashes(htmlspecialchars( $_POST["time"]));
	$about =  addslashes(htmlspecialchars($_POST["about"]));

	
	$str="INSERT INTO `MOODLE_meetings`(`type`,`role1`,`role2`,`status`,`location`,`time`,`about`) 
			VALUES ($type,$role1,$role2,0,'$location','$time','$about')";	

	$result = db_query($str);
	
	header("location: ../../index.php");
?>
