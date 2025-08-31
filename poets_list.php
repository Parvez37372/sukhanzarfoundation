<?php
include "config.php";

// Search or Alphabet filter
$search = isset($_GET['search']) ? $_GET['search'] : '';
$letter = isset($_GET['letter']) ? $_GET['letter'] : '';

// ✅ Dono tables ko ek subquery me union karke wrap kiya
$sql = "
    SELECT * FROM (
        SELECT id, name, image, dob, location, 'urdu_poetry_category' as source 
        FROM urdu_poetry_category
        UNION
        SELECT id, name, image, dob, location, 'poets_categories' as source 
        FROM poets_categories
    ) AS combined
    WHERE 1
";

// ✅ Filters
if (!empty($search)) {
    $sql .= " AND name LIKE '%" . $conn->real_escape_string($search) . "%'";
}
if (!empty($letter)) {
    $sql .= " AND name LIKE '" . $conn->real_escape_string($letter) . "%'";
}

$sql .= " ORDER BY name ASC";
$result = $conn->query($sql);

include("includes/header.php");
?>
<style>
.search-box {
    margin-bottom: 20px;
}
.search-box input {
    padding: 8px 12px;
    width: 250px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.search-box button {
    padding: 8px 12px;
    border: none;
    background: #7a0a7a;
    color: white;
    border-radius: 4px;
    cursor: pointer;
}
.alphabet-filter {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 20px;
}
.alphabet-filter a {
    padding: 6px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    text-decoration: none;
    color: #333;
    font-weight: bold;
}
.alphabet-filter a.active {
    background: #7a0a7a;
    color: #fff;
}
.post-card {
    border: 1px solid #ddd;
    border-radius: 10px;
    margin-bottom: 20px;
    padding: 15px;
    background: #fff;
    display: flex;
    align-items: center;
    transition: 0.3s;
}
.post-card:hover {
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
.post-card img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-right: 20px;
    object-fit: cover;
}
.post-info h4 {
    margin: 0;
    font-size: 20px;
    font-weight: bold;
    color: #7a0a7a;
}
.post-info p {
    margin: 2px 0;
    color: #666;
    font-size: 14px;
}
.badge {
    display: inline-block;
    padding: 3px 8px;
    border-radius: 6px;
    font-size: 12px;
    background: #eee;
    margin-top: 5px;
}
</style>

<div class="container mt-4">
    <h2 class="mb-4">📜 Poets List</h2>

    <!-- 🔍 Search -->
    <div class="search-box">
        <form method="GET">
            <input type="text" name="search" placeholder="Search poets..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- 🔤 Alphabet Filter -->
    <div class="alphabet-filter">
        <?php foreach (range('A','Z') as $char): ?>
            <a href="?letter=<?= $char ?>" class="<?= ($letter == $char ? 'active' : '') ?>">
                <?= $char ?>
            </a>
        <?php endforeach; ?>
        <a href="poets_list.php" style="background:#555; color:#fff;">All</a>
    </div>

    <!-- 📜 Poets List -->
    <?php if ($result && $result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) { ?>
            <a href="poet.php?id=<?= $row['id']; ?>&table=<?= $row['source']; ?>" style="text-decoration:none; color:inherit;">
                <div class="post-card">
                    <img src="admin/uploads/poets/<?= $row['image'] ?: 'default.png'; ?>" alt="<?= $row['name']; ?>">
                    <div class="post-info">
                        <h4><?= $row['name']; ?></h4>
                        <p>📍 <?= $row['location'] ?: 'Unknown'; ?></p>
                        <p>📅 <?= $row['dob'] ?: 'N/A'; ?></p>
                        <span class="badge">
                            <?= ($row['source'] == 'urdu_poetry_category') ? 'Poetry Category' : 'Poets Category'; ?>
                        </span>
                    </div>
                </div>
            </a>
        <?php } 
    } else { ?>
        <p>No poets found.</p>
    <?php } ?>
</div>

<?php include("includes/footer.php"); ?>
