<?php
iF(isset($_FILES['HinhAnh']['tmp_name'])){
   $ch=curl_init();
   $cfile=new CURLFile($_FILES['HinhAnh']['tmp_name'],$_FILES['HinhAnh']['type'],$_FILES['HinhAnh']['name']);
   $data=array("myimage"=>$cfile);

   curl_setopt($ch,CURLOPT_URL,"http://localhost/QL_thuvien/admin/uploads.php");
   curl_setopt($ch, CURLOPT_POST,true);
   curl_setopt($ch, CURLOPT_POSTFIELDS,$data);

   $response=curl_exec($ch);

   if($response == true){
      echo "File posted";
   }else{
      echo "Error: " . curl_error($ch);
   }
   }
?>