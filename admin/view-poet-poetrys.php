<?php include('includes/header.php'); ?> 
<?php include('includes/sidebar.php'); ?>
<style>
    .table th, .table td { vertical-align: middle; }
    .poet-info { margin-bottom: 20px; }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card-group">
            <div class="card">
                <div class="card-body">

                    <?php
                    include 'config.php';

                    if (isset($_GET['poet_id']) && is_numeric($_GET['poet_id'])) {
                        $poet_id = intval($_GET['poet_id']);

                        // Poet Info
                        $poet_sql = "SELECT * FROM poets_categories WHERE id = $poet_id";
                        $poet_result = $conn->query($poet_sql);

                        if ($poet_result->num_rows > 0) {
                            $poet = $poet_result->fetch_assoc();
                            echo "<div class='poet-info'>
                                    <h3><b>{$poet['name']}</b></h3>
                                    <p><b>DOB:</b> {$poet['dob']} | <b>Location:</b> {$poet['location']}</p>
                                    <img src='/admin/uploads/poets/{$poet['image']}' alt='{$poet['name']}' style='max-width:150px;'>
                                  </div>";
                        }

                        // Poetry Info
                        $sql = "SELECT id, sher, gazal, created_at 
                                FROM poetry 
                                WHERE poet_id = $poet_id 
                                ORDER BY created_at DESC";
                        $result = $conn->query($sql);

                        echo "<h4><b>All Poetry of {$poet['name']}</b></h4>";

                        if ($result->num_rows > 0) {
                            echo "<div class='table-responsive'>
                                    <table class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Sher</th>
                                                <th>Ghazal</th>
                                                <th>Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>".(!empty($row['sher']) ? nl2br($row['sher']) : '-')."</td>
                                        <td>".(!empty($row['gazal']) ? nl2br($row['gazal']) : '-')."</td>
                                        <td>{$row['created_at']}</td>
                                      </tr>";
                            }
                            echo "      </tbody>
                                    </table>
                                  </div>";
                        } else {
                            echo "<p>No poetry found for this poet.</p>";
                        }

                    } else {
                        echo "<p class='text-danger'>Invalid Poet ID</p>";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
