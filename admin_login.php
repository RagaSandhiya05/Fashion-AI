<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    if ($user === "admin" && $pass === "admin123") {
        $_SESSION["admin_logged_in"] = true;
        header("Location: view_feedback.php");
        exit;
    } else {
        echo "Invalid login.";
    }
}
?>
<form method="post">
  <input type="text" name="username" placeholder="Username" required><br><br>
  <input type="password" name="password" placeholder="Password" required><br><br>
  <button type="submit">Login</button>
</form>
