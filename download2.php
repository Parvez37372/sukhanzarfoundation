<?php
include "config.php";
$id = intval($_GET['id']);
$ip = $_SERVER['REMOTE_ADDR'];
$conn->query("INSERT INTO shayari_downloads (shayari_id, user_ip) VALUES ($id, '$ip')");

// Demo: download as text file
$res = $conn->query("SELECT COALESCE(gazal, nazam, sher, shery) as content FROM urdu_poetry_data WHERE id=$id");
$data = $res->fetch_assoc();

header("Content-Type: text/plain");
header("Content-Disposition: attachment; filename=shayari_$id.txt");
echo $data['content'];
exit;
?>
