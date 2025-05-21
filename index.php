<?php
session_start();
ob_start();
if (!isset($_SESSION['giohang']) || !is_array($_SESSION['giohang'])) {
    $_SESSION['giohang'] = [];
}
require_once("dao/binhluan.php");
require_once("dao/voucher.php");
require_once("dao/pdo.php");
require_once("dao/cart.php");
require_once("dao/danhmuc.php");
require_once("dao/product.php");
require_once("dao/user.php");
require_once("dao/bill.php");
require_once("dao/mail.php");
$parentdm = showparent();
$showdm = showdm(6);
$dssp_new = sp_new(8);
$dssp_dexuat = sp_dexuat(4);
$dssp_bestseler = sp_bestseler(4);
$dssp_view = sp_view(8);
require_once("view/header.php");
if (!isset($_GET["page"])) {
    require_once("view/home.php");
} else {
    switch ($_GET["page"]) {
        case "sanpham":
            $showdm = showdm(6);
            if (!isset($_GET['iddm'])) {
                $iddm = 0;
                $titlepage = "";
            } else {
                $iddm = $_GET['iddm'];
                $titlepage = get_namedm($iddm);
            }
            if (isset($_POST['search']) && ($_POST['search']) || isset($_POST['sub'])) {
                $search = $_POST['search'];
                $titlepage = "Kết quả tìm kiếm cho : <span style='color: red'>$search</span> ";
            } else {
                $search = "";
            }
            $dssp = get_dssp($search, $iddm);
            require_once("view/sanpham.php");
            break;
        case "details":
            if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                $id = $_GET["id"];
                $iddm = get_iddm($id);
                $titlepage = get_namedm($iddm);
                $sp_chitiet = get_details($id);

                if (isset($sp_chitiet['variant'])) {
                    $variantData = json_decode($sp_chitiet['variant']);
                } else {
                    $variantData = "";
                }
                $sp_lienquan = get_dssp_lienquan($iddm, $id);
                $idsp = $_GET['id'];
                $dsbl = show_bl($idsp);
                require_once("view/details.php");
            } else {
                $id = 0;
                require_once("view/details.php");
            }
            break;
        case "voucher":

            header('Location: index.php?page=cart');
            break;
        case "cart":
            if (isset($_SESSION['giohang'])) {
                $_Provisional = get_total_all();
                $tb = "";
                $discount_amount = 0;
                if (isset($_POST['appma'])) {
                    $voucher = $_POST['ma_voucher'];
                    $voucher_data = get_voucher($voucher);

                    if ($voucher_data && is_array($voucher_data)) {
                        $discount_code = $voucher_data['discount_code'];
                        $date = date('Y-m-d');
                        $check_date = $voucher_data['date'];
                        if ($voucher == $discount_code && $check_date >= $date) {
                            // Áp dụng giảm giá trực tiếp vào tổng ban đầu $_Provisional
                            $discount_amount = $voucher_data['discount_amount'];
                            $tb = '<div class="conect_ok">
                                            <i class="bx bx-check-circle check"></i> <p>Áp mã thành công </p>
                                        </div>';
                        } else {
                            $tb = '<div class="notification">
                                            <i class="bx bx-x-circle check"></i>
                                            <p>Mã voucher của bạn sai hoặc hết hạn</p>
                                    </div>';
                        }
                    } else {
                        $tb = '<div class="notification">
                                    <i class="bx bx-x-circle check"></i>
                                    <p>Không tìm thấy mã voucher hoặc có lỗi xử lý dữ liệu</p>
                            </div>';
                    }
                }
            }

            $_SESSION['voucher'] = $discount_amount;
            $_SESSION['info_voucher'] = $tb;
            $Total_all = $_Provisional - $discount_amount;
            $_SESSION['check_out'] = [$_Provisional, $Total_all];
            require_once("view/cart.php");
            break;

        case "update_cart":
            if (isset($_POST['soluong']) && is_array($_POST['soluong'])) {
                foreach ($_POST['soluong'] as $key => $value) {
                    if (is_numeric($value) && $value > 0) {
                        $_SESSION['giohang'][$key]['soluong'] = $value; // Cập nhật số lượng cho từng sản phẩm trong giỏ hàng
                        // Tính lại tổng số tiền hoặc các thay đổi khác nếu cần
                    }
                }
                // Điều hướng hoặc làm gì đó sau khi cập nhật thành công
                header("Location: index.php?page=addcart"); // Điều hướng về trang giỏ hàng của bạn
            }
            break;
        case "thanhtoan":
            if (isset($_SESSION['giohang'])) {
                $_Provisional = get_total_all();
                $ship = 30000;
                $voucher = $_SESSION['voucher'];
                $Total_all = ($_SESSION['check_out'][0] + $ship) - $voucher;
                require_once("view/thanhtoan.php");
            }
            if (!isset($_SESSION['user'])) {
                $tb_dn = '<h4 style="color:red">Vui lòng đăng nhập tài khoản tại trang web mới được đặt hàng !!!</h4>';
                $_SESSION['tb_dn'] = $tb_dn;
                header('Location: index.php?page=dangnhap');
            }
            break;
        case 'repassword':
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'sent_email') {
                $email = $_POST['email'];

                // Kiểm tra email có tồn tại trong database hay không
                $query = "SELECT * FROM users WHERE email = ?";
                $stmt = $conn->prepare($query);
                $stmt->execute([$email]);
                $user = $stmt->fetch();

                if ($user) {
                    // Tạo một token ngẫu nhiên
                    $token = bin2hex(random_bytes(32));

                    // Lưu token vào database
                    $query = "UPDATE users SET reset_token = ? WHERE email = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->execute([$token, $email]);

                    // Gửi email đổi mật khẩu
                    if (sendResetPasswordEmail($email, $token)) {
                        $success_message = 'Email đổi mật khẩu đã được gửi. Vui lòng kiểm tra hộp thư của bạn.';
                    } else {
                        $error_message = 'Đã xảy ra lỗi khi gửi email. Vui lòng thử lại sau.';
                    }
                } else {
                    $error_message = 'Email không tồn tại trong hệ thống.';
                }

                // Điều hướng về trang chủ sau khi xử lý xong
                header('Location: index.php');
                exit();
            }

            // Hiển thị trang repassword.php
            require_once('view/repassword.php');
            break;


        case "update-password":
            if (isset($_GET['token'])) {
                $token = $_GET['token'];
                // Kiểm tra token và hiển thị form đổi mật khẩu
                require_once('view/update-password.php');
            } else {
                // Hiển thị thông báo lỗi nếu không có token
                echo 'Token không hợp lệ.';
            }
            break;
        case "addcart":
            if (isset($_POST['addcart'])) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $hinhanh = $_POST['hinhanh'];
                $khuyenmai = $_POST['sell'];
                $giasp = $_POST['giagoc'];
                $soluong = $_POST['soluong'];

                $productExists = false;
                foreach ($_SESSION['giohang'] as &$sp) {
                    if ($sp['id'] == $id) {
                        $sp['soluong'] += $soluong;
                        $sp['thanhtien'] = $sp['soluong'] * $sp['giasp'] * 1000;
                        $productExists = true;
                        usort($_SESSION['giohang'], function ($a, $b) {
                            return $b['timestamp'] - $a['timestamp'];
                        });
                        break;
                    }
                }

                if (!$productExists) {
                    $addsp = array(
                        'id' => $id,
                        "tensp" => $tensp,
                        "hinhanh" => $hinhanh,
                        "soluong" => $soluong,
                        "giasp" => $giasp,
                        "khuyenmai" => $khuyenmai,
                        'thanhtien' => $soluong * $giasp * 1000,
                    );
                    $_SESSION['giohang'][] = $addsp;
                    usort($_SESSION['giohang'], function ($a, $b) {
                        return $b['timestamp'] - $a['timestamp'];
                    });
                }
                header('Location: index.php?page=cart');
            }
            break;

        case "bill":
            if (isset($_POST['dathang']) && $_SESSION['giohang']) {
                $iduser = $_SESSION['user']['id'];
                $day_time = $_SESSION['date'];
                $date = str_replace('"', '', $day_time);
                $hoten = $_POST['name'];
                $sdt = $_POST['phone'];
                $email = $_POST['email'];
                $madh = rand(0, 1000) . "FSHOP_XYZ";
                $ship = 30000;
                $ghichu = $_POST['note'];
                $tongdonhang = ($_SESSION['check_out'][0]);
                $tongthanhtoan = ($_SESSION['check_out'][1] + $ship);
                $pttt = $_POST['pttt'];
                if (isset($_POST['province']) && isset($_POST['district']) && isset($_POST['ward'])) {
                    $province = $_POST['province']; // Tỉnh/thành phố
                    $district = $_POST['district']; // Quận/huyện
                    $ward = $_POST['ward']; // Xã/phường
                    $diachi = $ward . ', ' . $district . ', ' . $province;
                }
                if (isset($_SESSION['voucher'])) {
                    $voucher = $_SESSION['voucher'];
                } else {
                    $voucher = 0 + "d";
                }
                $conn = pdo_get_connection();
                $idbill = insert_bill($conn, $iduser, $hoten, $sdt, $madh, $date, $email, $diachi, $ghichu, $tongdonhang, $ship, $voucher, $tongthanhtoan, $pttt);
                foreach ($_SESSION['giohang'] as $product) {
                    $idsp = $product['id']; // ID sản phẩm
                    $hinhanh = $product['hinhanh']; // Hình ảnh sản phẩm
                    $tensp = $product['tensp']; // Tên sản phẩm
                    $giasp = $product['giasp']; // Giá sản phẩm
                    $soluong = $product['soluong']; // Số lượng sản phẩm
                    $thanhtien = $product['thanhtien'];
                    insert_cart_order($idsp, $idbill, $hinhanh, $tensp, $giasp, $soluong, $thanhtien);
                    $get_bill = show_orderproduct($idbill);
                }
                $show_info_order = info_order($madh);
            }
            unset($_SESSION['giohang']);
            require_once("view/bill.php");
            break;

        case "check_bill":
            if (isset($_POST['view_bill'])) {
                $madh = $_POST['ma_don_hang'];
                if (!empty($madh)) {
                    $show_bill = check_bill($madh);
                    if ($show_bill) {
                        $idbill = $show_bill['id'];
                        $show_pd_bill = check_pd_idbill($idbill);
                        require_once('view/check_bill.php');
                    } else {
                        echo '<script>alert("Mã đơn hàng không hợp lệ. Vui lòng kiểm tra lại.")
                        ;window.location = "check_form_bill.php";</script>';
                    }
                }
            }
            break;

        case 'delete':
            if (isset($_GET['index']) && ($_GET['index'] >= 0)) {
                $index = $_GET['index'];
                if (isset($_SESSION['giohang']) && isset($_SESSION['giohang'][$index])) {
                    unset($_SESSION['giohang'][$index]);
                    $_SESSION['giohang'] = array_values($_SESSION['giohang']);
                }
                header('location: index.php?page=cart');
            } else {
                unset($_SESSION['giohang']['soluong']);
                header('location: index.php?page=cart');
            }
            break;

        case 'dangky':
            require_once('view/dangky.php');
            break;
        case 'add_user':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $hoten = $_POST['hoten'];
                $username = $_POST['username'];
                $dienthoai = $_POST['dienthoai'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $checkpass = $_POST['checkpass'];
                if ($checkpass == $password) {
                    insert_dangky($hoten, $username, $dienthoai, $email, $password);
                    header('location: index.php?page=dangnhap');
                }
            };
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $check = check_user($username, $password);

                if (is_array($check) && (count($check))) {
                    $_SESSION['user'] = $check;
                    header('location: index.php');
                    exit;
                } else {
                    $tb = '<h4 style="color:red">Thông tin tài khoản đăng nhập sai hoặc không tồn tại !!!</h4>';
                    $_SESSION['tb'] = $tb;
                    header('location: index.php?page=dangnhap');
                    exit;
                }
            } else if (isset($_SESSION['tb_dn'])) {
                $tb_dn = '<h4 style="color:red">Vui lòng đăng nhập tài khoản tại trang web mới được đặt hàng !!!</h4>';
                $_SESSION['tb'] = $tb_dn;
            }
            require_once('view/dangnhap.php');
            break;
        case 'logout':
            if (isset($_SESSION['user']) && (count($_SESSION['user']) > 0)) {
                unset($_SESSION['user']);
            };
            header('location: index.php');
            break;
        case 'view_account':
            require_once('view/myaccount.php');
            break;
        
        default:
            require_once("view/home.php");
            break;
    }
}
require_once("view/footer.php");
