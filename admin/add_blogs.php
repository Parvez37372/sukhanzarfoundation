<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Add Blog Post</h4>
            </div>
            <div class="card-body">
                <form action="add-blog.php" method="POST" enctype="multipart/form-data">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Blog Image</th>
                                <td colspan="3">
                                    <input type="file" name="image" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Heading</th>
                                <td><input type="text" name="heading" class="form-control" required></td>

                                <th>Title</th>
                                <td><input type="text" name="title" class="form-control" required></td>
                            </tr>
                            <tr>
                                <th>Author</th>
                                <td><input type="text" name="author" class="form-control" required></td>

                                <th>Date</th>
                                <td><input type="date" name="date" class="form-control" required></td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td><input type="time" name="time" class="form-control" required></td>

                                <th>Content</th>
                                <td rowspan="2">
                                    <textarea name="content" id="editor" rows="6" required></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="form-actions text-center pb-5">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit Blog</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Initialize CKEditor -->
<script>
    CKEDITOR.replace('editor');
</script>

<?php include('includes/footer.php'); ?>
