<?php
include "config.php";
$id = intval($_POST['id']);
$name = $conn->real_escape_string($_POST['name']);
$comment = $conn->real_escape_string($_POST['comment']);

$conn->query("INSERT INTO shayari_comment (shayari_id, name, comment) VALUES ($id, '$name', '$comment')");

$res = $conn->query("SELECT * FROM shayari_comment WHERE shayari_id=$id ORDER BY id DESC");
while($row = $res->fetch_assoc()){
  echo "<p><b>{$row['name']}</b>: {$row['comment']}</p>";
}
?>
