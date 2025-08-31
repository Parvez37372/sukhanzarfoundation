<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/PHPMailer-master/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/PHPMailer-master/src/SMTP.php';
require __DIR__ . '/PHPMailer/PHPMailer-master/src/Exception.php';

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        $token = bin2hex(random_bytes(50));
        $expiry = date("Y-m-d H:i:s", strtotime("+30 minutes"));

        mysqli_query($conn, "UPDATE users SET reset_token = '$token', token_expiry = '$expiry' WHERE email = '$email'");

        $resetLink = "http://yourdomain.com/reset_password.php?token=$token";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'sukhanzarfoundation@gmail.com'; // your Gmail
$mail->Password   = 'plcqijmdwxnzrsxb';              // App password, not your real Gmail password
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;


            $mail->setFrom('sukhanzarfoundation@gmail.com', 'Sukhanzar Foundation');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Reset Your Password';
            $mail->Body    = "Click <a href='https://sukhanzarfoundation.com/reset_password.php
'>here</a> to reset your password. Link expires in 30 minutes.";

            $mail->send();
            echo "<script>alert('Reset link sent to your email.'); window.location.href='account.php';</script>";
        } catch (Exception $e) {
            echo "<script>alert('Mailer Error: {$mail->ErrorInfo}'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Email not found'); window.history.back();</script>";
    }
}
?>
