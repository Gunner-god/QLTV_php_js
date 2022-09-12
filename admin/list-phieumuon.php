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
curl_setopt($ch, CURLOPT_URL, "http://localhost:3002/api/phieumuon");
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
                    <h4 class="header-line">List Loan Slip</h4>
                </div>
                <!-- search -->
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."
                style="box-shadow: 0px 10px 10px rgb(0 0 0 / 12%); border-radius: 10px; width:40% ;border: 0.5px solid #00bdfe;">
                <!-- end search -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Mã Phiếu Mượn</th>
                            <th scope="col">Tên Sách</th>
                            <th scope="col">Ngày Mượn</th>
                            <th scope="col">Ngày Trả</th>
                            <th scope="col">Số Lượng Mượn</th>
                            <th scope="col">Mã Nhân Viên</th>
                            <th scope="col">Mã Độc Giả</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php foreach ($data as $repository) : ?>
                            <tr>
                                <?php $date1 = new DateTime($repository["NgayMuon"]) ?>
                                <?php $date2 = new DateTime($repository["NgayTra"]) ?>
                                <?php
                                $startTime1 = date_format($date1, "Y/m/d ");
                                $startTime2 = date_format($date2, "Y/m/d ");
                                $cenvertedTime1 = date('Y/m/d ', strtotime('+1 day', strtotime($startTime1)));
                                $cenvertedTime2 = date('Y/m/d ', strtotime('+1 day', strtotime($startTime2)));
                                $ndate1 = new DateTime($cenvertedTime1);
                                $ndate2 = new DateTime($cenvertedTime2);
                                ?>
                                <td><?= htmlspecialchars($repository["MaPhieuMuon"]) ?></td>
                                <td><?= htmlspecialchars($repository["TenSach"]) ?></td>
                                <td><?= date_format($ndate1, "d/m/y") ?></td>
                                <td><?= date_format($ndate2, "d/m/y ") ?></td>

                                <td><?= htmlspecialchars($repository["SLMuon"]) ?></td>

                                <td> <a href="./Details-staffpm.php?MaNV=<?= $repository['MaNV'] ?>"> <?= htmlspecialchars($repository["MaNV"]) ?> </a> </td>
                                <td><?= htmlspecialchars($repository["MaDocGia"]) ?></td>
                                <th><a href="./form-edit-pm.php?MaPhieuMuon=<?= $repository["MaPhieuMuon"] ?>">Edit</a></th>
                                <th><a href="./delete-pm.php?MaPhieuMuon=<?= $repository["MaPhieuMuon"] ?>">Delete</a></th>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <th>
                    <button class="btn  btn-infor"style="font-size: 15px;
                        color: #fff;
                        background-color: #00bdfe;
                        border: 1px solid #00bdfe;
                        padding: 10px 30px;
                        display: inline-block;
                        border-radius: 10px;
                        font-weight: 500;
                        text-transform: capitalize;
                        letter-spacing: 0.5px;
                        transition: all .3s;"><a href="./add-pm.php">New Loan Slip</a>
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