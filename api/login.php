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

		$name = $request['userName'];
		$password = $request['password'];

        $sql = "SELECT u_name, u_password FROM users WHERE u_name = '$name' AND u_password = '$password'";
    	$query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($query)>0){
            $data="Data Found";
            $status='true';
        } else {
            $status='true';
            $data="User Name or Password Not Matched";
        }
    } 

	echo json_encode(["status"=>$status,"data"=>$data]);

?>
