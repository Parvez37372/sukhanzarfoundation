<?php 
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $collection_id = mysqli_real_escape_string($conn, $_POST['collection_id']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    $sql = "UPDATE shayari_data 
            SET collection_id = '$collection_id', 
                date = '$date', 
                content = '$content' 
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('✅ Shayari updated successfully.'); window.location.href='view_shayari_data.php';</script>";
    } else {
        $error = mysqli_error($conn);
        echo "<script>alert('❌ Error: $error'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='view_shayari_data.php';</script>";
}
?>
