<?php
// config.php

// Database configuration
$host = 'localhost'; // or the actual host, e.g., 'mysql.hostinger.com'
$dbname = 'u334735432_sukhanzarfound'; // assuming DB name is same as username
$username = 'u334735432_sukhanzarfound';
$password = 'Cv^&kd:n|bY8';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 


{
    die("Connection failed: " . $conn->connect_error);
}
?>
