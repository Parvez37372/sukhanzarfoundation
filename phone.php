<?php
$token = "YOUR_ACCESS_TOKEN"; // Getting Started me milega
$phone_number_id = "YOUR_PHONE_NUMBER_ID"; // Getting Started me milega
$to = "91 9027945064"; // jise send karna hai (country code ke saath)
$message = "Hello! Event allowance approved.";

$url = "https://graph.facebook.com/v19.0/{$phone_number_id}/messages";

$data = [
    "messaging_product" => "whatsapp",
    "to" => $to,
    "type" => "text",
    "text" => ["body" => $message]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $token",
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
