<?php
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: admin_login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "fashion_db");
$result = $conn->query("SELECT * FROM feedback ORDER BY submitted_at DESC");

echo "<h2>Customer Feedback</h2><ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li><strong>" . htmlspecialchars($row["name"]) . ":</strong> " . 
         htmlspecialchars($row["message"]) . " <em>(" . $row["submitted_at"] . ")</em></li><hr>";
}
echo "</ul>";

$conn->close();
?>
