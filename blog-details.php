<?php
include('includes/header2.php');
include 'config.php';
include('includes/header.php');

// Validate blog ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('Invalid blog ID.'); window.location.href='index.php';</script>";
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM blogs WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "<script>alert('Blog not found.'); window.location.href='index.php';</script>";
    exit;
}

$blog = mysqli_fetch_assoc($result);

// Fetch 5 recent blogs
$recentBlogs = mysqli_query($conn, "SELECT * FROM blogs WHERE id != $id ORDER BY id DESC LIMIT 5");

// Handle comment submission
if (isset($_POST['submit_comment'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    if (!empty($name) && !empty($comment)) {
        $insertQuery = "INSERT INTO comments (blog_id, name, email, comment, status)
                        VALUES ('$id', '$name', '$email', '$comment', 'approved')";
        mysqli_query($conn, $insertQuery);
        echo "<script>alert('✅ Comment posted successfully!');</script>";
    } else {
        echo "<script>alert('⚠️ Name and Comment are required.');</script>";
    }
}
?>

<!-- BLOG SECTION -->
<div class="container mt-5 mb-5" style="margin-top: 150px;">
    <div class="row">
        <!-- MAIN BLOG CONTENT -->
        <div class="col-md-8">
            <div class="single-blog-article">
                <div class="text-center mb-4">
                    <img src="admin/<?= htmlspecialchars($blog['image']) ?>" 
                         alt="<?= htmlspecialchars($blog['heading']) ?>" 
                         class="img-fluid" style="max-height: 500px; object-fit: cover; width: 100%;">
                </div>

                <h1 class="blog-main-title mb-3"><?= htmlspecialchars($blog['heading']) ?></h1>

                <div class="blog-meta-info mb-3">
                    <span class="blog-author"><strong>Author:</strong> <?= htmlspecialchars($blog['author']) ?></span> |
                    <span class="blog-date"><strong>Date:</strong> <?= date("F d, Y", strtotime($blog['date'])) ?></span> |
                    <span class="blog-time"><strong>Time:</strong> <?= date("h:i A", strtotime($blog['time'])) ?></span>
                </div>

                <div class="blog-full-content">
                    <?= $blog['content'] ?>
                </div>
            </div>

            <!-- COMMENT FORM -->
            <div class="mt-5 mb-4">
                <h4>📝 Leave a Comment</h4>
                <form method="POST">
                    <div class="form-group mb-2">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="form-group mb-2">
                        <input type="email" name="email" class="form-control" placeholder="Your Email (optional)">
                    </div>
                    <div class="form-group mb-2">
                        <textarea name="comment" class="form-control" placeholder="Your Comment" rows="4" required></textarea>
                    </div>
                    <button type="submit" name="submit_comment" class="btn btn-success">Post Comment</button>
                </form>
            </div>

            <!-- COMMENT LIST -->
            <div class="mb-5">
                <h4>💬 Comments</h4>
                <?php
                $commentQuery = "SELECT * FROM comments WHERE blog_id = $id AND status='approved' ORDER BY created_at DESC";
                $commentResult = mysqli_query($conn, $commentQuery);

                if (mysqli_num_rows($commentResult) > 0) {
                    while ($row = mysqli_fetch_assoc($commentResult)) {
                        ?>
                        <div class="border p-3 mb-3">
                            <strong><?= htmlspecialchars($row['name']) ?></strong><br>
                            <small><?= date("F d, Y h:i A", strtotime($row['created_at'])) ?></small>
                            <p class="mb-0"><?= nl2br(htmlspecialchars($row['comment'])) ?></p>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No comments yet. Be the first to comment!</p>";
                }
                ?>
            </div>
        </div>

        <!-- SIDEBAR -->
        <div class="col-md-4">
            <!-- Newsletter -->
            <div class="card mb-4 p-3">
                <h5 class="mb-3">📬 Subscribe to Newsletter</h5>
                <form action="subscribe.php" method="POST">
                    <input type="email" name="email" class="form-control mb-2" placeholder="Enter your email" required>
                    <button type="submit" class="btn btn-primary btn-block">Subscribe</button>
                </form>
            </div>

            <!-- Latest Blogs -->
            <div class="card p-3">
                <h5 class="mb-3">📰 Latest Blogs</h5>
                <?php while ($row = mysqli_fetch_assoc($recentBlogs)): ?>
                    <div class="media mb-3">
                        <img src="admin/<?= htmlspecialchars($row['image']) ?>" 
                             alt="<?= htmlspecialchars($row['heading']) ?>" 
                             class="mr-3" style="width: 80px; height: 60px; object-fit: cover;">
                        <div class="media-body">
                            <a href="blog-details.php?id=<?= $row['id'] ?>" style="font-weight: 600;">
                                <?= htmlspecialchars(mb_strimwidth($row['heading'], 0, 50, "...")) ?>
                            </a>
                            <div style="font-size: 12px; color: #888;">
                                <?= date("M d, Y", strtotime($row['date'])) ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
