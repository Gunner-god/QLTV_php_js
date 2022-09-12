
<?php
$MaSach=$_GET['idb'];
include_once('./callapi2.php');

    $make_call = callAPI('POST', 'http://localhost:3002/api/book', json_encode($_POST));
    if(isset($make_call)){
        $response = json_decode($make_call, true);
    }else {
        header("Location: add-book.php");
    }
    include_once('./callapi2.php');

    $update_plan = callAPI('PUT', 'http://localhost:3002/api/book/'.$MaSach, json_encode($_POST));
    if(isset($update_plan)){
        $response = json_decode($update_plan, true);
    }else{
        header("Location: edit-book.php");
    }
    iF(isset($_FILES['HinhAnh1']['tmp_name'])){
        $ch=curl_init();
        $cfile=new CURLFile($_FILES['HinhAnh1']['tmp_name'],$_FILES['HinhAnh1']['type'],$_FILES['HinhAnh1']['name']);
        $data=array("myimage"=>$cfile);
        $dataimg=$_FILES['HinhAnh1']['name'];
        curl_setopt($ch,CURLOPT_URL,"http://localhost/QL_thuvien/admin/uploads.php");
        curl_setopt($ch, CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        $response1=curl_exec($ch);   
        }?>
        <!DOCTYPE html>
        <html>
        <head>
        <script type="text/javascript">
        window.onload = function(){
        var button = document.getElementById('clickButton');
        button.form.submit();
}
        </script>

</head>
            <body>
            <form method="post" action="./update-image.php" enctype="multipart/form-data">  
                <div>  </div>
            <input type="hidden" name="MaSach" value="<?= $MaSach ?>">;  
            <div></div>
            <input type="hidden" name="HinhAnh" value="<?= $dataimg?>">;     
            <div></div>
    <button id='clickButton' type='hidden'>Submit</button>
    </form>
    <div>  </div>
    </body>
    </html>
?>
