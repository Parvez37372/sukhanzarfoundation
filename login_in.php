<?php
session_start();
include 'config.php'; // MySQL connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
    $password = mysqli_real_escape_string($conn, $_POST['password'] ?? '');

    if (empty($email) || empty($password)) {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = '❌ Email and password are required.';
        header("Location: login_form.php"); // or your login page
        exit();
    }

    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // If passwords are hashed, use password_verify()
        if ($password === $row['password']) { // use password_verify($password, $row['password']) if hashed
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['first_name'];
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = '✅ Login successful!';
            header("Location: dashboard.php"); // Redirect after login
            exit();
        } else {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = '❌ Invalid password.';
        }
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = '❌ Email not found.';
    }

    header("Location: https://sukhanzarfoundation.com/account.php");
    exit();
}
?>
