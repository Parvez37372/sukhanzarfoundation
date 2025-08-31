<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<style>
    .pd {
        padding: 0px 5px;
    }
    .poet-img {
        width: 80px;
        height: auto;
        border-radius: 6px;
    }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Poet Categories</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Image</th>
                                    <th>Poet Name</th>
                                    <th>DOB</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'config.php';
                                $sql = "SELECT * FROM poets_categories ORDER BY id DESC";
                                $result = $conn->query($sql);
                                $i = 1;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td>' . $i++ . '.</td>';
                                        echo '<td>';
                                        if (!empty($row['image'])) {
                                            echo '<img src="uploads/poets/' . $row['image'] . '" class="poet-img">';
                                        } else {
                                            echo 'No Image';
                                        }
                                        echo '</td>';
                                        echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['dob']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['location']) . '</td>';
                                        echo '<td>
                                            <a href="edit-post-category.php?id=' . $row['id'] . '" class="btn btn-warning pd"><i class="fa fa-edit"></i></a>
                                            <a href="delete-post-category.php?id=' . $row['id'] . '" class="btn btn-danger pd" onclick="return confirm(\'Are you sure?\')"><i class="fa fa-trash"></i></a>
                                        </td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="6" class="text-center">No data found</td></tr>';
                                }
                                $conn->close();
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
