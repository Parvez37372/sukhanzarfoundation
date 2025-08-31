<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shayari_id = intval($_POST['shayari_id']);
    $comment = trim($_POST['comment']);

    // Check if shayari_id exists
    $check = $conn->query("SELECT id FROM shayari_data WHERE id = $shayari_id");
    if ($check->num_rows == 0) {
        echo "❌ Shayari ID $shayari_id not found in shayari_data table!";
        exit;
    }

    if (!empty($comment)) {
        $stmt = $conn->prepare("INSERT INTO shayari_comments (shayari_id, comment) VALUES (?, ?)");
        if ($stmt) {
            $stmt->bind_param("is", $shayari_id, $comment);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Prepare failed: " . $conn->error;
            exit;
        }
    }
}
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>
