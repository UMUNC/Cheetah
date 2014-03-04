<?php include "../../platform/security/class.all.php" ?>
<?php include "../../platform/user/class.all.php" ?>
<?php include "../../platform/conn/class.conn.php" ?>
<?php
	$oid = $_GET["oid"];
	$str = "DELETE FROM `MOODLE_IPC_table` WHERE `oid`=$oid";
	echo $str;
	db_query($str);
?>