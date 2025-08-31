<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // SQL delete query
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('User deleted successfully.');
                window.location.href = 'users_list.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting user.');
                window.location.href = 'users_list.php';
              </script>";
    }

    $stmt->close();
} else {
    echo "<script>
            alert('No user ID provided.');
            window.location.href = 'users_list.php';
          </script>";
}

$conn->close();
?>
