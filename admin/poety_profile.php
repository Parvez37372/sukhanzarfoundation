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
                <h4 class="m-b-0 text-white">Add Poet Profile</h4>
            </div>
            <div class="card-body">
                <form action="insert-urdu-poet-profile.php" method="POST" enctype="multipart/form-data">
                    <div class="form-body">

                        <div class="form-group">
                            <label>Select Poet</label>
                            <select name="poet_id" class="form-control" required>
                                <option value="">-- Select Poet --</option>
                                <?php
                                include 'config.php';
                                $res = $conn->query("SELECT id, name FROM urdu_poetry_category ORDER BY name");
                                while ($row = $res->fetch_assoc()) {
                                    echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['name']) . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Profile Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Cover Image</label>
                            <input type="file" name="cover_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" placeholder="City, State, Country">
                        </div>

                        <div class="form-group">
                            <label>Description / Bio</label>
                            <textarea name="description" rows="5" class="form-control" placeholder="Write about the poet..."></textarea>
                        </div>
                    </div>

                    <div class="form-actions text-end pt-3">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Save Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
