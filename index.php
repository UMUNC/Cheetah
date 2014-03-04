<?php //header("location: http://portal.ourbears.cn/feedback/"); exit();?>
<?php include "platform/security/class.all.php" ?>
<?php include "platform/user/class.all.php" ?>
<?php include "platform/conn/class.conn.php" ?>
<?php
	if (!check_login()){ 
		header("location: login.php"); 
		exit();
	}
	function moodle_load($moodle){
		echo "<div>";
			include "moodle/$moodle/index.php";
		echo "</div>";
	}
?>
<!doctype html>
<html>
	<head>
		<title>Cheetah @UMUNC </title>
		<script src="./js/jquery-1.9.0-min.js"></script>
		<script src="./js/jquery-migrate-1.0.0.js"></script>
		<script src="./js/jquery.form.js"></script>
		<script src="./js/bootstrap.min.js"></script>
		<link href="./css/bootstrap.min.css" rel="stylesheet">
		<link href="./css/index.css" rel="stylesheet">
		<script src="./js/cookie.js"></script>
		<script src="./js/index.js"></script>
		<script src="./js/ajax.js"></script>
		<link rel="shortcut icon" href="favicon.ico"  type="image/x-icon" />
	</head>
	<body>
		<div id="header"> 
			<img id="logo" src="./img/cheetah_logo_white.png"/>
			<div id="time">
				<?php moodle_load("time"); ?>
			</div>
			<div id="board">
				<?php moodle_load("board"); ?>  
			</div>
			<div id="cur_user"> Current User:  <?php echo cur_user_name(); ?>
				(<?php echo get_user_notation(cur_user_id()); ?>)
			</div>
			<div id="control">
				<a href="./login.php" class="btn btn-inverse btn-mini" id="logout">
					Log Out <i class="icon-chevron-right icon-white"></i>
				</a>
			</div>
		</div> 
		<div id="menu"> 
			<ul class="nav nav-tabs nav-stacked">
				<li><a onclick="show('talk')"><i class="icon-retweet"></i> Talk</a></li>
				<!-- <li><a onclick="show('order')"><i class="icon-share"></i> Order </a></li>-->
				<li><a onclick="show('meetings')"><i class="icon-resize-small"></i> Meetings</a></li>
				<!--<li><a onclick="show('multi-nego')"><i class="icon-globe"></i> Multi-Nego</a></li>-->
				<li><a onclick="show('settings')"><i class="icon-wrench"></i> Settings</a></li>
				<li><a onclick="show('feedback')"><i class="icon-question-sign"></i> Feedback</a></li>
				<li><a onclick="show('IPC')"><i class="icon-random"></i> IPC </a></li> 
			</ul>
		</div>
		<div id="main">
			<div id="order"> 
				<?php //moodle_load("Cabinet_table"); ?>
			</div> 
			<div id="talk"> 
				<?php moodle_load("talk"); ?>
			</div>
			<div id="meetings">  
				<?php moodle_load("meetings"); ?> 
			</div>
			<div id="settings"> 
				<?php moodle_load("settings"); ?>
			</div>
			<div id="feedback"> 
				<?php moodle_load("feedback"); ?>
			</div>
            <div id="multi-nego"> 
				<?php //moodle_load("MultiNego"); ?>
			</div>
			<div id="IPC"> 
				<?php moodle_load("IPC_table"); ?>
			</div>
		</div>
		<div id="cleaner"></div>
		<div id="footer">
			<a target="_blank" href="http://www.renren.com/bearhsu/">AndyXu</a> @<a href="http://www.umunc.net/">UMUNC</a>
		</div>
	</body>
</html>
