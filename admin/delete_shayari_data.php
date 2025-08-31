<?php
include('config.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Delete the shayari by ID
    $sql = "DELETE FROM shayari_data WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('✅ Shayari deleted successfully.'); window.location.href='view_shayari_data.php';</script>";
    } else {
        $error = mysqli_error($conn);
        echo "<script>alert('❌ Error: $error'); window.location.href='view_shayari_data.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='view_shayari_data.php';</script>";
}
?>
