<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        echo "<script>alert('⚠️ Username and password required.'); window.location.href='login.php';</script>";
        exit();
    }

    // Plain text password check
    $stmt = $conn->prepare("SELECT password FROM admin WHERE username = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($db_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();

        if ($password === $db_password) { // ✅ plain text match
            $_SESSION["admin_user"] = $username;
            header("Location: index.php?login=success");
            exit();
        } else {
            echo "<script>alert('❌ Incorrect password'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('❌ User not found'); window.location.href='login.php';</script>";
    }

    $stmt->close();
}
$conn->close();
?>
