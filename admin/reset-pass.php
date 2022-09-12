
<?php

function callAPI($method, $url, $data){
  $token=$_GET['token'];
  $curl = curl_init();
  switch ($method){
     case "POST":
        curl_setopt($curl, CURLOPT_POST, 1);
        if ($data)
           curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        break;
     case "PUT":
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        if ($data)
           curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
        break;
     default:
        if ($data)
           $url = sprintf("%s?%s", $url, http_build_query($data));
  }
  // OPTIONS:
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
     'APIKEY: 111111111111111111111',
     'Content-Type: application/json',
      "Authorization: Bearer $token"
  ));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  // EXECUTE:
  $result = curl_exec($curl);
  if(!$result){die("Connection Failure");}
  curl_close($curl);
  return $result;
}
$make_call = callAPI('PUT', 'http://localhost:3002/api/resetpass', json_encode($_POST));
$response = json_decode($make_call, true);
?>
<?php 
    if ($response["success"] == 1) {
        echo ("<script>alert('reset password successfully!')</script>");
      //  include_once('./logout.php');       
        echo ("<script>window.location = 'adminlogin.php';</script>");       
    //  exit;   
} else {
         echo ("<script>alert('invalid')</script>");
        //  echo ("<script>window.location = 'chan.php';</script>");
        }
?>