<?php
include('includes/header.php');
include('includes/sidebar.php');
include('includes/footer.php');
include 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {

        // Password decode (agar base64 encoded ho)
        $decoded_password = base64_decode($row['password']);

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User Details</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    max-width: 600px;
                    margin: 50px auto;
                    background: #fff;
                    padding: 20px;
                    box-shadow: 0px 2px 8px rgba(0,0,0,0.2);
                    border-radius: 10px;
                }
                h2 {
                    text-align: center;
                    color: #333;
                    border-bottom: 2px solid #eee;
                    padding-bottom: 10px;
                }
                .detail {
                    margin: 10px 0;
                    padding: 10px;
                    background: #f9f9f9;
                    border-radius: 6px;
                    border: 1px solid #ddd;
                }
                .label {
                    font-weight: bold;
                    color: #555;
                }
                button 
                {
                   
                    padding:10px;
                    border-radius:10px;
                }
                a
                {
                   text-decoration:none;
                 
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h2>User Details</h2>
                <div class="detail"><span class="label">ID:</span> <?php echo $row['id']; ?></div>
                <div class="detail"><span class="label">Name:</span> <?php echo $row['first_name'] . ' ' . $row['last_name']; ?></div>
                <div class="detail"><span class="label">Email:</span> <?php echo $row['email']; ?></div>
                <div class="detail"><span class="label">Phone:</span> <?php echo $row['phone']; ?></div>
                <div class="detail"><span class="label">Password:</span> <?php echo htmlspecialchars($decoded_password); ?></div>
                <div class="detail"><span class="label">Created At:</span> <?php echo $row['created_at']; ?></div>
                <button><a href="follower.php">Go Back</a></button>
            </div>
            
        </body>
        </html>
        <?php

    } else {
        echo "<p>User not found.</p>";
    }

    $stmt->close();
} else {
    echo "<p>No user ID provided.</p>";
}

$conn->close();
?>
