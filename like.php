<?php
include "config.php";
$id = intval($_POST['id']);
$ip = $_SERVER['REMOTE_ADDR'];
$conn->query("INSERT INTO shayari_likes (shayari_id, user_ip) VALUES ($id, '$ip')");
$res = $conn->query("SELECT COUNT(*) as total FROM shayari_likes WHERE shayari_id=$id");
echo $res->fetch_assoc()['total'];
?>
