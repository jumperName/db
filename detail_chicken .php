<?php
header("Access-Control-Allow-Origin: *");
$link = new mysqli('localhost', 'root', '', 'project');
mysqli_set_charset($link, 'utf8');

if(isset($_GET['id']) && $_GET['id']!=""){
$sql = "SELECT * FROM chicken WhERE Chicken_id ='".$_GET['id']."'";
}
 $result = mysqli_query($link, $sql);
 $coursesArray = array();
 while($row = $result->fetch_assoc()) {
$coursesArray[] = $row;
}
echo json_encode($coursesArray);
?>