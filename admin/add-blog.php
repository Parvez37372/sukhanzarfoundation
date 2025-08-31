<?php
include 'config.php'; // DB connection (make sure this file defines $conn)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and fetch inputs
    $heading = mysqli_real_escape_string($conn, $_POST['heading']);
    $title   = mysqli_real_escape_string($conn, $_POST['title']);
    $author  = mysqli_real_escape_string($conn, $_POST['author']);
    $date    = $_POST['date'];
    $time    = $_POST['time'];
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    // Handle image upload
    $image = $_FILES['image']['name'];
    $tmp   = $_FILES['image']['tmp_name'];
    $folder = 'uploads/blogs/'; // Make sure this folder exists and is writable

    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    $image_path = $folder . basename($image);

    if (move_uploaded_file($tmp, $image_path)) {
        // Insert into database
        $sql = "INSERT INTO blogs (image, heading, title, author, date, time, content) 
                VALUES ('$image_path', '$heading', '$title', '$author', '$date', '$time', '$content')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('✅ Blog saved successfully.');
                    window.location.href = 'manage_blogs.php';
                  </script>";
        } else {
            echo "<script>alert('❌ Error saving blog: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "<script>alert('❌ Failed to upload image.');</script>";
    }
}
?>
