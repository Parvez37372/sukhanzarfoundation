<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/PHPMailer-master/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/PHPMailer-master/src/SMTP.php';
require __DIR__ . '/PHPMailer/PHPMailer-master/src/Exception.php';

include 'config.php';

function showAlert($title, $message, $icon, $redirect = true) {
    echo "<!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>Notification</title>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <style>
            body {
                background-color: #f9f9f9;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                font-family: Arial, sans-serif;
            }
        </style>
    </head>
    <body>
        <script>
            Swal.fire({
                title: '$title',
                text: '$message',
                icon: '$icon',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                backdrop: true,
                allowOutsideClick: false,
                timer: 4000,
                timerProgressBar: true
            }).then(() => {
                " . ($redirect ? "window.location.href = document.referrer;" : "") . "
            });
        </script>
    </body>
    </html>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if email exists
    $check = mysqli_query($conn, "SELECT * FROM subscribers WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        showAlert('⚠️ Already Subscribed', 'This email is already in our list.', 'info');
    }

    // Insert new email
    $insert = mysqli_query($conn, "INSERT INTO subscribers (email) VALUES ('$email')");

    if ($insert) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sukhanzarfoundation@gmail.com';
            $mail->Password = 'plcqijmdwxnzrsxb';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('sukhanzarfoundation@gmail.com', 'Sukhanzar Foundation');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Thanks for Subscribing - Sukhanzar Foundation';
            $mail->Body = '<h3>Thank you for subscribing!</h3><p>You will now receive updates from Sukhanzar Foundation.</p>';

            $mail->send();
            showAlert('✅ Subscribed!', 'Thank you for subscribing to Sukhanzar Foundation.', 'success');
        } catch (Exception $e) {
            showAlert('❌ Mail Error', addslashes($mail->ErrorInfo), 'error');
        }
    } else {
        showAlert('❌ Error', 'Could not save your subscription.', 'error');
    }
}
?>
