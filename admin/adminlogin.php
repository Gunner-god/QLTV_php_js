<?php
    session_start();
    if(isset($_POST['login'])){
     //   $username = $_POST['UserName'];
        include_once('./callapi.php');
        $make_call = callAPI('POST', 'http://localhost:3002/api/login', json_encode($_POST));
        $response = json_decode($make_call, true);  
        if ($response["data"] != "invalid username or password") {         
            echo ("<script>alert('Login successful!')</script>");
             $token= $response["token"];
            $id= $response["id"];
             $username=$response["user"];
            $result= $response["success"];
             $_SESSION['u_name'] = $username;
             $_SESSION['b_token'] = $token;
            $_SESSION['id_user'] = $id;
            $_SESSION['result'] = $result;
            echo ("<script>window.location = 'manage-books.php';</script>");
        //  exit;   
        } else {
            echo ("<script>alert('invalid username or password!')</script>");
            echo ("<script>window.location = 'adminlogin.php';</script>");
        }    
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">ADMIN LOGIN FORM</h4>
                </div>
            </div>
            <!--LOGIN PANEL START-->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            LOGIN FORM
                        </div>
                        <div class="panel-body"style="box-shadow: 0px 10px 10px rgb(0 0 0 / 15%); border-radius: 15px;">
                            <form method="post">

                                <div class="form-group">
                                    <label>Enter Username</label>
                                    <input class="form-control" type="text" name="UserName" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="PassWord" autocomplete="off" required />
                                </div>                              
                                <button type="submit" name="login" class="btn btn-info">LOGIN </button> | <a href="forgot-password.php">Forgot PassWord</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!---LOGIN PABNEL END-->


        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php'); ?>
    <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
    </script>
</body>

</html>