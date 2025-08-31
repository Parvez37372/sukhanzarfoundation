<?php 
include('includes/header.php');
include('includes/sidebar.php');
include('config.php'); // DB connection

// Insert backend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author_name = mysqli_real_escape_string($conn, $_POST['author_name']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    $sql = "INSERT INTO words (title, author_name, content) VALUES ('$title', '$author_name', '$content')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('✅ Word Added Successfully'); window.location.href='view_word.php;</script>";
    } else {
        echo "<script>alert('❌ Error: " . $conn->error . "');</script>";
    }
}
?>

<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
<style>
</style>

<div class="page-wrapper">
<div class="container-fluid">
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Add Word</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-body">
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="control-label">Author Name</label>
                                        <input type="text" name="author_name" class="form-control" placeholder="Enter Author Name" required>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            
                            <!-- Content -->
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="control-label">Content</label>
                                        <textarea name="content" id="content" class="form-control" placeholder="Write full word..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions ml-auto pb-5 mx-5">
                            <button type="submit" class="btn btn-success"> 
                                <i class="fa fa-check"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
</div>


<!-- Activate CKEditor -->
<script>
    ClassicEditor.create(document.querySelector('#content')).catch(error => console.error(error));
</script>
<?php include('includes/footer.php');?>
