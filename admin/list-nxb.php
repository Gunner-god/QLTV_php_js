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
$ch = require "init_curl.php";
curl_setopt($ch, CURLOPT_URL, "http://localhost:3002/api/nhaxuatban");
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);
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
        <div class="container" style="box-shadow: 0px 10px 10px rgb(0 0 0 / 15%); border-radius: 15px;">
            <div class="row pad-botm" style="padding: 40px 40px 40px 40px">
                <div class="col-md-12">
                    <h4 class="header-line">List Publishing Company</h4>
                </div>
                <!-- search -->
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." style="box-shadow: 0px 10px 10px rgb(0 0 0 / 12%); border-radius: 10px; width:40% ;border: 0.5px solid #00bdfe;">
                <!-- end search -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Mã NXB</th>
                            <th scope="col">Tên NXB</th>
                            <th scope="col">Địa Chỉ</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php foreach ($data as $repository) : ?>
                            <tr>
                                <td><?= htmlspecialchars($repository["MaNXB"]) ?></td>
                                <td><?= htmlspecialchars($repository["TenNXB"]) ?></td>
                                <td><?= htmlspecialchars($repository["DiaChi"]) ?></td>
                                <th><a href="./delete-nxb.php?MaNXB=<?= $repository["MaNXB"] ?>">Delete</a></th>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <th>
                    <button class="btn btn-info" style="font-size: 15px;
                        color: #fff;
                        background-color: #00bdfe;
                        border: 1px solid #00bdfe;
                        padding: 10px 30px;
                        display: inline-block;
                        border-radius: 10px;
                        font-weight: 500;
                        text-transform: capitalize;
                        letter-spacing: 0.5px;
                        transition: all .3s;"><a href="./add_nxb.php">New NXB</a>
                    </button>
                </th>
            </div>
        </div>
    </div>

    <?php include_once('./includes/footer.php') ?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myInput').on('keyup', function(event) {
                event.preventDefault();
                /* Act on the event */
                var tukhoa = $(this).val().toLowerCase();
                $('#myTable tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(tukhoa) > -1);
                });

            });
        });
    </script>

</body>

</html>