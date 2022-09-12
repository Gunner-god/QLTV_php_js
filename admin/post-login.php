
<?php
    session_start();
    if(isset($_POST['login'])){
        $username = $_POST['UserName'];
        include_once('./callapi.php');
        $make_call = callAPI('POST', 'http://localhost:3002/api/login', json_encode($_POST));
        $response = json_decode($make_call, true);
    
        if ($response["data"] != "invalid tai khoan or password") {
            
            echo ("<script>alert('Login successful!')</script>");
             $token= $response["token"];
            $id= $response["id"];
            // $_SESSION['u_name'] = $username;
             $_SESSION['b_token'] = $token;
            $_SESSION['id_user'] = $id;?>
           <!DOCTYPE html>
<body>
<?php echo $token?>
<input type="hidden" name="token" value="<?php echo $token?>">
</body>
           <?php
          //  echo ("<script>window.location = 'manage-books.php';</script>");
        //  exit;   
        } else {
            echo ("<script>alert('invalid username or password!')</script>");
            echo ("<script>window.location = 'adminlogin.php';</script>");
        }
    
    }
?>
