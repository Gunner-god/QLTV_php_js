
<?php
session_start();
        if (isset($_SESSION['id_user']) == "") {
            echo ("<script>alert('You must login first')</script>");
            echo ("<script>window.location = 'adminlogin.php';</script>");     

          //  echo $token;
        } else {
            // echo ("<script>alert('You must login first')</script>");
            // echo ("<script>window.location = 'adminlogin.php';</script>");         
            echo ("");
        }
?>
<?php
$ch=require "init_curl.php";
curl_setopt($ch, CURLOPT_URL, "http://localhost:3002/api/ctphieumuon");
$response = curl_exec($ch);
curl_close($ch);
$data= json_decode($response, true);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Manage Books</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body>
    <!-- header -->
    <?php include_once('./includes/header.php'); ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">List Details Loan Slip</h4>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Mã Sách</th>
                            <th scope="col">Mã Phiếu Mượn</th>
                            <th scope="col">Số Lượng Sách</th>
                            <th scope="col">Ngày Mượn</th>
                            <th scope="col">Ngày Trả</th>                    
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $repository): ?>
                        <tr>
                            <td><?=htmlspecialchars($repository["MaSach"])?></td>
                            <td><?=htmlspecialchars($repository["MaPhieuMuon"])?></td> 
                            <td><?=htmlspecialchars($repository["SLSach"])?></td>  
                            <td><?=htmlspecialchars($repository["NgayMuon"])?></td>  
                            <td><?=htmlspecialchars($repository["NgayTra"])?></td>  
                            
                          
                            <th><a href="./delete-nxb.php?Ma=<?=$repository["MaPhieuMuon"]?>">Edit</a></th> 
                            <th><a href="./delete-nxb.php?Ma=<?=$repository["MaPhieuMuon"]?>">Delete</a></th>          
                        </tr>
                    <?php endforeach; ?> 
                        
                    </tbody>
                </table>
                <th><button class="btn  btn-infor"><a href="./create-ctpm.php">New Details Loan Slip</a></button></th> 
            </div>
        </div>
    </div>

    <?php include_once('./includes/footer.php') ?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>

</html>