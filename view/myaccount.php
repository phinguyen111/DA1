<?php
require_once("dao/pdo.php");
require_once("dao/user.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['user']['id'];
    $hoten = $_POST['fullname'];
    $dienthoai = $_POST['mobile'];
    $email = $_POST['email'];
    // $diachi = $_POST['address'];

    $result = update_user_info($id, $hoten, $dienthoai, $email);

    if ($result) {
        // Cập nhật thành công
        echo "Cập nhật thông tin thành công!";
        // Cập nhật lại thông tin trong session
        $_SESSION['user']['hoten'] = $hoten;
        $_SESSION['user']['dienthoai'] = $dienthoai;
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['diachi'] = $diachi;
    } else {
        // Cập nhật thất bại
        echo "Có lỗi xảy ra khi cập nhật thông tin.";
    }
}

?>
<section class="my_account">
    <div class="section-product-flex">
        <div class="row1">
            <div class="wrap-left">
                <div class="wl-top">
                    <div class="wl-avatar">
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="wl-info">
                        <div class="wl-name"><?php echo $_SESSION['user']['hoten'] ?></div>
                        <div class="wl-account">Toto Member</div>
                    </div>
                </div>
                <div class="wl-bottom">
                    <ul class="list-action">
                        <li>
                            <a href="#tab1" class="active" onclick="showTab('tab1', this)">
                                <i class='bx bx-user MuiSvgIcon-root'></i>
                                <span>Thông tin tài khoản</span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab2" onclick="showTab('tab2', this)">
                                <i class='bx bx-lock-open bx-flip-horizontal MuiSvgIcon-root'></i>
                                <span>Thay đổi mật khẩu</span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab3" onclick="showTab('tab3', this)">
                                <i class='bx bx-spreadsheet MuiSvgIcon-root'></i>
                                <span>Đơn hàng của tôi</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class='bx bx-heart MuiSvgIcon-root'></i>
                                <span>Danh sách sản phẩm yêu thích</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row2">
            <form action="" class="profile tab-content" method="POST" id="tab1">
                <p class="profile-title">Thông tin tài khoản</p>
                <div class="flex-input gx-4">
                    <div class="col-md-6">
                        <label for="floatingInput">Họ tên</label>
                        <input name="fullname" type="text" id="floatingInput" value="<?php echo $_SESSION['user']['hoten'] ?>" class="form-control" placeholder="Họ tên">
                    </div>
                    <div class="col-md-6">
                        <label for="floatingInput">Ngày sinh</label>
                        <input name="birthday" id="birthday" type="date" value="2023-11-01" class="validate[required] form-control inputDateEdit" placeholder="Ngày sinh">
                        <input type="hidden" class="birthdayChange" value="">
                    </div>
                </div>
                <div class="flex-input gx-4 mt-3">
                    <div class="col-md-6">
                        <label for="floatingInput">Số điện thoại</label>
                        <input name="mobile" type="text" value="<?php echo $_SESSION['user']['dienthoai'] ?>" class="form-control" placeholder="Số điện thoại">
                    </div>
                    <div class="col-md-6">
                        <label for="floatingInput">Email</label>
                        <input name="email" type="text" id="fEmail" value="<?php echo $_SESSION['user']['email'] ?>" class="form-control" placeholder="Email">
                    </div>
                    <div class="col-12 mt-3">
                        <label>Giới tính</label>
                        <div class="gender-wrap" style="display: flex; gap: 30px;">
                            <div class="gender-item">
                                <input type="radio" name="gender" id="gender" value="1" checked="">
                                <span>Nam</span>
                            </div>
                            <div class="gender-item">
                                <input type="radio" name="gender" id="gender" value="2">
                                <span>Nữ</span>
                            </div>
                        </div>
                        <div class=" gx-4 mt-3">
                            <div class="col-12">
                                <label for="floatingInput">Số nhà + Tên đường</label>
                                <input name="address" id="address" type="text" value="Bình Đại" class="form-control" placeholder="Nhập số nhà và tên đường">
                            </div>
                        </div>
                        <div class="input-email-sdt">
                            <div class="input-css002">
                                <label for="provinceSelect" class="css-tieude">Tỉnh / Thành phố</label>
                                <select class="select_user" name="province" id="provinceSelect">
                                    <option value="">Chọn Tỉnh / Thành Phố</option>
                                    <option value="Ben Tre">Bến Tre</option>
                                    <option value="Ho Chi Minh">Hồ Chí Minh</option>
                                </select>
                            </div>
                            <div class="input-css002">
                                <label for="districtSelect" class="css-tieude">Quận / Huyện </label>
                                <select class="select_user" name="district" id="districtSelect">
                                    <option value="">Chọn Quận / Huyện</option>
                                </select>
                            </div>
                            <div class="input-css002">
                                <label for="wardSelect" class="css-tieude">Phường / Xã</label>
                                <select class="select_user" name="ward" id="wardSelect">
                                    <option value="">Chọn Phường / Xã</option>
                                </select>
                            </div>
                        </div>
                        <script src="layout/js/address.js"></script>
                        <div class="flex-input gx-4 mt-3">
                            <div id="buy-now" class="col-12">
                                <button type="submit" name="addcart" class="buy-now">Cập Nhật</button>
                            </div>
                        </div>

            </form>
            <form action="" class="profile tab-content" method="POST" id="tab2" style="display: none;">
                <p class="profile-title">Thay đổi mật khẩu</p>
                <div class="input-name gx-4">
                    <div class="input-css01">
                        <label for="currentPassword" class="css-tieude">Mật khẩu hiện tại</label>
                        <div class="check_eye">
                            <input class="input none" id="currentPassword" name="currentPassword" type="password">
                            <i class='bx bx-low-vision mg_center' id="eyeIconCurrent" onclick="togglePassword('currentPassword', 'eyeIconCurrent')"></i>
                        </div>
                    </div>
                </div>

                <div class="input-name gx-4">
                    <div class="input-css01">
                        <label for="newPassword" class="css-tieude">Mật khẩu mới</label>
                        <div class="check_eye">
                            <input class="input none" id="newPassword" name="newPassword" type="password">
                            <i class='bx bx-low-vision mg_center' id="eyeIconNew" onclick="togglePassword('newPassword', 'eyeIconNew')"></i>
                        </div>
                    </div>
                </div>

                <div class="input-name gx-4">
                    <div class="input-css01">
                        <label for="confirmPassword" class="css-tieude">Xác nhận mật khẩu</label>
                        <div class="check_eye">
                            <input class="input none" id="confirmPassword" name="confirmPassword" type="password">
                            <i class='bx bx-low-vision mg_center' id="eyeIconConfirm" onclick="togglePassword('confirmPassword', 'eyeIconConfirm')"></i>
                        </div>
                    </div>
                </div>

                <div class="flex-input gx-4 mt-3">
                    <div id="buy-now" class="col-12">
                        <button type="submit" name="addcart" class="buy-now">Cập Nhật</button>
                    </div>
                </div>
            </form>
            <form action="" class="profile tab-content" method="POST" id="tab3" style="display: none;">
                <p class="profile-title">Đơn hàng của tôi</p>
                <div class="order-item mb-4">
                    <div class="d-flex mb-2 order-text">
                        Mã đơn hàng: 320810381 | Đặt ngày: 07/12/2023 | Thanh toán tại nhà | Tổng tiền: 407,000đ
                    </div>
                    <div class="hot-slider hot-slider-order no-change">
                        <div class="prd-item">
                            <div class="wrap-prd">
                                <!-- <a href="#">
                                    <img src="" alt="ÁO HOODIE M1AKH11302BONBA - BL - M">
                                </a> -->
                                <div class="name-qty">
                                    <a href="#">
                                        <p class="name">ÁO HOODIE M1AKH11302BONBA - BL - M</p>
                                    </a>
                                    <p>
                                        <span>1 x 385,000đ</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ord-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between wrap-status">
                            <div class="status-name">Mới</div>
                            <div class="total-price hidden-md-up">Tổng tiền: 407,000đ</div>
                        </div>
                        <a class="view-order" href="https://totoday.vn/order/320810381-fbd6c9262854713266be27891b2a85d3">Xem chi tiết</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    function showTab(tabId, element) {
        const tabs = document.querySelectorAll('.tab-content');
        const listItems = document.querySelectorAll('.list-action li a');

        tabs.forEach(tab => {
            if (tab.id === tabId) {
                tab.style.display = 'block';
            } else {
                tab.style.display = 'none';
            }
        });

        listItems.forEach(item => {
            item.classList.remove('active');
        });

        element.classList.add('active');
    }
</script>