<?php
session_start();
include 'config.php'; // Database connection

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer
require __DIR__ . '/PHPMailer/PHPMailer-master/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/PHPMailer-master/src/SMTP.php';
require __DIR__ . '/PHPMailer/PHPMailer-master/src/Exception.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = mysqli_real_escape_string($conn, $_POST['First_name'] ?? '');
    $last_name  = mysqli_real_escape_string($conn, $_POST['Last_name'] ?? '');
    $email      = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
    $number     = mysqli_real_escape_string($conn, $_POST['number'] ?? '');
    $password   = mysqli_real_escape_string($conn, $_POST['password'] ?? '');

    // Validation
    if (empty($first_name) || empty($last_name) || empty($email) || empty($number) || empty($password)) {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = '❌ All fields are required.';
        header("Location: signup.php");
        exit();
    }

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $_SESSION['status'] = 'warning';
        $_SESSION['message'] = '⚠️ Email already registered.';
        header("Location: signup.php");
        exit();
    }

    // Generate 6-digit OTP
    $otp = rand(100000, 999999);

// Store data in session for later verification
$_SESSION['signup_otp'] = $otp;
$_SESSION['signup_email'] = $email;
$_SESSION['signup_data'] = [
    'first_name' => $first_name,
    'last_name'  => $last_name,
    'email'      => $email,
    'phone'      => $number,
    'password'   => ($password), // ✅ HASHED
];


    // Send OTP via Email using PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sukhanzarfoundation@gmail.com'; // Your Gmail
        $mail->Password   = 'plcqijmdwxnzrsxb'; // Gmail App Password (NOT your Gmail login password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('sukhanzarfoundation@gmail.com', 'Sukhanzar Foundation');
        $mail->addAddress($email, $first_name . ' ' . $last_name);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for Sukhanzar Signup';
        $mail->Body    = "<h3>Your OTP is: <strong>$otp</strong></h3><p>Please enter it to verify your email address.</p>";

        $mail->send();

        $_SESSION['status'] = 'info';
        $_SESSION['message'] = '📧 OTP sent to your email. Please verify.';
        header("Location: verify-otp.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = '❌ OTP email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        header("Location: signup.php");
        exit();
    }
}
?>
