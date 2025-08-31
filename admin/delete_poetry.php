<?php
include 'config.php'; // DB connection

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // ID ko integer me convert kiya security ke liye

    // Delete query
    $sql = "DELETE FROM poetry_submissions WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Poetry deleted successfully!'); window.location.href='audiance-poetry.php';</script>";
    } else {
        echo "<script>alert('Error deleting poetry.'); window.location.href='audiance-poetry.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Invalid request.'); window.location.href='audiance-poetry.php';</script>";
}
?>
