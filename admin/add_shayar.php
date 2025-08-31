<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<style>
    .form-group label {
        font-weight: 600;
    }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Add Shayari Collection</h4>
                    </div>
                    <div class="card-body">
                        <form action="insert_shayari_collection.php" method="POST" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Shayari Name</label>
                                            <input type="text" name="shayari_name" class="form-control" placeholder="Shayari Collection Name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Author</label>
                                            <input type="text" name="author" class="form-control" placeholder="Author Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Thumbnail Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Cover Image</label>
                                            <input type="file" name="cover_image" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea name="description" class="form-control" rows="4" placeholder="Description about this Shayari collection..."></textarea>
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Profile Image</label>
                                            <input type="file" name="profile_image" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
