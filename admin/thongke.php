<?php
session_start();
if (isset($_SESSION['id_user']) == "") {
    echo ("<script>alert('You must login first')</script>");
    echo ("<script>window.location = 'adminlogin.php';</script>");
} else {
    echo ("");
}
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
    <!------MENU SECTION START-->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container" style="box-shadow: 0px 10px 10px rgb(0 0 0 / 15%); border-radius: 15px;">
            <div class="row pad-botm" style="padding: 40px 40px 40px 40px">
                <div class="col-md-12">
                    <h4 class="header-line">Statistical Books</h4>
                    <!-- <h4 class="header-line">Hello </h4> -->

                </div>
                <div class="form-group">
                    <label>Ngày</label>
                    <input class="form-control" type="date" id="search" autocomplete="off" required />

                    <table class="table table-hover" id="employee_data">
                        <tbody id="output">
                        </tbody>
                    </table>

                </div>

            </div>
            <div style="padding: 10px; text-align: center;">
                <button class="btn  btn-info" id="button" style="font-size: 15px;
                        color: #fff;
                        background-color: #00bdfe;
                        border: 1px solid #00bdfe;
                        padding: 10px 30px;
                        display: inline-block;
                        border-radius: 10px;
                        font-weight: 500;
                        text-transform: capitalize;
                        letter-spacing: 0.5px;
                        transition: all .3s;">Thống kê theo ngày
                </button>
                <button class="btn  btn-info" id="button1" style="font-size: 15px;
                        color: #fff;
                        background-color: #00bdfe;
                        border: 1px solid #00bdfe;
                        padding: 10px 30px;
                        display: inline-block;
                        border-radius: 10px;
                        font-weight: 500;
                        text-transform: capitalize;
                        letter-spacing: 0.5px;
                        transition: all .3s;">Thống kê theo tháng
                </button>
                <button class="btn  btn-info" id="export_button" style="font-size: 15px;
                        color: #fff;
                        background-color: #00bdfe;
                        border: 1px solid #00bdfe;
                        padding: 10px 30px;
                        display: inline-block;
                        border-radius: 10px;
                        font-weight: 500;
                        text-transform: capitalize;
                        letter-spacing: 0.5px;
                        transition: all .3s;">Xuất file excel
                </button>
            </div>
        </div>
        <script>
            function html_table_to_excel(type) {
                var data = document.getElementById('employee_data');

                var file = XLSX.utils.table_to_book(data, {
                    sheet: "sheet1"
                });

                XLSX.write(file, {
                    bookType: type,
                    bookSST: true,
                    type: 'base64'
                });

                XLSX.writeFile(file, 'file.' + type);
            }

            const export_button = document.getElementById('export_button');

            export_button.addEventListener('click', () => {
                html_table_to_excel('xlsx');
            });
        </script>

        <!-- FOOTER SECTION END-->
        <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
        <!-- CORE JQUERY  -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- DATATABLE SCRIPTS  -->
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="assets/js/custom.js"></script>
        <!-- <script src="table2excel.js"></script> -->
        <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
        <!-- <script src="table2excel.js"></script> -->
        <!-- search SCRIPTS  -->
        <script type="text/javascript">
            $("#button").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "thongkeajax.php?",
                    data: {
                        name: $("#search").val(),
                    },
                    success: function(data) {
                        $("#output").html(data);
                    }
                });
            });
            $("#button1").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "thongkemonth.php?",
                    data: {
                        name: $("#search").val(),
                    },
                    success: function(data) {
                        $("#output").html(data);
                    }
                });
            });
        </script>



</body>

</html>