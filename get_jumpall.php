<?php
header("Access-Control-Allow-Origin: *");
$link = new mysqli('localhost', 'root', '', 'project');
mysqli_set_charset($link, 'utf8');
$sql = " SELECT Rehearse_jump,Rehearse_DateTime FROM rehearse ORDER BY Rehearse_id DESC LIMIT 7";

 $result = mysqli_query($link, $sql);

 $coursesArray = array();
 while($row = mysqli_fetch_assoc($result)) {
 
$coursesArray['values'][] = $row['Rehearse_jump'] ;
$coursesArray['DateTime'][] = $row['Rehearse_DateTime'];
}
$array_final = json_encode($coursesArray);


echo $array_final;
?>      