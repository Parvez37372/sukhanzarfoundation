<?php
include 'config.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('No blog ID specified.'); window.location.href='view-blogs.php';</script>";
    exit();
}

$id = intval($_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM blogs WHERE id=$id");

if (mysqli_num_rows($query) == 0) {
    echo "<script>alert('Blog not found.'); window.location.href='manage-blogs.php';</script>";
    exit();
}

$row = mysqli_fetch_assoc($query);
?>

<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Edit Blog</h4>
            </div>
            <div class="card-body">
                <form action="update-blog.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <table class="table table-bordered">
                        <tr>
                            <th>Current Image</th>
                            <td>
                                <img src="<?= $row['image'] ?>" width="100"><br>
                                <input type="file" name="image">
                                <input type="hidden" name="old_image" value="<?= $row['image'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>Heading</th>
                            <td><input type="text" name="heading" value="<?= $row['heading'] ?>" class="form-control" required></td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td><input type="text" name="title" value="<?= $row['title'] ?>" class="form-control" required></td>
                        </tr>
                        <tr>
                            <th>Author</th>
                            <td><input type="text" name="author" value="<?= $row['author'] ?>" class="form-control" required></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><input type="date" name="date" value="<?= $row['date'] ?>" class="form-control" required></td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td><input type="time" name="time" value="<?= $row['time'] ?>" class="form-control" required></td>
                        </tr>
                        <tr>
                            <th>Content</th>
                            <td><textarea name="content" id="editor"><?= $row['content'] ?></textarea></td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary">Update Blog</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>CKEDITOR.replace('editor');</script>
<?php include('includes/footer.php'); ?>
