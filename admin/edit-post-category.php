<?php
include('includes/header.php');
include('includes/sidebar.php');
include('config.php');

// Get poet ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('Invalid Poet ID'); window.location.href='view-poets.php';</script>";
    exit;
}
$poet_id = intval($_GET['id']);

// Fetch poet data
$sql = "SELECT * FROM poets_categories WHERE id = $poet_id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "<script>alert('Poet not found'); window.location.href='view-poets.php';</script>";
    exit;
}
$poet = $result->fetch_assoc();

// Update form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $dob = !empty($_POST['dob']) ? $_POST['dob'] : NULL;
    $location = $conn->real_escape_string($_POST['location']);
    $image = $poet['image']; // default old image

    // Handle new image upload
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "uploads/poets/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $fileName = time() . "_" . basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Delete old image if exists
            if (!empty($poet['image']) && file_exists("uploads/poets/" . $poet['image'])) {
                unlink("uploads/poets/" . $poet['image']);
            }
            $image = $fileName;
        }
    }

    // Update query
    $update = "UPDATE poets_categories SET 
                name='$name',
                dob=" . ($dob ? "'$dob'" : "NULL") . ",
                location='$location',
                image='$image'
               WHERE id=$poet_id";

    if ($conn->query($update) === TRUE) {
        echo "<script>alert('Poet updated successfully'); window.location.href='view-poets.php';</script>";
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<style>
    .form-control {
        margin-bottom: 15px;
    }
    .poet-img {
        height: 80px;
        width: 80px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 10px;
    }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Poet</h4>
                <form method="POST" enctype="multipart/form-data">
                    <label>Name</label>
                    <input type="text" name="name" value="<?= htmlspecialchars($poet['name']); ?>" class="form-control" required>

                    <label>Date of Birth</label>
                    <input type="date" name="dob" value="<?= $poet['dob']; ?>" class="form-control">

                    <label>Location</label>
                    <input type="text" name="location" value="<?= htmlspecialchars($poet['location']); ?>" class="form-control">

                    <label>Image</label><br>
                    <?php if (!empty($poet['image'])) { ?>
                        <img src="uploads/poets/<?= htmlspecialchars($poet['image']); ?>" class="poet-img"><br>
                    <?php } ?>
                    <input type="file" name="image" class="form-control">

                    <button type="submit" class="btn btn-success mt-2">Update Poet</button>
                    <a href="view-poets.php" class="btn btn-secondary mt-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
