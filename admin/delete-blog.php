<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // First get image path to delete from folder
    $getImage = mysqli_query($conn, "SELECT image FROM blogs WHERE id = $id");
    $imgData = mysqli_fetch_assoc($getImage);
    $imagePath = $imgData['image'];

    // Delete from DB
    $delete = mysqli_query($conn, "DELETE FROM blogs WHERE id = $id");

    if ($delete) {
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete image file
        }
        echo "<script>alert('✅ Blog deleted successfully'); window.location.href='manage_blogs.php';</script>";
    } else {
        echo "<script>alert('❌ Failed to delete blog.');</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='manage_blogs.php';</script>";
}
?>
