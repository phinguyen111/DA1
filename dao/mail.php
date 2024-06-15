<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendResetPasswordEmail($email, $token)
{
    $mail = new PHPMailer(true);

    try {
        // Cấu hình server gửi mail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'phidzdz26@gmail.com'; // Email gửi
        $mail->Password = 'xnvo jork zfoi mpng'; // Mật khẩu email gửi
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Người gửi
        $mail->setFrom('your_email@gmail.com', 'Your Name');

        // Người nhận
        $mail->addAddress($email);

        // Tiêu đề email
        $mail->Subject = 'Đổi mật khẩu';

        // Nội dung email
        $resetLink = 'http://localhost/da/index.php?page=update-password&token=' . $token;
        $mail->Body = 'Nhấn vào liên kết sau để đổi mật khẩu: ' .  $resetLink;

        // Gửi email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}