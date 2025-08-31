<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = isset($_POST['banner_url']) ? $_POST['banner_url'] : '';
    $images = $_FILES['banner_images'];
    $uploadDir = 'uploads/banners/';

    // Create directory if it doesn't exist
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $successCount = 0;

    for ($i = 0; $i < count($images['name']); $i++) {
        $imageName = basename($images['name'][$i]);
        $tmpName = $images['tmp_name'][$i];
        $targetFile = $uploadDir . $imageName;

        if (move_uploaded_file($tmpName, $targetFile)) {
            $stmt = $conn->prepare("INSERT INTO banner (image, url) VALUES (?, ?)");
            $stmt->bind_param("ss", $imageName, $url);
            if ($stmt->execute()) {
                $successCount++;
            }
            $stmt->close();
        }
    }

    $conn->close();

    echo "<script>alert('✅ {$successCount} banner(s) uploaded successfully.'); window.location.href='add-banner.php';</script>";
}
?>
