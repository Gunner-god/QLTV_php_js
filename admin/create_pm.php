<?php

include_once('./callapi2.php');

    $make_call = callAPI('POST', 'http://localhost:3002/api/phieumuon', json_encode($_POST));
    if(isset($make_call)){
    
        $response = json_decode($make_call, true);
        header("Location: list-phieumuon.php");
    }else {
        header("Location: add-pm.php");
    }
 
?>