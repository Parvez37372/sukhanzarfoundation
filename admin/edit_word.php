<?php 
include('includes/header.php');
include('includes/sidebar.php');
include('config.php');

// Fetch word data by ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM words WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "<script>alert('❌ Word not found!'); window.location.href='view_word.php';</script>";
        exit();
    }
}

// Update Word
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author_name = mysqli_real_escape_string($conn, $_POST['author_name']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    $update = "UPDATE words SET title='$title', author_name='$author_name', content='$content' WHERE id=$id";
    if ($conn->query($update) === TRUE) {
        echo "<script>alert('✅ Word Updated Successfully'); window.location.href='view_word.php';</script>";
    } else {
        echo "<script>alert('❌ Error: ".$conn->error."');</script>";
    }
}
?>

<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Edit Word</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Title</label>
                                            <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label class="control-label">Author Name</label>
                                            <input type="text" name="author_name" class="form-control" value="<?php echo $row['author_name']; ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label class="control-label">Content</label>
                                            <textarea id="editor" name="content" class="form-control" rows="6" required><?php echo $row['content']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions ml-auto pb-5 mx-5">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Update
                                </button>
                                <a href="view_word.php" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => { console.error(error); });
</script>

<?php include('includes/footer.php'); ?>
