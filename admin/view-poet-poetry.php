<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<?php include('config.php'); ?>

<style>
    .pd {
        padding: 0px 5px;
    }
    .poet-img {
        height: 50px;
        width: 50px;
        object-fit: cover;
        border-radius: 50%;
    }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">View Poets</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>DOB</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM poets_categories ORDER BY id DESC";
                                $result = $conn->query($sql);
                                $sno = 1;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?= $sno++; ?>.</td>
                                            <td><?= htmlspecialchars($row['name']); ?></td>
                                            <td>
                                                <?php if (!empty($row['image'])) { ?>
                                                    <img src="uploads/poets/<?= htmlspecialchars($row['image']); ?>" 
                                                         class="poet-img" 
                                                         alt="<?= htmlspecialchars($row['name']); ?>">
                                                <?php } else { ?>
                                                    <span>No Image</span>
                                                <?php } ?>
                                            </td>
                                            <td><?= !empty($row['dob']) ? $row['dob'] : "N/A"; ?></td>
                                            <td><?= !empty($row['location']) ? htmlspecialchars($row['location']) : "N/A"; ?></td>
                                            <td>
                                                <a href="edit_poet.php?id=<?= $row['id']; ?>" class="btn btn-warning pd"><i class="fa fa-edit"></i></a>
                                                <a href="delete_poet.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure?');" class="btn btn-danger pd"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center'>No poets found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
