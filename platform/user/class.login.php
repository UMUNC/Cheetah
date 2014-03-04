<?php
	function check_login(){
		$user = get_safe_cookie("userid");
		if ($user != "") return true;
		logout();
		return false;
	}
	function logout(){
		setcookie("userid","",time()-1,"/","cheetah.ourbears.cn");
		setcookie("userid_md5","",time()-1,"/","cheetah.ourbears.cn");
		setcookie("username","",time()-1,"/","cheetah.ourbears.cn");
		setcookie("username_md5","",time()-1,"/","cheetah.ourbears.cn");
		setcookie("role","",time()-1,"/","cheetah.ourbears.cn");
		setcookie("role_md5","",time()-1,"/","cheetah.ourbears.cn");
		setcookie("notation","",time()-1,"/","cheetah.ourbears.cn");
		setcookie("notation_md5","",time()-1,"/","cheetah.ourbears.cn");
		set_safe_cookie("userid","",-1);
		set_safe_cookie("username","",-1);
		set_safe_cookie("role","",-1);
		set_safe_cookie("notation","",-1);
	}
	function cur_user_name(){
		return get_safe_cookie("username");
	}
	function cur_user_id(){
		return get_safe_cookie("userid");
	}
	function login($username,$password){
		$result = db_query("SELECT * FROM `USER` WHERE `username`='".$username."'");
		while($row = mysql_fetch_array($result))
			{
				if ($row['password']==$password) {
					set_safe_cookie("userid",$row['userid'],60*60*24*4);
					set_safe_cookie("username",$row['username'],60*60*24*4);
					set_safe_cookie("role",$row['role'],60*60*24*4);
					set_safe_cookie("notation",$row['notation'],60*60*24*4);
					return true;
				}
			}
		return false;
	}
?>