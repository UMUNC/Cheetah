<?php
	class Cabinet_table{
		var $type = array(2,12,3,13,8,14,15,9);
		function show_typename($id){
			$str = "SELECT * FROM `MOODLE_table_typename` WHERE `typeid`='$id'";
			$result = db_query($str);
			$typename = "Unknown";
			while($row = mysql_fetch_array($result)){
				$typename = $row["typename"];
			}
			return $typename;
		}
		function td_modify($oid,$targetid){ 
			if (get_user_role(cur_user_id())!=0) return "";
			return "<td><a target='_blank' href='moodle/Cabinet_table/add_order.php?oid=$oid&targetid=$targetid' class='btn btn-mini btn-warning'>Modify</a></td><td><button class='btn btn-mini btn-danger' onclick='del_order_cabinet($oid);'>Delete</button></td>";
		}
		function show_ocontent_all($targetid){
		
			$str = "SELECT * FROM `MOODLE_Cabinet_table` WHERE `targetid`=$targetid ORDER BY `oid` DESC, `otypeid` ASC";
			if (get_user_role(cur_user_id())==0){
				$str = "SELECT * FROM `MOODLE_Cabinet_table` ORDER BY `oid` DESC, `otypeid` ASC";
			}
			$result = db_query($str);
			$last_oid=0;
			while($row = mysql_fetch_array($result)){
				if (($row["oid"]!=$last_oid) && ($last_oid!=0)) {
					echo "<tr>";
					//role info
					if (get_user_role(cur_user_id())==0)
						echo "<td>".get_user_name($targetid)."</td>";
					foreach ($this->type as $otypeid)
					{
						echo "<td data-content='".$order[$otypeid]."' class='tdpop tdpop_order'>";
						echo $order[$otypeid];
						echo "</td>";	
					}
					echo $this->td_modify($last_oid,$targetid)."</tr>";
				}
				$order[$row["otypeid"]] = $row["ocontent"];
				$targetid = $row["targetid"];
				$last_oid = $row["oid"];
			}
			//the last row
			if ($last_oid!=0) {
				echo "<tr>";
				//role info
				if (get_user_role(cur_user_id())==0)
						echo "<td>".get_user_name($targetid)."</td>";
				foreach ($this->type as $otypeid)
				{
					echo "<td data-content='".$order[$otypeid]."' class='tdpop tdpop_order'>";
					echo $order[$otypeid];
					echo "</td>";	
				}
				echo $this->td_modify($last_oid,$targetid)."</tr>";
			}
		}
		function show_ocontent($oid,$otypeid){
			$str = "SELECT * FROM `MOODLE_Cabinet_table` WHERE `oid`=$oid and `otypeid`=$otypeid";
			$result = db_query($str);
			while($row = mysql_fetch_array($result)){
				return $row["ocontent"];
			}
		}
	}
	$Cabinet_table = new Cabinet_table();
?>