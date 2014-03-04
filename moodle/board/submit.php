<?php include "../../platform/security/class.all.php" ?>
<?php include "../../platform/user/class.all.php" ?>
<?php include "../../platform/conn/class.conn.php" ?>
<?php 
	$content = $_POST["content"];
	$content = addslashes($content);
	
	$str="INSERT INTO `MOODLE_board`(content) VALUES ('$content')";	

	$result = db_query($str);
	
	header("location: ../../index.php");
?>