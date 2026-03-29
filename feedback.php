<?php
$conn = new mysqli("localhost", "root", "", "fashion_ai");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Invalid request");
}

// Assign POST values to variables
$name    = $_POST["name"] ?? '';
$phone   = $_POST["phone"] ?? '';
$email   = $_POST["email"] ?? '';
$quality = $_POST["quality"] ?? '';
$fit     = $_POST["fit"] ?? '';
$design  = $_POST["design"] ?? '';
$ordering = $_POST["ordering"] ?? '';
$overall = $_POST["overall"] ?? '';
$comment = $_POST["comment"] ?? '';

// Prepare SQL
$sql = "INSERT INTO feedback
(name, phone, email, quality, fit, design, ordering, overall, comment)
VALUES (?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// Bind parameters using variables
$stmt->bind_param(
    "sssssssss",
    $name,
    $phone,
    $email,
    $quality,
    $fit,
    $design,
    $ordering,
    $overall,
    $comment
);

// Execute
if ($stmt->execute()) {
    echo "<h2 style='color:green;'>✅ Feedback saved successfully!</h2>";
    echo "<a href='feedback.html'>Go Back</a>";
} else {
    echo "<h2 style='color:red;'>❌ Error: " . $stmt->error . "</h2>";
}

$stmt->close();
$conn->close();
?>
