<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id       = intval($_POST['id']);
    $heading  = mysqli_real_escape_string($conn, $_POST['heading']);
    $title    = mysqli_real_escape_string($conn, $_POST['title']);
    $author   = mysqli_real_escape_string($conn, $_POST['author']);
    $date     = $_POST['date'];
    $time     = $_POST['time'];
    $content  = mysqli_real_escape_string($conn, $_POST['content']);
    $oldImage = $_POST['old_image'];

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $image = 'uploads/blogs/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    } else {
        $image = $oldImage;
    }

    $sql = "UPDATE blogs SET 
                image='$image',
                heading='$heading',
                title='$title',
                author='$author',
                date='$date',
                time='$time',
                content='$content'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('✅ Blog updated successfully'); window.location.href='view-blogs.php';</script>";
    } else {
        echo "<script>alert('❌ Update failed: " . mysqli_error($conn) . "');</script>";
    }
}
?>
