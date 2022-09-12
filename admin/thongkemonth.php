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
curl_setopt($ch, CURLOPT_URL, "http://localhost:3002/api/phieumuon");
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);
//$s_data=$data;

//echo($data);
if($data!=""){?> 
    <div class="row">
    <table class="table table-striped" >
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
                    <tbody>     
  <?php  foreach ($data as $repository){
         $date1=new DateTime($repository["NgayMuon"]);
         $date2=new DateTime($_POST['name']);
         $startTime1 = date_format($date1,"Y/m/d "); 
        $startTime2 = date_format($date2,"Y/m/d "); 
        // $t1=new DateTime($startTime1);
        // $t2=new DateTime($startTime2);
        $cenvertedTime2 = date('Y/m/d ',strtotime('-1 day',strtotime($startTime2)));
        $cenvertedTime1 = date('Y/m/d ',strtotime('+1 day',strtotime($startTime1)));
        $month1 = date("y/m",strtotime($startTime1));
        $month2 = date("y/m",strtotime($startTime2));
        if($month1 == $month2 )  
          {?><tr>
                <?php $datetra1=new DateTime($repository["NgayTra"]);
                    $datetra2 = date_format($datetra1,"Y/m/d "); 
                    $cenver = date('Y/m/d ',strtotime('+1 day',strtotime($datetra2)));
                    $ndate1=new DateTime($cenvertedTime1);
                    $ndate2=new DateTime($cenver);
                ?>
     
           <td><?=htmlspecialchars($repository["MaPhieuMuon"])?></td>
                            <td><?=htmlspecialchars($repository["TenSach"])?></td> 
                            <td><?=date_format($ndate1,"d/m/y")?></td>
                            <td><?=date_format($ndate2,"d/m/y")?></td>
                            
                            <td><?=htmlspecialchars($repository["SLMuon"])?></td>  
                      
                            <td> <a href="./Details-staffpm.php?MaNV=<?= $repository['MaNV'] ?>"> <?=htmlspecialchars($repository["MaNV"])?> </a> </td>
                            <td><?=htmlspecialchars($repository["MaDocGia"])?></td>    
                        </tr>
        
        
        </div>
         <?php }  

}}







