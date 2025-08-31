<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Add Multiple Banners</h4>
                    </div>
                    <div class="card-body">
                        <form action="insert-banner.php" method="POST" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Select Multiple Images</label>
                                    <input type="file" name="banner_images[]" class="form-control" multiple required>
                                    <small class="text-muted">You can select multiple banner images</small>
                                </div>

                                <div class="form-group">
                                    <label>Common Redirect URL (optional for all images)</label>
                                    <input type="url" name="banner_url" class="form-control" placeholder="https://example.com">
                                </div>
                            </div>

                            <div class="form-actions text-end">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Upload Banners
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
