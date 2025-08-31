<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<?php
include('config.php');

// Fetch all users
$sql = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
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
                    <h4 class="card-title">View Users</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (mysqli_num_rows($result) > 0) {
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?>.</td>
                                            <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                            <td><?php echo $row['created_at']; ?></td>
                                            <td>
                                                <a href="view_user.php?id=<?php echo $row['id']; ?>" class="btn btn-info pd"><i class="fa fa-eye"></i></a>
                                                
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='7' class='text-center'>No users found.</td></tr>";
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
