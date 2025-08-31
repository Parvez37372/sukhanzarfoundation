<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>

<style>
    .form-group label {
        font-weight: 600;
    }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white"><b>Add New Poetry</b></h4>
            </div>
            <div class="card-body">
                <?php if (isset($_GET['success'])) : ?>
                    <div class="alert alert-success">✅ Poetry added successfully.</div>
                <?php endif; ?>
                <?php if (isset($_GET['error'])) : ?>
                    <div class="alert alert-danger">❌ Please fill all required fields.</div>
                <?php endif; ?>

                <form action="insert-poetry.php" method="POST">
                    <div class="form-body">
                        <div class="form-group">
                            <label><b>Select Poet <span class="text-danger">*</span></b></label>
                            <select name="poet_id" class="form-control" required>
                                <option value="">— Choose a Poet —</option>
                                <?php
                                include 'config.php';
                                $res = $conn->query("SELECT * FROM poets_categories ORDER BY name");
                                while ($row = $res->fetch_assoc()) {
                                    echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['name']) . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><b>Sher (Couplet)</b></label>
                            <textarea name="sher" id="sherEditor" class="form-control" placeholder="Write sher or couplet..."></textarea>
                        </div>

                        <div class="form-group">
                            <label><b>Ghazal</b></label>
                            <textarea name="gazal" id="ghazalEditor" class="form-control" placeholder="Write full ghazal..."></textarea>
                        </div>
                    </div>

                    <div class="form-actions pt-3 text-end">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> <b>Add Poetry</b></button>
                        <a href="view-poetry.php" class="btn btn-secondary"><b>View All</b></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Activate CKEditor -->
<script>
    ClassicEditor.create(document.querySelector('#sherEditor')).catch(error => console.error(error));
    ClassicEditor.create(document.querySelector('#ghazalEditor')).catch(error => console.error(error));
</script>

<?php include('includes/footer.php'); ?>
