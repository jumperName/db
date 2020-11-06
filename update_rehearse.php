<?php
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
	
	$link = mysqli_connect('localhost', 'root', '', 'project');

	mysqli_set_charset($link, 'utf8');
	
	if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
		
	
		// get post body content
		$content = file_get_contents('php://input');
		// parse JSON
		$user = json_decode($content, true);
		
		$user = json_decode($content, true);
		$Chicken_id = $user['Chicken_id'];
		
		
		$sql2 = "SELECT MAX(Rehearse_id) AS maxid FROM rehearse"; // query อ่านค่า id สูงสุด
		$result2 = mysqli_query($link, $sql2);
		$last_id = mysqli_num_rows($result2);

		//insert data
		$sql = "UPDATE rehearse SET Chicken_id = '$Chicken_id' WHERE Rehearse_id = $last_id";
		$result = mysqli_query($link, $sql);
		
		if ($result) {
		   echo json_encode(['status' => 'ok','message' => 'บันทึกข้อมูลเรียบร้อยนะ']);
		} else {
		   echo json_encode(['status' => 'error','message' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล']);	
		}
	
	}
	
	mysqli_close($link);

	
