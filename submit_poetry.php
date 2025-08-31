<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/PHPMailer-master/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/PHPMailer-master/src/SMTP.php';
require __DIR__ . '/PHPMailer/PHPMailer-master/src/Exception.php';

include 'config.php'; // DB connection
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = mysqli_real_escape_string($conn, $_POST['name']);
    $pen      = mysqli_real_escape_string($conn, $_POST['pen']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $title    = mysqli_real_escape_string($conn, $_POST['title']);
    $poetry   = mysqli_real_escape_string($conn, $_POST['poetry']);

    $sql = "INSERT INTO poetry_submissions (name, pen, email, category, title, poetry)
            VALUES ('$name', '$pen', '$email', '$category', '$title', '$poetry')";

    if (mysqli_query($conn, $sql)) {
        $mail = new PHPMailer(true);
        try {
            // SMTP Settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'sukhanzarfoundation@gmail.com'; // Your Gmail
            $mail->Password   = 'plcqijmdwxnzrsxb'; // Gmail App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('sukhanzarfoundation@gmail.com', 'Sukhanzar Submissions');

            // Admin email
            $mail->addAddress('sukhanzarfoundation@gmail.com');
            $mail->Subject = 'New Poetry Submission on Sukhanzar';
            $mail->isHTML(true);
            $mail->Body = "
                <h2>New Poetry Submission</h2>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Pen Name:</strong> $pen</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Category:</strong> $category</p>
                <p><strong>Title:</strong> $title</p>
                <p><strong>Poetry:</strong><br>" . nl2br($poetry) . "</p>
            ";
            $mail->send();

            // Send confirmation to user
            $mail->clearAddresses();
            $mail->addAddress($email);
            $mail->Subject = 'Thank you for your poetry submission';
            $mail->Body = "
                <h3>Dear $name,</h3>
                <p>Thank you for submitting your poetry titled <strong>$title</strong>.</p>
                <p>We have received your entry and will review it soon.</p>
                <br>
                <p>– Sukhanzar Foundation Team</p>
            ";
            $mail->send();

            $_SESSION['status'] = 'success';
            $_SESSION['message'] = '✅ Submission successful!';
        } catch (Exception $e) {
            $_SESSION['status'] = 'warning';
            $_SESSION['message'] = '✅ Saved, but email failed: ' . $mail->ErrorInfo;
        }

    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = '❌ Submission failed. Please try again.';
    }

    header("Location:submit-poetry.php");
    exit();
}
?>
