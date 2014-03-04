<?php include "../../platform/security/class.all.php" ?>
<?php include "../../platform/user/class.all.php" ?>
<?php include "../../platform/conn/class.conn.php" ?>	
<?php
	$userid=cur_user_id();
	if (!check_login()) {echo "<a href='login.php'>Login Again</a>"; exit();}
	//annonce
	//display all for core
	$result = db_query("SELECT * FROM `MOODLE_meetings` WHERE `type`=1 AND (`status`=2 OR `role1`=$userid) ORDER BY id ASC"); 					
	if (get_user_role($userid)==0){
		$result = db_query("SELECT * FROM `MOODLE_meetings` WHERE `type`=1 ORDER BY id ASC"); 					
	}
	$html='';
	while($row = mysql_fetch_array($result))
		{
			$id = $row['id'];
			$role1 = $row['role1'];
			$time = $row['time'];
			$location = $row['location'];
			$about = $row['about'];
			$status = $row['status'];
			if ($status=="0"){ //waiting for the CORE
				$check='<div style="color:blue;">Pending</div>';
				if (get_safe_cookie("role")==0){
					$check="<button class='btn' onclick='approve($id)'>Accept</button>
						    <button class='btn' onclick='reject($id)'>Reject</button>";
				}
			} else if ($status=="2") {
				$check='<div style="color:green;">Accepted</div>';
			}	else if ($status=="-2"){
				$check='<div style="color:red;">Rejected</div>';
			}
			
            $timeEdit = "";
            if (get_safe_cookie("role")==0){
                $timeEdit = "<span class='time-edit btn' onclick='changeMeetingTime($id)'>Edit</span>";
            }
            
			$txt='<tr class="record">';
			
			$txt=$txt.'<td><div class="name">'.get_user_name($role1).'</div></td>';
			$txt=$txt.'<td class="about"><div>'.$about.'</div></td>';
			$txt=$txt.'<td><div class="time">'.$time." ".$timeEdit.'</div></td>';
			$txt=$txt.'<td class="location"><div>'.$location.'</div></td>';
			$txt=$txt.'<td class="status">'.$check.'</td>';
			
			$txt=$txt.'</tr>';
			
			$html = $txt.$html;
       
		}
	echo "<div class='title'><h4> Announcement 新闻发布会</h4></div>";
	$html='<table id="announcement" class="table table-striped table-bordered table-hover"><tr><th>Host</th><th>Description</th><th>Time</th><th>Location</th><th>Status</th></tr>'.$html."</table>";
	echo $html;
?>
<?php
	$userid=cur_user_id();
	
	if(get_user_role($userid)!=0){
		$result = db_query("SELECT * FROM `MOODLE_meetings` WHERE `type`=2 ORDER BY id ASC"); 					
		$html='';
		while($row = mysql_fetch_array($result))
			{
				$id = $row['id'];
				$role1 = $row['role1'];
				$role2 = $row['role2'];
				if (($role1!=$userid)&&($role2!=$userid)) continue;
				$apply = $role1==$userid;
				$with = $apply?$role2:$role1;
				
				$time = $row['time'];
				$location = $row['location'];
				$about = $row['about'];
				
				
				$status = $row['status'];
				switch ($status)
					{
						case -2:
							$check='<div style="color:red">Rejected By <strong>C.O.R.E</strong></div>';
							break; 
						case -1:   
							$check='<div style="color:red">Rejected By <strong>'.get_user_name($role2).'</strong></div>';
							break; 
						case 0:    
							$check='<div style="color:blue">Pending For <strong>'.get_user_name($role2).'</strong></div>';
							if (!$apply) {
								$check="<button class='btn' onclick='approve($id)'>Accept</button>
										<button class='btn' onclick='reject($id)'>Reject</button>";						
							}
							break; 
						case 1:    
							$check='<div style="color:blue">Pending For C.O.R.E</div>';
							break; 
						case 2:    
							$check='<div style="color:green">Accepted</div>';
							break;
					}
				
				
				$txt='<tr class="record">';
				
				$txt=$txt.'<td><div class="name">'.get_user_name($with).'</div></td>';
				$txt=$txt.'<td class="about"><div>'.$about.'</div></td>';
				$txt=$txt.'<td><div class="time">'.$time.'</div></td>';
				$txt=$txt.'<td class="location"><div>'.$location.'</div></td>';
				$txt=$txt.'<td class="status">'.$check.'</td>';
				
				$txt=$txt.'</tr>';
				
				$html = $txt.$html;
		
			}
		echo "<div class='title'><h4> Meetings 申请会谈/采访</h4></div>";
		$html='<table id="cabinet_talks" class="table table-striped table-bordered table-hover"><tr><th>With</th><th>Description</th><th>Time</th><th>Location</th><th>Status</th></tr>'.$html."</table>";
		echo $html;
	} else 	{
		$result = db_query("SELECT * FROM `MOODLE_meetings` WHERE `type`=2 ORDER BY id ASC"); 					
		$html='';
		while($row = mysql_fetch_array($result))
			{
				$id = $row['id'];
				$role1 = $row['role1'];
				$role2 = $row['role2'];
				$apply = $role1==$userid;
				$with = $apply?$role2:$role1;
				
				$time = $row['time'];
				$location = $row['location'];
				$about = $row['about'];
				
				
				$status = $row['status'];
				switch ($status)
					{
						case -2:
							$check='<div style="color:red">Rejected By <strong>C.O.R.E</strong></div>';
							break; 
						case -1:   
							$check='<div style="color:red">Rejected By <strong>'.get_user_name($role2).'</strong></div>';
							break; 
						case 0:    
							$check='<div style="color:blue">Pending For <strong>'.get_user_name($role2).'</strong></div>';
							break; 
						case 1:    
							$check="<div style='color:blue'>
										<button class='btn' onclick='approve($id)'>Accept</button>
										<button class='btn' onclick='reject($id)'>Reject</button>
									</div>";
							break; 
						case 2:    
							$check='<div style="color:green">Accepted</div>';
							break;
					}
				
				
				$txt='<tr class="record">';
				
				$txt=$txt.'<td><div class="name">'.get_user_name($role1).'</div></td>';
				$txt=$txt.'<td><div class="name">'.get_user_name($role2).'</div></td>';
				$txt=$txt.'<td class="about"><div>'.$about.'</div></td>';
				$txt=$txt.'<td><div class="time">'.$time.'</div></td>';
				$txt=$txt.'<td class="location"><div>'.$location.'</div></td>';
				$txt=$txt.'<td class="status">'.$check.'</td>';
				
				$txt=$txt.'</tr>';
				 
				$html = $txt.$html;
		
			}
		echo "<div class='title'><h4> Meetings 会谈/采访</h4></div>";
		$html='<table class="table table-striped table-bordered table-hover" id="cabinet_talks"><thead><tr><th>Role A</th><th>Role B</th><th>Description</th><th>Time</th><th>Location</th><th>Status</th></tr></thead><tbody>'.$html."</tbody></table>";
		echo $html;
	}
?>
