<?php
// Kết nối database
$conn = pdo_get_connection();

$token = $_GET['token'];

$query = "SELECT * FROM user WHERE reset_token = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$token]);
$user = $stmt->fetch();

if ($user) {
    // Hiển inthị form đổi mật khẩu
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($newPassword === $confirmPassword) {
            $plainPassword = $newPassword;
            $query = "UPDATE user SET password = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$plainPassword, $user['id']]);
        
            // Đặt lại reset_token về 0 sau 1 phút
            $stmt = $conn->prepare("UPDATE user SET reset_token = 0 WHERE id = ?");
            $stmt->execute([$user['id']]);
            echo 'Đổi mật khẩu thành công.';
        } else {
            echo 'Mật khẩu mới và xác nhận mật khẩu không khớp.';
        }
    }

?>
    
    <div class="BOX-FORM" id="BOX-FORM" style="margin-left: 20%; margin-top: 2%; margin-bottom:2%; ">
                    <div class="Dangnhap-Dangky">           
                        <button id="dangnhap">
                            Đổi mật khẩu 
                        </button>
                    </div>
                    <div class="form-input" id="form-input">
                        <form method="post">
                            <div class="form-name">
                                <legend class="tieude name">Nhập mật khẩu:</legend>
                                <div class="input-namelgn">
                                    <input id="namelgn" name="new_password" placeholder="Nhập mật khẩu" type="password" required="">
                                </div>
                            </div>
                            <div class="form-passwork">
                                <legend class="tieude passwork">Xác nhận mật khẩu:</legend>
                                <div id="input-passwork">
                                    <input class="input-passwork" id="confirm_password" name="confirm_password" placeholder=" Nhập lại mật khẩu" type="password">
                                    <div id="button-passwork">
                                        <button class="button-passwork" tabindex="0" type="button">
                                            <i class="fa-solid fa-lock"></i>
                                            <span class=""></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="BUTTON-FORM">
                                <input class="btn-dangnhap" tabindex="0" type="submit" name="doimatkhau"  value="Đổi mật khẩu">
                            </div>
                                                    </form>
                       
                    </div>
                    
                    
                    </div>
                </div>
<?php
} else {
    echo 'Token không hợp lệ.';
}
?>