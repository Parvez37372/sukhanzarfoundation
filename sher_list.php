<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "config.php";

// Poet ID get karo
$poet_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Agar poet_id nahi mila
if ($poet_id <= 0) {
    die("Invalid Poet ID");
}

// Poet details
$poet_sql = "SELECT id, name, image, dob, location 
             FROM poets_categories 
             WHERE id = $poet_id LIMIT 1";
$poet_result = $conn->query($poet_sql);
$poet = $poet_result->fetch_assoc();

// Sher & Ghazal list (Correct Table: poetry)
$sql = "SELECT id, sher, gazal, created_at 
        FROM poetry 
        WHERE poet_id = $poet_id 
        ORDER BY created_at DESC";
$result = $conn->query($sql);

include("includes/header.php");
?>
<style>
.poet-header {
    display: flex; align-items: center; gap: 20px;
    background: #f9f9f9; padding: 20px; border-radius: 10px;
    margin-bottom: 30px;
}
.poet-header img {
    width: 120px; height: 120px; border-radius: 10px;
    object-fit: cover; border: 2px solid #ddd;
}
.poet-header h2 { margin: 0; color: #ee089c; }
.poet-header p { margin: 3px 0; color: #555; }

.sher-card {
    border: 1px solid #ddd; border-radius: 10px;
    padding: 15px; margin-bottom: 20px; background: #fff;
    transition: 0.3s;
}
.sher-card:hover { box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
.sher-text { font-size: 18px; margin-bottom: 10px; color: #333; }
.ghazal-text { font-size: 15px; color: #666; }
.date { font-size: 12px; color: #999; margin-top: 8px; }
</style>

<div class="container mt-4">

    <!-- Poet Info -->
    <?php if ($poet) { ?>
        <div class="poet-header">
            <img src="admin/uploads/poets/<?= $poet['image'] ?: 'default.png'; ?>" alt="<?= $poet['name']; ?>">
            <div>
                <h2><?= htmlspecialchars($poet['name']); ?></h2>
                <p>📍 <?= $poet['location'] ?: 'Unknown'; ?></p>
                <p>🎂 <?= $poet['dob'] ?: 'N/A'; ?> 
                </p>
            </div>
        </div>
    <?php } ?>

    <h3 class="mb-4">📜 Sher & Ghazal</h3>

    <!-- Sher List -->
    <?php if ($result && $result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) { ?>
            <div class="sher-card">
    <div class="sher-text"><b>Sher:</b> <?= nl2br($row['sher']); ?></div>
    <?php if(!empty($row['gazal'])) { ?>
        <div class="ghazal-text"><b>Ghazal:</b> <?= nl2br($row['gazal']); ?></div>
    <?php } ?>
    <div class="date">🗓️ <?= $row['created_at']; ?></div>
</div>

        <?php } 
    } else { ?>
        <p>No Sher found for this poet.</p>
    <?php } ?>
</div>

<?php include("includes/footer.php"); ?>
