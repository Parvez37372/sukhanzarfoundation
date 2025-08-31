<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM words WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('🗑️ Word Deleted Successfully'); window.location.href='view_word.php';</script>";
    } else {
        echo "<script>alert('❌ Error: ".$conn->error."'); window.location.href='view_word.php';</script>";
    }
} else {
    echo "<script>alert('❌ Invalid Request'); window.location.href='view_word.php';</script>";
}
?>
