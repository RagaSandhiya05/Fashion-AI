<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$database = "fashion_store";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle logout
if (isset($_GET['logout']) && isset($_SESSION['user'])) {
    $username = $_SESSION['user'];

    // Delete the most recent login record for this user
    $stmt = $conn->prepare("
        DELETE FROM user_logins 
        WHERE id = (
            SELECT id FROM (
                SELECT id FROM user_logins 
                WHERE username = ? 
                ORDER BY login_time DESC LIMIT 1
            ) AS temp
        )
    ");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Destroy session
    session_destroy();
    echo "<script>alert('You have been logged out.'); window.location.href='login.php';</script>";
    exit();
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);

    // Save in session
    $_SESSION['user'] = $username;

    // Get user IP
    $ip_address = $_SERVER['REMOTE_ADDR'];

    // Insert login info in MySQL
    $stmt = $conn->prepare("INSERT INTO user_logins (username, ip_address) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $ip_address);
    $stmt->execute();

    // Redirect to dashboard
    echo "<script>alert('Login successful!'); window.location.href='dashboard.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login | Fashion Store</title>
<style>
body { font-family: Arial, sans-serif; background: #f8f8f8; display: flex; justify-content: center; align-items: center; height: 100vh; }
.login-container { background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
input[type=text] { width: 100%; padding: 10px; margin: 10px 0; border-radius: 5px; border: 1px solid #ccc; }
button { padding: 10px 20px; background: #ff4081; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
button:hover { background: #e73370; }
</style>
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <input type="text" name="username" placeholder="Enter your name" required>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
