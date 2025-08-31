<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name           = $_POST['name'];
    $email          = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $event_date     = $_POST['event_date'];

    $performer_qty  = $_POST['performer_qty'];
    $video_qty      = $_POST['video_qty'];
    $audience_qty   = $_POST['audience_qty'];
    $total_amount   = $_POST['total_amount'];

    $sql = "INSERT INTO booking_ticket (name, email, contact_number, performer_price, video_price, audience_price, location) 
            VALUES ('$name', '$email', '$contact_number', '$performer_qty', '$video_qty', '$audience_qty', '$event_date')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ticket_payment.php?amount=$total_amount");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
