<?php

session_start();
        if (isset($_SESSION['id_user']) != "") {
            $id=$_SESSION['id_user'];
        } else {
            echo ("<script>alert('You must login first')</script>");
            echo ("<script>window.location = 'adminlogin.php';</script>"); 
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
                    <h4 class="header-line">USER LOGIN FORM</h4>
                </div>
            </div>

            <!--LOGIN PANEL START-->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            CHANGE PASSWORD FORM
                        </div>
                        <div class="panel-body"style="box-shadow: 0px 10px 10px rgb(0 0 0 / 15%); border-radius: 15px;">
                            <form role="form" method="post" action="update-pass.php">

                                <div class="form-group">
                                    <label>Enter UserName</label>
                                    <input class="form-control" type="text" name="UserName" id="UserName" required autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input class="form-control" type="password" name="old_PassWord" id="old_PassWord" required autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input class="form-control" type="password" name="new_password" id="new_password" required autocomplete="off" />
                                </div>
                                    <input type="hidden" name="MaTK" value="<?php echo $id?>">
                                <button type="submit" name="Change" class="btn btn-info">CHANGE </button> | <a href="post-login.php">LOG IN</a>
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

</body>

</html>