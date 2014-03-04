<?php include "moodle/Cabinet_table/function.php"; ?>
<?php
	if(get_user_role(cur_user_id())<=1){
		$targetid = cur_user_id();
		if (get_user_role(cur_user_id())==0){
			?>
				<a href="#add_order_cabinet_box" target="_blank" role="button" class="btn btn-primary" data-toggle="modal">Add New Order</a>
				<div id="add_order_cabinet_box" class="modal hide fade" tabindex="-1" role="dialog">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3>Add an Order</h3>
				</div>
					<form id="cabinet_add_order_box" method="POST" action="moodle/Cabinet_table/set_order.php" >
						<input type="hidden" name="oid" value="0">
						<select name="targetid">
							<?php
								for ($i=5;$i<=9;$i++){
									echo "<option value='$i'>".get_user_name($i)."</option>";
								}
								for ($i=16;$i<=23;$i++){
									echo "<option value='$i'>".get_user_name($i)."</option>";
								}
							?>				
						</select>
							<?php
								foreach ($Cabinet_table->type as $otypeid){
									?>
										<input type="text" name="<?php echo $otypeid; ?>" placeholder="<?php echo $otypeid.' '.$Cabinet_table->show_typename($otypeid); ?>"/>
									<?php
								}
							?> 
						<br />
						<input type="submit" value="Submit" class="btn btn-primary" />
					</form>
				</div>
			<?php
		}
?>	
<script>
	function del_order_cabinet(oid){
		$.ajax({url:"moodle/Cabinet_table/del_order.php?oid="+oid, cache:false, success:function(result){
			ajax_order();
		}});
	}
</script>
<button onclick="ajax_order();$('.popover').hide();" class="btn btn-info">Refresh</button>
<table id="order_table" class="table table-striped table-bordered table-hover">
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
			$Cabinet_table->show_ocontent_all($targetid);
	?>
</table>
<?php
	}
?>
