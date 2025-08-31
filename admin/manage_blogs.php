<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<?php include('config.php'); ?> <!-- Make sure DB connection is available -->

<style>
    .pd {
        padding: 0px 5px;
    }

    .blog-img {
        height: 50px;
        width: auto;
        object-fit: cover;
    }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Blog List</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Image</th>
                                    <th>Heading</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM blogs ORDER BY id DESC";
                                $result = mysqli_query($conn, $sql);
                                $count = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>
                                            <td>' . $count++ . '</td>
                                            <td><img src="' . $row['image'] . '" class="blog-img" alt="Blog Image"></td>
                                            <td>' . htmlspecialchars($row['heading']) . '</td>
                                            <td>' . date('d M Y', strtotime($row['date'])) . '</td>
                                            <td>
                                                <a href="edit-blog.php?id=' . $row['id'] . '" class="btn btn-warning pd"><i class="fa fa-edit"></i></a>
                                                <a href="delete-blog.php?id=' . $row['id'] . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-danger pd"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>';
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
