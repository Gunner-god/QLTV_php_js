<?php
session_start();
if (isset($_SESSION['id_user']) == "") {
  echo ("<script>alert('You must login first')</script>");
  echo ("<script>window.location = 'adminlogin.php';</script>");
} else {
  echo ("");
}
?>
<?php
$ch = require "init_curl.php";
curl_setopt($ch, CURLOPT_URL, "http://localhost:3002/api/book");
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);
//$s_data=$data;
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
    <div class="container">
      <div class="row pad-botm">
        <div class="col-md-12">
          <h4 class="header-line">Manage Books</h4>
          <!-- <h4 class="header-line">Hello </h4> -->
          <!--search-->
          <div class="col-sm-6">
            <input type="text" class="form-control" id="search" placeholder="Search...">
            <table class="table table-hover">
              <tbody id="output">
              </tbody>
            </table>
          </div>
          <!--search-->
        </div>
        <div class="row" style="--bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(-1 * var(--bs-gutter-y));
        margin-right: calc(-.5 * var(--bs-gutter-x));
        margin-left: calc(-.5 * var(--bs-gutter-x));">
          <?php
          foreach ($data as $repository) {
          ?>
            <div class="col-lg-3 col-sm-6">
              <a href="./book_detail.php?MaSach=<?= $repository['MaSach'] ?>"> <img src="<?= $repository["HinhAnh"]; ?>" class="img-responsive" style="width:100%; border-radius: 15px; height: 360px;" alt="Image"></a>
              <p class="text-danger" style="font-size: 17 px"><?= htmlspecialchars($repository["TenSach"]) ?></p>
              <!-- <p class="text-danger" style="font-size: 15px;"><= htmlspecialchars($repository["TacGia"]) ?></p> -->
              <p class="text-info" style="font-size: 17px"><?php echo number_format($repository["DonGia"], 0, ",", ".") ?> VND</p>
              <p>
              </p>
            </div>

          <?php } ?>

          <!--  -->
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
  <!-- DATATABLE SCRIPTS  -->
  <script src="assets/js/dataTables/jquery.dataTables.js"></script>
  <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
  <!-- CUSTOM SCRIPTS  -->
  <script src="assets/js/custom.js"></script>

  <!-- search SCRIPTS  -->
  <script type="text/javascript">
    $(document).ready(function() {
      $("#search").keypress(function() {
        $.ajax({
          type: 'POST',
          url: 'search.php?',
          data: {
            name: $("#search").val(),
          },
          success: function(data) {
            $("#output").html(data);
          }
        });
      });
    });
  </script>
</body>

</html>