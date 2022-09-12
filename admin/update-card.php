<?php

include_once('./callapi2.php');

    $update_plan = callAPI('PUT', 'http://localhost:3002/api/the/'.$_POST['MaThe'], json_encode($_POST));
    if(isset($update_plan)){
        $response = json_decode($update_plan, true);
        header("Location: list-card.php");
    }else{
        header("Location: edit-book.php");
    }
    
  


?>
