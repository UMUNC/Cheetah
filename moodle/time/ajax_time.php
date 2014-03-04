<?php include "../../platform/security/class.all.php" ?>
<?php include "../../platform/user/class.all.php" ?>
<?php include "../../platform/conn/class.conn.php" ?>	
<?php
if (!check_login()) {echo ""; exit();}
date_default_timezone_set("Asia/Shanghai");
$start_time = mktime(18,0,0,2,8,2014);
$delta=0;

$result = db_query("SELECT * FROM MOODLE_time ORDER BY `id`;");
$flag = 1;
$lasttime=0;

while($row = mysql_fetch_array($result)){
	$curtime = $row["time"];
	if ($flag == 1) $delta += $curtime - $lasttime;
	$flag = 1 - $flag;
	$lasttime = $curtime;
}

if ($flag == 1) $delta += time() - $lasttime;

echo "Real: " . date("<b>H:i</b> M. dS Y") . "<br />"; 
echo "Virtual: " . date("<b>H:i</b> M. dS Y",$start_time+8*$delta) ;

if (get_user_role(cur_user_id())==0) {
	?>
		<script>
			function toggle_time(){
				$.ajax({url:"moodle/time/toggle.php", cache:false, success:function(result){
					var text = $("#toggleTime").html();
					if (text == "Start" )  $("#toggleTime").html("Stop"); else text = $("#toggleTime").html("Start");
				}});
			}
		</script>
		<button class="btn btn-mini" onclick="toggle_time();" id="toggleTime"><?php if ($flag==0) echo "Start"; else echo "Stop";?></button>
	<?php
}
?>
