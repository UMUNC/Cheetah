<?php include "../../platform/security/class.all.php" ?>
<?php include "../../platform/user/class.all.php" ?>
<?php include "../../platform/conn/class.conn.php" ?>
<?php include "function.php" ?>
<?php
	$oid = 0;
	if ($_GET["oid"]!="") $oid = $_GET["oid"];
	$targetid = $_GET["targetid"];
?>
<html>
	<head>
		<title>Cheetah @UMUNC </title>
		<script src="../../js/jquery-1.9.0-min.js"></script>
		<script src="../../js/jquery-migrate-1.0.0.js"></script>
		<script src="../../js/jquery.form.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<link href="../../css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="favicon.ico"  type="image/x-icon" />
		<style>
			#order_textarea13,#order_textarea15{
				height: 200px;
			}
		</style>
	</head>
	<body style="padding:20px">
		<form method="POST" action="set_order.php" >
			<input type="hidden" name="oid" value="<?php echo $oid; ?>">
			<h4>Target: <?php echo get_user_name($targetid); ?></h4>
			<br />
			<?php
				foreach ($Cabinet_table->type as $otypeid){
					?>
					<?php echo $Cabinet_table->show_typename($otypeid);?>: <textarea type="text" id="order_textarea<?php echo $otypeid;?>" style="width:400px;margin-left:20px;" name="<?php echo $otypeid; ?>"><?php if ($oid==0 )echo $otypeid.$Cabinet_table->show_typename($otypeid); else echo $Cabinet_table->show_ocontent($oid,$otypeid); ?></textarea>
						<br />
					<?php
				}
			?>
			<input type="submit" value="Submit" class="btn btn-primary"/>
		</form>
	</body>
</html>