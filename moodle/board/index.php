<?php
	if (get_user_role(cur_user_id())==0){
	?>
		<form method="POST" action="moodle/board/submit.php" style="margin-bottom:0px;">
				<input type="text" name="content"></input>
				<input type="hidden" name="inuse" value="true" /> 
				<input type="submit" value="Change" class="btn btn-mini"/>
		</form>
	<?php
	}
	$result = db_query("SELECT * FROM `MOODLE_board` ORDER BY `id` DESC");
	while($row = mysql_fetch_array($result)){
			$id = $row["id"];
			echo "<div>".$row["content"]."</div>";
			break;
	}
?>