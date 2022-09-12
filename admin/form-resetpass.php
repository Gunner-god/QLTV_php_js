<?php
$token=$_GET['token'];
$email=$_GET['email'];
//echo $token;
session_start();
        if (isset($_SESSION['name']) != "") {
           // $email=$_SESSION['email'];
            $name=$_SESSION['name'];
           // $token=$_SESSION['token'];
           // echo($token);
        } else {
            echo ("<script>alert('errol')</script>");
          //  echo ("<script>window.location = 'adminlogin.php';</script>"); 
        }
        
       
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | </title>
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
                    <h4 class="header-line">FORGOT PASSWORD FORM</h4>
                </div>
            </div>

            <!--LOGIN PANEL START-->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            RESET PASSWORD FORM
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="reset-pass.php?token=<?php echo $token ?>">
                                           
                                <div class="form-group">
                                    <label>Enter Email</label>
                                    <input class="form-control" type="text" name="email" id="email" value="<?php echo $email ?>" required autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label>Enter New PassWord</label>
                                    <input class="form-control" type="text" name="new_password" id="new_password" required autocomplete="off" />
                                </div>
                                <div><input type="hidden" name="name" id="name" value="<?php echo $name?>"   > </div>  
                                <button type="submit" name="reset" class="btn btn-info">SEND </button> | <a href="post-login.php">LOG IN</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!---LOGIN PABNEL END-->SS
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

</body>

</html>