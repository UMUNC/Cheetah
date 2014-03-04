<?php include "platform/security/class.all.php" ?>
<?php include "platform/user/class.all.php" ?>
<?php include "platform/conn/class.all.php" ?>
<?php 
	logout();
	if ($_POST["inuse"]) {
		if (login($_POST["username"],$_POST["password"])){
			header("location: index.php");
		} else {
			//echo "Authentication Failed.";
		}
	}

?>
<!doctype html>
<html>
	<head>
		<title>Login Cheetah @UMUNC </title>
		<script src="./js/jquery-1.9.0-min.js"></script>
		<script src="./js/bootstrap.js"></script>
		<link href="./css/bootstrap.min.css" rel="stylesheet">
		<link href="./css/login.css" rel="stylesheet">
	</head>
	<body>
		<div id="container">
			<div><img src="./img/cheetah_logo.png" width="300px" /></div>
			<div id="divider"></div>
			<div id="login_box">
				<form method="POST">
					<div id="username" class="input-prepend"> 
						<span class="add-on"><i class="icon-user"></i></span> 
						<input type="text" name="username" placeholder="Username" >
					</div>
					
					<div id="password" class="input-prepend"> 
						<span class="add-on"><i class="icon-lock"></i></span>  
						<input type="password" name="password" placeholder="Password" >  
					</div>
					
					<input type="hidden" name="inuse" value="true"> 
					<div id="login" > <input type="submit" class="btn" value="Sign In"> </div>
				</form>
			</div>
		</div>
	</body>
</html>