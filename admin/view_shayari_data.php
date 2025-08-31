<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<?php include('config.php'); ?>

<style>
    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }
    .action-buttons a {
        margin: 0 5px;
    }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="m-b-0">Shayari Entries</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Collection</th>
                                <th>Date</th>
                                <th>Content</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT s.*, c.shayari_name 
                                    FROM shayari_data s
                                    JOIN shayari_collection c ON s.collection_id = c.id
                                    ORDER BY s.id DESC";
                            $result = mysqli_query($conn, $sql);
                            $sno = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?= $sno++; ?></td>
                                    <td><?= htmlspecialchars($row['shayari_name']); ?></td>
                                    <td><?= date('d M Y', strtotime($row['date'])); ?></td>
                                    <td><?= nl2br(htmlspecialchars(substr($row['content'], 0, 200))); ?>...</td>
                                    <td class="action-buttons">
                                        <a href="edit_shayari_data.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="delete_shayari_data.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this entry?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
