<?php
include('config.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('Invalid Poet ID'); window.location.href='view-poets.php';</script>";
    exit;
}

$poet_id = intval($_GET['id']);

// Poet ka data fetch karo
$sql = "SELECT * FROM poets_categories WHERE id = $poet_id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "<script>alert('Poet not found'); window.location.href='view-poets.php';</script>";
    exit;
}
$poet = $result->fetch_assoc();

// Pehle image delete karo
if (!empty($poet['image']) && file_exists("uploads/poets/" . $poet['image'])) {
    unlink("uploads/poets/" . $poet['image']);
}

// Fir poet record delete karo
$delete = "DELETE FROM poets_categories WHERE id = $poet_id";
if ($conn->query($delete) === TRUE) {
    echo "<script>alert('Poet deleted successfully'); window.location.href='view-poets.php';</script>";
} else {
    echo "Error deleting poet: " . $conn->error;
}
?>
