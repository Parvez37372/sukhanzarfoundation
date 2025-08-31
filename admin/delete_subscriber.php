<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $delete = mysqli_query($conn, "DELETE FROM subscribers WHERE id = $id");

    if ($delete) {
        echo "<script>
            alert('✅ Subscriber deleted successfully.');
            window.location.href = 'subcribers.php'; // Change to your actual page
        </script>";
    } else {
        echo "<script>
            alert('❌ Failed to delete subscriber.');
            window.history.back();
        </script>";
    }
} else {
    echo "<script>
        alert('⚠️ Invalid request.');
        window.history.back();
    </script>";
}
?>
