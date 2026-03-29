<?php
// verify_payment.php
header('Content-Type: application/json');

// --- DB CONFIG ---
$mysqli = new mysqli('localhost', 'root', 'password', 'fashiondb');
if ($mysqli->connect_errno) {
  echo json_encode(['status'=>'error','message'=>'DB connect failed']);
  exit;
}

// COD fallback
$payload = json_decode(file_get_contents('php://input'), true);
if (isset($payload['cod']) && $payload['cod'] === true) {
  $stmt = $mysqli->prepare("INSERT INTO payments (order_id, payment_id, amount, currency, status, customer_name, email, contact) VALUES (?, ?, ?, 'INR', 'COD_PENDING', ?, ?, ?)");
  $dummyOrderId = 'cod_' . time();
  $amountPaise = intval(round($payload['amount'] * 100));
  $empty = '';
  $stmt->bind_param('ssisss', $dummyOrderId, $empty, $amountPaise, $payload['name'], $payload['email'], $payload['phone']);
  $stmt->execute();
  echo json_encode(['status'=>'success','order_id'=>$dummyOrderId]);
  exit;
}

// Razorpay verification
$key_secret = 'YOUR_KEY_SECRET'; // same as used in create_order.php

$razorpay_payment_id = $payload['razorpay_payment_id'] ?? '';
$razorpay_order_id   = $payload['razorpay_order_id'] ?? '';
$razorpay_signature  = $payload['razorpay_signature'] ?? '';

if (!$razorpay_payment_id || !$razorpay_order_id || !$razorpay_signature) {
  echo json_encode(['status'=>'error','message'=>'Missing fields']);
  exit;
}

// Signature check: hmac_sha256(order_id|payment_id, key_secret)
$generated_signature = hash_hmac('sha256', $razorpay_order_id . '|' . $razorpay_payment_id, $key_secret);

if (hash_equals($generated_signature, $razorpay_signature)) {
  // Save success
  $amountPaise = intval(round($payload['amount'] * 100));
  $stmt = $mysqli->prepare("INSERT INTO payments (order_id, payment_id, amount, currency, status, customer_name, email, contact) VALUES (?, ?, ?, 'INR', 'PAID', ?, ?, ?)");
  $stmt->bind_param('ssisss', $razorpay_order_id, $razorpay_payment_id, $amountPaise, $payload['name'], $payload['email'], $payload['phone']);
  $stmt->execute();
  echo json_encode(['status'=>'success','order_id'=>$razorpay_order_id]);
} else {
  echo json_encode(['status'=>'error','message'=>'Signature mismatch']);
}
