<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment_id = intval($_POST['comment_id']);
    $reply = trim($_POST['reply']);

    if (!empty($reply) && $comment_id > 0) {
        // Prepare and insert into replies table
        $stmt = $conn->prepare("INSERT INTO shayari_replies (comment_id, reply) VALUES (?, ?)");
        $stmt->bind_param("is", $comment_id, $reply);

        if ($stmt->execute()) {
            // Success
        } else {
            echo "❌ Error saving reply.";
            exit;
        }
    } else {
        echo "❌ Invalid input.";
        exit;
    }
}

// Redirect back
if (isset($_SERVER['HTTP_REFERER'])) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
} else {
    echo "✅ Reply posted. <a href='shayari_list.php'>Back</a>";
}
exit;
?>
