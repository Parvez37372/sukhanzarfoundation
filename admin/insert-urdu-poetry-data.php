<?php
include 'config.php';

$poet_id = $_POST['poet_id'];
$nazam   = trim($_POST['nazam']);
$gazal   = trim($_POST['gazal']);
$sher    = trim($_POST['sher']);
$shery   = trim($_POST['shery']);

$stmt = $conn->prepare("INSERT INTO urdu_poetry_data (poet_id, nazam, gazal, sher, shery) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issss", $poet_id, $nazam, $gazal, $sher, $shery);

if ($stmt->execute()) {
    echo "<script>alert('✅ Poetry added successfully!'); window.location.href='add-urdu-poetry-data.php';</script>";
} else {
    echo "<script>alert('❌ Error adding poetry.'); window.history.back();</script>";
}

$stmt->close();
$conn->close();
?>
