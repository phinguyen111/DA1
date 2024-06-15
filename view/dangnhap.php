<?php 
    if(isset($_SESSION['tb'])){
        $thongbao = $_SESSION['tb'];
    }else{
        $thongbao = '<p class="color-text-header">
        (*) Nếu đã có tài khoản từ website cũ, mời bạn thực hiện đăng nhập với số điện thoại đã dùng để Totoday cập nhật lại thông tin nhé! </br>
    </p>';
    }

?>

<section>
        <div class="FORM-ALL">
            <div class="info-text">
                <?=$thongbao?>                    
            </div>
                <div class="BOX-FORM" id="BOX-FORM">
                    <!-- ..............dangnhap............... -->
                    <div class="Dangnhap-Dangky">           
                        <button id="dangnhap">
                            ĐĂNG NHẬP
                        </button>
                    </div>
                    <div class="form-input" id="form-input">
                        <form action="index.php?page=dangnhap" method="post">
                            <div class="form-name">
                                <legend class="tieude name">Tên đăng nhập</legend>
                                <div class="input-namelgn">
                                    <input id="namelgn" name="username" placeholder="Tên đăng nhập" type="text" required="">
                                </div>
                            </div>
                            <div class="form-passwork">
                                <legend class="tieude passwork">Mật khẩu</legend>
                                <div id="input-passwork">
                                    <input class="input-passwork" id="password" name="password" placeholder="Mật khẩu" type="password">
                                    <div id="button-passwork">
                                        <button class="button-passwork" tabindex="0" type="button">
                                            <i class="fa-solid fa-lock"></i>
                                            <span class=""></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="BUTTON-FORM">
                                <input class="btn-dangnhap" tabindex="0" type="submit" name="dangnhap"  value="Đăng nhập">
                            </div>
                                                    </form>
                        <div class="hoac" role="separator">
                            <span style="display: inline-block;padding-left: calc(8px * 1.2);padding-right: calc(8px * 1.2);">Hoặc</span>
                        </div>
                        <div class="BUTTON-FORM-GOOGLE">
                            <div class="flex-btn">  
                                <img src="layout/img/fixed/google.webp" alt="">     
                                <p class="chu-gg">Google</p>
                                <span class=""></span>
                            </div>
                        </div>
                        <div class="remember-me">
                        <p class="">Bạn quên mật khẩu?
                                <a href="index.php?page=repassword">
                                <span class="subribe" id="loginform"> 
                                    Quên mật khẩu ?
                                </span>
                                </a>
                            </p>
                            <p class="">Bạn mới biết đến FashionFusion?
                                <a href="index.php?page=dangky">
                                <span class="subribe" id="subribe"> 
                                    Đăng Ký
                                </span>
                                </a>
                            </p>
                        </div>
                    </div>
                    
                    
                    </div>
                </div>
    </section>