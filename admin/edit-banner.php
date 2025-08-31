<?php
include('includes/header.php');
include('includes/sidebar.php');
include('config.php');

// ----------- FETCH BANNER -------------
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('Invalid ID'); window.location.href='view-banner.php';</script>";
    exit();
}

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM banner WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$banner = $result->fetch_assoc();
$stmt->close();

if (!$banner) {
    echo "<script>alert('Banner not found.'); window.location.href='view-banner.php';</script>";
    exit();
}

// ----------- UPDATE BANNER -------------
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $url = isset($_POST['banner_url']) ? $_POST['banner_url'] : '';
    $uploadDir = "uploads/banners/";
    $newImageName = $banner['image'];

    // Handle image upload if new file is chosen
    if (!empty($_FILES['banner_image']['name'])) {
        $imageName = basename($_FILES['banner_image']['name']);
        $tmpName = $_FILES['banner_image']['tmp_name'];
        $targetFile = $uploadDir . $imageName;

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($tmpName, $targetFile)) {
            // Delete old image
            if (!empty($banner['image']) && file_exists($uploadDir . $banner['image'])) {
                unlink($uploadDir . $banner['image']);
            }
            $newImageName = $imageName;
        } else {
            echo "<script>alert('❌ Image upload failed.');</script>";
        }
    }

    // Update DB
    $stmt = $conn->prepare("UPDATE banner SET image = ?, url = ? WHERE id = ?");
    $stmt->bind_param("ssi", $newImageName, $url, $id);
    if ($stmt->execute()) {
        echo "<script>alert('✅ Banner updated successfully.'); window.location.href='view-banner.php';</script>";
    } else {
        echo "<script>alert('❌ Update failed.');</script>";
    }
    $stmt->close();
}
?>

<style>
    .banner-img {
        width: 100%;
        max-width: 300px;
        height: auto;
        border-radius: 8px;
        margin-bottom: 10px;
    }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="col-lg-8 offset-lg-2">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Edit Banner</h4>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Current Banner Image</label><br>
                            <img src="uploads/banners/<?= htmlspecialchars($banner['image']) ?>" class="banner-img">
                        </div>

                        <div class="form-group">
                            <label>Change Banner Image (optional)</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Redirect URL</label>
                            <input type="url" name="banner_url" class="form-control" placeholder="https://example.com" value="<?= htmlspecialchars($banner['url']) ?>">
                        </div>

                        <div class="form-actions text-end">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Banner</button>
                            <a href="view-banner.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
