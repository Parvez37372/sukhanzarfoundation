<?php
 include('includes/header2.php') ;
include('includes/header.php');
include('config.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<h2>Invalid collection ID.</h2>";
    exit;
}

$collection_id = intval($_GET['id']);

// Fetch collection details
$collection_sql = "SELECT author, cover_image, profile_image, description FROM shayari_collection WHERE id = $collection_id LIMIT 1";
$collection_result = mysqli_query($conn, $collection_sql);

if (mysqli_num_rows($collection_result) == 0) {
    echo "<h2>Collection not found.</h2>";
    exit;
}
$collection = mysqli_fetch_assoc($collection_result);

// Fetch Shayari entries
$shayari_sql = "SELECT id, content, date FROM shayari_data WHERE collection_id = $collection_id ORDER BY date DESC";

$shayari_result = mysqli_query($conn, $shayari_sql);
?>

<style>
body {
    font-family: 'Segoe UI', sans-serif;
    background-color: #f9f9f9;
    margin: 0;
}

.hero-section {
    position: relative;
    width: 100%;
    min-height: 320px;
    background-size: cover;
    background-position: center center;
    display: flex;
    align-items: flex-end;
    color: #fff;
}
.hero-overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.2));
    z-index: 1;
}
.hero-content {
    position: relative;
    z-index: 2;
    padding: 40px;
    display: flex;
    align-items: center;
    gap: 20px;
}
.hero-content img {
    width: 110px;
    height: 110px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #fff;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.3);
}
.text-block h1 {
    margin: 0;
    font-size: 32px;
    font-weight: 700;
    color: #fff;
}
.text-block p {
    margin-top: 8px;
    font-size: 15px;
    color: #7a0a7a;
}
.container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
}
.left-column {
    flex: 2;
}
.right-column {
    flex: 1;
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
}
.shayari-box {
    background: #fff;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
}
.shayari-box p {
    font-size: 18px;
    margin: 0;
    color: #333;
}
.shayari-meta {
    margin-top: 12px;
    display: flex;
    align-items: center;
    gap: 20px;
    font-size: 14px;
    color: #777;
}
.shayari-meta span, .shayari-meta a {
    transition: color 0.2s ease;
    text-decoration: none;
    color: inherit;
}
.shayari-meta span:hover, .shayari-meta a:hover {
    color: #000;
}
.collection-list a {
    text-decoration: none;
    color: #333;
}
.collection-list a:hover .collection-card {
    background: #f3f3f3;
}
.collection-card {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px;
    border-radius: 6px;
    transition: background 0.3s;
}
.collection-card img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 6px;
    border: 1px solid #ccc;
}
.collection-card div {
    display: flex;
    flex-direction: column;
    font-size: 14px;
    font-weight: 500;
}
.newsletter {
    text-align: center;
}
.newsletter h4 {
    font-size: 18px;
    margin-bottom: 12px;
}
.newsletter input[type="email"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
}
.newsletter button {
    width: 100%;
    padding: 10px;
    background-color: #7a0a7a;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
}
.newsletter button:hover {
    background-color: black;
}
</style>

