
<?php //echo "You are talking to ".get_user_notation(get_user_relation(cur_user_id()))."</ br>" ?> 
<?php 
	if(get_user_role(cur_user_id())<=1){
?>
<form id="talksendbox" method="POST" action="moodle/talk/sendmsg.php">
		<input type="hidden" name="toid" id="talkbox_toid" value="<?php echo get_user_relation(cur_user_id());?>"/>
		<textarea id="msgcontent" name="content"></textarea>
		<input type="hidden" name="inuse" value="true"/> 
		<input type="submit" id="btn_talksendbox" value="Send" class="btn btn-primary"/>
		<button id="btnfake_talksendbox"  class="btn btn-primary" disabled="true" style="display:none;"/>Sending</button>
</form>
<?php
	if (get_user_role(cur_user_id())==0){
		for ($i=5;$i<=9;$i++){
			echo "<button class='btn btn_usertalkbox' id='btn_usertalkbox$i'>".get_user_name($i)."</button>";
		}
			echo "<button class='btn btn_usertalkbox' id='btn_usertalkbox15'>".get_user_name(15)."</button>";
	}
?>
<?php 
		include "talkbox.php"; 
	} else {
		echo "no access to Moodle Talk";
	}//role if 
?> 
