<?php 
include 'config.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid Request");
}

$id = intval($_GET['id']);

// Fetch existing poet data from urdu_poetry_category
$sql = "SELECT * FROM urdu_poetry_category WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Poet not found");
}
$poet = $result->fetch_assoc();

// Fetch cover_image from urdu_poet_profile
$sql_profile = "SELECT cover_image FROM urdu_poet_profile WHERE poet_id=$id LIMIT 1";
$res_profile = $conn->query($sql_profile);
$profile = $res_profile->num_rows > 0 ? $res_profile->fetch_assoc() : ['cover_image' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $dob = !empty($_POST['dob']) ? $_POST['dob'] : NULL;
    $dod = !empty($_POST['dod']) ? $_POST['dod'] : NULL;
    $location = $conn->real_escape_string($_POST['location']);
    $gazal = intval($_POST['gazal_count']);
    $nazam = intval($_POST['nazam_count']);
    $sher = intval($_POST['sher_count']);
    $shery = intval($_POST['shery_count']);
    
    // Handle image (store in uploads/poets/)
    $image = $poet['image'];
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "uploads/poets/";
        $fileName = time() . "_" . basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $image = $fileName;
        }
    }

    // Handle cover_image (store in poets/ only)
    $cover_image = $profile['cover_image'];
    if (!empty($_FILES['cover_image']['name'])) {
        $targetDir = "uploads/profiles/";  // <-- change here
        $fileName = time() . "_" . basename($_FILES["cover_image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        if (move_uploaded_file($_FILES["cover_image"]["tmp_name"], $targetFilePath)) {
            $cover_image = $fileName;
        }
    }

    // Update urdu_poetry_category
    $update = "UPDATE urdu_poetry_category 
               SET name='$name', image='$image', dob=" . ($dob ? "'$dob'" : "NULL") . ", 
                   dod=" . ($dod ? "'$dod'" : "NULL") . ", location='$location', 
                   gazal_count=$gazal, nazam_count=$nazam, sher_count=$sher, shery_count=$shery 
               WHERE id=$id";

    $ok1 = $conn->query($update);

    // Update urdu_poet_profile (cover_image only)
    if ($res_profile->num_rows > 0) {
        $update_profile = "UPDATE urdu_poet_profile SET cover_image='$cover_image' WHERE poet_id=$id";
    } else {
        $update_profile = "INSERT INTO urdu_poet_profile (poet_id, cover_image) VALUES ($id, '$cover_image')";
    }
    $ok2 = $conn->query($update_profile);

    if ($ok1 && $ok2) {
        echo "<script>alert('✅ Poet updated successfully!'); window.location.href='add-urdu-poet-category.php';</script>";
        exit;
    } else {
        echo "<script>alert('❌ Error updating record: " . $conn->error . "');</script>";
    }
}
?>

<?php include('includes/header.php');?> 
<?php include('includes/sidebar.php');?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Poet</h4>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="<?= htmlspecialchars($poet['name']); ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Current Image</label><br>
                        <?php if ($poet['image']) { ?>
                            <img src="uploads/poets/<?= htmlspecialchars($poet['image']); ?>" width="100" height="100"><br>
                        <?php } ?>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Current Cover Image</label><br>
                        <?php if ($profile['cover_image']) { ?>
                            <img src="poets/<?= htmlspecialchars($profile['cover_image']); ?>" width="150" height="80"><br>
                        <?php } ?>
                        <input type="file" name="cover_image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" value="<?= $poet['dob']; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Date of Death</label>
                        <input type="date" name="dod" value="<?= $poet['dod']; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" value="<?= htmlspecialchars($poet['location']); ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Ghazal Count</label>
                        <input type="number" name="gazal_count" value="<?= $poet['gazal_count']; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Nazm Count</label>
                        <input type="number" name="nazam_count" value="<?= $poet['nazam_count']; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Sher Count</label>
                        <input type="number" name="sher_count" value="<?= $poet['sher_count']; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Shery Count</label>
                        <input type="number" name="shery_count" value="<?= $poet['shery_count']; ?>" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="your_table_page.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>
