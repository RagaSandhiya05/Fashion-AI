<?php
$conn = new mysqli("localhost", "root", "", "fashion_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "Thank you for your feedback!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
