<?php
if (isset($_GET['text'])) {
    $text = $_GET['text'];
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="shayari.txt"');
    echo $text;
} else {
    echo "No content to download.";
}
