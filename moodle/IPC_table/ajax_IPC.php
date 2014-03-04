<?php include "../../platform/security/class.all.php" ?>
<?php include "../../platform/user/class.all.php" ?>
<?php include "../../platform/conn/class.conn.php" ?>	
<?php include "function.php"; ?>
<?php
	if (!check_login()) {echo "<a href='login.php'>Login Again</a>"; exit();}
	if (get_user_role(cur_user_id())==0){
?>
<tbody>
	<tr>
		<?php
			foreach ($IPC_table->type as $id)
				{
					echo "<th>";
					echo $IPC_table->show_typename($id);
					echo "</th>";	
				}
			echo "<th>Edit</th><th>Delete</th>"
		?>
	</tr>

	<?php
			$IPC_table->show_ocontent_all();
	?>
</tbody>
<?php
	} else {
		echo "no access to Moodle IPC_table";
	}
?>
