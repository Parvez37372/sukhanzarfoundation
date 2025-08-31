<?php
include('includes/header.php');
include('includes/sidebar.php');
include('config.php');

if (!isset($_GET['id'])) {
    echo "<script>alert('No ID specified.'); window.location.href='view_shayari_data.php';</script>";
    exit();
}

$id = intval($_GET['id']);
$query = "SELECT * FROM shayari_data WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$row = mysqli_fetch_assoc($result)) {
    echo "<script>alert('Shayari data not found.'); window.location.href='view_shayari_data.php';</script>";
    exit();
}
?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Edit Shayari</h4>
                    </div>
                    <div class="card-body">
                        <form action="update_shayari_data.php" method="POST">
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">

                            <div class="form-group">
                                <label>Select Shayari Collection</label>
                                <select name="collection_id" class="form-control" required>
                                    <option value="">-- Select Collection --</option>
                                    <?php
                                    $collections = mysqli_query($conn, "SELECT id, shayari_name FROM shayari_collection ORDER BY shayari_name ASC");
                                    while ($col = mysqli_fetch_assoc($collections)) {
                                        $selected = ($col['id'] == $row['collection_id']) ? 'selected' : '';
                                        echo '<option value="' . $col['id'] . '" ' . $selected . '>' . htmlspecialchars($col['shayari_name']) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" class="form-control" value="<?= $row['date']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Shayari Content</label>
                                <textarea name="content" id="editor" class="form-control" rows="5" required><?= htmlspecialchars($row['content']); ?></textarea>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="view_shayari_data.php" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>

<?php include('includes/footer.php'); ?>
