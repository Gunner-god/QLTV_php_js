<?php
$MaTK= $_GET["MaTK"];
$ch = require "./init_curl2.php";


curl_setopt($ch, CURLOPT_URL, "http://localhost:3002/api/taikhoan/$MaTK");
$response = curl_exec($ch);

//curl_exec($ch);

curl_close($ch);

$repository = json_decode($response, true);


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
                    <h4 class="header-line">Staff Account Details</h4>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">IDAccount</th>
                            <th scope="col">UserName</th>
                            <th scope="col">PASSWORD</th>     
                            <th scope="col">Email</th>                         
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?=htmlspecialchars($repository["MaTK"])?></td>
                            <td><?=htmlspecialchars($repository["UserName"])?></td> 
                            <td><?=htmlspecialchars($repository["PassWord"])?></td>   
                            <td><?=htmlspecialchars($repository["Email"])?></td>   
                            <th><a href="./delete-user.php?MaTK=<?=$repository["MaTK"]?>">Delete</a></th>          
                        </tr>
                        
                    </tbody>
                </table>
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