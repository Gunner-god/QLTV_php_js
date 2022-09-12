<?php

include_once('./callapi2.php');

    $update_plan = callAPI('PUT', 'http://localhost:3002/api/phieumuon/'.$_POST['MaPhieuMuon'], json_encode($_POST));
    if(isset($update_plan)){
        $response = json_decode($update_plan, true);
        header("Location: list-phieumuon.php");
    }else{
        header("Location: form-edit-pm.php");
    }
    
  


?>