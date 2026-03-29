<?php
$conn = new mysqli("localhost", "root", "", "fashion_ai", 3306);

if ($conn->connect_error) {
    die("❌ Database connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$height = $_POST['height'];
$bust = $_POST['bust'];
$waist = $_POST['waist'];
$hips = $_POST['hips'];
$shoulder = $_POST['shoulder'];
$sleeve = $_POST['sleeve'];

/* ✅ Prepared Statement (SECURE) */
$stmt = $conn->prepare(
    "INSERT INTO measurements 
    (name, email, height, bust, waist, hips, shoulder, sleeve)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    "ssdddddd",
    $name,
    $email,
    $height,
    $bust,
    $waist,
    $hips,
    $shoulder,
    $sleeve
);

if ($stmt->execute()) {
    echo "<h2>✅ Measurements saved successfully!</h2>";
    echo "<a href='../index.html'>Go Back</a>";
} else {
    echo "❌ Error saving data: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
