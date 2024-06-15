<?php 
    $total_cart = count_cart();
    if(isset($_SESSION['user'])&&(count($_SESSION['user'])>0)&&is_array($_SESSION['user'])){
        extract($_SESSION['user']);

        $html_form=' <button class="btn">'.$hoten.'</button>
        <div class="login-form" id="loginForm">
        <ul id="ul-from">
          <li><a href="index.php?page=view_account"><i class="bx bx-user-circle"></i><span>Thông tin tài khoản</span></a></li>
          <li><a href="check_form_bill.php"><i class="bx bx-spreadsheet"></i><span>Đơn hàng của tôi</span></a></li>
          <li><a href="index.php?page=logout"><i class="bx bx-exit" ></i><span>Thoát</span></a></li>
        </ul> 
      </div>
            
        ';
    }
    else{
        $html_form=' <button class="btn">My account</button>
                    <div class="login-form" id="loginForm">
                        <ul id="ul-from">
                          <li><a href="index.php?page=dangnhap"><i class="bx bx-user-circle"></i><span>Đăng nhập</span></a></li>
                          <li><a href="index.php?page=dangky"><i class="bx bx-spreadsheet"></i><span>Đăng ký Tài khoản</span></a></li>
                        </ul> 
                    </div>';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Fusion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="layout/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="layout/js/script.js"></script>
</head>
<body>
    <header>
            <div class="logo"><img src="layout/img/fixed/LogoWeb.jpg" alt="" width=" 100px"></div>
             <!-- Menu icons -->
            <i class='bx bx-menu' id="menu-icon"></i>    
            <ul class="nav-bar">
                <li><a href="index.php">TRANG CHỦ </a></li>
                <li><a href="index.php?page=sanpham">SẢN PHẨM</a></li>
                <li><a href="index.php?page=lienhe">LIÊN HỆ</a></li>
                <li><a href="index.php?page=gioithieu">GIỚI THIỆU</a></li>
            </ul>
            <div class="cart-item">
                <i class='bx bx-search-alt' id="search-icon" ></i>
                <a href="index.php?page=cart">
                    <i class='bx bx-cart-alt' id="cart-icon" ></i>
                    <span class="number-cart"><?= $total_cart?></span>
                </a>     
            </div>
            <div class="header-icon " onclick="toggleLoginForm()"  >
                <i class='bx bxs-user-circle' id="user-form" ></i>
                <?=$html_form?>
                  <!-- OPEN LOGIN FORM -->
                
            </div>
            <div id="notification" style="display: block;"></div>
            <!-- OPEN FORM SEARCH -->
            <div class="search-form">
                <form action="index.php?page=sanpham" method="post">
                    <input type="search" name="search"  placeholder="Tìm kiếm...">
                </form>
            </div>
            <!-- OPEN FORM LOGIN  -->
            <div class="user-profile" id="user-profile">
                <!-- Thông tin khách hàng, đăng nhập, thay đổi mật khẩu, đơn hàng của tôi sẽ được hiển thị ở đây -->
               <ul>
                    <li><a href="">
                        <i></i>
                        <span>Thông tin khách hàng</span>
                    </a></li>
                    <li><a href="">
                        <i></i>
                        <span>Chức năng khách hàng</span>
                    </a></li>
                    <li><a href="">
                        <i></i>
                        <span>Kiểm tra đơn hàng</span>
                    </a></li>
               </ul>
            </div>
    </header>
