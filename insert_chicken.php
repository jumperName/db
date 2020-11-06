<?php
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
	
	$link = mysqli_connect('localhost', 'root', '', 'project');

	mysqli_set_charset($link, 'utf8');
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
	
		// get post body content
		$content = file_get_contents('php://input');
		// parse JSON
		$user = json_decode($content, true);
		
		$user = json_decode($content, true);
		$Chicken_name = $user['Chicken_name'];
		$Chicken_code = $user['Chicken_code'];
        $Chicken_old = $user['Chicken_old'];
        $Chicken_Strain = $user['Chicken_Strain'];
		
		//insert data
        $sql = "INSERT INTO `Chicken` (Chicken_name,Chicken_code,Chicken_old,Chicken_Strain)  
                    VALUES ('$Chicken_name','$Chicken_code','$Chicken_old','$Chicken_Strain');";

		$result = mysqli_query($link, $sql);
		
		if ($result) {
		   echo json_encode(['status' => 'ok','message' => 'บันทึกข้อมูลเรียบร้อยนะ']);
		} else {
		   echo json_encode(['status' => 'error','message' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล']);	
		}
	
	}
	
	mysqli_close($link);
	





