<?php

include_once('./callapi2.php');

    $update_plan = callAPI('PUT', 'http://localhost:3002/api/uploads/'.$_POST['MaSach'], json_encode($_POST));
    if(isset($update_plan)){
     //   $response = json_decode($update_plan, true);
        header("Location: manage-books.php");
    }else{
        header("Location: edit-book.php");
    }