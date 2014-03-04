<?php include "../../platform/security/class.all.php" ?>
<?php include "../../platform/user/class.all.php" ?>
<?php include "../../platform/conn/class.conn.php" ?>
<?php include "function.php" ?>
<?php 
	$oid = $_POST["oid"];
	if ($oid=='0'){
		$str = "SELECT MAX(oid) AS `maxoid` FROM `MOODLE_IPC_table` ";
		$result = db_query($str);
		while($row = mysql_fetch_array($result)){
			$max_oid = $row["maxoid"];
		}
		$oid = $max_oid+1;
		foreach ($IPC_table->type as $otypeid){
			$str = "INSERT INTO `MOODLE_IPC_table`(`oid`,`otypeid`,`ocontent`) ";
			$str = $str . "VALUES($oid,$otypeid,'') ;";
			//echo $str."<br />";
			db_query($str);
		}
	}
	
	
	$str = "UPDATE `MOODLE_IPC_table` ";
	foreach ($IPC_table->type as $otypeid){
		$ocontent = $_POST["$otypeid"];
		$str = "UPDATE `MOODLE_IPC_table` ";
		$str = $str . "SET `ocontent`='$ocontent' ";
		$str = $str . "WHERE `oid`=$oid AND `otypeid`=$otypeid";
		//echo $str."<br />";
		db_query($str);
	}
	header("location: ../../index.php")
?>