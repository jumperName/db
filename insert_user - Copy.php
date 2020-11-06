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
        $User_name = $user['User_name'];
        $User_password = $user['User_password'];
        $User_phone = $user['User_phone'];
        $User_Email = $user['User_Email']; 
        $User_firstname = $user['User_firstname'];
        $User_lastname = $user['User_lastname'];
		
		//check duplicate $email
		$sql2 = "SELECT User_Email FROM user WHERE User_Email='$User_Email' ";
		$result2 = mysqli_query($link, $sql2);
		$rowcount = mysqli_num_rows($result2);
		if ($rowcount == 1) {
			echo json_encode(['status' => 'error','message' => 'ไม่สามารถลงทะเบียนได้ อีเมลนี้มีผู้ใช้แล้ว']);
			exit;
		}
		
		//insert data
        $sql = "INSERT INTO `user` (User_name, User_password,User_firstname,User_lastname,User_phone,User_Email)  
                    VALUES ('$User_name','$User_password','$User_firstname','$User_lastname','$User_phone','$User_Email');";

		$result = mysqli_query($link, $sql);
		
		if ($result) {
		   echo json_encode(['status' => 'ok','message' => 'บันทึกข้อมูลเรียบร้อยนะ']);
		} else {
		   echo json_encode(['status' => 'error','message' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล']);	
		}
	
	}
	
	mysqli_close($link);
	





