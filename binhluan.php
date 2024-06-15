<?php 
    session_start();ob_start();
    include_once("dao/pdo.php");
    include_once("dao/binhluan.php");
    if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
        $idsp=$_GET['idsp'];
        $tensp = get_namsp($idsp);
    }
    if(isset($_SESSION['user'])&&(($_SESSION['user'])>0)){
        extract($_SESSION['user']);
        if(isset($_SESSION['user'])&&($_SESSION['user'])!=""){
            $name = $_SESSION['user'];
        }else{
            $name = "";
        }

        if(isset($_POST['binhluan'])){
            $name = $_POST['name'];
            $noidung = $_POST['noidung'];
            $idsp = $_POST['idsp'];
            $iduser = $_POST['iduser'];
            $tensp = $_POST['tensp'];
            insert_bl($iduser,$name,$idsp,$noidung,$tensp);
        }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #cmt{
    width: 100%;
    height: auto;
    font-size: 20px;
    
}
    .btn-view{
        padding: 10px 20px;
        margin-top: 10px;
    }

</style>
<body>
    <form action="binhluan.php" method="post">
        <input type="hidden" name="name" value="<?=$hoten?>">
        <input type="hidden" name="iduser" value="<?=$id?>">
        <input type="hidden" name="idsp" value="<?=$idsp?>">
        <input type="hidden" name="tensp" value="<?=$tensp?>">
        <textarea type="text" id="cmt" name="noidung" ></textarea>
        <button name="binhluan" class="btn-view ">Gửi</button>
    </form>
    
    
</body>
</html>
    <?php }else{
    echo '<a href="index.php?page=dangnhap"  target="_parent" >Ban vui long dang nhap</a>';
    }?>