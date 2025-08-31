<?php
include 'config.php';

$poet_id = $_POST['poet_id'];
$sher = trim($_POST['sher']);
$gazal = trim($_POST['gazal']);

if (empty($poet_id) || (empty($sher) && empty($gazal))) {
    echo "<script>alert('Please select poet and enter Sher or Ghazal'); history.back();</script>";
    exit;
}

$stmt = $conn->prepare("INSERT INTO poetry (poet_id, sher, gazal) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $poet_id, $sher, $gazal);
if ($stmt->execute()) {
    echo "<script>alert('✅ Poetry added successfully'); window.location.href='view-poetry.php';</script>";
} else {
    echo "<script>alert('❌ Failed to insert poetry'); history.back();</script>";
}
?>
