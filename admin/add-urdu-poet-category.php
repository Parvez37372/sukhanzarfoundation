<?php include('includes/header.php');?> 
<?php include('includes/sidebar.php');?>
<style>
    .pd{
        padding: 0px 5px;
    }
    .poet-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 6px;
    }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Urdu Poetry Category List</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>DOB</th>
                                    <th>DOD</th>
                                    <th>Location</th>
                                    <th>Ghazal</th>
                                    <th>Nazm</th>
                                    <th>Sher</th>
                                    <th>Shery</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'config.php';
                                $res = $conn->query("SELECT * FROM urdu_poetry_category ORDER BY id DESC");
                                $sn = 1;
                                if ($res->num_rows > 0) {
                                    while ($row = $res->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?= $sn++; ?>.</td>
                                            <td>
                                                <?php if (!empty($row['image'])) { ?>
                                                    <img src="uploads/poets/<?= htmlspecialchars($row['image']); ?>" class="poet-img">
                                                <?php } else { ?>
                                                    <span>No Image</span>
                                                <?php } ?>
                                            </td>
                                            <td><?= htmlspecialchars($row['name']); ?></td>
                                            <td><?= !empty($row['dob']) ? htmlspecialchars($row['dob']) : "-"; ?></td>
                                            <td><?= !empty($row['dod']) ? htmlspecialchars($row['dod']) : "-"; ?></td>
                                            <td><?= !empty($row['location']) ? htmlspecialchars($row['location']) : "-"; ?></td>
                                            <td><?= $row['gazal_count']; ?></td>
                                            <td><?= $row['nazam_count']; ?></td>
                                            <td><?= $row['sher_count']; ?></td>
                                            <td><?= $row['shery_count']; ?></td>
                                            <td>
                                                <a href="edit_poet.php?id=<?= $row['id']; ?>" class="btn btn-warning pd"><i class="fa fa-edit"></i></a>
                                                <a href="delete_poet.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?')" class="btn btn-danger pd"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="11" class="text-center">No records found</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>
