<?php
session_start();

include 'config.php'; 
include('includes/header.php'); // Use only one header

// Check if user is logged in
$user_id = $_SESSION['user_id'] ?? null;

if ($user_id) {
    $sql = "SELECT first_name, last_name, email, phone FROM users WHERE id = '$user_id' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        $full_name = htmlspecialchars($user['first_name'] . ' ' . $user['last_name']);
        $email = htmlspecialchars($user['email']);
        $phone = htmlspecialchars($user['phone']);
    } else {
        $full_name = "Unknown";
        $email = "N/A";
        $phone = "N/A";
    }
} else {
    header("Location: login.php");
    exit();
}
?>

<!-- Custom CSS -->
<style>
    .profile-wrapper {
        max-width: 600px;
        margin: 60px auto;
        padding: 30px;
        background: #f8f9fa;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        text-align: center;
        font-family: 'Segoe UI', sans-serif;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #dee2e6;
        margin-bottom: 20px;
    }

    .profile-details h4 {
        font-size: 24px;
        color: #343a40;
        margin-bottom: 10px;
    }

    .profile-details p {
        color: #6c757d;
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 0;
    }

    .profile-actions {
        margin-top: 30px;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        gap: 15px;
    }

    .profile-actions button {
        padding: 10px 20px;
        border: none;
        border-radius: 30px;
        font-size: 15px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .profile-actions button:hover {
        opacity: 0.9;
    }

    .btn-edit {
        background-color: black;
        color: white;
    }

    .btn-forgot {
        background-color: black;
        color: #fff;
    }

    .btn-logout {
        background-color: black;
        color: white;
    }
</style>

<!-- User Info Display -->
<div class="profile-wrapper">
    <img src="https://cdn-icons-png.flaticon.com/512/6596/6596121.png" alt="User Avatar" class="profile-avatar">

    <div class="profile-details">
        <h4><?= $full_name ?></h4>
        <p>Email: <?= $email ?><br>Phone: <?= $phone ?></p>
    </div>

    <div class="profile-actions">
        <button class="btn-edit" onclick="window.location.href='edit_profile.php'">Edit Profile</button>
        <button class="btn-forgot" onclick="window.location.href='forget_password.php'">Forgot Password</button>
        <button class="btn-logout" onclick="window.location.href='account.php'">Logout</button>
    </div>
</div>

<?php include('includes/footer.php'); ?>
