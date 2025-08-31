<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $collection_id = mysqli_real_escape_string($conn, $_POST['collection_id']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    // Insert into shayari_data table
    $sql = "INSERT INTO shayari_data (collection_id, date, content) 
            VALUES ('$collection_id', '$date', '$content')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('✅ Shayari added successfully.');
                window.location.href = 'view_shayari_data.php';
              </script>";
    } else {
        $error = mysqli_error($conn);
        echo "<script>
                alert('❌ Error: $error');
                window.history.back();
              </script>";
    }
} else {
    echo "<script>
            alert('Invalid request.');
            window.location.href = 'add_shayari_data.php';
          </script>";
}
?>
