<?php include "../../platform/security/class.all.php" ?>
<?php include "../../platform/login/class.all.php" ?>
<?php include "../../platform/conn/class.conn.php" ?>
<?php
	$id = $_GET["id"];
	$str = "DELETE FROM `MOODLE_board` WHERE `id`='$id'";
	db_query($str);
	header("location: ../../index.php")
?>