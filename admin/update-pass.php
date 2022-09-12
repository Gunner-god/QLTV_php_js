<?php

include_once('./callapi2.php');
$make_call = callAPI('PUT', 'http://localhost:3002/api/changepass', json_encode($_POST));
$response = json_decode($make_call, true);
?>
<?php 
    if ($response["data"] == "change password successfully") {
        echo ("<script>alert('change password successfully!')</script>");
        include_once('./logout.php');       
        //echo ("<script>window.location = 'adminlogin.php';</script>");       
    //  exit;   
} else {
         echo ("<script>alert('invalid username or password!')</script>");
        //  echo ("<script>window.location = 'chan.php';</script>");
        }

?>