<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';

// Poet ID get
$poet_id = intval($_GET['id']);

// Poet data fetch
$poet_sql = "SELECT c.*, p.description, p.cover_image 
             FROM urdu_poetry_category c
             LEFT JOIN urdu_poet_profile p ON c.id = p.poet_id
             WHERE c.id = $poet_id";
$poet_res = $conn->query($poet_sql);
if(!$poet_res || $poet_res->num_rows == 0){
    die("Poet not found!");
}
$poet = $poet_res->fetch_assoc();

// Filter Tab (default: top)
$type = $_GET['type'] ?? 'top';

if($type == "ghazal"){
    $select_col = "gazal";
    $title = "Ghazals of " . $poet['name'];
} elseif($type == "nazm"){
    $select_col = "nazam";
    $title = "Nazms of " . $poet['name'];
} elseif($type == "sher"){
    $select_col = "sher";
    $title = "Sher of " . $poet['name'];
} else {
    $select_col = "COALESCE(gazal, nazam, sher, shery) as content";
    $limit = "LIMIT 20";
    $title = "Top 20 Sher of " . $poet['name'];
}

// Shayari fetch
if($type == "top"){
    $shayari_sql = "SELECT id, $select_col FROM urdu_poetry_data WHERE poet_id = $poet_id $limit";
} else {
    $shayari_sql = "SELECT id, $select_col as content FROM urdu_poetry_data WHERE poet_id = $poet_id";
}
$shayari_result = $conn->query($shayari_sql);

// Other poets fetch
$other_poets_sql = "SELECT id, name, image FROM urdu_poetry_category WHERE id != $poet_id LIMIT 6";
$other_poets = $conn->query($other_poets_sql);
?>