<!-- Hero Section -->
<div class="hero-section" style="background-image: url('admin/<?php echo htmlspecialchars($collection['cover_image']); ?>');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <?php if (!empty($collection['profile_image'])) { ?>
            <img src="admin/<?php echo htmlspecialchars($collection['profile_image']); ?>" alt="Author Image">
        <?php } ?>
        <div class="text-block">
            <h1><?php echo htmlspecialchars($collection['author']); ?></h1>
            <p><?php echo nl2br(htmlspecialchars($collection['description'] ?? '')); ?></p>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container">
    <!-- Shayari Section -->
    <div class="left-column">
        <?php
        if (mysqli_num_rows($shayari_result) > 0) {
         while ($shayari = mysqli_fetch_assoc($shayari_result)) {
    echo '<div class="shayari-box">';
    echo '<p>' . $shayari['content'] . '</p>';
    echo '<div class="shayari-meta">';
    echo '<span title="Date">📅 ' . date("d M Y", strtotime($shayari['date'])) . '</span>';

    echo '<span class="toggle-comment" style="cursor:pointer;" title="Comment">💬 Comments</span>';
    echo '<span title="Share">🔗 Share</span>';
    echo '<a href="download.php?text=' . urlencode(strip_tags($shayari['content'])) . '" title="Download" download>⬇️ Download</a>';
    echo '</div>';
    
    // Comment Box (initially hidden)
    echo '<div class="comment-section" style="display:none; margin-top:15px;">';
echo '<form method="POST" action="post_comment.php">';
echo '<input type="hidden" name="shayari_id" value="' . $shayari['id'] . '">';
echo '<textarea name="comment" required placeholder="Write a comment..." style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;"></textarea>';
echo '<button type="submit" style="margin-top:8px; background:#7a0a7a; color:#fff; padding:8px 12px; border:none; border-radius:6px; cursor:pointer;">Post Comment</button>';
echo '</form>';
#ye pr commnets display
$shayari_id = $shayari['id'];

$comment_sql = "SELECT id, created_at, comment FROM shayari_comments WHERE shayari_id = $shayari_id ORDER BY created_at DESC";
$comment_result = mysqli_query($conn, $comment_sql);

if (mysqli_num_rows($comment_result) > 0) {
    echo '<div style="margin-top:15px;">';

    while ($comment = mysqli_fetch_assoc($comment_result)) {
        $commentId = $comment['id'];
        echo '
        <div class="comment-wrapper" style="display:flex; align-items:flex-start; margin-bottom:15px; background:#f9f9f9; padding:12px; border-radius:10px; box-shadow:0 1px 4px rgba(0,0,0,0.05);">
            <div style="margin-right:12px;">
                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="User" style="width:38px; height:38px; border-radius:50%;">
            </div>
            <div style="flex:1;">
                <div style="font-size:15px; color:#333; margin-bottom:6px;">' . nl2br(htmlspecialchars($comment['comment'])) . '</div>
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <div style="font-size:12px; color:#999;">🕒 ' . date("d M Y h:i A", strtotime($comment['created_at'])) . '</div>
                    <div style="display:flex; gap:15px; align-items:center;">
                        <span class="like-btn" data-id="' . $commentId . '" style="font-size:18px; cursor:pointer; color:white; border:1px solid black; padding:3px 8px; border-radius:50%;">❤️</span>
                        <span class="reply-toggle" data-id="' . $commentId . '" style="font-size:14px; cursor:pointer; color:#555;">↩️ Reply</span>
                    </div>
                </div>';

        // 🔻 Replies right below Like/Reply
        $reply_result = mysqli_query($conn, "SELECT reply FROM shayari_replies WHERE comment_id = $commentId");
        while ($row = mysqli_fetch_assoc($reply_result)) {
            echo '<div style="margin-left:45px; margin-top:5px; font-size:13px; color:#444; background:#f1f1f1; padding:6px 10px; border-radius:6px;">
                    ↪️ ' . htmlspecialchars($row['reply']) . '
                  </div>';
        }

        // 🔻 Reply box
        echo '
                <div class="reply-box" id="reply-box-' . $commentId . '" style="display:none; margin-top:10px;">
                    <form method="POST" action="post_reply.php">
                        <input type="hidden" name="comment_id" value="' . $commentId . '">
                        <textarea name="reply" required placeholder="Write a reply..." style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;"></textarea>
                        <button type="submit" style="margin-top:5px; padding:6px 12px; background:#7a0a7a; color:#fff; border:none; border-radius:6px;">Post Reply</button>
                    </form>
                </div>
            </div>
        </div>';
    }

    echo '</div>';
} else {
    echo '<p style="color:gray; margin-top:10px;">No comments yet.</p>';
}


echo '</div>';


    echo '</div>';
}
}
        ?>
    </div>

    <!-- Sidebar -->
    <div class="right-column">
        <div class="newsletter">
            <h3>Subscribe to our Newsletter</h3>
            <p>Get all the latest information from Sukhanzar.</p>
            <form method="post" action="subscribe.php">
                <input type="email" name="email" placeholder="Enter your email..." required>
                <button type="submit">Subscribe</button>
            </form>
        </div>

        <hr style="margin: 20px 0;">

        <h3 style="margin-bottom: 15px;">Shayari Collections</h3>
        <div class="collection-list">
            <?php
            $related = "SELECT id, shayari_name, author, image FROM shayari_collection WHERE id != $collection_id ORDER BY id DESC LIMIT 6";
            $result = mysqli_query($conn, $related);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<a href="shayari_list.php?id=' . $row['id'] . '">';
                    echo '<div class="collection-card">';
                    echo '<img src="admin/' . htmlspecialchars($row['image']) . '" alt="">';
                    echo '<div>';
                    echo '<span>' . htmlspecialchars($row['shayari_name']) . '</span>';
                    echo '<span style="color:#888;font-weight:400;">' . htmlspecialchars($row['author']) . '</span>';
                    echo '</div></div></a>';
                }
            } else {
                echo "<p>No collections available.</p>";
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const commentToggles = document.querySelectorAll('.toggle-comment');
    commentToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const commentSection = this.closest('.shayari-box').querySelector('.comment-section');
            if (commentSection.style.display === 'none') {
                commentSection.style.display = 'block';
            } else {
                commentSection.style.display = 'none';
            }
        });
    });
});
</script>
<script>
// Like toggle — switch between white and red
document.querySelectorAll('.like-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        if (btn.style.color === 'red') {
            btn.style.color = 'white';
            btn.style.border = '1px solid black';
        } else {
            btn.style.color = 'red';
            btn.style.border = '1px solid red';
        }
    });
});

// Reply box toggle
document.querySelectorAll('.reply-toggle').forEach(btn => {
    btn.addEventListener('click', () => {
        const id = btn.dataset.id;
        const replyBox = document.getElementById('reply-box-' + id);
        replyBox.style.display = (replyBox.style.display === 'block') ? 'none' : 'block';
    });
});
</script>
