<?php
// create_order.php
header('Content-Type: application/json');

$body = json_decode(file_get_contents('php://input'), true);
$amount = isset($body['amount']) ? intval($body['amount']) : 0; // paise
if ($amount <= 0) {
  http_response_code(400);
  echo json_encode(['error' => 'Invalid amount']);
  exit;
}

$key_id = 'YOUR_KEY_ID';
$key_secret = 'YOUR_KEY_SECRET';

$orderData = [
  'amount' => $amount,       // paise
  'currency' => 'INR',
  'receipt' => 'rcpt_'.time(),
  'payment_capture' => 1,
];

$ch = curl_init('https://api.razorpay.com/v1/orders');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($orderData));
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode >= 200 && $httpCode < 300) {
  echo $response; // contains id, amount, currency
} else {
  http_response_code($httpCode);
  echo json_encode(['error' => 'Failed to create order', 'details' => $response]);
}
