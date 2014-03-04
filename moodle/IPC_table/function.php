<?php
	class IPC_table{
		var $type=array(1,2,12,3,13,8,14,4,15,9);
		
		function show_typename($id){
			$str = "SELECT * FROM `MOODLE_table_typename` WHERE `typeid`='$id'";
			$result = db_query($str);
			$typename = "Unknown";
			while($row = mysql_fetch_array($result)){ 
				$typename = $row["typename"];
			}
			return $typename;
		}
		
		function td_modify($oid){ return "<td><a target='_blank' href='moodle/IPC_table/add_order.php?oid=$oid' class='btn btn-mini btn-warning'>Modify</a></td><td><button class='btn btn-mini btn-danger' onclick='del_order_ipc($oid);'>Delete</button></td>";}
		
		function show_ocontent_all(){
		
			$str = "SELECT * FROM `MOODLE_IPC_table` ORDER BY `oid` DESC, `otypeid` ASC";
			$result = db_query($str);
			$last_oid=0;
			while($row = mysql_fetch_array($result)){
				if (($row["oid"]!=$last_oid) && ($last_oid!=0)) {
					echo "<tr>";
					foreach ($this->type as $otypeid)
					{
						echo "<td data-content='".$order[$otypeid]."' class='tdpop tdpop_ipc'>";
						echo $order[$otypeid];
						echo "</td>";	
					}
					echo $this->td_modify($last_oid)."</tr>";
				}
				$order[$row["otypeid"]] = $row["ocontent"];
				$last_oid = $row["oid"];
			}
			//the last row
			if ($last_oid!=0) {
				echo "<tr>";
				foreach ($this->type as $otypeid)
				{
					echo "<td data-content='".$order[$otypeid]."' class='tdpop tdpop_ipc'>";
					echo $order[$otypeid];
					echo "</td>";	
				}
				echo $this->td_modify($last_oid)."</tr>";
			}
		}
		function show_ocontent($oid,$otypeid){
			$str = "SELECT * FROM `MOODLE_IPC_table` WHERE `oid`=$oid and `otypeid`=$otypeid";
			$result = db_query($str);
			while($row = mysql_fetch_array($result)){
				return $row["ocontent"];
			}
		}
	}
	$IPC_table = new IPC_table();
?>