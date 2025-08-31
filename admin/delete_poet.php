<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // ID ko integer bana ke safe kar rahe hain

    // Poet ko delete karna
    $sql = "DELETE FROM urdu_poetry_category WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('✅ Poet deleted successfully.'); window.location.href='add-urdu-poet-category.php';</script>";
    } else {
        echo "<script>alert('❌ Error deleting record: " . $conn->error . "'); window.location.href='add-urdu-poet-category.php';</script>";
    }
} else {
    echo "<script>alert('⚠️ Invalid Request.'); window.location.href='add-urdu-poet-category.php';</script>";
}
$conn->close();
?>
