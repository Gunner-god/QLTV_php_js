<?php

include_once('./callapi2.php');

    $make_call = callAPI('POST', 'http://localhost:3002/api/theloai', json_encode($_POST));
    if(isset($make_call)){
    
        $response = json_decode($make_call, true);
        header("Location: manage-TL.php");
    }else {
        header("Location: add-TL.php");
    }
 
?>
