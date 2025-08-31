<?php
include 'config.php';

$poet_id = $_POST['poet_id'];
$location = trim($_POST['location']);
$description = trim($_POST['description']);

$image = '';
$cover_image = '';

// Upload profile image
if (!empty($_FILES['image']['name'])) {
    $imgName = time() . '_' . basename($_FILES['image']['name']);
    $imgPath = 'uploads/profiles/';
    if (!is_dir($imgPath)) mkdir($imgPath, 0777, true);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $imgPath . $imgName)) {
        $image = $imgName;
    }
}

// Upload cover image
if (!empty($_FILES['cover_image']['name'])) {
    $coverName = time() . '_cover_' . basename($_FILES['cover_image']['name']);
    $coverPath = 'uploads/profiles/';
    if (!is_dir($coverPath)) mkdir($coverPath, 0777, true);
    if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $coverPath . $coverName)) {
        $cover_image = $coverName;
    }
}

$stmt = $conn->prepare("INSERT INTO urdu_poet_profile (poet_id, image, cover_image, location, description) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issss", $poet_id, $image, $cover_image, $location, $description);

if ($stmt->execute()) {
    echo "<script>alert('✅ Poet profile added successfully!'); window.location.href='add-urdu-poet-category.php';</script>";
} else {
    echo "<script>alert('❌ Error adding profile.'); window.history.back();</script>";
}

$stmt->close();
$conn->close();
?>
