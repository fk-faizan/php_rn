<?php

	include('../db.php');

	header("Content-type:application/json");
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    // header('Access-Control-Allow-Headers: token, Content-Type');

    $postdata = file_get_contents("php://input");

    if (isset($postdata) && !empty($postdata)) {

    	$request = json_decode($postdata, true);


    	$name = $request['fullName'];
		$u_name = $request['userName'];
		$email = $request['email'];
		$password = $request['password'];
    	
    	mysqli_query($conn,"INSERT INTO users(u_fullname, u_name, u_email, u_password) values('$name', '$u_name', '$email', '$password')");
        $data="Data inserted";
        $code='8';
        $status='true';
    } else {
    	$status='true';
        $data="Provide valid column count";
        $code='9';
    }

	// if (!isset($status)) {
	// 	if (isset($_POST['fullName'])) {
 // 			$name = mysqli_real_escape_string($conn, $_POST['fullName']);
	// 		// $u_name = mysqli_real_escape_string($conn, $_POST['userName']);
	// 		// $email = mysqli_real_escape_string($conn, $_POST['email']);
	// 		// $password = mysqli_real_escape_string($conn, $_POST['password']);

	// 		mysqli_query($conn,"INSERT INTO users(u_fullname) values('$name')");
 //            $data="Data inserted";
 //            $code='8';
 //            $status='true';
	// 	} else{
 //        	$status='true';
 //        	$data="Provide valid column count";
 //        	$code='9';
 //    	}
	// }

	echo json_encode(["status"=>$status,"data"=>$data,"code"=>$code]);

?>