<?php
$conn = new mysqli("localhost", "root", "", "fashion_ai");

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
