<?php include "../../platform/security/class.all.php" ?>
<?php include "../../platform/user/class.all.php" ?>
<?php include "../../platform/conn/class.conn.php" ?>
<?php 
    $id = $_GET["id"];
    $userrole = get_safe_cookie("role");
    if ($_GET["action"]=="time"){
        if ($userrole == 0){
           $time = addslashes(htmlspecialchars($_GET["time"]));
           $err = db_query("UPDATE `MOODLE_meetings` SET `time`='$time' WHERE `id`=$id"); 	
        }   
    } 
    else 
    {
        $action = $_GET["action"]=="acc"?1:-1;	
        $userid = cur_user_id();
       
        function setstatus($status){
            $id = $_GET["id"];	
            $err = db_query("UPDATE `MOODLE_meetings` SET `status`=$status WHERE `id`=$id"); 	
            exit();
        }
    
        $result = db_query("SELECT * FROM `MOODLE_meetings` WHERE `id`=$id"); 					
        
        while($row = mysql_fetch_array($result)){
            $role1 = $row['role1'];
            $role2 = $row['role2'];
            $type = $row['type'];
            
            if ($userrole==0){
                setstatus($action*2);
            }	else {
                if ($action==1)
                    setstatus(2);
                setstatus($action);
            }
        }
    }
?>