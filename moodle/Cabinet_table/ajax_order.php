<?php include "../../platform/security/class.all.php" ?>
<?php include "../../platform/user/class.all.php" ?>
<?php include "../../platform/conn/class.conn.php" ?>	
<?php include "function.php"; ?>
<?php
	if (!check_login()) {echo "<a href='login.php'>Login Again</a>"; exit();}
	if(get_user_role(cur_user_id())<=1){
?>
<tbody>
	<tr>
		<?php
			if (get_user_role(cur_user_id())==0) echo "<th>角色</th>";
			foreach ($Cabinet_table->type as $id)
				{
					echo "<th>";
					echo $Cabinet_table->show_typename($id);
					echo "</th>";	
				}
			if (get_user_role(cur_user_id())==0) echo "<th>Edit</th><th>Delete</th>";
		?>
	</tr>
	<?php
			$Cabinet_table->show_ocontent_all(cur_user_id());
	?>
</tbody>
<?php
	} else {
		echo "No access to MOODLE Order";
	}
?>