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
    <div class="content-wra
    <div class=" content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Add Staff</h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
                    <div class=" panel panel-info">
                    <div class="panel-heading">
                    Staff Info
                    </div>
                    <div class="panel-body">
                        <form method="post" action="./create_staff.php">

                            <div class="form-group">
                                <label>Họ Tên Nhân Viên</label>
                                <input class="form-control" type="text" name="HoTenNV" autocomplete="off" required />
                            </div>  
                            <label>Giới Tính</label>
                            <div>
                                <select class="form-control" name="GioiTinh" required="required">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>   
                            </div>    
                            <div class="form-group">
                                <label>SĐT</label>
                                <input class="form-control" type="text" name="SDT" autocomplete="off" required />
                            </div>  
                            <div class="form-group">
                                <label>Mã Tài Khoản</label>
                                <input class="form-control" type="text" name="MaTK" autocomplete="off" required />
                            </div>       
                            <button class="btn btn-info">Add Staff</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php'); ?>
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