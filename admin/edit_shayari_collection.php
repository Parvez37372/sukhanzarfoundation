<?php
include('includes/header.php');
include('includes/sidebar.php');
include('config.php');

if (!isset($_GET['id'])) {
    echo "<script>alert('No ID provided.'); window.location.href='view_shayari_collection.php';</script>";
    exit();
}

$id = intval($_GET['id']);
$query = "SELECT * FROM shayari_collection WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$row = mysqli_fetch_assoc($result)) {
    echo "<script>alert('Shayari Collection not found.'); window.location.href='view_shayari_collection.php';</script>";
    exit();
}
?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Edit Shayari Collection</h4>
                    </div>
                    <div class="card-body">
                        <form action="update_shayari_collection.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">

                            <div class="form-group">
                                <label>Shayari Name</label>
                                <input type="text" name="shayari_name" class="form-control" value="<?= htmlspecialchars($row['shayari_name']); ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Author</label>
                                <input type="text" name="author" class="form-control" value="<?= htmlspecialchars($row['author']); ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="4" required><?= htmlspecialchars($row['description']); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Current Thumbnail Image:</label><br>
                                <img src="<?= $row['image']; ?>" height="100">
                                <input type="file" name="image" class="form-control mt-2">
                            </div>

                            <div class="form-group">
                                <label>Current Cover Image:</label><br>
                                <img src="<?= $row['cover_image']; ?>" height="100">
                                <input type="file" name="cover_image" class="form-control mt-2">
                            </div>

                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="view_shayari_collection.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
