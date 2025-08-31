<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $shayari_name = mysqli_real_escape_string($conn, $_POST['shayari_name']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Fetch existing images
    $fetch = mysqli_query($conn, "SELECT image, cover_image FROM shayari_collection WHERE id = $id");
    $current = mysqli_fetch_assoc($fetch);

    $image_path = $current['image'];
    $cover_path = $current['cover_image'];

    // Upload new thumbnail image if provided
    if (!empty($_FILES['image']['name'])) {
        if (file_exists($image_path)) unlink($image_path);
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = "uploads/" . time() . "_" . basename($image);
        move_uploaded_file($image_tmp, $image_path);
    }

    // Upload new cover image if provided
    if (!empty($_FILES['cover_image']['name'])) {
        if (file_exists($cover_path)) unlink($cover_path);
        $cover = $_FILES['cover_image']['name'];
        $cover_tmp = $_FILES['cover_image']['tmp_name'];
        $cover_path = "uploads/" . time() . "_" . basename($cover);
        move_uploaded_file($cover_tmp, $cover_path);
    }

    // Update database
    $sql = "UPDATE shayari_collection 
            SET shayari_name = '$shayari_name', 
                author = '$author', 
                description = '$description', 
                image = '$image_path', 
                cover_image = '$cover_path' 
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('✅ Collection updated successfully.'); window.location.href='manage_shayari.php';</script>";
    } else {
        $error = mysqli_error($conn);
        echo "<script>alert('❌ Error: $error'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='view_shayari_collection.php';</script>";
}
?>
