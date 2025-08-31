<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
<?php include('config.php'); ?>

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
                    <h4 class="card-title">Words List</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Title</th>
                                    <th>Author Name</th>
                                    <th>Content</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM words ORDER BY id DESC";
                                $result = $conn->query($sql);
                                $count = 1;

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>".$count++."</td>";
                                        echo "<td>".$row['title']."</td>";
                                        echo "<td>".$row['author_name']."</td>";
                                        echo "<td>".substr(strip_tags($row['content']), 0, 100)."...</td>";
                                        echo "<td>".$row['created_at']."</td>";
                                        echo "<td>
                                                <a href='edit_word.php?id=".$row['id']."' class='btn btn-warning pd'><i class='fa fa-edit'></i></a>
                                                <a href='delete_word.php?id=".$row['id']."' class='btn btn-danger pd' onclick=\"return confirm('Are you sure you want to delete this word?');\"><i class='fa fa-trash'></i></a>
                                              </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
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

<?php include('includes/footer.php');?>
