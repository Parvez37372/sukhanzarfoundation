<?php 
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $plainPassword = $_POST['password'];

    // Make sure password is not empty
    if (empty($plainPassword)) {
        echo "<script>alert('Password cannot be empty.'); window.history.back();</script>";
        exit;
    }

    $password = password_hash($plainPassword, PASSWORD_DEFAULT);

    // Check if email exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($check) === 1) {
        $update = mysqli_query($conn, "
            UPDATE users 
            SET password = '$password', reset_token = NULL, token_expiry = NULL 
            WHERE email = '$email'
        ");

        if ($update) {
            echo "<script>alert('Password updated successfully.'); window.location.href='login.php';</script>";
        } else {
            echo "MySQL Error: " . mysqli_error($conn); // Debugging line
        }
    } else {
        echo "<script>alert('⚠️ Email not found'); window.history.back();</script>";
    }
}
?>

<!-- Password Reset Form -->
<form method="post" style="max-width: 400px; margin: 50px auto;">
    <h3>Reset Password</h3>
    <input type="email" name="email" placeholder="Enter your email" class="form-control mb-3" required>
    <input type="password" name="password" placeholder="Enter new password" class="form-control mb-3" required>
    <button type="submit" class="btn btn-primary w-100">Update Password</button>
</form>
