<?php
header("Access-Control-Allow-Origin: *");
$link = new mysqli('localhost', 'root', '', 'project');
mysqli_set_charset($link, 'utf8');

		//insert data
		$sql = "SELECT Rehearse_time,Rehearse_jump FROM rehearse WHERE Rehearse_id = (SELECT MAX(Rehearse_id) FROM rehearse)";
		$result = mysqli_query($link, $sql);
		$num = mysqli_num_rows($result);
		$arr = array();
		$Err="";
		if($num > 0){
			while($row = mysqli_fetch_assoc($result)){
				 $arr[] = $row;
			}
			echo json_encode($arr);
		}else{
		   echo json_encode("not");
		}
		mysqli_close($link);
	   ?>