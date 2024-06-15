<?php
    session_start();
    ob_start();
    include "../dao/pdo.php";
    include "../dao/user.php";
    // input
    if(isset($_POST["dangnhap"])&&($_POST["dangnhap"])){
        
        $username=$_POST["username"];
        $password=$_POST["password"];
        $_SESSION['name']=$username;
        //xử lý 
        $kq=checkuser($username,$password);
        
        if(isset($kq)&&(is_array($kq))&&(count($kq)>0)){
                
                $_SESSION['s_user']=$kq;
                header('location: admin.php');
        }else{
            $tb="Sai tài khoản hoặc mật khẩu";

        }
       // out
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/main.css"> 
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <title>Login_Admin</title>
    <style>
        body {
            margin-top: 100px;
        }
        .form-gr {
            position: relative;
            padding: 20px;
        }
        .ll {
            margin: 0 auto 20px; 
            display: block; 
        }

        h5 {
            margin-left:  150px ; 
            margin-top: -20px ;
            
        }
    </style>


</head>

<body>
        <div class="col-xl-4 form-login">
            
            <div class="card form-gr">
            <img class="ll" width="96" height="96" src="https://img.icons8.com/windows/96/user-male-circle.png" alt="user-male-circle"/>    
            <div class="container-fluid">
            <h5 >ADMIN</h5>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Tài khoản" required>
                        <div id="emailHelp" class="form-text" style='color:red'>Bạn không nên chia sẻ tài khoản cho bất kì ai! </div>
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>                 
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" required>                       
                    </div>
                    <?php
                        if(isset($tb)&&($tb)!=""){
                            echo "<h4 style='color:red'>".$tb."</h4>";
                        }
                        elseif(isset($_SESSION['s_tb'])){
                            echo "<h4 style='color:red'>".$_SESSION['s_tb']."</h4>";
                        }else{
                            echo "";
                        }
                    ?>

                        <input type="submit" class="btn btn-primary" name="dangnhap" value="Đăng nhập">                   
                    </form>
            </div>
        </div>
    </div>
</body>

</html>