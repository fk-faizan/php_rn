<?php
include('db.php');

header("Content-type:application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$UserEmail = $decodedData['Email'];
$UserPW = md5($decodedData['Password']);

$SQL = "SELECT * FROM newuser WHERE UserEmail = '$UserEmail'";
$exeSQL = mysqli_query($conn, $SQL);
$checkEmail =  mysqli_num_rows($exeSQL);

if ($checkEmail != 0) {
    $Message = "Already registered";
} else {

    $InsertQuerry = "INSERT INTO newuser(UserEmail, UserPW) VALUES('$UserEmail', '$UserPW')";

    $R = mysqli_query($conn, $InsertQuerry);

    if ($R) {
        $Message = "Complete--!";
    } else {
        $Message = "Error";
    }
}
$response[] = array("Message" => $Message);

echo json_encode($response);