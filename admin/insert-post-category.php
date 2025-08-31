<?php
include 'config.php';

$name = $_POST['name'];
$dob = $_POST['dob'] ?? null;
$location = $_POST['location'] ?? null;
$imageName = null;

// Handle image upload
if (!empty($_FILES['image']['name'])) {
    $uploadDir = 'uploads/poets/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $imageName = basename($_FILES['image']['name']);
    $tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp, $uploadDir . $imageName);
}

// Insert into DB
$stmt = $conn->prepare("INSERT INTO poets_categories (name, image, dob, location) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $imageName, $dob, $location);

if ($stmt->execute()) {
    echo "<script>alert('✅ Post Category Added'); window.location.href='view-poets.php';</script>";
} else {
    echo "<script>alert('❌ Failed to insert'); history.back();</script>";
}
?>
