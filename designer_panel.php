<?php
session_start();
$conn = new mysqli("localhost","root","","fashion_store");
if($conn->connect_error) die("DB error");

// Designer must be logged in
if(!isset($_SESSION['designer'])){
    header("Location: designer_login.php");
    exit;
}

// Fetch all orders with latest measurement
$query = "SELECT o.id AS order_id, u.username, u.email, m.bust, m.waist, m.hips, m.height, m.scan_id, m.created_at
          FROM orders o
          JOIN users u ON o.user_id = u.id
          JOIN measurements m ON o.measurement_id = m.id
          ORDER BY o.created_at DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Designer Dashboard</title>
<style>
body{font-family:Arial; background:#fff0f5;}
.container{width:90%; margin:30px auto;}
table{width:100%; border-collapse:collapse;}
th, td{padding:10px; border:1px solid #ddd; text-align:center;}
th{background:#ff4081; color:#fff;}
tr:nth-child(even){background:#ffe6f2;}
a.logout{background:#ff6b6b; color:#fff; padding:8px 14px; border-radius:8px; text-decoration:none;}
</style>
</head>
<body>
<div class="container">
<h2>Designer Dashboard 👗</h2>
<a href="designer_logout.php" class="logout">Logout</a>
<table>
<tr>
<th>Order ID</th>
<th>Customer</th>
<th>Email</th>
<th>Bust</th>
<th>Waist</th>
<th>Hips</th>
<th>Height</th>
<th>Scan ID</th>
<th>Scanned At</th>
</tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
<td><?= $row['order_id'] ?></td>
<td><?= htmlspecialchars($row['username']) ?></td>
<td><?= htmlspecialchars($row['email']) ?></td>
<td><?= $row['bust'] ?> cm</td>
<td><?= $row['waist'] ?> cm</td>
<td><?= $row['hips'] ?> cm</td>
<td><?= $row['height'] ?> cm</td>
<td><?= $row['scan_id'] ?></td>
<td><?= $row['created_at'] ?></td>
</tr>
<?php endwhile; ?>
</table>
</div>
</body>
</html>
