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
                <h4 class="m-b-0 text-white">Add Urdu Poetry Data</h4>
            </div>
            <div class="card-body">
                <form action="insert-urdu-poetry-data.php" method="POST">
                    <div class="form-body">

                        <!-- Select Poet -->
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

                        <!-- Nazam -->
                        <div class="form-group">
                            <label>Nazam</label>
                            <textarea id="nazamEditor" name="nazam" class="form-control" placeholder="Write Nazam here..."></textarea>
                        </div>

                        <!-- Ghazal -->
                        <div class="form-group">
                            <label>Ghazal</label>
                            <textarea id="ghazalEditor" name="gazal" class="form-control" placeholder="Write Ghazal here..."></textarea>
                        </div>

                        <!-- Sher -->
                        <div class="form-group">
                            <label>Sher</label>
                            <textarea id="sherEditor" name="sher" class="form-control" placeholder="Write Sher here..."></textarea>
                        </div>

                        <!-- Shery -->
                        <div class="form-group">
                            <label>Shery</label>
                            <textarea id="sheryEditor" name="shery" class="form-control" placeholder="Write Shery here..."></textarea>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="form-actions text-end pt-3">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Submit Poetry
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

<!-- CKEditor 5 CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#nazamEditor')).catch(error => console.error(error));
    ClassicEditor.create(document.querySelector('#ghazalEditor')).catch(error => console.error(error));
    ClassicEditor.create(document.querySelector('#sherEditor')).catch(error => console.error(error));
    ClassicEditor.create(document.querySelector('#sheryEditor')).catch(error => console.error(error));
</script>
