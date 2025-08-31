<?php
include('includes/header.php');
include('includes/sidebar.php');
include('config.php'); // Ensure DB connection is included
?>

<style>
    .pd {
        padding: 0px 5px;
    }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Subscribers List</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Email</th>
                                    <th>Date Subscribed</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = mysqli_query($conn, "SELECT * FROM subscribers ORDER BY id DESC");
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($sql)) {
                                    echo "<tr>
                                            <td>" . $i++ . ".</td>
                                            <td>" . htmlspecialchars($row['email']) . "</td>
                                            <td>" . htmlspecialchars($row['created_at']) . "</td>
                                            <td>
                                                <a href='delete_subscriber.php?id=" . $row['id'] . "' class='btn btn-danger pd' onclick=\"return confirm('Are you sure to delete this subscriber?');\">
                                                    <i class='fa fa-trash'></i>
                                                </a>
                                            </td>
                                        </tr>";
                                }

                                if (mysqli_num_rows($sql) == 0) {
                                    echo "<tr><td colspan='4' class='text-center'>No subscribers found.</td></tr>";
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
