<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<style>
    .form-group label {
        font-weight: 600;
    }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Add Urdu Poet Category</h4>
            </div>
            <div class="card-body">
                <form action="insert-urdu-poet-category.php" method="POST" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Poet Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter poet name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Poet Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" name="dob" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date of Death</label>
                                    <input type="date" name="dod" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" placeholder="City, State, Country">
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Total Ghazals</label>
                                    <input type="number" name="gazal_count" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Total Nazams</label>
                                    <input type="number" name="nazam_count" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Total Shers</label>
                                    <input type="number" name="sher_count" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Total Shery</label>
                                    <input type="number" name="shery_count" class="form-control" value="0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions text-end pt-3">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Save Poet Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