<?php include('includes/header.php'); ?>
<style>
.hero-section {
    background: url('admin/uploads/profiles/<?= $poet['cover_image']; ?>') no-repeat center center;
    background-size: cover;
    padding: 80px 20px;
    width:100%;
    color: white;
    text-align: center;
    border-radius: 8px;
    margin-bottom: 30px;
    position: relative;
}
.hero-section::after {
    content: "";
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.5);
    border-radius: 8px;
}
.hero-content { position: relative; z-index: 2; }
.hero-content h1 { font-size: 42px; margin-bottom: 10px; }
.hero-content p { font-size: 18px; }
.profile-header { display: flex; align-items: center; margin-bottom: 20px; }
.profile-header img { width: 120px; height: 120px; border-radius: 50%; margin-right: 20px; border:1px solid #fff; }
.poet-info h2 { margin: 0; font-size: 24px; color:#fff; }
.poet-info p { margin: 3px 0; color: #fff; }
.nav-tabs { margin-top: 20px; }
.shayari-card { padding: 15px; margin-bottom: 20px; border-bottom: 1px solid #ddd; background:#fff; border-radius:6px; }
.shayari-actions i { margin-right: 15px; cursor: pointer; color: #666; }
.sidebar { background: #fff; padding: 15px; border: 1px solid #ddd; border-radius:8px; }
.sidebar h5 { margin-bottom:15px; }
.sidebar .poet-item { display:flex; align-items:center; margin-bottom:15px; }
.sidebar .poet-item img { width:50px; height:50px; border-radius:50%; margin-right:10px; border:1px solid #ccc; }
.sidebar .poet-item {
    transition: all 1s ease; /* duration 1 second */
}

.sidebar .poet-item:hover {
    background: #F2F2F2;
    padding: 10px;
}

</style>
<br>
<div class="container-fluid">
  <!-- Hero Section -->
  <div class="hero-section">
    <div class="hero-content">
      <div class="profile-header">
        <img src="admin/uploads/poets/<?= $poet['image']; ?>" alt="<?= $poet['name']; ?>">
        <div class="poet-info">
          <h2><?= $poet['name']; ?></h2>
          <p>📍 <?= $poet['location']; ?></p>
          <p>📅 <?= $poet['dob']; ?> – <?= $poet['dod'] ?: 'Present'; ?></p>
          <p><small><?= $poet['description'] ?: ''; ?></small></p><!--kam-->
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Left Content -->
    <div class="col-md-8">
      <!-- Tabs -->
      <ul class="nav nav-tabs mt-3">
        <li class="nav-item"><a class="nav-link <?= ($type=='top')?'active':'' ?>" href="poet.php?id=<?= $poet_id ?>&type=top">Top 20 Sher</a></li>
        <li class="nav-item"><a class="nav-link <?= ($type=='ghazal')?'active':'' ?>" href="poet.php?id=<?= $poet_id ?>&type=ghazal">Ghazal</a></li>
        <li class="nav-item"><a class="nav-link <?= ($type=='nazm')?'active':'' ?>" href="poet.php?id=<?= $poet_id ?>&type=nazm">Nazm</a></li>
        <li class="nav-item"><a class="nav-link <?= ($type=='sher')?'active':'' ?>" href="poet.php?id=<?= $poet_id ?>&type=sher">Sher</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Videos</a></li>
      </ul>

      <!-- Shayari List -->
      <h4 class="mt-4"><?= $title; ?></h4>
      <hr>
      <?php if($shayari_result && $shayari_result->num_rows > 0){ ?>
          <?php while($row = $shayari_result->fetch_assoc()) { ?>
          <div class="shayari-card">
            <p style="font-size:18px;"><?= nl2br($row['content']); ?></p>
            <div class="shayari-actions" data-id="<?= $row['id']; ?>">
  <i class="fa fa-heart like-btn"></i> 
  <span class="like-count">0</span>

  <i class="fa fa-share share-btn"></i> 

  <i class="fa fa-comment comment-btn"></i> 
  <span class="comment-count">0</span>

  <i class="fa fa-download download-btn"></i>
</div>

<!-- Hidden Comment Box -->
<div class="comment-box" id="comment-box-<?= $row['id']; ?>" style="display:none; margin-top:10px;">
  <form class="comment-form" data-id="<?= $row['id']; ?>">
    <input type="text" name="name" placeholder="Your Name" required class="form-control mb-2">
    <textarea name="comment" placeholder="Write a comment..." required class="form-control mb-2"></textarea>
    <button type="submit" class="btn btn-sm btn-primary">Post</button>
  </form>
  <div class="comments-list" style="margin-top:10px;"></div>
</div>

          </div>
          <?php } ?>
      <?php } else { ?>
          <p>No records found.</p>
      <?php } ?>
    </div>

    <!-- Right Sidebar -->
    <div class="col-md-4">
      <div class="sidebar">
        <h5>Other Poets</h5>
        <hr>
        <?php if($other_poets && $other_poets->num_rows > 0){ ?>
          <?php while($op = $other_poets->fetch_assoc()){ ?>
            <a href="poet.php?id=<?= $op['id']; ?>" class="poet-item">
              <img src="admin/uploads/poets/<?= $op['image']; ?>" alt="<?= $op['name']; ?>">
              <span><?= $op['name']; ?></span>
            </a>
          <?php } ?>
          <hr>
          <hr>
<h5>SHAYARI COLLECTION</h5>
<?php
$collection_sql = "SELECT id, shayari_name, image, author FROM shayari_collection LIMIT 6";
$collection_res = $conn->query($collection_sql);

if($collection_res && $collection_res->num_rows > 0){
    while($col = $collection_res->fetch_assoc()){ ?>
        <a href="shayari_list.php?id=<?= $col['id']; ?>" class="poet-item" style="display:flex; align-items:center; margin-bottom:10px; text-decoration:none; color:#000;">
          <img src="admin/<?= $col['image']; ?>" alt="<?= $col['shayari_name']; ?>" style="width:50px; height:50px; border-radius:5px; margin-right:10px;">
          <div>
              <strong><?= $col['shayari_name']; ?></strong><br>
              <small>✍ <?= $col['author']; ?></small>
          </div>
        </a>
    <?php }
} else {
    echo "<p>No shayari collections found.</p>";
}
?>

          
        <?php } else { ?>
          <p>No other poets found.</p>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){

  // Like
  $(".like-btn").click(function(){
    let card = $(this).closest(".shayari-actions");
    let id = card.data("id");
    $.post("like.php", {id:id}, function(res){
      card.find(".like-count").text(res);
    });
  });

  // Comment toggle
  $(".comment-btn").click(function(){
    let id = $(this).closest(".shayari-actions").data("id");
    $("#comment-box-"+id).toggle();
  });

  // Comment submit
  $(".comment-form").submit(function(e){
    e.preventDefault();
    let id = $(this).data("id");
    $.post("comment.php", $(this).serialize()+"&id="+id, function(res){
      $("#comment-box-"+id+" .comments-list").html(res);
      $(".comment-form")[0].reset();
    });
  });

  // Share
  $(".share-btn").click(function(){
    let id = $(this).closest(".shayari-actions").data("id");
    let url = window.location.href+"#shayari-"+id;
    navigator.share ? navigator.share({title:"Shayari", url:url}) 
    : alert("Copy this link: "+url);
  });

  // Download
  $(".download-btn").click(function(){
    let id = $(this).closest(".shayari-actions").data("id");
    window.location.href = "download2.php?id="+id;
  });

});
</script>
