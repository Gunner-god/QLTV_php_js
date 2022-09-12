
<?php
include_once('./callapi2.php');

    $update_plan = callAPI('PUT', 'http://localhost:3002/api/book/'.$_POST['MaSach'], json_encode($_POST));
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
            <input type="hidden" name="MaSach" value="<?= $_POST['MaSach'] ?>";>
            
            <input type="hidden" name="HinhAnh" value="<?= $dataimg?>";>     
        
    <button id='clickButton' type='hidden'>Submit</button>
    </form>
    <div>  </div>
    </body>
    </html>


