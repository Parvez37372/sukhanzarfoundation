<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>

<style>
    .pd { padding: 0px 5px; }
    .modal-content { white-space: pre-wrap; }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Poetry Submissions</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Pen Name</th>
                                    <th>Email</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Poetry</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            include 'config.php';
                            $sql = "SELECT * FROM poetry_submissions ORDER BY submitted_at DESC";
                            $result = mysqli_query($conn, $sql);
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                    <td>".$count++."</td>
                                    <td>".$row['name']."</td>
                                    <td>".$row['pen']."</td>
                                    <td>".$row['email']."</td>
                                    <td>".$row['category']."</td>
                                    <td>".$row['title']."</td>
                                    <td>
                                        <button class='btn btn-info btn-sm view-poetry' data-poetry='".htmlspecialchars($row['poetry'], ENT_QUOTES)."'>
                                            View
                                        </button>
                                    </td>
                                    <td>".$row['submitted_at']."</td>
                                    <td>
                                        <a href='delete_poetry.php?id=".$row['id']."' class='btn btn-danger pd' onclick=\"return confirm('Are you sure?')\"><i class='fa fa-trash'></i></a>
                                    </td>
                                </tr>";
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

<!-- Modal -->
<div class="modal fade" id="poetryModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Poetry</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <div class="modal-body" id="poetryContent">
        <!-- Poetry text will load here -->
      </div>
    </div>
  </div>
</div>

<script>
    document.querySelectorAll('.view-poetry').forEach(function(button) {
        button.addEventListener('click', function() {
            var poetryText = this.getAttribute('data-poetry');
            document.getElementById('poetryContent').innerText = poetryText;
            $('#poetryModal').modal('show');
        });
    });
</script>

<?php include('includes/footer.php');?>
