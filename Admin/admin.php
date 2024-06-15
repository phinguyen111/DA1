<?php
    session_start();
    ob_start();
    if(isset($_SESSION['s_user'])&&($_SESSION['s_user']["role"]==1)){
        header('location: index.php');
    }elseif(isset($_SESSION['s_user'])&&($_SESSION['s_user']["role"]==0)){
        $tb1="Tài khoản này không có quyền đăng nhập trang quản trị";
        $_SESSION['s_tb']=$tb1;
        header('location: login.php');
    }else{
        header('location: login.php');
    }
?>
