<?php 
session_start();
include 'config.php'; // DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_otp = trim($_POST['otp'] ?? '');

    if (empty($user_otp)) {
        $_SESSION['status'] = 'danger';
        $_SESSION['message'] = '❌ Please enter the OTP.';
        header("Location: verify-otp.php");
        exit();
    }

    if (!isset($_SESSION['signup_otp']) || !isset($_SESSION['signup_data'])) {
        $_SESSION['status'] = 'danger';
        $_SESSION['message'] = '❌ Session expired. Please signup again.';
        header("Location: signup.php");
        exit();
    }

    $correct_otp = $_SESSION['signup_otp'];

    if ($user_otp == $correct_otp) {
        $data = $_SESSION['signup_data'];
        $first_name = mysqli_real_escape_string($conn, $data['first_name']);
        $last_name  = mysqli_real_escape_string($conn, $data['last_name']);
        $email      = mysqli_real_escape_string($conn, $data['email']);
        $phone      = mysqli_real_escape_string($conn, $data['phone']);
        $password   = mysqli_real_escape_string($conn, $data['password']);

        // Insert into users table
        $insert = "INSERT INTO users (first_name, last_name, email, phone,password)
                   VALUES ('$first_name', '$last_name', '$email', '$phone','$password')";
        if (mysqli_query($conn, $insert)) {
            unset($_SESSION['signup_otp']);
            unset($_SESSION['signup_data']);

            $_SESSION['status'] = 'success';
            $_SESSION['message'] = '✅ Email verified and account created!';
            header("Location: account.php");
            exit();
        } else {
            $_SESSION['status'] = 'danger';
            $_SESSION['message'] = '❌ Database error. Try again.';
            header("Location: verify-otp.php");
            exit();
        }
    } else {
        $_SESSION['status'] = 'danger';
        $_SESSION['message'] = '❌ Incorrect OTP. Try again.';
        header("Location: verify-otp.php");
        exit();
    }
}
?>

<?php 
include('includes/header2.php');
include('includes/header.php'); 
?>

<style>
    .main {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 80vh;
        background-color: #f8f9fa;
    }
    .card {
        max-width: 500px;
        width: 100%;
        background: #fff;
        padding:15px;
        border:2px solid #fff;
    }
    
</style>

<div class="main">
    <div class="card p-4 shadow-sm">
        <h4 class="text-center mb-4">Enter OTP</h4>

        <?php
        if (isset($_SESSION['message'])) {
            echo '<div class="alert alert-' . ($_SESSION['status'] ?? 'info') . '">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
            unset($_SESSION['status']);
        }
        ?>

        <form method="POST" action="">
            <div class="form-group mb-3">
                <label>OTP sent to your email</label>
                <input type="text" name="otp" class="form-control" placeholder="Enter 6-digit OTP" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Verify</button>
        </form>
    </div>
</div>

<?php include('includes/footer.php'); ?>
