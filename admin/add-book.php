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
<?php

//$MaSach = $_GET["MaSach"];
$ch = require "./init_curl.php";

curl_setopt($ch, CURLOPT_URL, "http://localhost:3002/api/theloai");
$res = curl_exec($ch);

//curl_exec($ch);

curl_close($ch);

$datacate = json_decode($res, true);

?>
<?php

// $MaSach = $_GET["MaSach"];
$ch = require "./init_curl.php";

curl_setopt($ch, CURLOPT_URL, "http://localhost:3002/api/nhaxuatban");
$res = curl_exec($ch);

//curl_exec($ch);

curl_close($ch);

$datanxb = json_decode($res, true);

?>
<?php
$ch = require "init_curl.php";
curl_setopt($ch, CURLOPT_URL, "http://localhost:3002/api/book");
$response = curl_exec($ch);
curl_close($ch);
$databook = json_decode($response, true);
//$s_data=$data;
foreach ($databook as $repository) { 
    $id= $repository['MaSach'] ;
}
$id_b=($id+1);
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
    <link href='./display.css' rel='stylesheet' type='text/css' />
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
                    <h4 class="header-line">Add Book</h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class=" panel panel-info">
                    <div class="panel-heading">
                        Book Info
                    </div>
                    <div class="panel-body"style="box-shadow: 0px 10px 10px rgb(0 0 0 / 25%); border-radius: 15px;">
                        <form method="post" action="./create-book.php?idb=<?php echo($id_b) ?>" enctype="multipart/form-data">
                        <div class="form-group">
                                <input class="form-control" type="hidden" name="MaSach" value='<?php echo($id_b) ?>' />
                            </div> 
                        <div class="form-group">
                                <label>T??n S??ch</label>
                                <input class="form-control" type="text" name="TenSach" autocomplete="off" required />
                            </div>

                            <div class="form-group">
                                <label>T??c gi???</label>
                                <input class="form-control" type="text" name="TacGia" autocomplete="off" required />
                            </div>

                            <div class="form-group">
                                <label>Th??? Lo???i S??ch</label>
                                <select class="form-control" name="MaTheLoai" required="required">
                                    <option value="" selected style="text-align: center;">Ch???n Th??? Lo???i S??ch</option>
                                    <?php
                                        foreach ($datacate as $item) {
                                            echo "<option value=" . $item["MaTheLoai"] . ">" . $item["TenTL"] . "</option>";
                                        }
                                    ?>

                                    </option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Nh?? Xu???t B???n</label>
                                <select class="form-control" name="MaNXB" required="required">
                                    <option value="<?= $data["MaNXB"]?>" selected style="text-align: center;">Ch???n Nh?? Xu???t B???n</option>
                                    <?php
                                        foreach ($datanxb as $item) {
                                            echo "<option value=" . $item["MaNXB"] . ">" . $item["TenNXB"] . "</option>";
                                        }
                                    ?>
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>????n Gi??</label>
                                <input class="form-control" type="text" name="DonGia" autocomplete="off" required />
                            </div>

                            <div class="form-group">
                                <label>S??? L?????ng T???n</label>
                                <input class="form-control" type="text" name="SLTon" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <label>Hinh Anh</label>
                                <input class="form-control" type="file" id="image-input" name="HinhAnh1" accept="Image/* " />                  
                            </div>                          
                            <div id="display-image"></div>
                            <button class="btn btn-info" type="submit">Add Book</button>
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
     <!-- display -->
     <script src="display-image1.js"></script>
 
</body>

</html>