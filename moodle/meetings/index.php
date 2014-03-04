<script>
	function approve(id){
		$.ajax({url:"moodle/meetings/deal.php?id="+id+"&action=acc", cache:false, success:function(result){
			ajax_meetingbox();
		}});
	}
	function reject(id){
		$.ajax({url:"moodle/meetings/deal.php?id="+id+"&action=rej", cache:false, success:function(result){
			ajax_meetingbox();
		}});
	}
    function changeMeetingTime(id){
        var time = prompt("Please set time","");
        $.ajax({url:"moodle/meetings/deal.php?id="+id+"&action=time&time="+time, cache:false, success:function(result){
			ajax_meetingbox();
		}});
    }
</script>
<a id="btn_formbox" href="#formbox" role="button" class="btn btn-primary" data-toggle="modal">Apply a Meeting</a>
<div id="formbox" class="modal hide fade" tabindex="-1" role="dialog" >
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Apply a Meeting</h3>
	</div>
	<form action="moodle/meetings/set_meeting.php" method="POST" id="talkform">
		<div id="typechose">
			<input type="radio" name="meetingType" value="1" onclick="$('#selector').hide();">新闻发布会</input>
			<input type="radio" name="meetingType" value="2" checked="true" onclick="$('#selector').show();";>申请采访</input>
		</div>
		<div id="selector"> 
			with: <select name="target">
				<?php
					for ($i=5;$i<=15;$i++){
						echo "<option value='$i'>".get_user_name($i)."</option>";
					}
				?>
			</select>
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-home"></i></span> 
			<input type="text" name="location" placeholder="Location" maxlength="20"/>
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-time"></i></span> 
			<input type="text" name="time"  placeholder="Time" maxlength="10" />
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-comment"></i></span> 
			<input type="text" name="about" placeholder="About"  maxlength="30"/>
		</div>
		<div><input type="submit" value="Submit" class="btn btn-primary"/></div>
	</form>
</div>
<div id="meetingbox">
	<?php include "meetingbox.php"; ?> 
</div>