<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Optionally redirect to login page
header("Location: login.php"); // change this to your login page path
exit();
?>
