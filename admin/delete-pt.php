<?php
$MaPhieuTra= $_GET["MaPhieuTra"];

$ch = require "init_curl2.php";
curl_setopt($ch, CURLOPT_URL, "http://localhost:3002/api/phieutra/delete/$MaPhieuTra");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));
$response = curl_exec($ch);
if (isset($response)) {
    curl_close($ch);
    $data = json_decode($response, true);
   echo ("<script>alert('Deleted success')</script>");
   echo ("<script>window.location = 'list-phieutra.php';</script>");
 // echo($MaTheLoai);
    // header('Location: list-user.php');
}else{
    echo ("<script>alert('Deleted false')</script>");
    // echo ("<script>window.location = 'delete-readers.php';</script>");
}

?>
