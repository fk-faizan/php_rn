<?php 

  // header('Access-Control-Allow-Origin: *');
  // header('Access-Control-Allow-Headers: *');
  // header('Content-Type:application/json');

  header("Content-type:application/json");
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
  header("Access-Control-Allow-Headers: Content-Type, Authorization");

  // include('core.php');
  include('db.php');

  // select query
  $query = "SELECT * FROM users";
  $res = mysqli_query($conn, $query);

  if(mysqli_num_rows($res)>0){
      $data=[];
      while($row=mysqli_fetch_assoc($res)){
          $data[]=$row;
      }
      $status='true';
      $code='5';
  }else{
      $status='true';
      $data="Data not found";
      $code='4';
  }

  echo json_encode(["status"=>$status,"data"=>$data,"code"=>$code]);

?>