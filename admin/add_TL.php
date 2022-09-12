<?php
session_start();
        if (isset($_SESSION['id_user']) == "") {
            echo ("<script>alert('You must login first')</script>");
            echo ("<script>window.location = 'adminlogin.php';</script>");   
            exit;    
        } else{
            $id=$_SESSION['id_user'];
        }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Add Book</title>
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
    <div class=" content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Add Categories</h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
                    <div class=" panel panel-info">
                    <div class="panel-heading">
                    Categories Info
                    </div>
                    <div class="panel-body" style="box-shadow: 0px 10px 10px rgb(0 0 0 / 15%); border-radius: 15px;">
                        <form method="post" action="./create_TL.php">
                            <div class="form-group">
                                <label>Mã Thể Loại</label>
                                <input class="form-control" type="text" name="MaTheLoai" autocomplete="off" required />
                            </div>

                            <div class="form-group">
                                <label>Tên Thể Loại</label>
                                <input class="form-control" type="text" name="TenTL" autocomplete="off" required />
                            </div>           
                            <button class="btn btn-info">Add Categories</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- <php include('includes/footer.php'); ?> -->
    
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>

</html>