<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shayari_name = mysqli_real_escape_string($conn, $_POST['shayari_name']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Initialize paths
    $image_path = "";
    $cover_path = "";
    $profile_path = "";

    // Upload thumbnail image
    if (!empty($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = "uploads/" . time() . "_thumb_" . basename($image_name);
        move_uploaded_file($image_tmp, $image_path);
    }

    // Upload cover image
    if (!empty($_FILES['cover_image']['name'])) {
        $cover_name = $_FILES['cover_image']['name'];
        $cover_tmp = $_FILES['cover_image']['tmp_name'];
        $cover_path = "uploads/" . time() . "_cover_" . basename($cover_name);
        move_uploaded_file($cover_tmp, $cover_path);
    }

    // Upload profile image (✅ fixed variable mismatch)
    if (!empty($_FILES['profile_image']['name'])) {
        $profile_name = $_FILES['profile_image']['name'];
        $profile_tmp = $_FILES['profile_image']['tmp_name'];
        $profile_path = "uploads/" . time() . "_profile_" . basename($profile_name);
        move_uploaded_file($profile_tmp, $profile_path);
    }

    // Insert into database
    $sql = "INSERT INTO shayari_collection (shayari_name, image, author, cover_image, profile_image, description) 
            VALUES ('$shayari_name', '$image_path', '$author', '$cover_path', '$profile_path', '$description')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('✅ Shayari Collection added successfully.'); window.location.href='manage_shayari.php';</script>";
    } else {
        $error = mysqli_error($conn);
        echo "<script>alert('❌ Error: $error'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='add_shayari_collection.php';</script>";
}
?>
