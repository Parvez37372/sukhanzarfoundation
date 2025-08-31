<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<style>
    .pd { padding: 0px 5px; }
    .table th, .table td { vertical-align: middle; }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><b>All Poets & Poetry Summary</b></h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Poet Name</th>
                                    <th>Sher Count</th>
                                    <th>Ghazal Count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'config.php';
                                $sql = "SELECT 
                                            pc.id AS poet_id,
                                            pc.name AS poet_name,
                                            SUM(CASE WHEN p.sher IS NOT NULL AND TRIM(p.sher) <> '' THEN 1 ELSE 0 END) AS sher_count,
                                            SUM(CASE WHEN p.gazal IS NOT NULL AND TRIM(p.gazal) <> '' THEN 1 ELSE 0 END) AS gazal_count
                                        FROM poets_categories pc
                                        LEFT JOIN poetry p ON pc.id = p.poet_id
                                        GROUP BY pc.id
                                        ORDER BY pc.name ASC";
                                $result = $conn->query($sql);
                                $i = 1;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                            <td>{$i}</td>
                                            <td><b>{$row['poet_name']}</b></td>
                                            <td>{$row['sher_count']}</td>
                                            <td>{$row['gazal_count']}</td>
                                            <td>
                                                <a href='view-poet-poetrys.php?poet_id={$row['poet_id']}' class='btn btn-info pd'>View Data</a>
                                            </td>
                                        </tr>";
                                        $i++;
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center'>No poets found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
