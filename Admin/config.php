
<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once('../dao/pdo.php');
require_once('../dao/mail.php');
include_once('./SMTP/class.smtp.php');
include_once('./SMTP/PHPMailerAutoload.php');
include_once('./SMTP/class.phpmailer.php');

// function sendCSM($mail_nhan, $ten_nhan, $chu_de, $noi_dung, $bcc)
// {
//     global $site_gmail, $site_pass; // Tên người gửi
//     $bcc = 'Thành';
//     $mail = new PHPMailer();
//     $mail->SMTPDebug = 0;
//     $mail->Debugoutput = "html";
//     $mail->isSMTP();
//     $mail->Host = 'smtp.gmail.com';
//     $mail->SMTPAuth = true;
//     $mail->Username = $site_gmail;
//     $mail->Password = $site_pass;
//     $mail->SMTPSecure = 'tls';
//     $mail->Port = 587;
//     $mail->setFrom($site_gmail, $bcc);
//     $mail->addAddress($mail_nhan, $ten_nhan);
//     // $mail->addReplyTo($site_gmail, $bcc);
//     $mail->isHTML(true);
//     $mail->Subject = $chu_de;
//     $mail->Body    = $noi_dung;
//     $mail->CharSet = 'UTF-8';
//     $send = $mail->send();
//     return $send;
// }
$id = isset($_GET['id']) ? $_GET['id'] : null;


if ($id) {
    // Lấy thông tin người dùng từ cơ sở dữ liệu (thay thế bằng cách lấy dữ liệu từ cơ sở dữ liệu của bạn)
    $userData = getUserDataFunction($id);
    // var_dump($userData);
    if ($userData) {
        // Thực hiện gửi email
        sendMailFunction($userData);
    } else {
        echo json_encode(['error' => 'User not found']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}

function getUserDataFunction($id) {
        $sql = "SELECT * FROM mail WHERE id=?";
        return pdo_query($sql,$id);
    // Thực hiện truy vấn để lấy thông tin người dùng từ cơ sở dữ liệu
    // ... (điều này phụ thuộc vào cách bạn tổ chức cơ sở dữ liệu của mình)
}

function sendMailFunction($userData) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // SMTP server của Gmail
        $mail->SMTPAuth   = true;
        $mail->Username   = 'thanhnhlps35203@fpt.edu.vn'; // Tài khoản Gmail của bạn
        $mail->Password   = 'tfny srgw yams vwob'; // Mật khẩu ứng dụng bạn đã tạo
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587; // Cổng SMTP của Gmail
        $mail->CharSet = 'UTF-8';
        $mail->HeaderLine('Content-Type', 'text/plain; charset=UTF-8');
        $mail->HeaderLine('Content-Transfer-Encoding', '8bit');
        
        //Recipients
        $mail->setFrom('thanhnhlps35203@fpt.edu.vn', 'TEAM SIX'); // Địa chỉ email và tên người gửi
        // $mail->addAddress($userData['email'], $userData['username']); // Địa chỉ email và tên người nhận
        // Lấy phần trước @ từ địa chỉ email
        $emailParts = explode('@', $userData[0]['email']);
        $nameBeforeAt = $emailParts[0];

        // Thêm địa chỉ email với tên người nhận vào danh sách người nhận
        $mail->addAddress($userData[0]['email'], $nameBeforeAt);

        //Content
        $mail->isHTML(true);
        // $mail->Subject = '<h4>[Thông Báo] Sự Kiện Khuyến Mãi Đặc Biệt Ngày 12/12 - Mua Sắm Thả Ga!</h4>';

        // Sử dụng các ký tự Unicode trong Subject
        $mail->Subject = '[Thông Báo]  Sự Kiện Khuyến Mãi Đặc Biệt Ngày 12/12 - Mua Sắm Thả Ga!';


        // Nội dung email có sẵn, bạn có thể tùy chỉnh nó theo yêu cầu của bạn
        $body = file_get_contents('../admin/public/email.html');
        // Thay thế tên người dùng trong nội dung email
        $body = str_replace('{username}', $userData[0]['email'], $body);

        $mail->Body = $body;

        $mail->send();

        $_SESSION['date']= json_encode(['dateSent' => date('Y-m-d H:i:s')]);
        $tb="Gửi thành công";
        $mail_list=get_mail();   
        require_once('../admin/public/mail.php');

    } catch (Exception $e) {
        echo json_encode(['error' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
    }
}

// function check_img($img)
// {
//     $filename = $_FILES[$img]['name'];
//     $ext = explode(".", $filename);
//     $ext = end($ext);
//     $valid_ext = array("png", "jpeg", "jpg", "PNG", "JPEG", "JPG", "gif", "GIF");
//     if (in_array($ext, $valid_ext)) {
//         return true;
//     }
// }


?>