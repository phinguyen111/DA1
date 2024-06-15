<section>
        <div class="FORM-ALL">
            <div class="info-text">
                <p class="color-text-header">
                    (*) Nếu đã có tài khoản từ website cũ, mời bạn thực hiện đăng ký với số điện thoại đã dùng để Totoday cập nhật lại thông tin nhé!
                </p>
            </div>
                <div class="BOX-FORM" id="BOX-FORM">
                    <!-- ..............dangnhap............... -->
                    <div class="Dangnhap-Dangky">           
                        <button id="dangky">
                            ĐĂNG KÝ
                        </button>
                    </div>
                   
                    <div class="form-input2" id="form-input2">
                        <form action="index.php?page=add_user" method="post">
                        <div class="form-name">
                                <legend class="tieude name">Họ & Tên </legend>
                                <div class="input-namelgn">
                                    <input id="namelgn" name="hoten" placeholder="Họ , tên người dùng" type="text" required="">
                                </div>
                            </div>
                            <div class="form-name">
                                <legend class="tieude name">Số điện thoại</legend>
                                <div class="input-namelgn">
                                    <input id="namelgn" name="dienthoai" placeholder="Số điện thoại" type="number" required="">
                                </div>
                            </div>

                            <div class="form-name">
                                <legend class="tieude name">Email</legend>
                                <div class="input-namelgn">
                                    <input id="namelgn" name="email" placeholder="Nhập email" type="text" required="">
                                </div>
                            </div>

                            <div class="form-name">
                                <legend class="tieude name">Tên đăng nhập</legend>
                                <div class="input-namelgn">
                                    <input id="namelgn" name="username" placeholder="Tên đăng nhập" type="text" required="">
                                </div>
                            </div>

                            <div class="form-passwork">
                                <legend class="tieude passwork">Mật khẩu</legend>
                                <div id="input-passwork">
                                    <input class="input-passwork" id="password" name="password" placeholder="Mật khẩu" type="text">
                                    <div id="button-passwork">
                                        <button class="button-passwork" tabindex="0" type="button">
                                            <i class="fa-solid fa-lock"></i>
                                            <span class=""></span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-passwork">
                                <legend class="tieude passwork">Nhập lại mật khẩu</legend>
                                <div id="input-passwork">
                                    <input class="input-passwork" id="password" name="checkpass" placeholder="Nhập lại mật khẩu" type="text">
                                    <div id="button-passwork">
                                        <button class="button-passwork" tabindex="0" type="button">
                                            <i class="fa-solid fa-lock"></i>
                                            <span class=""></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="BUTTON-FORM">
                                <input class="btn-dangnhap" tabindex="0" name="dangky" type="submit" value="Đăng ký">
                            </div>
                        </form>
                        <div class="hoac" role="separator">
                            <span style="display: inline-block;padding-left: calc(8px * 1.2);padding-right: calc(8px * 1.2);">Hoặc</span>
                        </div>
                        <div class="BUTTON-FORM-GOOGLE">
                            <div class="flex-btn">  
                                <img src="layout/img/fixed/google.webp" alt="">     
                                <p class="chu-gg">Google</p>
                            </div>
                        </div>
                        <div class="remember-me">
                            <p class="">Bạn đã có tài khoản !
                                <a href="index.php?page=dangnhap">
                                <span class="subribe" id="loginform"> 
                                    Đăng Nhập
                                </span>
                                </a>
                            </p>
                        </div>
                    </div>
                  
                </div>
        </div>
</section>