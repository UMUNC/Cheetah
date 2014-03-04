<div id="IPC_container">
<?php include "moodle/IPC_table/function.php"; ?>
<?php
	if (get_user_role(cur_user_id())==0){
?>
<script>
	function del_order_ipc(oid){
		$.ajax({url:"moodle/IPC_table/del_order.php?oid="+oid, cache:false, success:function(result){
			ajax_IPC();
		}});
	}
</script>
<a href="#add_order_box" target="_blank" role="button" class="btn btn-primary" data-toggle="modal">Add New Order</a>
<button onclick="ajax_IPC();$('.popover').hide();" class="btn btn-info">Refresh</button>
<div id="add_order_box" class="modal hide fade" tabindex="-1" role="dialog">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3>Add an Order</h3>
	</div>
	<?php
		$oid = 0;
		if ($_GET["oid"]!="") $oid = $_GET["oid"];
	?>
	<form id="ipc_add_order_box" method="POST" action="moodle/IPC_table/set_order.php" >
		<input type="hidden" name="oid" value="<?php echo $oid; ?>">
			<?php
				foreach ($IPC_table->type as $otypeid){
					?>
						<input type="text" name="<?php echo $otypeid; ?>" placeholder="<?php if ($oid==0 )echo $otypeid.' '.$IPC_table->show_typename($otypeid); else echo $IPC_table->show_ocontent($oid,$otypeid); ?>"/>
					<?php
				}
			?> 
		<br />
		<input type="submit" value="Submit" class="btn btn-primary" />
	</form>
</div>
<table id="IPC_table" class="table table-striped table-bordered">
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
</table>
<?php
	} else {
		echo "no access to Moodle IPC_table";
	}
?>
</div>