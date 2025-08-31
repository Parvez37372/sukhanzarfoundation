
<?php
if (isset($_GET['search'])) {
    $keyword = strtolower(trim($_GET['search']));

    // Redirect logic
    if ($keyword == "ghazal") {
        header("Location: ghzal_list.php");
        exit();
    } elseif ($keyword == "nazam" || $keyword == "nazm") {
        header("Location: nazam_list.php");
        exit();
    } elseif ($keyword == "urdu") {
        header("Location: urdu_shaiyari_list.php");
        exit();
    } elseif ($keyword == "urdu shayari" || $keyword == "shayari") {
        header("Location: urdu_shaiyari_list.php");
        exit();
    } elseif ($keyword == "blogs" || $keyword == "blog") {
        header("Location: blog_list.php");
        exit();
    } elseif ($keyword == "sher" || $keyword == "she'r") {
        header("Location: sher.php");
        exit();
    } elseif ($keyword == "poets") {
        header("Location: poets_list.php");
        exit();
    } else {
        // Agar keyword match nahi hota
        echo "<h2 style='text-align:center; margin-top:50px;'>No results found for: <b>".htmlspecialchars($keyword)."</b></h2>";
        echo "<p style='text-align:center;'><a href='index.php'>⬅️ Go Back</a></p>";
    }
}
?>
