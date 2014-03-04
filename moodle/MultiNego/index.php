<?php
	if (get_user_role(cur_user_id())==0){
?>
<?php 
    $cmd = "SELECT * FROM `MOODLE_MultiNego`;";
    $result = db_query($cmd);
?>
<table id="multinego-table" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>About</th>
            <th>USA</th>
            <th>PRC</th>
            <th>JPN</th>
            <th>RUS</th>
            <th>GBR</th>
            <th>Status</th>
            <th>Location</th>
            <th>Time</th>
        </tr>
    <thead>
    <tbody>
        <?php
            while($row = mysql_fetch_array($result)){
				$str =  "<tr><td>".$row["about"]."</td>";
				$str .=  "<td>".$row["USA"]."</td>";
				$str .=  "<td>".$row["PRC"]."</td>";
				$str .=  "<td>".$row["JPN"]."</td>";
				$str .=  "<td>".$row["RUS"]."</td>";
				$str .=  "<td>".$row["GBR"]."</td>";
				$str .=  "<td>".$row["status"]."</td>";
				$str .=  "<td>".$row["location"]."</td>";
				$str .=  "<td>".$row["time"]."</td></tr>";
                echo $str;
			}
        ?>
    </tbody>
</table>
<?php
	} else {
		echo "no access to Moodle Multi-Nego";
	}
?>