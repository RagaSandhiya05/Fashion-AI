<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "fashion_store");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = $_POST['password'];

// Check empty fields
if (empty($name) || empty($email) || empty($password)) {
    die("All fields are required!");
}

// Check duplicate email
$stmt = $conn->prepare("SELECT id FROM user_login WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "❌ Email already exists! <br><a href='signup.html'>Try again</a>";
    exit();
}
$stmt->close();

// ❌ Store password as plain text (NOT SAFE)
$plain_password = $password;

// Insert into database
$stmt = $conn->prepare("INSERT INTO user_login (name, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $plain_password);

if ($stmt->execute()) {
    echo "✅ Signup successful! <br>";
    echo "<a href='login.html'>Go to Login</a>";
} else {
    echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>