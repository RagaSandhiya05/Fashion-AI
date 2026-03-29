<?php
session_start();
$conn = new mysqli("localhost","root","","fashion_store");
if($conn->connect_error) die("DB connection error");

// Handle login
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']); // for simplicity plain text

    $stmt = $conn->prepare("SELECT * FROM designer WHERE username=? AND password=? LIMIT 1");
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();
    $res = $stmt->get_result();

    if($res->num_rows === 1){
        $_SESSION['designer'] = $username;
        header("Location: designer_panel.php");
        exit();
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Designer Login</title>
<style>
body{font-family:Arial; background:#ffe6f2; display:flex; justify-content:center; align-items:center; height:100vh;}
.box{background:#fff; padding:30px; border-radius:12px; box-shadow:0 8px 20px rgba(0,0,0,.1); width:360px;}
input{width:100%; padding:12px; margin:10px 0; border-radius:8px; border:1px solid #f0a9c8;}
button{width:100%; padding:12px; border-radius:8px; border:none; background:#ff4081; color:#fff; font-size:16px; cursor:pointer;}
</style>
</head>
<body>
<div class="box">
    <h2>Designer Login</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
