<?php

include_once('./callapi.php');
$make_call = callAPI('POST', 'http://localhost:3002/api/register', json_encode($_POST));
if(isset($make_call)){
    $response = json_decode($make_call, true);
    if($response['success']=="0")
    {
      echo ("<script>alert('username already exist')</script>");
      echo ("<script>window.location = 'create-user.php';</script>");
    }
    else{
    echo ("<script>alert('Created user success')</script>");
     echo ("<script>window.location = 'adminlogin.php';</script>");
  }
    // header('Location: list-user.php');
}else{
    echo ("<script>alert('Created user false')</script>");
  //  echo ("<script>window.location = 'create-user.php';</script>");
}

?>