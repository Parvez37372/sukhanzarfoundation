<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "config.php";

// Fetch all blogs ordered by latest date
$sql = "SELECT id, heading, title, image, author, date, time FROM blogs ORDER BY date DESC, time DESC";
$result = $conn->query($sql);

include("includes/header.php");
?>
<style>
.blog-card {
    display: flex;
    align-items: center;
    gap: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 20px;
    background: #fff;
    transition: 0.3s;
}
.blog-card:hover { box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
.blog-card img {
    width: 150px;
    height: 100px;
    object-fit: cover;
    border-radius: 8px;
}
.blog-info h3 {
    margin: 0;
    font-size: 20px;
    font-weight: bold;
    color: #333;
}
.blog-info p {
    margin: 4px 0;
    font-size: 14px;
    color: #666;
}
.blog-meta {
    font-size: 12px;
    color: #999;
}
</style>

<div class="container mt-4">
    <h2 class="mb-4">📝 Blog List</h2>

    <!-- Search bar -->
    <form method="GET" action="" class="mb-3">
        <input type="text" name="search" placeholder="Search blogs..." 
               value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd;">
    </form>

    <!-- Alphabet filter -->
    <div class="alphabet-filter mb-3">
        <?php
        $alphabet = range('A', 'Z');
        foreach($alphabet as $letter) {
            echo '<a href="?letter='.$letter.'" style="margin-right:5px; text-decoration:none; padding:5px 10px; border:1px solid #ddd; border-radius:5px; color:#333;">'.$letter.'</a>';
        }
        ?>
    </div>

    <?php 
    // Fetch blogs with search or letter filter
    $where = [];
    if (!empty($_GET['search'])) {
        $search = $conn->real_escape_string($_GET['search']);
        $where[] = "(heading LIKE '%$search%' OR title LIKE '%$search%')";
    }
    if (!empty($_GET['letter'])) {
        $letter = $conn->real_escape_string($_GET['letter']);
        $where[] = "heading LIKE '$letter%'";
    }

    $sql = "SELECT id, heading, title, image, author, date, time FROM blogs";
    if ($where) {
        $sql .= " WHERE " . implode(" AND ", $where);
    }
    $sql .= " ORDER BY date DESC, time DESC";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) { ?>
            <a href="blog-details.php?id=<?= $row['id']; ?>" style="text-decoration:none; color:inherit;">
                <div class="blog-card">
                    <img src="./admin/<?= $row['image'] ?: 'default.png'; ?>" alt="<?= $row['heading']; ?>">
                    <div class="blog-info">
                        <h3><?= $row['heading']; ?></h3>
                        <p><?= $row['title']; ?></p>
                        <div class="blog-meta">
                            ✍️ <?= $row['author']; ?> | 📅 <?= $row['date']; ?> <?= $row['time']; ?>
                        </div>
                    </div>
                </div>
            </a>
    <?php } 
    } else { ?>
        <p>No blogs found.</p>
    <?php } ?>
</div>

<?php include("includes/footer.php"); ?>
