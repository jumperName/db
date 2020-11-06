<?php
header("Access-Control-Allow-Origin: *");
$link = new mysqli('localhost', 'root', '', 'project');
mysqli_set_charset($link, 'utf8');

$rawData = file_get_contents("php://input");
$postData = json_decode($rawData, true);

$User_name = $postData['User_name'];
$User_password = $postData['User_password'];

$sql = "SELECT * FROM user WHERE User_name = '$User_name' && User_password = '$User_password'";

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