<?php
//session_start();
if (isset($_SESSION['b_token']) != "") {
    $token=$_SESSION['b_token'];
} 
$headers=[
   // "User- Agent: Example REST API Client",
    "Authorization: Bearer $token"

];


$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_RETURNTRANSFER => true
]);
return $ch;