<ul>
    <li><a href="urdu_shaiyari_list.php">Urdu Shayari</a></li>

    <?php
    include 'config.php'; // Database connection

    $sql = "SELECT shayari_name, id FROM shayari_collection";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Dynamic link ke liye id ya slug use kar sakte ho
            echo '<li><a href="shayari_detail.php?id=' . $row['id'] . '">' . htmlspecialchars($row['shayari_name']) . '</a></li>';
        }
    }
    $conn->close();
    ?>
</ul>
