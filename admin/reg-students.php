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
curl_setopt($ch, CURLOPT_URL, "http://localhost:3002/api/docgia");
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
                    <h4 class="header-line">Readers</h4>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Mã Độc Giả</th>
                            <th scope="col">Tên </th>
                            <th scope="col">Giới Tính</th>
                            <th scope="col">Ngày Sinh</th>
                            <th scope="col">SĐT</th>
                            <th scope="col">Mã Thẻ</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $repository) : ?>
                            <tr>

                                <?php $date = new DateTime($repository["NgaySinh"]);
                                ?>
                                <td><?= htmlspecialchars($repository["MaDocGia"]) ?></td>
                                <td><?= htmlspecialchars($repository["HoTen"]) ?></td>
                                <td><?= htmlspecialchars($repository["GioiTinh"]) ?></td>


                                <?php
                                $startTime = date_format($date, "Y/m/d ");
                                $cenvertedTime = date('Y/m/d ', strtotime('+1 day', strtotime($startTime)));
                                $ndate = new DateTime($cenvertedTime);
                                ?>
                                <td><?= date_format($ndate, "d/m/y ") ?></td>
                                <td><?= htmlspecialchars($repository["SDT"]) ?></td>
                                <td><?= htmlspecialchars($repository["MaThe"]) ?></td>

                                <th><a href="./form-edit-readers.php?MaDocGia=<?= $repository["MaDocGia"] ?>">Edit</a></th>
                                <th><a href="./delete-readers.php?MaDocGia=<?= $repository["MaDocGia"] ?>">Delete</a></th>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <th>
                    <button class="btn  btn-danger"style="font-size: 15px;
                        color: #fff;
                        background-color: #00bdfe;
                        border: 1px solid #00bdfe;
                        padding: 10px 30px;
                        display: inline-block;
                        border-radius: 10px;
                        font-weight: 500;
                        text-transform: capitalize;
                        letter-spacing: 0.5px;
                        transition: all .3s;"><a href="./add_Reader.php">New Reader</a>
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

</body>

</html>