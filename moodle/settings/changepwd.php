<?php include "../../platform/security/class.all.php" ?>
<?php include "../../platform/user/class.all.php" ?>
<?php include "../../platform/conn/class.all.php" ?>
<?php 
	$uid = cur_user_id();
	
	$password = $_POST["password"];
	$password = addslashes($password);
	
	$str="UPDATE `USER` SET `password`='$password' WHERE `userid`=$uid;";	

	$result = db_query($str);
	logout();
	header("location: ../../index.php");
?>