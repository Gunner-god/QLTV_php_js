<?php
    session_start();

    if(!isset($_SESSION['u_name'])){
        header("Location: adminlogin.php");
    }
    session_destroy();
    unset($_SESSION['u_name']);
    header("Location: adminlogin.php");
?>

