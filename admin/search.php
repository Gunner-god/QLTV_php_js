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
<?php

$ch = require "init_curl2.php";
curl_setopt($ch, CURLOPT_URL, "http://localhost:3002/api/book");
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);
//$s_data=$data;

//echo($data);
if($data!=""){?> 
    <div class="row">
  <?php  foreach ($data as $repository){

        if(str_contains(mb_strtolower($repository['TenSach']),mb_strtolower($_POST['name'] )) )  
          {?>
          <p><p>
              <div class="col-sm-3">
            <a href="./book_detail.php?MaSach=<?= $repository['MaSach'] ?>"> <img src="<?= $repository["HinhAnh"]; ?>" class="img-responsive" style="width:80%" alt="Image"></a>
            <p class="text-danger" style="font-size: 17 px"><?= htmlspecialchars($repository["TenSach"]) ?></p>
            <!-- <p class="text-danger" style="font-size: 15px;"><= htmlspecialchars($repository["TacGia"]) ?></p> -->
            <p class="text-info" style="font-size: 17px"><?php echo number_format($repository["DonGia"], 0, ",", ".") ?> VND</p>
            <p>
            </p>
        </div>
         <?php } 

}}
            else{
                echo "<tr><td>0 result's found</td></tr>";
            }
?>