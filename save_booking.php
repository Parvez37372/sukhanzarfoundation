<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name           = $_POST['name'];
    $email          = $_POST['email'];
    $contact_number = $_POST['contact'];

    $performer_qty  = $_POST['performer_qty'];
    $video_qty      = $_POST['video_qty'];
    $audience_qty   = $_POST['audience_price'];
    $total_amount   = $_POST['total_amount'];

    // Save into DB
    $sql = "INSERT INTO booking_ticket (name, email, contact_number, performer_price, video_price, audience_price, location) 
            VALUES ('$name', '$email', '$contact_number', '$performer_qty', '$video_qty', '$audience_qty', 'Online Booking')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('✅ Booking Saved. Please proceed with payment.'); window.location.href='ticket_payment.php?amount=$total_amount';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
