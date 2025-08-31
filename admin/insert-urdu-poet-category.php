<?php
include 'config.php';

$name = trim($_POST['name']);
$dob = $_POST['dob'] ?? null;
$dod = $_POST['dod'] ?? null;
$location = trim($_POST['location']);
$gazal_count = $_POST['gazal_count'] ?? 0;
$nazam_count = $_POST['nazam_count'] ?? 0;
$sher_count = $_POST['sher_count'] ?? 0;
$shery_count = $_POST['shery_count'] ?? 0;

$image = '';

// Handle image upload
if (!empty($_FILES['image']['name'])) {
    $imageName = time() . '_' . basename($_FILES['image']['name']);
    $targetDir = 'uploads/poets/';
    $targetPath = $targetDir . $imageName;

    // Create folder if not exist
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        $image = $imageName;
    }
}

// Insert data
$stmt = $conn->prepare("INSERT INTO urdu_poetry_category (name, image, dob, dod, location, gazal_count, nazam_count, sher_count, shery_count) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssiii", $name, $image, $dob, $dod, $location, $gazal_count, $nazam_count, $sher_count, $shery_count);

if ($stmt->execute()) {
    echo "<script>alert('✅ Poet category added successfully!'); window.location.href='add-urdu-poet-category.php';</script>";
} else {
    echo "<script>alert('❌ Error adding poet category.'); window.history.back();</script>";
}

$stmt->close();
$conn->close();
?>
