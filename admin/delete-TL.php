<?php
$MaTheLoai = $_GET["MaTheLoai"];

$ch = require "init_curl2.php";
curl_setopt($ch, CURLOPT_URL, "http://localhost:3002/api/theloai/delete/$MaTheLoai");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));
$response = curl_exec($ch);
if (isset($response)) {
    curl_close($ch);
    $data = json_decode($response, true);
   echo ("<script>alert('Deleted categories success')</script>");
   echo ("<script>window.location = 'manage-TL.php';</script>");
 // echo($MaTheLoai);
    // header('Location: list-user.php');
}else{
    echo ("<script>alert('Deleted user false')</script>");
    // echo ("<script>window.location = 'delete-TL.php';</script>");
}

?>
