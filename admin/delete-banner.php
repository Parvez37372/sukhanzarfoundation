<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get image filename first
    $sql = "SELECT image FROM banner WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($image);
    $stmt->fetch();
    $stmt->close();

    // Delete file
    if ($image && file_exists("uploads/banners/$image")) {
        unlink("uploads/banners/$image");
    }

    // Delete from DB
    $sql = "DELETE FROM banner WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<script>alert('✅ Banner deleted successfully.'); window.location.href='view-banner.php';</script>";
    } else {
        echo "<script>alert('❌ Failed to delete banner.');</script>";
    }
    $stmt->close();
}

$conn->close();
?>
