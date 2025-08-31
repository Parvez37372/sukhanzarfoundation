<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<style>
    .pd {
        padding: 0px 5px;
    }
    .banner-img {
        height: 80px;
        width: auto;
        border-radius: 5px;
    }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">View Banners</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Image</th>
                                    <th>URL</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include 'config.php';
                                $sql = "SELECT * FROM banner ORDER BY id DESC";
                                $result = $conn->query($sql);
                                $sn = 1;

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $sn++ . ".</td>";
                                        echo "<td><img src='uploads/banners/{$row['image']}' class='banner-img'></td>";
                                        echo "<td><a href='{$row['url']}' target='_blank'>{$row['url']}</a></td>";
                                        echo "<td>
                                                <a href='edit-banner.php?id={$row['id']}' class='btn btn-warning pd'><i class='fa fa-edit'></i></a>
                                                <a href='delete-banner.php?id={$row['id']}' onclick=\"return confirm('Are you sure to delete?');\" class='btn btn-danger pd'><i class='fa fa-trash'></i></a>
                                              </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No banners found.</td></tr>";
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
