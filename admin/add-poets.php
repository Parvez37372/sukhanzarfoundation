<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Add Post Category (Poet)</h4>
                    </div>
                    <div class="card-body">
                        <form action="insert-post-category.php" method="POST" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Poet Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" required placeholder="Enter poet name">
                                </div>

                                <div class="form-group">
                                    <label>Upload Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" name="dob" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" name="location" class="form-control" placeholder="City or region">
                                </div>
                            </div>

                            <div class="form-actions text-end pt-3">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
                                <a href="view-post-category.php" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col -->
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
