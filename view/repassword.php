<?php
// Kết nối database
$conn = pdo_get_connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Kiểm tra email có tồn tại trong database hay không
    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Tạo một token ngẫu nhiên
        $token = bin2hex(random_bytes(15));

        // Lưu token vào database
        $query = "UPDATE user SET reset_token = ? WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$token, $email]);

        // Gửi email đổi mật khẩu
        if (sendResetPasswordEmail($email, $token)) {
            echo 'Email đổi mật khẩu đã được gửi. Vui lòng kiểm tra hộp thư của bạn.';
        } else {
            echo 'Đã xảy ra lỗi khi gửi email. Vui lòng thử lại sau.';
        }
    } else {
        echo 'Email không tồn tại trong hệ thống.';
    }
}
?>


<section style="margin-left: 20%;">
        <div class="FORM-ALL">
            </div>
                <div class="BOX-FORM" id="BOX-FORM">
                    <div class="Dangnhap-Dangky">           
                        <button id="dangky">
                            Quên mật khẩu
                        </button>
                    </div>
                   
                    <div class="form-input2" id="form-input2">
                        <form method="post">
                            <div class="form-name">
                                    <legend class="tieude name">Hãy Nhập Email</legend>
                                    <div class="input-namelgn">
                                        <input id="namelgn" name="email" placeholder="Nhập email của bạn" type="text" required="">
                                    </div>
                                </div>
                                
                                <div class="BUTTON-FORM">
                                    <input class="btn-dangnhap" type="submit" value="Gửi yêu cầu đổi mật khẩu">
                                </div>
                            </div>
                        </form>
                        
                    </div>
                  
                </div>
        </div>
</section>