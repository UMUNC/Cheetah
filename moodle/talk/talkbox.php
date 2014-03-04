<div id="talkbox">
<?php
	if (!$_COOKIE["core_cur_box"]) set_safe_cookie("core_cur_box","5",60*60*24);
	$cur_id=cur_user_id();
	
	if (get_user_role($cur_id)==0){
		$userlist=array(5,6,7,8,9,15);
		foreach ($userlist as $userid){
			echo "<div id='usertalkbox$userid' class='usertalkbox'>";
				$result = db_query("SELECT * FROM MOODLE_talk_msg WHERE (`fromid`=$userid OR `toid`=$userid) ORDER BY `id` DESC LIMIT 40;");
				while($row = mysql_fetch_array($result)){
					if ($row["fromid"]==$cur_id) echo "<div class='to msg'> YOU: ";
						else echo "<div class='from msg'>".get_user_name($userid)." : ";
					echo $row["content"]."</div>";
				} 
			echo "</div>";
		}
	} else {
		$result = db_query("SELECT * FROM MOODLE_talk_msg WHERE `fromid`=$cur_id OR `toid`=$cur_id ORDER BY `id` DESC;");
		while($row = mysql_fetch_array($result)){
				if ($row["fromid"]==$cur_id) echo "<div class='to msg'> YOU: ";
					else echo "<div class='from msg'> CORE: ";
				echo $row["content"]."</div>";
		}
	}
?> 
</div>
