<?php

include_once('./callapi2.php');

    $make_call = callAPI('POST', 'http://localhost:3002/api/phieutra', json_encode($_POST));
    if(isset($make_call)){
    
        $response = json_decode($make_call, true);
        header("Location: list-phieutra.php");
    }else {
        header("Location: add-pt.php");
    }
 
?>