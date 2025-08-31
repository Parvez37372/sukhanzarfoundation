<?php
include('config.php');

if (!isset($_GET['id'])) {
    echo "<script>alert('No ID specified.'); window.location.href='view_shayari_collection.php';</script>";
    exit();
}

$id = intval($_GET['id']);

// Fetch image paths to delete them from server
$sql = "SELECT image, cover_image FROM shayari_collection WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    if (file_exists($row['image'])) {
        unlink($row['image']);
    }
    if (file_exists($row['cover_image'])) {
        unlink($row['cover_image']);
    }

    // Delete from database
    $delete = "DELETE FROM shayari_collection WHERE id = $id";
    if (mysqli_query($conn, $delete)) {
        echo "<script>alert('✅ Shayari Collection deleted successfully.'); window.location.href='manage_shayari.php'</script>";
    } else {
        echo "<script>alert('❌ Failed to delete.'); window.location.href='view_shayari_collection.php';</script>";
    }
} else {
    echo "<script>alert('Shayari Collection not found.'); window.location.href='view_shayari_collection.php';</script>";
}
