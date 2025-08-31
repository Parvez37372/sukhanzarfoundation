<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<?php include('config.php'); ?>

<style>
    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }
    .img-thumbnail {
        height: 60px;
        object-fit: cover;
    }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="m-b-0">View Shayari Collections</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Thumbnail</th>
                                <th>Shayari Name</th>
                                <th>Author</th>
                                <th>Cover Image</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM shayari_collection ORDER BY id DESC";
                            $result = mysqli_query($conn, $sql);
                            $sno = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?= $sno++; ?></td>
                                <td><img src="<?= $row['image']; ?>" class="img-thumbnail"></td>
                                <td><?= htmlspecialchars($row['shayari_name']); ?></td>
                                <td><?= htmlspecialchars($row['author']); ?></td>
                                <td><img src="<?= $row['cover_image']; ?>" class="img-thumbnail"></td>
                                <td><?= nl2br(htmlspecialchars(substr($row['description'], 0, 100))); ?>...</td>
                                <td>
                                    <a href="edit_shayari_collection.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="delete_shayari_collection.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this collection?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
