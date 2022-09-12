<?php

include_once('./callapi2.php');

    $update_plan = callAPI('PUT', 'http://localhost:3002/api/staff/'.$_POST['maNV'], json_encode($_POST));
    if(isset($update_plan)){
        $response = json_decode($update_plan, true);
        header("Location: list-staff.php");
    }else{
        header("Location: form-edit-staff.php");
    }
    
  


?>