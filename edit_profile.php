<?php
session_start();
include 'config.php';

// Agar user login nahi hai to login.php bhej do
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$error_message = "";

// User details fetch
$stmt = $conn->prepare("SELECT first_name, last_name, email, phone FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $first_name = htmlspecialchars($user['first_name']);
    $last_name  = htmlspecialchars($user['last_name']);
    $email      = htmlspecialchars($user['email']);
    $phone      = htmlspecialchars($user['phone']);
} else {
    die("⚠️ User not found.");
}

// Form submit hone par update
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = trim($_POST['first_name']);
    $last_name  = trim($_POST['last_name']);
    $email      = trim($_POST['email']);
    $phone      = trim($_POST['phone']);

    $update = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, phone = ? WHERE id = ?");
    $update->bind_param("ssssi", $first_name, $last_name, $email, $phone, $user_id);

    if ($update->execute()) {
        $_SESSION['success_message'] = "✅ Profile updated successfully!";
        header("Location: dashboard.php");  // relative path use karo
        exit();
    } else {
        $error_message = "❌ Failed to update profile. Try again.";
    }
}
?>
<!-- Custom CSS -->
<style>
    .edit-profile-wrapper {
        max-width: 600px;
        margin: 60px auto;
        padding: 30px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        font-family: 'Segoe UI', sans-serif;
    }
    .edit-profile-wrapper h3 {
        text-align: center;
        margin-bottom: 25px;
        color: #343a40;
    }
    .form-group {
        margin-bottom: 15px;
    }
    label {
        font-weight: 500;
    }
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }
    .btn-save {
        background: black;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 30px;
        cursor: pointer;
        width: 100%;
        transition: 0.3s;
    }
    .btn-save:hover {
        opacity: 0.9;
    }
    .error {
        color: red;
        margin-bottom: 15px;
        text-align: center;
    }
</style>
<?php include('includes/header.php');?>

<div class="edit-profile-wrapper">
    <h3>Edit Profile</h3>

    <?php if (!empty($error_message)): ?>
        <div class="error"><?= $error_message ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" value="<?= $first_name ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" value="<?= $last_name ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= $email ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" value="<?= $phone ?>" class="form-control" required>
        </div>
        <button type="submit" class="btn-save">Save Changes</button>
    </form>
</div>

<?php include('includes/footer.php'); ?>
